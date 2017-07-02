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
            <font id="login" style ="font-size: 30px; top:70px;">Please enter  your email address to retrieve your account details</font>
            <div id="loginform" style = "top:155px;">
                <form action="reset.php" method="post">
                    <fieldset>
                        <div class="form-groups">
                            <input autocomplete="off" autofocus class="form-control" name="email" placeholder="email address" type="text"/>
                        </div>
                        <div class="form-groups">
                            <button class="btn btn-default" type="submit">
                                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                                Continue
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>