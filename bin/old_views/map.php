<!DOCTYPE html>

<!-- map.php as rendered by scenario.php -->

<html>
    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <!-- app's own CSS -->
        <link href="/css/styles.css" rel="stylesheet"/>
       
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
        <script type="text/javascript" src="/js/scripts.js"></script>

        <title><?= htmlspecialchars($title) ?></title>

    </head>
    <body class="home">
        
        <div id ="titleframe" style="margin-top:20px; margin-bottom:10px;">                               
            <img id ="titlepaper" src="img/pages/paper.jpg">
            <font id="titlehead"><?php echo $title ?></font>
        </div>
        
        <!-- fill viewport -->
        <div class="container-fluid">

            <!-- https://developers.google.com/maps/documentation/javascript/tutorial -->
            <div id="map-canvas"></div>
        </div>
        
        <div id ="mainframe" style="margin-top:10px; margin-bottom:10px;"> 
            <img id = "mainpaper" src = "img/pages/paper.jpg">
            <font id="title" style ="width:600px; left:100px">Answer correctly at each location to win the Battle! Can you beat Napoleon's Marshals?</font>
            <a href = "/" id="href" style="top:130px; left:220px;"value="correct"><font id="options">Or click here to return to campaign menu</font></a>
        </div>

    </body>
</html>