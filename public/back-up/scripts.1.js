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

// markers for map
var markers = [];

// info window
var info = new google.maps.InfoWindow();


// execute when the DOM is fully loaded
$(function() {

    // styles for map
    // https://developers.google.com/maps/documentation/javascript/styling
    // stye code for map is now included in mapstyle.js 
    
    // options for map
    // https://developers.google.com/maps/documentation/javascript/reference#MapOptions
    var options = {
        center: {lat: 40.1689, lng: -8.8796}, // Figueira da Foz, Portugal
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        maxZoom: 14,
        panControl: true,
        styles: styles,
        zoom: 8,
        zoomControl: true
    };

    // get DOM node in which map will be instantiated
    var canvas = $("#map-canvas").get(0);

    // instantiate map
    map = new google.maps.Map(canvas, options);

    // configure UI once Google Map is idle (i.e., loaded)
    google.maps.event.addListenerOnce(map, "idle", configure);

});

/**
 * Adds marker for place to map.
 */
function addMarker(place){
   
    // ensure coordinates are numbers
    var latitude = (_.isNumber(place.latitude)) ? place.latitude : parseFloat(place.latitude);
    var longitude = (_.isNumber(place.longitude)) ? place.longitude : parseFloat(place.longitude);
    
    var image = {
        url: "img/battleicon.gif",
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(-25, 25),
        scaledSize: new google.maps.Size(25, 25)
    };
    
    var marker = new MarkerWithLabel({
        icon: image,
        position:{lat:latitude, lng:longitude},
        draggable: false,
        raiseOnDrag: true,
        map:map,
        labelContent: place.place_name + ", " + place.admin_name1,
        labelAnchor: new google.maps.Point(22, 0),
        labelClass: "label", // the CSS class for the label
        labelStyle: {opacity: 0.75}
    });
    
    // Pushes marker onto markers array 
    markers.push(marker);
    
    google.maps.event.addListener(marker, 'click', function(){
        
        console.log(place.place_name); 
        
        //location.href = "quiz.php"; 
        
        var parameters = {
            battle:place.place_name
        };
        
        console.log(parameters); 
        
        var URL = "quiz.php?" + place.place_name;
        
        // Ideally want info window to open here with this message inside, then a timer counting down until page redirects
        //alert("Prepare for battle!"); 
        
        setTimeout(function () {
            window.location.href = URL; 
        }, 1000); 
        
         
    
        /*
        $.getJSON("quiz.php", parameters).done(function(data, textStatus, jqXHR) {
              
              console.log(data);
              
              // Now need to render new view using data retrieved from mySQL database
              location.href = "battle.php?" + data; 
              
               
        })
            
        .fail(function(jqXHR, textStatus, errorThrown) {
            // log error to browser's console
            console.log(errorThrown.toString());
        });
        */
    });
    
}

// function to delay opening of page by x seconds

function delay (URL){
    
    setTimeout(function () { 
        window.location = URL }, 500);
}
    



// Compiles infowindow content. By passing an object, gives flexibility to move things around in content window and not 
// having to write code in a specific order. Added by MRC 
function compile_window(obj)
{
    
    var header = "<div class='container, extraClass'>"+"<ul class='nav nav-tabs'>"+ "<li class='active'><a data-toggle='tab' href='#home'>Home</a></li>"+
                 "<li><a data-toggle='tab' href='#menu1'>News</a></li>"+"</ul>"+"<div class='tab-content'>"+"<div id='home' class='tab-pane fade in active'>"+
                 "<h4>"+ obj.place + ", " + obj.county + "</h4>";
                 
    var footer = "<div id='menu1' class='tab-pane fade'>" + "<h4>News</h4>" + "<h5>" + obj.news + "</h5>" +
                 "</div>" + "</div>" + "</div>";
                 
    var extract = obj.extract + "<a href = https://en.wikipedia.org/wiki/" + obj.place + ",%20" + obj.county + ">" + "<h6>WIKIPEDIA</h6>" + "</a>"
    
    
    if (obj.extract === undefined)
    {
        return header + obj.picture + "</div>" + footer; 
    }
    
    else if (obj.picture === undefined)
    {
        return header + extract + "</div>" + footer;
    }
    
    else if (obj.picture && obj.extract === undefined)
    {
        return header + "</div>" + footer; 
    }
    
    
    else if (obj.news == "</ul><br>")
    {
        footer = "<div id='menu1' class='tab-pane fade'>" + "<h4>News</h4>" + "<h5>Sorry, no news could be found for this area!</h5>"+ 
                 "</div>" + "</div>" + "</div>";
                 
        return header + obj.picture + extract + "</div>" + footer; 
    }
    
    
    else 
    {
        return header + obj.picture + extract + "</div>" + footer; 
    }
    
}

