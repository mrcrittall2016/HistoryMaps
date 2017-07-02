<!DOCTYPE html>
<!--html for info window-->

<html>

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
    
        <!-- custom stylesheet -->
        <link rel = "stylesheet" type = "text/css" href = "css/css-main_3.css"/> 
        
        <title>battle window</title>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

    </head>
    
    <body>

        <div id ="infowindow">
            <img id = "paper" src = "img/pages/paper.jpg">
            <div class = "container">
                <h2>This is a title</h2>
                <p>Preamble</p>
                <a href = "quiz.php">Click to play scenario</a>
            </div>
            <!--
            <font id="title" style="left:40px;">This is a title</font>
            <div id = "questions" style = "left:45px; top:100px; font-size:18px; width:490px;"><font id = "options" style:"text-align:left;">Preamble</font></div>
            <a href = "quiz.php" id="questions" class = "link"><font id="options" style="top:200px; left:-75px" class = "scenario">Click to play scenario</font></a>
            -->
        </div>
        
    </body>
</html>