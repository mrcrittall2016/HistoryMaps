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
        
        <!-- Array of objects containing historical content -->
        <script src="js/battles.js"></script>
        
        <!-- link to own stylesheet -->
        <link rel = "stylesheet" type = "text/css" href = "css/css-main_3.css?version=2"/>  
        
        <!-- Passing PHP variables to external js scripts http://stackoverflow.com/questions/2928827/access-php-var-from-external-javascript-file -->
        <script type="text/javascript">var title = '<?php echo $title; ?>'; var answered = '<?php echo $answered; ?>'; </script>
        <script src="/js/question.js"></script>
        
        <!-- Script to autmomatically scroll to base of page -->
        <script>
        
            $(function(){
            
                var offset = $('.supporting-1 .container').offset().top; 

                // Speed value before callback is in milliseconds
                setTimeout(function(){$('html, body').animate({scrollTop:offset}, 2000)}, 800);
                
            });
            
        </script>
        
        <?php require_once("includes/titles.php"); ?>


    </head>
    <body class = "background-secondary">
        <div class = "header header-secondary">
            <div class = "container-fluid">              
                <div class = "row">
                    <div class = "col-xs-12"><div class = "dialogue dialogue-secondary well_custom well-primary"><h1><?php echo $title ?></h1></div></div>
                </div>                
            </div>
        </div>     
        <div class = "painting_window">
            <div class = "container">
                <img src="img/<?php echo $dir ?>/<?php echo $dir ?>.jpg">
            </div>
        </div>
        <div class = "supporting-1">
            <div class = "container">
                <div class = "row">                   
                    <div class = "col-md-12">
                        <div class = "dialogue well_custom well-primary quiz">
                            <div id = "outer">
                                 <h2>DATE</h2>
                                 <p></p>
                                 <a href = "">Click to proceed to quiz</a>
                            </div>
                            <div id = "inner">
                                <form action="quiz.php" method="post">
                                   <h3><?php echo $question["Question"] ?></h3>
                                   <div id = "wrap">            
                                        <div class="radio">                                 
                                            <label><input id="input1" type="radio" name="optradio" value="<?php echo $question["Choices"][0] ?>"><?php echo $question["Choices"][0] ?></label> 
                                        </div>
                                        <div class="radio">
                                            <label><input id="input2" type="radio" name="optradio" value="<?php echo $question["Choices"][1] ?>"><?php echo $question["Choices"][1] ?></label>
                                        </div>
                                        <div class="radio">
                                            <label><input id="input3" type="radio" name="optradio" value="<?php echo $question["Choices"][2] ?>"><?php echo $question["Choices"][2] ?></label>
                                        </div> 
                                        <div class="form-group">
                                            <button type="submit" name="submit" value="quiz">
                                                <img src="/img/pages/frame3.jpg" alt="Submit"/>
                                            </button>
                                        </div> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class = "footer"><a href = "www.drcrittall.com"><p>COPYRIGHT MATTHEW R CRITTALL</p></a></div>
    </body>
</html>