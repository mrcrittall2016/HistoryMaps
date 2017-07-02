<!DOCTYPE html>

<html>

    <head>

        <title>Battle Window</title>

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
        <script src="/js/battles.js"></script>
        
        <!-- link to own stylesheet -->
        <link rel = "stylesheet" type = "text/css" href = "css/css-main_3.css?version=2"/> 
        
        
    </head>
    
    <body class = "background-secondary">
        
        <?php 
            
            // Set identifier for this page so recognised when go back to quiz.php
            $_SESSION["value"] = "incorrect";
            // Keep track of number of questions answered
            $_SESSION["answered"]++; 
            
            require_once("includes/titles.php");
            
            $randomImage = "img/" . $dir . "/" . $dir . ".jpg"; 
           
        ?>
        
       <div class = "header">
            <div class = "container-fluid">              
                <div class = "row">
                    <div class = "col-xs-12"><div class = "dialogue well_custom well-primary"><h1><?php echo $title ?></h1></div></div>
                </div>
            </div>
        </div>   
        <div class = "painting_window">
            <div class = "container">
                <img src = "<?php echo $randomImage ?>">
            </div>
        </div>
        <div class = "supporting-1">
            <div class = "container">
                <div class = "row">                   
                    <div class = "col-md-12">
                        <div class = "dialogue well_custom well-primary quiz">
                            <h2>Sorry, that is incorrect!</h2>
                            <p><?php echo $_SESSION["explain"]; ?></p>
                            <form action="quiz.php" method="post">
                                <div class="form-group">
                                    <button type="submit" name="submit" value="quiz">
                                        <h4>Please click for next question</h4>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "footer"><a href = "www.drcrittall.com"><p>COPYRIGHT MATTHEW R CRITTALL</p></a></div>
    </body>
</html>
