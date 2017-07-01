<!DOCTYPE html>

<html>

    <head>

        <title>Winner</title>

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
        <link rel = "stylesheet" type = "text/css" href = "css/css-main_3.css?version=2"/> 

        <!--script to control whether see final scores or not ie if at Vimerio (index 11) or Waterloo (index 12) -->
        <script>
            
            // When DOM is ready...
            $(function(){
                
                var British = '<?php echo $British ?>';
                var French = '<?php echo $French ?>'; 
                
                // Must be end of game
                if (British && French == "undefined"){
                    $('#outer .menu-primary').hide(); 
                }
                
            })
            
        </script>
        
        
    </head>
    
    <body class = "background-secondary">       
       <div class = "header header-secondary">
            <div class = "container-fluid">              
                <div class = "row">
                    <div class = "col-xs-12"><div class = "dialogue dialogue-secondary dialogue-tertiary well_custom well-primary"><h2>Congratulatons !</h2></div></div>
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
                                <h2><?php echo $message ?></h2>
                                <ul class = "menu-primary">
                                    <?php if(isset($British) && isset($French)): ?>
                                       <li>British Victories: <?php echo $British ?> </li>
                                       <li>French Victories: <?php echo $French ?> </li>
                                    <?php endif ?>
                                </ul>
                                <form action="result.php" method="post">
                                    <div class="form-group">
                                        <button type="submit" name="submit" value="<?php echo $Result ?>"><?php echo $link ?></button>
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
