<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8' />
        <title>My OpenLayers Map</title>
        <script src="/js/ol.js" type="text/javascript"></script>
        <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type='text/javascript'>

            var map;

            function init() {
                map = new ol.Map('map_element', {});
                var google_map_layer = new ol.layer.Google(
                    'Google Map Layer',
                    {type: google.maps.MapTypeId.TERRAIN}
                );

                map.addLayer(google_map_layer);
                if(!map.getCenter()){
                    map.zoomToMaxExtent();
                }
            }
        </script>
    </head>
    <body onload='init();'>
        <div id='map_element' style='width: 500px; height: 500px;'>
        </div>
    </body>
</html>