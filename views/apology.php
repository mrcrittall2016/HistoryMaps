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
            <font id="login" style="left:145px;">Sorry!</font>
            <font id="title" style = "font-size:20px; width:600px; left:100px; top: 115px;"><?= htmlspecialchars($message) ?></font>
            <a href = "<?php echo $link ?>" id="href" style="left:303px; top:150px" value="correct"><font id="options">Click to return</font></a>
        </div>
    </body>
</html>

