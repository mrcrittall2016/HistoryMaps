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


    </head>
    <body class = "background">
        <div class = "header">
            <div class = "container-fluid">
                <!--<ul class = "menu">
                    <li class = "btn_block"><a href = "index_2.html#about">About</a></li>
                    <li class = "btn_block"><a href = "">Sign Up</a></li>
                    <li class = "btn_block"><a href = "log-in.html">Log In</a></li>
                </ul>-->
                <div class = "row">
                    <div class = "col-xs-12"><div class = "dialogue well_custom well-primary"><h1>History Maps</h1></div></div>
                </div>
                <!--<div class = "btn_block">                  
                    <i class="fa fa-bars" aria-hidden="true"></i>
                    i class="fa fa-long-arrow-up" aria-hidden="true"></i>
                </div>-->
            </div>
        </div>         
        <div class = "supporting-1">
            <div class = "container">
                <div class = "row">
                    <!--<div class = "col-xs-12"><div class = "display well_custom well-primary"></div></div>-->
                    <div class = "col-xs-12"><div class = "dialogue well_custom well-primary"><h2>Please Register<h2>
                        <form action="register.php" method="post">
                            <div class = "form-group">
                                <input type = "text" class = "form-control" id = "username" name = "username" placeholder = "Username"/>
                            </div>
                             <div class = "form-group">
                                <input type = "text" class = "form-control" id = "institution" name = "institution" placeholder = "Institution"/>
                            </div>
                            <div class = "form-group">
                                <input type = "password" class = "form-control" id = "password" name = "password" placeholder = "Password"/>
                            </div>
                            <div class = "form-group">
                                <input type = "password" class = "form-control" id = "confirm" name = "confirmation" placeholder = "Confirm Password"/>
                            </div>   
                            <div class = "form-group">
                                <input type = "email" class = "form-control" id = "email" name = "email_address" placeholder = "Email address"/>
                            </div>           
                            <p>Do you require administrator privileges?</p>  
                            <div class = "form-group">
                                <label class="radio-inline"><input type="radio" name="optradio" value = "yes">yes</label>
                                <label class="radio-inline"><input type="radio" name="optradio" value = "no">no</label>   
                            </div>            
                            <div class = "form-group">
                                <button type = "submit" class = "btn_block">Submit</button>
                            </div> 
                                                     
                        </form>                        
                        <p><a href = "login.php">Or click here to login</a></p>
                        
                    </div></div>
                </div>
            </div>
        </div>        
        <div class = "footer"><a href = "www.drcrittall.com"><p>COPYRIGHT MATTHEW R CRITTALL</p></a></div>

    </body>



</html>