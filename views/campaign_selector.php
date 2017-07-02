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

        <!--Page's own js -->
        <!--javascript object for changing bottom window content -->
        <script src="js/intro.js"></script>
        
        <!--When click on header or portraits, directs to relevant map page. In addition, changes message in bottom window
        depending on image or title mouse hovers over-->
        <script src = "js/campaign.js"></script>


    </head>
    <body class = "background">
        <div class = "header header-secondary">
            <div class = "container-fluid">              
                <div class = "row">
                    <div class = "col-xs-12"><div class = "dialogue dialogue-secondary well_custom well-primary"><h1>Campaign Selector</h1></div></div>
                </div>              
            </div>
        </div>     
        <div class = "selection">
            <div class = "container-fluid">
                <div class = "row">                   
                    <div class = "col-md-4">
                        <div class = "dialogue dialogue-secondary well_custom well-primary alexander"><h2>Alexander the Great</h2></div>
                        <div class = "dialogue well-primary picture_select alexander"><img src = "Map_images/alexander.jpg"></div>
                    </div>
                    <div class = "col-md-4">
                         <div class = "dialogue dialogue-secondary well_custom well-primary wellington"><h2>Road to Waterloo</h2></div>
                         <div class = "dialogue well-primary picture_select wellington"><img src = "Map_images/wellington.jpg"></div>
                    </div>
                    <div class = "col-md-4">
                         <div class = "dialogue dialogue-secondary well_custom well-primary war"><h2>World War II</h2></div>
                         <div class = "dialogue well-primary picture_select war"><img src = "Map_images/jima2.jpg"></div>
                    </div>
                </div>
            </div>
        </div>    
        <div class = "supporting-1">
            <div class = "container">
                <div class = "row">                   
                    <div class = "col-xs-12">
                        <div class = "dialogue dialogue-secondary panel-height well_custom well-primary">
                            <div id = "wrap">
                                <h2>Choose your campaign! Which journey through history will you embark on?</h2>                        
                                <p><a href = "logout.php">Or click here to logout</a></p>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "footer"><a href = "www.drcrittall.com"><p>COPYRIGHT MATTHEW R CRITTALL</p></a></div>
    </body>
</html>