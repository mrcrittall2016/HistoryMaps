<!DOCTYPE html>

<html class="quiz">

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>
        
        <title>History Maps</title>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

    </head>
    
    <body id = "titlepage">
        
        <div id ="titleframe">                               
            <img id ="titlepaper" src="img/pages/paper.jpg">
            <font id="maintitle">History Maps</font>
        </div>
        
        <div id ="loginframe"> 
            <img id = "loginpaper" src = "img/pages/paper.jpg">
            <font id="login">Please Register</font>
            <div id="registerform">
                <form action="register.php" method="post">
                    <fieldset>
                       <div class="form-groups">
                            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>
                        </div>
                        <div class="form-groups">
                            <input autocomplete="off" autofocus class="form-control" name="institution" placeholder="Institution" type="text"/>
                        </div>
                        <div class="form-groups">
                            <input class="form-control" name="password" placeholder="Password" type="password"/>
                        </div>
                        <div class="form-groups">
                            <input class="form-control" name="confirmation" placeholder="Confirm Password" type="password"/>
                        </div>
                        <div class="form-groups">
                            <input class="form-control" name="email_address" placeholder="email address" type="text"/>
                        </div>
                        <font id="login" style = "font-size:20px; top:210px; left:-140px;">Do you require administrator privileges?</font>
                        <div class="radio-inline" style="top:20px; left:-20px;">
                          <label><input id="input1" type="radio" name="optradio" value="yes"><font id="options" style="left:20px;" >yes</font></label>
                        </div>
                        <div class="radio-inline" style="top:20px;">
                          <label><input id="input2" type="radio" name="optradio" value="no" checked="checked"><font id="options"style="left:15px;">no</font></label>
                        </div>
                        <div class="form-groups" style="padding:35px;">
                            <button class="btn btn-default" type="submit">
                                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                                Register
                            </button>
                        </div>
                    </fielset>
                </form>
            </div>
            <a href = "login.php" id="href" style="left:303px; top:408px" value="correct"><font id="options">Or click to login</font></a>
        </div>
    </body>
</html>

