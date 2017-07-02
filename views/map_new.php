<!DOCTYPE html>
<html>
    <head>

        <title>History Maps demo</title>

        <meta charset = "utf-8">
        <meta name = "viewport" content = "width=device-width, intial-scale = 1">

        <!--Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!--Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Niconne" rel="stylesheet">

         <!-- cdn link to fontawesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

        <!-- link to own stylesheet -->
        <link rel = "stylesheet" type = "text/css" href = "css/css-main_3.css"/>
        
        <!-- https://developers.google.com/maps/documentation/javascript/-->
        <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        
        <!-- http://google-maps-utility-library-v3.googlecode.com/svn/tags/markerwithlabel/1.1.10/ -->
        <script src="js/markerwithlabel_packed.js"></script>
        
        <!-- http://underscorejs.org/-->
        <script src="/js/underscore-min.js"></script>

        <!-- https://github.com/twitter/typeahead.js/ 
        <script src="/js/typeahead.jquery.min.js"></script>-->
        
        <!-- style array for google maps -->
        <script src="js/mapstyle.js"></script>
        
        <!--script file containing an array of objects for each place and Battle description -->
        <script src = "js/battles.js"></script>
        
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
        <!-- Note that html imports are only supported in Chrome. See: https://stackoverflow.com/questions/30145975/import-html-via-link-rel-not-supported-in-safari -->
        
        <link rel="import" href = "window.php" id = "import"
        onload="handleLoad(event)" onerror="handleError(event)">
        
        <!-- app's own JavaScript -->
        <script type="text/javascript" src="js/scripts.js"></script>
        

        <title><?= htmlspecialchars($title) ?></title>



    </head>
    <body class = "background-tertiary">
        <div class = "header header-secondary">
            <div class = "container-fluid">              
                <div class = "row">
                    <div class = "col-xs-12"><div class = "dialogue dialogue-secondary well_custom well-primary"><a href ="question_new.html"><h1>Road to Waterloo</h1></a></div></div>
                </div>                
            </div>
        </div>     
        <div class = "map_window">            
            <div class = "container-fluid">
                <!-- https://developers.google.com/maps/documentation/javascript/tutorial -->
                <div id="map-canvas"></div>             
            </div>
        </div>
        <div class = "supporting-1">
            <div class = "container">
                <div class = "row">                   
                    <div class = "col-xs-12">
                        <div class = "dialogue well_custom well-primary panel-height-primary">
                            <div id = "wrap">
                                <h2>Answer correctly at each location to win the the Battle! Can you beat Napoleon's Marshals?</h2>
                                <p><a href = "index.php">Or click here to return to campaign menu</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "footer"><a href = "www.drcrittall.com"><p>COPYRIGHT MATTHEW R CRITTALL</p></a></div>
    </body>
</html>