<!DOCTYPE html>
<!-- rendered from quiz.php if all questions answered -->
<html class="quiz">

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>
        
        <title>Victory</title>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>
        
        <!-- Array of objects containing historical content -->
        <script src="/js/battles.js"></script>
        
        <script type="text/javascript"> var title = '<?php echo $title; ?>'; </script>
        <script src="/js/victory.js"></script>
        
    </head>
    
    <body class="question">
    
        <?php
            
             if ($British_score > $French_score)
             {
                 $message = "British Victory!";
                 $image = "img/BVictory/BVictory.jpg"; 
                 $result = "Congratulations, Victory is yours!";
             }
             
             
             else if ($French_score > $British_score)
             {
                 $message = "French Victory!";
                 $image = "img/FVictory/FVictory1.jpg";
                 $result = "The French have won this round...better luck next time!";
             }
             
        ?>    
        
        <div id ="titleframe">                               
            <img id ="titlepaper" src="img/pages/paper.jpg">
            <font id="titlehead" style="left:60px;"><?php echo $message ?></font>
        </div>
        
        
        <div class="battle">
            <img id="flag" src=<?php echo $image ?>>
        </div>
        
        <div id ="frame">
            <img id = "paper" src = "img/pages/paper.jpg">
            <div id = "outer">
                <font id="title"><?php echo $result ?></font>
                <a href = "" id="href" style="top:100px; left:185px;"value="correct"><font id="options">Click here to learn about what really happened...</font></a>
            </div>
            <div id = "inner">
                <font id ="title"></font>
                <div class="scrollbar" id="aftermath">
                    <div class="content"></div>
                </div> 
                <a href = "scenario.php" id = "questions" style="top:240px;"><font id="options">Return to Map</font></a>
            </div>
        </div>
    </body>
</html>


