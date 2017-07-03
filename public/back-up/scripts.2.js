/* global google */
/* global _ */
/**
 * scripts.js
 *
 * Computer Science 50
 * Problem Set 8
 *
 * Global JavaScript.
 */

// Google Map
var map;
var canvas; 

// markers for map. This is actually an array of marker objects. Place name is marker.labelContent
var markers = [];
var marker; 

/* Fixed array of markers:

Note: can obtain actual battle coordinates by first searching for "battle of..." in wikipedia, then clicking on
link next to "Coordinates:" in top right above thumbnail. Link is not always available however. Redirects to GeoHack

Mondego Bay: Figueira da Foz. Change name and modify coordinates. Start with British Flag here. Right-click near to Figueira da Foz and click "what's here" to get coordinates
Rolica: Bombarral, Leira. Change name. 39.3136,-9.1836
Vimeiro: 39.175, -9.316667
Oporto: Porto, Porto. Change name. 
Talavera: Fought outside Talavera de la Reina. Change name/coordinates possibly. 39.966667,-4.833333
Bussaco: Mata do Bussaco. Change name and coordinates. 40.344444,-8.3375
Fuentes de Oñoro: 40.583333, -6.816667
Ciudad Rodrigo: 40.6, -6.5333
Badajoz: 38.878889, -6.966944
Salamanca: 40.89353, -5.64526
Vitoria: 42.85, -2.683333
San Sebastián: 43.319, -1.981
Sorauren: 42.8675, -1.6086
Toulouse: 43.6044, 1.4439
Waterloo: 50.68016, 4.41169

*/


// info window
var info = new google.maps.InfoWindow();

var temp = []; 

var battles = [];

// Scores array for keeping track of the winners of each battles
var scores = [];

// Array to capture late getjsnon calls (asynchronous)
var previous = []; 

// Tracks number of markers added to map. If battles_length is equal to index, do not getjson
var battles_length; 

// Checks last known location when sign in to retrieve last saved point or return from quiz page
var index; 

// Global so can be accessed by create_map function
var options;

// Global variable for changing map icon depending on scores
var image;



// execute when the DOM is fully loaded
$(function() {
    
    battles_length = -1; 
    
    // Check to see current battle index amd hence last position before headed off for quiz
    $.getJSON("index.php").done(function(data, textStatus, jqXHR) {
          
          console.log(data);
          
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
          
    })
        
    .fail(function(jqXHR, textStatus, errorThrown) {
        // log error to browser's console
        console.log(errorThrown.toString());
    });
    
    //index = 0; 
    // styles for map
    // https://developers.google.com/maps/documentation/javascript/styling
    // stye code for map is now included in mapstyle.js 
    // Note have turned off place names by for labels.text.fill by turning "visibility" to "off"
    
    // options for map
    // https://developers.google.com/maps/documentation/javascript/reference#MapOptions
    
    options = {
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.TERRAIN,
        maxZoom: 11,
        panControl: true,
        styles: styles,
        zoom: 11,
        zoomControl: true
    };

    create_map();
    
});

/**
 * Adds marker for place to map.
 */
