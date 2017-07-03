<html>
    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <!-- app's own CSS -->
        <link href="/css/styles.css" rel="stylesheet"/>
        
        <!--stylesheet for openlayers map -->
        <link href="/css/ol.css" rel="stylesheet"/>
        
        <!-- See "Fly to Bern" code example for openlayers... closest to want we want to replicate smooth zoom -->
        <script src="/js/ol.js" type="text/javascript"></script>

        <!-- https://developers.google.com/maps/documentation/javascript/-->
        <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        
        <!-- http://google-maps-utility-library-v3.googlecode.com/svn/tags/markerwithlabel/1.1.10/ -->
        <script src="/js/markerwithlabel_packed.js"></script>

        <!-- http://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>
        
        <!-- http://underscorejs.org/ -->
        <script src="/js/underscore-min.js"></script>

        <!-- https://github.com/twitter/typeahead.js/ -->
        <script src="/js/typeahead.jquery.min.js"></script>
        
        <!-- style array for google maps -->
        <script src="/js/mapstyle.js"></script>
        
        <!--script file containing an array of objects for each place and Battle description -->
        <script src = "/js/battles.js"></script>
        
        <!-- script for debugging purposes to check html for info window is loaded -->
        <script>
            function handleLoad(e) {
                console.log('Loaded import: ' + e.target.href);
            }
            function handleError(e) {
                console.log('Error loading import: ' + e.target.href);
            }
        </script>
        
        <!--html for info window. See http://www.html5rocks.com/en/tutorials/webcomponents/imports/ and http://blog.teamtreehouse.com/introduction-html-imports for html imports-->
        <link rel="import" href = "window.php" id = "import"
        onload="handleLoad(event)" onerror="handleError(event)">
        
        <!-- app's own JavaScript -->
        <script>
        /*
            $(function(){
            
                var gmap = new google.maps.Map(document.getElementById('gmap'), {
                  disableDefaultUI: true,
                  keyboardShortcuts: false,
                  draggable: false,
                  disableDoubleClickZoom: true,
                  scrollwheel: false,
                  streetViewControl: false
                });
                
                var view = new ol.View({
                  // make sure the view doesn't go beyond the 22 zoom levels of Google Maps
                  maxZoom: 21
                });
                
                view.on('change:center', function() {
                  var center = ol.proj.transform(view.getCenter(), 'EPSG:3857', 'EPSG:4326');
                  gmap.setCenter(new google.maps.LatLng(center[1], center[0]));
                });
                
                view.on('change:resolution', function() {
                  gmap.setZoom(view.getZoom());
                });
                
                var vector = new ol.layer.Vector({
                    
                    // change from new ol.source.GeoJSON (see https://github.com/openlayers/ol3/issues/3526)
                    source: new ol.source.Vector({            
                        url: 'data/geojson/countries.geojson',
                        //projection: 'EPSG:3857'
                        format:new ol.format.GeoJSON()
                    }),
                  
                    style: new ol.style.Style({
                        fill: new ol.style.Fill({
                        color: 'rgba(255, 255, 255, 0.6)'
                        }),
                    
                        stroke: new ol.style.Stroke({
                            color: '#319FD3',
                            width: 1
                        })
                    
                    })
                  
                });
                
                var olMapDiv = document.getElementById('olmap');
                console.log(olMapDiv);
                var map = new ol.Map({
                  layers: [vector],
                  interactions: ol.interaction.defaults({
                    altShiftDragRotate: false,
                    dragPan: false,
                    rotate: false
                  }).extend([new ol.interaction.DragPan({kinetic: null})]),
                  target: olMapDiv,
                  view: view
                });
                view.setCenter([0, 0]);
                view.setZoom(1);
                
                olMapDiv.parentNode.removeChild(olMapDiv);
                gmap.controls[google.maps.ControlPosition.TOP_LEFT].push(olMapDiv);
            
            });
        
        */
        </script>
        

        <title><?= htmlspecialchars($title) ?></title>

    </head>
    <body>
        <div class="container-fluid">
          <div class="row-fluid">
            <div class="span12">
              <div id="map" class="map">
                <div id="gmap" class="fill" style="position: relative; overflow: hidden; transform: translateZ(0px); background-color: rgb(229, 227, 223);">
                    <div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;">
                    <div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;">
                    <div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, -216, -20);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
                    <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                        <div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 663px; top: -56px;"></div>
                        <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 407px; top: -56px;"></div>
                        <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 407px; top: 200px;"></div>
                        <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 663px; top: 200px;"></div>
                        <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 151px; top: -56px;"></div>
                        <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 151px; top: 200px;"></div>
                        <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 919px; top: -56px;"></div>
                        <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 919px; top: 200px;"></div>
                        <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 1175px; top: -56px;"></div>
                        <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 1175px; top: 200px;"></div>
                        <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 1431px; top: 200px;"></div>
                        <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 1431px; top: -56px;"></div>
                        </div></div></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div>
                        <div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"></div>
                        <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                            <div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;">
                                <div style="transform: translateZ(0px); position: absolute; left: 1175px; top: -56px; transition: opacity 200ms ease-out;">
                                    <img src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i1!2i1!3i0!4i256!2m3!1e0!2sm!3i348016286!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=92513" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                <div style="transform: translateZ(0px); position: absolute; left: 663px; top: -56px; transition: opacity 200ms ease-out;">
                                    <img src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i1!2i1!3i0!4i256!2m3!1e0!2sm!3i348016286!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=92513" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                    <div style="transform: translateZ(0px); position: absolute; left: 151px; top: -56px; transition: opacity 200ms ease-out;"><img src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i1!2i1!3i0!4i256!2m3!1e0!2sm!3i348016286!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=92513" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                    <div style="transform: translateZ(0px); position: absolute; left: 919px; top: 200px; transition: opacity 200ms ease-out;">
                                        <img src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i1!2i0!3i1!4i256!2m3!1e0!2sm!3i348016286!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=108791" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                        <div style="transform: translateZ(0px); position: absolute; left: 407px; top: 200px; transition: opacity 200ms ease-out;"><img src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i1!2i0!3i1!4i256!2m3!1e0!2sm!3i348016286!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=108791" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                        <div style="transform: translateZ(0px); position: absolute; left: 1175px; top: 200px; transition: opacity 200ms ease-out;"><img src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i1!2i1!3i1!4i256!2m3!1e0!2sm!3i348016286!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=128534" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: 663px; top: 200px; transition: opacity 200ms ease-out;"><img src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i1!2i1!3i1!4i256!2m3!1e0!2sm!3i348016286!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=128534" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                        <div style="transform: translateZ(0px); position: absolute; left: 151px; top: 200px; transition: opacity 200ms ease-out;"><img src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i1!2i1!3i1!4i256!2m3!1e0!2sm!3i348016286!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=128534" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                        <div style="transform: translateZ(0px); position: absolute; left: 919px; top: -56px; transition: opacity 200ms ease-out;"><img src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i1!2i0!3i0!4i256!2m3!1e0!2sm!3i348016286!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=72770" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                        <div style="transform: translateZ(0px); position: absolute; left: 407px; top: -56px; transition: opacity 200ms ease-out;"><img src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i1!2i0!3i0!4i256!2m3!1e0!2sm!3i348016286!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=72770" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                        <div style="transform: translateZ(0px); position: absolute; left: 1431px; top: 200px; transition: opacity 200ms ease-out;"><img src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i1!2i0!3i1!4i256!2m3!1e0!2sm!3i348016286!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=108791" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                        <div style="transform: translateZ(0px); position: absolute; left: 1431px; top: -56px; transition: opacity 200ms ease-out;"><img src="http://maps.google.com/maps/vt?pb=!1m5!1m4!1i1!2i0!3i0!4i256!2m3!1e0!2sm!3i348016286!3m9!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=72770" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div>
                                        <div style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, -216, -20);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div style="padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 505px; top: 110px; background-color: white;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;">Map data ©2016</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 166px; bottom: 0px; width: 87px;"><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Map Data</a><span>Map data ©2016</span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2016</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; -webkit-user-select: none; height: 14px; line-height: 14px; position: absolute; right: 95px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a></div></div>
                                        <div style="width: 25px; height: 25px; margin-top: 10px; overflow: hidden; display: none; margin-right: 14px; position: absolute; top: 0px; right: 0px;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/sv5.png" draggable="false" class="gm-fullscreen-control" style="position: absolute; left: -52px; top: -86px; width: 164px; height: 112px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div>
                                        <div id="olmap" class="fill" style="z-index: 0; position: absolute; left: 0px; top: 0px;">
                                            <div class="ol-touch" style="position: relative; overflow: hidden; width: 100%; height: 100%;">
                                                <canvas class="ol-unselectable" width="1309" height="400" style="width: 100%; height: 100%;"></canvas>
                                                <div class="ol-overlaycontainer"></div>
                                                <div class="ol-overlaycontainer-stopevent">
                                                    <div class="ol-zoom ol-unselectable ol-control">
                                                        <button class="ol-zoom-in ol-has-tooltip" type="button">
                                                            <span role="tooltip">Zoom in</span>+</button><button class="ol-zoom-out  ol-has-tooltip" type="button">
                                                                <span role="tooltip">Zoom out</span>−</button></div>
                                                                <div class="ol-rotate ol-unselectable ol-control" style="opacity: 0;"><button class="ol-rotate-reset ol-has-tooltip" name="ResetRotation" type="button"><span role="tooltip">Reset rotation</span><span class="ol-compass" style="transform: rotate(0deg);">⇧</span></button></div><div class="ol-attribution ol-unselectable ol-control ol-collapsed ol-logo-only"><ul><li style=""><a href="http://openlayers.org/" target="_blank"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAA3NCSVQICAjb4U/gAAAACXBIWXMAAAHGAAABxgEXwfpGAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAAhNQTFRF////AP//AICAgP//AFVVQECA////K1VVSbbbYL/fJ05idsTYJFtbbcjbJllmZszWWMTOIFhoHlNiZszTa9DdUcHNHlNlV8XRIVdiasrUHlZjIVZjaMnVH1RlIFRkH1RkH1ZlasvYasvXVsPQH1VkacnVa8vWIVZjIFRjVMPQa8rXIVVkXsXRsNveIFVkIFZlIVVj3eDeh6GmbMvXH1ZkIFRka8rWbMvXIFVkIFVjIFVkbMvWH1VjbMvWIFVlbcvWIFVla8vVIFVkbMvWbMvVH1VkbMvWIFVlbcvWIFVkbcvVbMvWjNPbIFVkU8LPwMzNIFVkbczWIFVkbsvWbMvXIFVkRnB8bcvW2+TkW8XRIFVkIlZlJVloJlpoKlxrLl9tMmJwOWd0Omh1RXF8TneCT3iDUHiDU8LPVMLPVcLPVcPQVsPPVsPQV8PQWMTQWsTQW8TQXMXSXsXRX4SNX8bSYMfTYcfTYsfTY8jUZcfSZsnUaIqTacrVasrVa8jTa8rWbI2VbMvWbcvWdJObdcvUdszUd8vVeJaee87Yfc3WgJyjhqGnitDYjaarldPZnrK2oNbborW5o9bbo9fbpLa6q9ndrL3ArtndscDDutzfu8fJwN7gwt7gxc/QyuHhy+HizeHi0NfX0+Pj19zb1+Tj2uXk29/e3uLg3+Lh3+bl4uXj4ufl4+fl5Ofl5ufl5ujm5+jmySDnBAAAAFp0Uk5TAAECAgMEBAYHCA0NDg4UGRogIiMmKSssLzU7PkJJT1JTVFliY2hrdHZ3foSFhYeJjY2QkpugqbG1tre5w8zQ09XY3uXn6+zx8vT09vf4+Pj5+fr6/P39/f3+gz7SsAAAAVVJREFUOMtjYKA7EBDnwCPLrObS1BRiLoJLnte6CQy8FLHLCzs2QUG4FjZ5GbcmBDDjxJBXDWxCBrb8aM4zbkIDzpLYnAcE9VXlJSWlZRU13koIeW57mGx5XjoMZEUqwxWYQaQbSzLSkYGfKFSe0QMsX5WbjgY0YS4MBplemI4BdGBW+DQ11eZiymfqQuXZIjqwyadPNoSZ4L+0FVM6e+oGI6g8a9iKNT3o8kVzNkzRg5lgl7p4wyRUL9Yt2jAxVh6mQCogae6GmflI8p0r13VFWTHBQ0rWPW7ahgWVcPm+9cuLoyy4kCJDzCm6d8PSFoh0zvQNC5OjDJhQopPPJqph1doJBUD5tnkbZiUEqaCnB3bTqLTFG1bPn71kw4b+GFdpLElKIzRxxgYgWNYc5SCENVHKeUaltHdXx0dZ8uBI1hJ2UUDgq82CM2MwKeibqAvSO7MCABq0wXEPiqWEAAAAAElFTkSuQmCC"></a></li></ul><button class="ol-has-tooltip" type="button"><span>i</span><span role="tooltip">Attributions</span></button></div></div></div></div><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_new" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@-13.9234039,145.8984375,1z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report a map error</a></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="https://maps.google.com/maps?ll=-13.923404,145.898438&amp;z=1&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/google4.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div></div></div>
            
          </div>
            </div>
        </div>

        <div class="row-fluid">

        <div class="span4">
          <h4 id="title">Google Maps integration example</h4>
          <p id="shortdesc">Example of a GMaps map with an ol3 map as control, to give users a Google base map with ol3 content on top.</p>
          <div id="docs">
            <p>See the <a href="google-map.js" target="_blank">google-map.js source</a> to see how this is done.</p>
          </div>
          <div id="tags">google</div>
        </div>

      </div>

    </div>
