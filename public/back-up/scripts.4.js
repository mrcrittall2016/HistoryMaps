/* 

    Script to control google maps API-based quiz game.
    Finished v1 MRC 08-05-2016

*/

// Google Map
var map;
var canvas; 

// markers for map. This is actually an array of marker objects. Place name is marker.labelContent
var battles = [];
var marker; 

// Creates global info window object, termed info 
var info = new google.maps.InfoWindow();

// Scores array for keeping track of the winners of each battles
var scores = [];

// Array to capture late getjsnon calls (asynchronous)
var previous = []; 

// Tracks number of markers added to map. If battles_length is equal to index, do not getjson
var battles_length; 

// Checks last known location when sign or when return from quiz page to retrieve last saved point
var index; 

// Global so can be accessed by create_map function
var options;

// Global variable for changing map icon depending on scores
var image;

// For storing details of map center
var object = {}; 

// Globals for counting scores at end of game
var British;
var French;



// execute when the DOM is fully loaded
$(function() {
    
    battles_length = -1; 
    
    // Check to see current battle index amd hence last position before headed off for quiz
    $.getJSON("battle_index.php").done(function(data, textStatus, jqXHR) {
         
         
          // index stored in global variable
          index = data.battle_index;
          
          // ensure coordinates are numbers
          var latitude = (_.isNumber(data.latitude)) ? data.latitude : parseFloat(data.latitude);
          var longitude = (_.isNumber(data.longitude)) ? data.longitude : parseFloat(data.longitude);
          
          //options["center"] = {lat: parseFloat(x), lng: parseFloat(y)}; 
          var myLatlng = new google.maps.LatLng(parseFloat(latitude), parseFloat(longitude));
          
          // Note: Cannot just use options["center"] = myLatlng. Need to use specific setOptions method
          map.setOptions({
              center:myLatlng
          });
          
          // Store details from battle_index.php in global object
          object["index"] = index;
          object["latitude"] = latitude;
          object["longitude"] = longitude; 
    })
        
    .fail(function(jqXHR, textStatus, errorThrown) {
        // log error to browser's console
        console.log(errorThrown.toString());
    });
    
    
    // styles for map
    // https://developers.google.com/maps/documentation/javascript/styling
    // stye code for map is now included in mapstyle.js 
    // Note have turned off place names by for labels.text.fill by turning "visibility" to "off"
    
    // options for map
    // https://developers.google.com/maps/documentation/javascript/reference#MapOptions
    
    options = {
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.TERRAIN,
        //maxZoom: 12,
        panControl: true,
        styles: styles,
        zoom: 6,
        zoomControl: false
    };
    
    
    create_map();
    
});

/**
 * Adds marker for place to map. Note here that place is an array of the object marker, in this case the scores array built by score_keeper
 */
