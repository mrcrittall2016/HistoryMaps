<!DOCTYPE html>

<html class="quiz">

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>
        
        <!-- Array of objects containing historical content -->
        <script src="/js/battles.js"></script>
        
        <title>battle window</title>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        
        <!--Javascript to randomly choose which radio button to leave checked once page loads and to choose which view to show in bottom window
            See http://stackoverflow.com/questions/1808108/how-to-access-php-variables-in-javascript-or-jquery-rather-than-php-echo-vari
            for accessing PHP variables from within a javascript tag
        -->
        <!-- Passing PHP variables to external js scripts http://stackoverflow.com/questions/2928827/access-php-var-from-external-javascript-file -->
        <script type="text/javascript">var title = '<?php echo $title; ?>'; var answered = '<?php echo $answered; ?>'; </script>
        <script src="/js/question.js"></script>
        
        <?php require_once("includes/titles.php"); ?>

    </head>
    
    <body class = "question">
        
        
        <div id ="titleframe">
            <img id ="titlepaper" src="img/pages/paper.jpg">
            <font id="titlehead" style="left:60px;"><?php echo $title ?></font>
        </div>
        
        
        <div class="battle">
            <img id="flag" src="img/<?php echo $dir ?>/<?php echo $dir ?>.jpg">
        </div>
        
            
        <div id ="frame">
            <img id = "paper" src = "img/pages/paper.jpg">
            <div id = "outer">
                <font id ="title"></font>
                <div class="scrollbar" id="aftermath">
                    <div class="content"></div>
                </div> 
                <!--<font id="title" style = "font-size:20px; width:600px; left:100px; top: 90px;"></font>-->
                <a href = "" id="href" style="top:233px; left:270px;"value="correct"><font id="options">Click to proceed to quiz...</font></a>
            </div>
            <div id = "inner">
                <form action="quiz.php" method="post">
                    <fieldset>
                        <font id="title"> <?php echo $question["Question"] ?></font>
                        <font id = "questions">
                            <div class="radio">
                              <label><input id="input1" type="radio" name="optradio" value="<?php echo $question["Choices"][0] ?>"> <font id="options"><?php echo $question["Choices"][0] ?></font></label>
                            </div>
                            <div class="radio">
                              <label><input id="input2" type="radio" name="optradio" value="<?php echo $question["Choices"][1] ?>"><font id="options"><?php echo $question["Choices"][1] ?></font></label>
                            </div>
                            <div class="radio">
                              <label><input id="input3" type="radio" name="optradio" value="<?php echo $question["Choices"][2] ?>"><font id="options"><?php echo $question["Choices"][2] ?></font></label>
                            </div>
                            <div class="form-groups">
                                <button id = "button" type="submit" name="submit" value="quiz">
                                       <img id ="quill" src="/img/pages/frame3.jpg" alt="Submit"/>
                                </button>
                            </div>
                        </font>
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>