function addMarker(place){
    
    // ensure coordinates are numbers
    //var latitude = (_.isNumber(place.latitude)) ? place.latitude : parseFloat(place.latitude);
    //var longitude = (_.isNumber(place.longitude)) ? place.longitude : parseFloat(place.longitude);
    
    if (place.Outcome == "British")
    {
        console.log("British Victory");
        image = "img/British.jpg"; 
    }
    
    else if (place.Outcome == "French")
    {
        console.log("French Victory");
        image = "img/French.jpg"
    }
    
    else
    {
        console.log("Stalemate");
        image = "img/battleicon.gif";
    }
    
    //image = "img/battleicon.gif";
    
    console.log(image); 
   
    var latitude = place.lat;
    var longitude = place.lng; 
   
    // Each position in the markers global array is occupied by this object
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
        labelAnchor: new google.maps.Point(0, 0),
        labelClass: "label", // the CSS class for the label
        labelStyle: {opacity: 0.75}
    });
    
    
    // Pushes marker onto markers array 
    markers.push(marker);
    battles.push(marker);
    
    /*
    console.log(marker.latitude); 
    console.log(marker.longitude);
    console.log(marker.labelContent); 
    */
    
    // Also for now create copy of this array - battles
    
    // Check that markers array of object marker containing place name is in correct order. 
    var length = 0;
    
    for (var i = 0; i < battles.length; i++)
    {
        length++;
        //console.log(marker.labelContent); 
    }
    
    //console.log(length); 
    
     
    
    google.maps.event.addListener(marker, 'click', function(){
        
        //console.log(place.place_name); 
        
        index++;
        
        if (index == 16)
        {
            // resent index to 0 if try to iterate past Waterloo
            index = 0; 
        }
        
        myLatLng = new google.maps.LatLng({lat:battles[index].latitude, lng:battles[index].longitude});
        
        
        // call smoothZoom, parameters map, final zoomLevel, and starting zoom level. From: http://stackoverflow.com/questions/4752340/how-to-zoom-in-smoothly-on-a-marker-in-google-maps
        zoom_out(map, 6, map.getZoom(), function(){
            
            // Timeout lets zoom_out finish what it is doing
            
            setTimeout(function(){
                
                slow_pan(myLatLng, function(){
                    setTimeout(function(){zoom_in(map, 11, map.getZoom())}, 2000);
                })
                
            }, 1000);
        });
        
        
        //var URL = "quiz.php?" + place.place_name;
        
        //var URL = "test.php"; 
        
        // Ideally want info window to open here with this message inside, then a timer counting down until page redirects
        //alert("Prepare for battle!"); 
        
        /*
        setTimeout(function () {
            window.location.href = URL; 
        }, 1000); 
        */
       
       
    });
    
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
    
    console.log(parameters.battle); 
    
    console.log(index);
    
    console.log(battles_length); 
    
    /*
    function callback(previous, scores)
    {
        previous = previous.concat(scores); 
        scores = previous;
        console.log(scores);
    }
    */
    
    
    // Make sure do not try and get scores for a place that have not visited yet 
    if (battles_length <= index)
    {
        console.log("inside if battles... loop"); 
        
        // For every place up to battle_index, check what score is and change flag symbol as required 
        $.getJSON("scores.php", parameters).done(function(data, textStatus, jqXHR) {
              
              console.log(data);
              
              var British = data.British;
              var French = data.French; 
              
              
              console.log("The British score is: " + British);
              console.log("The French score is: " + French);
              
              if (British > French)
              {
                  //image = "img/British.jpg";
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
                  //image = "img/battleicon.gif"; 
                  result["Battle"] = data.Battle;
                  result["Outcome"] = "Stalemate";
                  previous.push(result);
              }
              
              //console.log(previous);
              
              callback(previous, scores); 
              
        })
            
        .fail(function(jqXHR, textStatus, errorThrown) {
            // log error to browser's console
            console.log(errorThrown.toString());
        });
        
        
    }
    
    else
    {
        result["Battle"] = parameters.battle;
        result["Outcome"] = "Stalemate";
        scores.push(result);
            
    }
    
    
}





// Test callback function
function myDinner( param1, param2, callbackFunction ){ 
    
    alert( 'Started eating my dinner. \n\n It has: ' + param1 + ', ' + param2); 
    callbackFunction ();
    
}

// Function to control pan speed. Need to sort this out later.. complicated
function slow_pan(LatLng, callback)
{
    // Note may have to add lat and lng as separate values and change bit by bit. First get difference between 
    // start and end lng and lat then work out what need to increase/decrease by. More complicated than zoom functions
    
    /*
    z = google.maps.event.addListener(map, 'center_changed', function(event){
        google.maps.event.removeListener(z);
        slow_pan(end, start);
    })
    */
            
    setTimeout(function(){map.panTo(LatLng);}, 1000);
    
    if (callback && typeof (callback) == "function"){
        callback(); 
    }
}


// function to control smooth zoom in. From From: http://stackoverflow.com/questions/4752340/how-to-zoom-in-smoothly-on-a-marker-in-google-maps
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
        setTimeout(function(){map.setZoom(cnt)}, 1); 
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


// function to delay opening of page by x seconds
function delay (URL){
    
    setTimeout(function () { 
        window.location = URL }, 500);
}

/**
 * Configures application.
 */