function addMarker(place){
    
    if (place.Outcome == "British")
    {
        image = "img/British.jpg"; 
    }
    
    else if (place.Outcome == "French")
    {
        image = "img/French.jpg"
    }
    
    else
    {
        image = "img/battleicon.gif";
    }
    
    var latitude = place.lat;
    var longitude = place.lng; 
   
    // Each position in the markers or battles global array is occupied by this object
    marker = new MarkerWithLabel({
        latitude:latitude,
        longitude:longitude,
        icon:{
            url: image,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(-25, 25), 
            scaledSize: new google.maps.Size(25, 25)
        },
        position:{lat:latitude, lng:longitude},
        draggable: false,
        raiseOnDrag: true,
        map:map,
        labelContent: place.Battle,
        labelAnchor: new google.maps.Point(-7, 0),
        labelClass: "label", // the CSS class for the label
        labelStyle: {opacity: 0.75}
    });
    
    
    // Pushes marker onto battles array
    battles.push(marker);
    
    
    // If winner ie when come back from quiz, then want to enable user to move on to next battle. Exception is Mondego Bay.
    if (marker.icon.url == "img/British.jpg" || marker.icon.url == "img/French.jpg" )
    {
        
        // info window to show congratulations this battle has been won, then when click map icon (flag)
        // this causes map to zoom out and spin off to the next place
        google.maps.event.addListener(marker, 'click', function(event){
            
            
            // Close any open victory windows
            info.close()
            
            // first check to see if game is won then increment battle_index as moving to next location
            winner(index);
            
            index++;
            
            myLatLng = new google.maps.LatLng({lat:battles[index].latitude, lng:battles[index].longitude});
            
            // Ensure do not start zooming out if on Virtoria prior to being redirected
            if (index != 12){
                
                // call smoothZoom, parameters map, final zoomLevel, and starting zoom level. From: http://stackoverflow.com/questions/4752340/how-to-zoom-in-smoothly-on-a-marker-in-google-maps
                zoom_out(map, 6, map.getZoom(), function(){
                    
                    // Timeout lets zoom_out finish what it is doing
                    setTimeout(function(){
                        
                        slow_pan(myLatLng, function(){
                            setTimeout(function(){zoom_in(map, 12, map.getZoom())}, 1000); //2000 
                        })
                        
                    }, 500); //1000
                
                });
            }
            
        })
    }
    
    // If marker is neutral then open window to enable user to go to next quiz
    else if (marker.icon.url == "img/battleicon.gif")
    {
    
        google.maps.event.addListener(marker, 'click', function(event){
            
            // Object to send to compile_window function
            var content = {
               battle:battles[index].labelContent,
               result:battles[index].icon.url
            }
            
            // Get coordinates for current marker to send to info.setPosition()
            var myLatLng = new google.maps.LatLng({lat:battles[index].latitude + 0.01, lng:battles[index].longitude + 0.025}); //0.01, 0.025
            
            var output = compile_window(content); 
            
            showInfo(myLatLng, output);
 
        });
    }  
    
}

function compile_window(obj)
{
    var URL = "quiz.php?" + obj.battle; 
   
    // Required for names with spaces - otherwise will break at PHP end    
    URL = encodeURI(URL);
    
    // Imports info.php document from link in map.php head tag
    var load = document.getElementById("import");
    
    var content = load.import;
    
    var clone = content; 
    
    if (obj.result == "img/British.jpg"){
        clone.querySelector("#title").innerText = "Victory!";
        clone.querySelector("#options").innerText = "Congratulations, the French have been defeated! Click the flag to proceed...";
        // Remove href link from template
        clone.getElementsByClassName("link").questions.innerText = ""; 
        clone.querySelector("#questions").style = "top: 100px;left:40px; font-size:20px;";
    }
    
    else if (obj.result == "img/French.jpg"){
        clone.querySelector("#title").innerText = "You have been defeated!";
        clone.querySelector("#options").innerText = "The French have won this round! Click the flag to proceed";
        // Remove href link from template
        clone.getElementsByClassName("link").questions.innerText = ""; 
        clone.querySelector("#questions").style = "left:85px; font-size:18px;";
    }
    
    else if (obj.result == "img/battleicon.gif"){
        
        // iterate through battles.js to retrieve scenario preamble 
        for (i in scenarios){
            
            if (scenarios[i].title == obj.battle)
            {
                
                // Set title of imported html using object passed to compile_window
                if (obj.battle == "Mondego Bay")
                {
                    clone.querySelector("#title").innerText = obj.battle; //+ ", " + scenarios[i].date;
                }
                
                else if (obj.battle == "Ciudad Rodrigo")
                {
                     clone.querySelector("#title").innerText = "The Siege of " + obj.battle; 
                }
                
                else if (obj.battle == "Badajoz")
                {
                     clone.querySelector("#title").innerText = "The Siege of " + obj.battle;
                }
                
                else
                {
                    clone.querySelector("#title").innerText = "The Battle of " + obj.battle;
                }
                
                clone.querySelector("#options").innerText = scenarios[i].preamble;
                // Add in href link to back-end quiz
                var link = clone.getElementsByTagName("a");
                link.questions.href = URL;
                link.questions.style = "top:200px; left:225px; font-family:Garamond, Baskerville, serif; font-style:italic; font-weight: 700;"
                clone.getElementsByClassName("link").questions.innerText = "Click to play scenario";
                clone.querySelector("#questions").style = "left:35px; top:100px; font-size:18px;";
               
            }
        }
    }
    
    // Gets html from info.php
    var inner = clone.getElementById("html").innerHTML;
    
    //return "<head><script type='text/javascript' src='/js/scripts.js'></script><h4></head>" + obj.battle + "</h4>" + "<a href =" + URL + "><h5>Sign here to accept mission objectives</h5></a>" 
    var html = "<!DOCTYPE html>" + inner + "</html>" 
    
    return html;
    
}

