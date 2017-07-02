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
        <div class = "header header-secondary">
            <div class = "container-fluid">                
                <div class = "row">
                    <div class = "col-xs-12"><div class = "dialogue dialogue-secondary well_custom well-primary"><h1>History Maps</h1></div></div>
                </div>                
            </div>
        </div>         
        <div class = "supporting-1">
            <div class = "container">
                <div class = "row">
                    <!--<div class = "col-xs-12"><div class = "display well_custom well-primary"></div></div>-->
                    <div class = "col-xs-12">
                        <div class = "dialogue well_custom well-primary register_login">
                            <h2>Please choose a new password</h2>
                            
                            <form action="reset_return.php" method="post">                     
                                <div class = "form-group">                      
                                    <input autocomplete="off" autofocus class="form-control" id="reset" name="reset" placeholder="" type="text"/>
                                </div>            
                                <div class = "form-group">
                                    <button type = "submit" class = "btn_block">Reset</button>
                                </div>                                         
                            </form>                             
                        </div>                     
                    </div>
                </div>
            </div>
        </div>        
        <div class = "footer"><a href = "www.drcrittall.com"><p>COPYRIGHT MATTHEW R CRITTALL</p></a></div>
        <div class="modal fade modal-customise" id="myModal" role="dialog">
            <div class="modal-dialog">                      
                <!-- Modal content -->
                <div class="modal-content well_custom well-primary">
                    <div class="modal-header">                        
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="close" data-dismiss="modal">Close</button>
                    </div>
                </div>                                    
            </div>
        </div>
    </body>
</html>