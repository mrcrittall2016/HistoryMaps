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
            <font id="login">Please Log in</font>
            <div id="loginform">
                <form action="login.php" method="post">
                    <fieldset>
                        <div class="form-groups">
                            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>
                        </div>
                        <div class="form-groups">
                            <input class="form-control" name="password" placeholder="Password" type="password"/>
                        </div>
                        <div class = "form groups">
                            <font size = "2"><a href="reset.php">forgotten your password?</a></font>
                        </div>
                        <div class="form-groups">
                            <button class="btn btn-default" type="submit">
                                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                                Log In
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
            <a href = "register.php" id="href" value="correct"><font id="options">Or click here to register!</font></a>
        </div>
    </body>
</html>