</body>

      <!-- app's own JavaScript -->
        <script>
        
        
            
                var gmap = new google.maps.Map(document.getElementById('gmap'), {
                  disableDefaultUI: true,
                  keyboardShortcuts: false,
                  draggable: false,
                  disableDoubleClickZoom: true,
                  scrollwheel: false,
                  streetViewControl: false
                });
                
                var view = new ol.View({
                  // make sure the view doesn't go beyond the 22 zoom levels of Google Maps
                  maxZoom: 21
                });
                
                view.on('change:center', function() {
                  var center = ol.proj.transform(view.getCenter(), 'EPSG:3857', 'EPSG:4326');
                  gmap.setCenter(new google.maps.LatLng(center[1], center[0]));
                });
                
                view.on('change:resolution', function() {
                  gmap.setZoom(view.getZoom());
                });
                
                var vector = new ol.layer.Vector({
                    
                    // change from new ol.source.GeoJSON (see https://github.com/openlayers/ol3/issues/3526)
                    source: new ol.source.Vector({            
                        url: 'data/geojson/countries.geojson',
                        //projection: 'EPSG:3857'
                        format:new ol.format.GeoJSON()
                    }),
                  
                    style: new ol.style.Style({
                        fill: new ol.style.Fill({
                        color: 'rgba(255, 255, 255, 0.6)'
                        }),
                    
                        stroke: new ol.style.Stroke({
                            color: '#319FD3',
                            width: 1
                        })
                    
                    })
                  
                });
                
                var olMapDiv = document.getElementById("olmap");
                console.log(olMapDiv);
                var map = new ol.Map({
                  layers: [vector],
                  interactions: ol.interaction.defaults({
                    altShiftDragRotate: false,
                    dragPan: false,
                    rotate: false
                  }).extend([new ol.interaction.DragPan({kinetic: null})]),
                  target: olMapDiv,
                  view: view
                });
                view.setCenter([0, 0]);
                view.setZoom(1);
                
                olMapDiv.parentNode.removeChild(olMapDiv);
                gmap.controls[google.maps.ControlPosition.TOP_LEFT].push(olMapDiv);
            
            
        
        
        </script>

        
    <!-- 
        
        <body class="home">
        
        <div id ="titleframe" style="margin-top:20px; margin-bottom:10px;">                               
            <img id ="titlepaper" src="img/pages/paper.jpg">
            <font id="titlehead"><?php echo $title ?></font>
        </div>
        
        <!-- fill viewport 
        <div class="container-fluid">

            <!-- https://developers.google.com/maps/documentation/javascript/tutorial 
            <div id="gmap"></div>
        </div>
        
        <div id ="mainframe" style="margin-top:10px; margin-bottom:10px;"> 
            <img id = "mainpaper" src = "img/pages/paper.jpg">
            <font id="title" style ="width:600px; left:100px">Answer correctly at each location to win the Battle! Can you beat Napoleon's Marshals?</font>
            <a href = "/" id="href" style="top:130px; left:220px;"value="correct"><font id="options">Or click here to return to campaign menu</font></a>
        </div>
    </body>
</html>
-->   
        
        
