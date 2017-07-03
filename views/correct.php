<!DOCTYPE html>

<html class="quiz">

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>
        
        <title>battle window</title>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>
        
        <!-- Javascript to enable href to be submitted as POST rather than GET -->
        <script src = "/js/post.js"></script>
        
    </head>
    
    <body class = "question">
        
        <?php 
            
            // Set identifier for this page so recognised when go back to quiz.php
            $_SESSION["value"] = "correct";
            // Keep track of number of questions answered
            $_SESSION["answered"]++; 
            
            require_once("../includes/titles.php");
            
            $randomImage = "img/" . $dir . "/" . $dir . ".jpg"; 
           
        ?>
        
        <div id ="titleframe">                               
            <img id ="titlepaper" src="img/pages/paper.jpg">
            <font id="titlehead" style="left:60px;"><?php echo $title ?></font>
        </div>
        
        <div class="battle">
            <img id="flag" src="<?php echo $randomImage ?>">
        </div>
        
        <div id ="frame">
            <img id = "paper" src = "img/pages/paper.jpg">
            <font id="title">Correct!</font>
            <font id="title" style = "font-size:20px; top:100px;"><?php echo $_SESSION["explain"]; ?></font>
            <a href = "quiz.php" id="questions"><font id="options" style="left:10px; top:75px;">Please click for next question</font></a>
        </div>
    </body>
</html>