function score_keeper(place)
{
    // increment battles_length for every marker added
    battles_length++; 
    
    var latitude = (_.isNumber(place.latitude)) ? place.latitude : parseFloat(place.latitude);
    var longitude = (_.isNumber(place.longitude)) ? place.longitude : parseFloat(place.longitude);
    
    // Storing result of score comparison
    var result = {
        lat:latitude, 
        lng:longitude
    }; 
     
    var parameters = {
        battle:place.place_name
    };
    
    debug(parameters);
    
    // Make sure do not try and get scores for a place that have not visited yet 
    if (battles_length <= index)
    {
        
        // For every place up to battle_index, check what score is and change flag symbol as required 
        $.getJSON("scores.php", parameters).done(function(data, textStatus, jqXHR) {
              
              
              var British = data.British;
              var French = data.French; 
              
              if (British > French)
              {
                  
                  result["Battle"] = data.Battle;
                  result["Outcome"] = "British";
                  previous.push(result);
                  
              }
              
              else if (French > British)
              {
                  result["Battle"] = data.Battle;
                  result["Outcome"] = "French";
                  previous.push(result);
              }
              
              else 
              {
                   
                  result["Battle"] = data.Battle;
                  result["Outcome"] = "Stalemate";
                  previous.push(result);
              }
              
              callback(previous, scores); 
              
        })
            
        .fail(function(jqXHR, textStatus, errorThrown) {
            // log error to browser's console
            console.log(errorThrown.toString());
        });
        
        
    }
    
    else
    {
        // Remove special characters so that is easier to order scores array once built in callback function
        debug(parameters); 
        
        result["Battle"] = parameters.battle;
        result["Outcome"] = "Stalemate";
        scores.push(result);
            
    }
    
    
}

// Function to control pan speed.
function slow_pan(LatLng, callback)
{
            
    setTimeout(function(){map.panTo(LatLng);}, 500); // 1000
    
    if (callback && typeof (callback) == "function"){
        callback(); 
    }
}


// function to control smooth zoom in. From: http://stackoverflow.com/questions/4752340/how-to-zoom-in-smoothly-on-a-marker-in-google-maps
function zoom_in(map, max, cnt) 
{
    if (cnt >= max) 
    {
        return;
    }
    
    else 
    {
        z = google.maps.event.addListener(map, 'zoom_changed', function(event){
            google.maps.event.removeListener(z);
            zoom_in(map, max, cnt + 1);
        });
        
        // 80ms is what I found to work well on my system -- it might not work well on all systems
        setTimeout(function(){map.setZoom(cnt)}, 150); //1 prev. Larger number, slower the zoom
    }
}  

// function to control smooth zoom out. Callback added by MRC. Adapted from From: http://stackoverflow.com/questions/4752340/how-to-zoom-in-smoothly-on-a-marker-in-google-maps
function zoom_out(map, end_zoom, start_zoom, callback)
{
    if (callback && typeof (callback) == "function" && start_zoom == end_zoom){
        callback(); 
    }
    
    else
    {
        z = google.maps.event.addListener(map, 'zoom_changed', function(event){
            google.maps.event.removeListener(z);
            zoom_out(map, end_zoom, start_zoom - 1, callback);
        });
    
        // 80ms is what I found to work well on my system -- it might not work well on all systems
        setTimeout(function(){map.setZoom(start_zoom)}, 1); 
    }
}

