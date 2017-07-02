<!DOCTYPE html >
<html>
    <head>

        <title>History Maps</title>

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

        <script>

            $(function(){

               $('.menu li a').click(function(){
                    event.preventDefault(); 
                   
                    // Scrolldown to dialogue box if about link clicked
                    if ($(this).html() == "About"){

                        var offset = $('.supporting-1 .container').offset().top; 

                        // Speed value before callback is in milliseconds
                        $('html, body').animate({scrollTop:offset}, 1500, function(){

                            // Slide down dialogue pane.. quite clunky regardless of animate or slideDown 
                            /*$('.dialogue').animate({height:"100px"}, 500);*/                  
                            /*$('.dialogue').slideDown(1500);*/ 

                        }); 

                    }

                    

                    
               });

            });


        </script>


    </head>
    <body class = "background">
        <div class = "header">
            <div class = "container-fluid">
                <ul class = "menu">
                    <li class = "btn_block"><a href = "">About</a></li>
                    <!--<li class = "btn_block"><a href = "">Sign Up</a></li>-->
                    <a href = "register.php"><li class = "btn_block">Sign Up</li></a>
                    <a href = "login.php"><li class = "btn_block">Log In</li></a>
                    <!--<li class = "btn_block"><a href = "login.php">Log In</a></li>-->
                </ul>
                <div class = "row">
                    <div class = "col-xs-12"><div class = "header_bar dialogue well_custom well-primary shadow_primary"></div></div>
                </div>
                <!--<div class = "btn_block">                  
                    <i class="fa fa-bars" aria-hidden="true"></i>
                    i class="fa fa-long-arrow-up" aria-hidden="true"></i>
                </div>-->
            </div>
        </div>
        <div class = "main background-primary shadow-primary">            
            <div class = "container-fluid">
                <h1>HISTORY MAPS</h1>
                <h2>Explore, Discover, Learn</h2>
            </div>     
        </div>
        </div>        
        <div class = "supporting-1">
            <div class = "container">
                <div class = "row">
                    <!--<div class = "col-xs-12"><div class = "display well_custom well-primary"></div></div>-->
                    <div class = "col-xs-12"><div id = "about" class = "dialogue well_custom well-primary"><h2>Welcome!<h2><p>History Maps is an educational webapp game that aims to convey in a fun manner some of the major events in military history. What will you choose to learn about?<br> <p>Start your journey by clicking <a href = #><span>here</span></a></p></div></div>
                </div>
            </div>
        </div>        
        <div class = "footer"><a href = "www.drcrittall.com"><p>COPYRIGHT MATTHEW R CRITTALL</p></a></div>

    </body>



</html>
    