function configure()
{
    // Will disable drag ability 
    
    /*
    // update UI after map has been dragged
    google.maps.event.addListener(map, "dragend", function() {
        grab();
    });

    // update UI after zoom level changes
    google.maps.event.addListener(map, "zoom_changed", function() {
        grab();
    });

    // remove markers whilst dragging
    google.maps.event.addListener(map, "dragstart", function() {
        removeMarkers();
    });
    */

    // re-enable ctrl- and right-clicking (and thus Inspect Element) on Google Map
    // https://chrome.google.com/webstore/detail/allow-right-click/hompjdfbfmmmgflfjdlnkohcplmboaeo?hl=en
    document.addEventListener("contextmenu", function(event) {
        event.returnValue = true; 
        event.stopPropagation && event.stopPropagation(); 
        event.cancelBubble && event.cancelBubble();
    }, true);

    // update UI
    grab();
}

/**
 * Hides info window.
 */
function hideInfo()
{
    info.close();
}

/**
 * Removes markers from map.
 */
function removeMarkers()
{
    // Check content of markers global array
    //console.log(markers); 
    
    // Iterate through markers array and remove one by one
    for (var i = 0; i < markers.length; i++)
    {
        markers[i].setMap(null);
    }
    
    // Reset global array to empty
    markers = []; 
}

/**
 * Shows info window at marker with content.
 */
function showInfo(marker, content)
{
    // start div
    var div = "<div id='info'>";
    if (typeof(content) === "undefined")
    {
        // http://www.ajaxload.info/
        div += "<img alt='loading' src='img/ajax-loader.gif'/>";
    }
    else
    {
        div += content;
    }

    // end div
    div += "</div>";

    // set info window's content
    info.setContent(div);

    // open info window (if not already open)
    info.open(map, marker);
}

function grab()
{
    $.getJSON("get.php")
    .done(function(data, textStatus, jqXHR) {
        
        // returns json array of objects containing place_name, longitude, latitude etc.
        
        // remove old markers from map
        removeMarkers();
       
        // add new markers to map. Getting ten at a time, but we don't really want this do we? We want a fixed array
        // where we know each place name will always be the same position in the array each time. 
        
        for (var i = 0; i < data.length; i++)
        {
            // First create helper function here that goes through each place and builds an array of results ie British, French etc.
            // Hopefully will allow us to get around issue of waiting for getjson code to finish after markers aready added to map and undefined image variable
            score_keeper(data[i]);
            // Build battles array here without setting marker? Save calling getjson again in scores callback?
            
            // Any addMarker event we ONLY want to invoke within the callback for the getJSON for the scores NOT before 
            //addMarker(data[i]);
        }
   
     // If current place in focus is a victory, change map icon?
     })
     
     .fail(function(jqXHR, textStatus, errorThrown) {

         // log error to browser's console
         console.log(errorThrown.toString());
     });
    
}


function callback(previous, scores)
{
    //console.log(places); 
    
    previous = previous.concat(scores); 
    scores = previous;
    console.log(scores); 
    
    var measure = 0; 
    
    // Check to see if scores array is length we desire ie 16
    for (var i = 0; i < scores.length; i++)
    {
        measure++; 
    }
    
    console.log(measure); 
    
    // if scores length is correct and we have all the data we need from the back-end...
    if (measure == 16)
    {
        console.log("ready to add markers"); 
    
       // Iterate through scores array which also contains coordinates
       for (var i = 0; i < scores.length; i++)
       {
           console.log(scores[i]);
           addMarker(scores[i]); 
       }
    }
    
    // Probably need to call addMarker in here
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
/**
 * Updates UI's markers.
 */
/*
function update() 
{
    // Possibly no point in using coordinates, as really just want to get all from SQL table (max 20 places)
    // wherever are and store in fixed array. Simplify update to function get() called once at beginning in configure. 
    
    // get map's bounds
    var bounds = map.getBounds();
    var ne = bounds.getNorthEast();
    var sw = bounds.getSouthWest();

    // get places within bounds (asynchronously)
    var parameters = {
        ne: ne.lat() + "," + ne.lng(),
        sw: sw.lat() + "," + sw.lng()
    };
    
    console.log(parameters); 
    
    $.getJSON("update.php", parameters)
    .done(function(data, textStatus, jqXHR) {

        // remove old markers from map
        removeMarkers();

        // add new markers to map. Getting ten at a time, but we don't really want this do we? We want a fixed array
        // where we know each place name will always be the same position in the array each time. 
        
        for (var i = 0; i < data.length; i++)
        {
            addMarker(data[i]);
        }
        
        // If current place in focus is a victory, change map icon?
     })
     
     .fail(function(jqXHR, textStatus, errorThrown) {

         // log error to browser's console
         console.log(errorThrown.toString());
     });
     
}
*/