/**
 * Configures application.
 */
function configure()
{
    // re-enable ctrl- and right-clicking (and thus Inspect Element) on Google Map
    // https://chrome.google.com/webstore/detail/allow-right-click/hompjdfbfmmmgflfjdlnkohcplmboaeo?hl=en
    document.addEventListener("contextmenu", function(event) {
        event.returnValue = true; 
        event.stopPropagation && event.stopPropagation(); 
        event.cancelBubble && event.cancelBubble();
    }, true);

    // update UI
    grab();
    
    // zoom_in works quite well here but need a timedelay just before occurs
    setTimeout(function(){zoom_in(map, 12, map.getZoom())}, 2000);
    
    setTimeout(function(){victory(object.index, object.latitude, object.longitude)}, 4500); 
}

/**
 * Hides info window.
 */
function hideInfo()
{
    info.close();
}

/**
 * Shows info window at marker with content.
 */
function showInfo(position, content)
{
    
    // Executing one function after another is complete via callback http://stackoverflow.com/questions/5000415/call-a-function-after-previous-function-is-complete
    info_style(function(){
        
         // set info window's content
        info.setContent(content);
        
        info.setPosition(position); 
        
        info.open(map);
        
    });
    
}

function grab()
{
    $.getJSON("get.php")
    .done(function(data, textStatus, jqXHR) {
        
        // returns json array of objects containing place_name, longitude, latitude etc.
        // Create fixed array where we know each place name will always be the same position in the array each time. 
        
        for (var i = 0; i < data.length; i++)
        {
            // First create helper function here that goes through each place and builds an array of results ie British, French etc.
            score_keeper(data[i]);
        }
        
     })
     
     .fail(function(jqXHR, textStatus, errorThrown) {

         // log error to browser's console
         console.log(errorThrown.toString());
     });
    
}

// This function is only called once have completed scores array of all places with outcomes (ie once asynchronous AJAX call is finished)
function callback(previous, scores)
{
    previous = previous.concat(scores); 
    scores = previous;
    
    var measure = 0; 
    
    // Check to see if scores array is length we desire ie 13
    for (var i = 0; i < scores.length; i++)
    {
        measure++; 
    }
    
    // if scores length is correct and we have all the data we need from the back-end... can now call addMarker
    if (measure == 13)
    {
       
       // Put scores array into correct order 
       sort(scores); 
       
       // Iterate through scores array which also contains coordinates
       for (var i = 0; i < scores.length; i++)
       {
            addMarker(scores[i]); 
       }
    }
}


function create_map()
{
    //get DOM node in which map will be instantiated
    canvas = $("#map-canvas").get(0);

    // instantiate map
    map = new google.maps.Map(canvas, options);

    // configure UI once Google Map is idle (i.e., loaded)
    google.maps.event.addListenerOnce(map, "idle", configure);
     
}

function victory (index, latitude, longitude)
{
    var content = {
       battle:battles[index].labelContent,
       result:battles[index].icon.url
    }
    
    var output = compile_window(content)
    
    info_style(function(){
        
         // set info window's content
        info.setContent(output);
        
        var myLatlng = new google.maps.LatLng(parseFloat(latitude + 0.01), parseFloat(longitude + 0.025));
        
        info.setPosition(myLatlng); 
        
        info.open(map);
        
    });
   
}

