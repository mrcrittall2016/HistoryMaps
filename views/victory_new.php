<!DOCTYPE html>

<html>

    <head>

        <title>Victory</title>

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
        
        <!-- Array of objects containing historical content -->
        <script src="js/battles.js"></script>
        
        <script type="text/javascript"> var title = '<?php echo $title; ?>'; </script>
        <script src="js/victory.js"></script>
        
        <!-- link to own stylesheet -->
        <link rel = "stylesheet" type = "text/css" href = "css/css-main_3.css?version=2"/> 
        
        <!-- Script to autmomatically scroll to base of page -->
        <script>
        
            $(function(){
            
                var offset = $('.supporting-1 .container').offset().top; 
                // Speed value before callback is in milliseconds
                setTimeout(function(){$('html, body').animate({scrollTop:offset}, 2000)}, 800);
                
            });
            
        </script>
        
    </head>
    
    <body class = "background-secondary">
        
        
        <?php 
           
            
             if ($British_score > $French_score)
             {
                 $message = "British Victory!";
                 $image = "img/BVictory/BVictory.jpg"; 
                 $result = "Congratulations, Victory is yours!";
             }
             
             
             else if ($French_score > $British_score)
             {
                 $message = "French Victory!";
                 $image = "img/FVictory/FVictory1.jpg";
                 $result = "The French have won this round...better luck next time!";
             }
          
           
        ?>
        
       <div class = "header header-secondary">
            <div class = "container-fluid">              
                <div class = "row">
                    <div class = "col-xs-12"><div class = "dialogue dialogue-secondary well_custom well-primary"><h1><?php echo $message ?></h1></div></div>
                </div>
            </div>
        </div>   
        <div class = "painting_window">
            <div class = "container">
                <img src=<?php echo $image ?>>
            </div>
        </div>
        <div class = "supporting-1">
            <div class = "container">
                <div class = "row">                   
                    <div class = "col-md-12">
                        <div class = "dialogue well_custom well-primary quiz quiz-victory">
                            <div id = "outer">
                                <h2><?php echo $result ?></h2>
                                <a href = "" value="correct">Click here to learn about what really happened...</a>
                            </div>
                            <div id = "inner">
                                <h2></h2>                               
                                <p></p>
                                <a href = "scenario.php">Return to Map</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "footer"><a href = "www.drcrittall.com"><p>COPYRIGHT MATTHEW R CRITTALL</p></a></div>
    </body>
</html>
