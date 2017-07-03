<!-- Example openlayers map. Note could not use URL to get js library, actually had to download zip file via 
wget https://github.com/openlayers/ol3/releases/download/v3.15.1/v3.15.1-dist.zip -o temp.zip; unzip
from the command window. This creates a folder with the required files. 

<!doctype html>
<html lang="en">
  <head>
    <!--<link rel="stylesheet" href="http://openlayers.org/en/v3.15.1/css/ol.css" type="text/css">-->
    <link href="/css/ol.css" rel="stylesheet"/>
    <style>
      .map {
        height: 400px;
        width: 100%;
      }
    </style>
    <!--<script src="http://openlayers.org/en/v3.15.1/build/ol.js" type="text/javascript"></script>-->
    <script src="/js/ol.js" type="text/javascript"></script>
    <title>OpenLayers 3 example</title>
  </head>
  <body>
    <h2>My Map</h2>
    <div id="map" class="map"></div>
    <script type="text/javascript">
      var map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.MapQuest({layer: 'sat'})
          })
        ],
        view: new ol.View({
          center: ol.proj.fromLonLat([37.41, 8.82]),
          zoom: 4
        })
      });
    </script>
  </body>
</html>