/**
 * Configures application.
 */
function configure()
{
    // update UI after map has been dragged
    google.maps.event.addListener(map, "dragend", function() {
        update();
    });

    // update UI after zoom level changes
    google.maps.event.addListener(map, "zoom_changed", function() {
        update();
    });

    // remove markers whilst dragging
    google.maps.event.addListener(map, "dragstart", function() {
        removeMarkers();
    });

    // configure typeahead
    // https://github.com/twitter/typeahead.js/blob/master/doc/jquery_typeahead.md
    $("#q").typeahead({
        autoselect: true,
        highlight: true,
        minLength: 1
    },
    {
        source: search,
        templates: {
            empty: "no places found yet",
            suggestion: _.template("<p><%- place_name %>, <%- admin_name1 %>, <%- postal_code %></p>")
        }
    });

    // re-center map after place is selected from drop-down
    $("#q").on("typeahead:selected", function(eventObject, suggestion, name) {

        // ensure coordinates are numbers
        var latitude = (_.isNumber(suggestion.latitude)) ? suggestion.latitude : parseFloat(suggestion.latitude);
        var longitude = (_.isNumber(suggestion.longitude)) ? suggestion.longitude : parseFloat(suggestion.longitude);

        // set map's center
        map.setCenter({lat: latitude, lng: longitude});

        // update UI
        update();
    });

    // hide info window when text box has focus
    $("#q").focus(function(eventData) {
        hideInfo();
    });

    // re-enable ctrl- and right-clicking (and thus Inspect Element) on Google Map
    // https://chrome.google.com/webstore/detail/allow-right-click/hompjdfbfmmmgflfjdlnkohcplmboaeo?hl=en
    document.addEventListener("contextmenu", function(event) {
        event.returnValue = true; 
        event.stopPropagation && event.stopPropagation(); 
        event.cancelBubble && event.cancelBubble();
    }, true);

    // update UI
    update();

    // give focus to text box
    $("#q").focus();
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
 * Searches database for typeahead's suggestions.
 */
function search(query, cb)
{
    // get places matching query (asynchronously)
    var parameters = {
        geo: query
    };
    $.getJSON("search.php", parameters)
    .done(function(data, textStatus, jqXHR) {

        // call typeahead's callback with search results (i.e., places)
        cb(data);
    })
    .fail(function(jqXHR, textStatus, errorThrown) {

        // log error to browser's console
        console.log(errorThrown.toString());
    });
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

/**
 * Updates UI's markers.
 */
function update() 
{
    // get map's bounds
    var bounds = map.getBounds();
    var ne = bounds.getNorthEast();
    var sw = bounds.getSouthWest();

    // get places within bounds (asynchronously)
    var parameters = {
        ne: ne.lat() + "," + ne.lng(),
        q: $("#q").val(),
        sw: sw.lat() + "," + sw.lng()
    };
    $.getJSON("update.php", parameters)
    .done(function(data, textStatus, jqXHR) {

        // remove old markers from map
        removeMarkers();

        // add new markers to map
        for (var i = 0; i < data.length; i++)
        {
            addMarker(data[i]);
        }
     })
     .fail(function(jqXHR, textStatus, errorThrown) {

         // log error to browser's console
         console.log(errorThrown.toString());
     });
}