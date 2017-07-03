<!DOCTYPE html>
<!--html for info window-->

<html id = "html" class="quiz">

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>
        
        <title>battle window</title>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

    </head>
    
    <body>

        <div id ="infowindow">
            <img id = "paper" style="top:2px; width:484px; height:233px;" src = "img/pages/paper.jpg">
            <font id="title" style="left:40px;">This is a title</font>
            <div id = "questions" style = "left:45px; top:100px; font-size:18px; width:490px;"><font id = "options" style:"text-align:left;">Preamble</font></div>
            <a href = "quiz.php" id="questions" class = "link"><font id="options" style="top:200px; left:-75px" class = "scenario">Click to play scenario</font></a>
        </div>
        
    </body>
</html>