// Function for custom-styling info window. See See http://en.marnoto.com/2014/09/5-formas-de-personalizar-infowindow.html
function info_style(callback)
{
    // Removes white right-hand border from info window. 
    google.maps.event.addListener(info, 'domready', function() {

       // Reference to the DIV which receives the contents of the infowindow using jQuery
       var iwOuter = $('.gm-style-iw');
    
       /* The DIV we want to change is above the .gm-style-iw DIV.
        * So, we use jQuery and create a iwBackground variable,
        * and took advantage of the existing reference to .gm-style-iw for the previous DIV with .prev().
        */
       var iwBackground = iwOuter.prev();
    
       // Remove the background shadow DIV
       iwBackground.children(':nth-child(2)').css({'display' : 'none'});
    
       // Remove the white background DIV
       iwBackground.children(':nth-child(4)').css({'display' : 'none'});
       
       // Moves the infowindow 115px to the right.
       iwOuter.parent().parent().css({left: '38px'});
       
       // Moves the shadow of the arrow 76px to the left margin 
       iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 280px !important;'});

       // Moves the arrow 76px to the left margin 
       iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left:280px !important;'});
       
  
       // Removes the infowindow close button
       var iwCloseBtn = iwOuter.next();
       
       iwCloseBtn.css({'display': 'none'});
        
    });
    
    // Only once finished stylisng info window do we open
    callback();
}

// Function to sort scores array into correct order after returning from AJAX call. Without this, can index into wrong marker object 

function sort(scores)
{

    // Order scores array to match SQL table.
    var order = ["Mondego Bay", "Rolica", "Vimeiro", "Oporto", "Talavera", "Bussaco", "Fuentes de Onoro", 
    "Ciudad Rodrigo", "Badajoz", "Salamanca", "Burgos", "Vitoria", "Waterloo"]; 
   
    // Iterate through scores and order array at same rate
    for (var i = 0, j = 0; i < scores.length; i++, j++)
    {
       
        if (scores[i].Battle == order[j])
        {
            // If same, then assign bookmark
            scores[i]["bookmark"] = j; 
        }
        
        else if (scores[i].Battle != order[j])
        {
            // find what index should be from order array
            for (var k in order)
            {
                if (scores[i].Battle == order[k])
                {
                    scores[i]["bookmark"] = k;
                }
            }
        }
    }
   
    // Now sort scores based on assigned bookmark from order array. See: https://davidwalsh.name/array-sort
    scores = scores.sort(function(obj1, obj2){
       
       return obj1.bookmark - obj2.bookmark;
       
    });
    
}

// Determine number of British and French victories
function count(previous)
{
    for (var i in previous){
        
        if (previous[i].Outcome == "British"){
            British++;
        }
        
        else if (previous[i].Outcome == "French"){
            French++;
        }
    }
}

// Function to remove special characters and spaces from place names... greatly simplifies de-bugging
function debug(parameters)
{
    if (parameters.battle.search("Rol") != -1)
    {
        parameters.battle = "Rolica";
    }
    
    else if (parameters.battle.search("Fuen") != -1)
    {
       parameters.battle = "Fuentes de Onoro";
    }
    
    else if (parameters.battle.search("Tala") != -1)
    {
        parameters.battle = "Talavera";
    }
}

function winner(index){
    
    if (index == 11){
                
        British = 0;
        French = 0; 
        
        count(previous);
        
        var scores = {
            British:British,
            French:French
        }
        
        // Create GET querystring from object: See http://stackoverflow.com/questions/1714786/querystring-encoding-of-a-javascript-object
        var URL = []; 
        
        for (var i in scores){
            
            URL.push(i + "=" + scores[i]);
        }
        
        URL = encodeURI("result.php?" + URL.join("&"));
        
        // To results page
        window.location.href = URL; 
        
    }
    
    // Check to see if final battle and have won/lost game
    if (index == 12)
    {
        
        var outcome; 
        
        if (marker.icon.url == "img/British.jpg")
        {
            // set outcome 
            outcome = "British"; 
            
        }
        
        else if (marker.icon.url == "img/French.jpg")
        {
           // set outcome
           outcome = "French"; 
        }
        
        // Create URI
        var URL = "result.php?" + outcome;  
        
        // Required for names with spaces - otherwise will break at PHP end    
        URL = encodeURI(URL);
        
        // To results page
        window.location.href = URL; 
    }
}


