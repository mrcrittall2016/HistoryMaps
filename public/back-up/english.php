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

        <script src="/js/scripts.js"></script>

    </head>
    
    <body>
        <div class="battle">
            <img id="flag" src="http://images2.fanpop.com/image/photos/13500000/Great-Britain-Flag-great-britain-13511748-1920-1200.jpg">
        </div>
        
        <div id="picture">
            <img id ="frame" src = "img/frame4.jpg">
            <img id = "paper" src = "img/paper.jpg">
            <form action="quiz.php" method="post">
                <fieldset>
                    <font id="title"> <?php echo $question["Question"] ?></font>
                    <font id = "questions">
                        <div class="radio">
                          <label><input type="radio" name="optradio" value="<?php echo $question["Choices"][0] ?>"><?php echo $question["Choices"][0] ?></label>
                        </div>
                        <div class="radio">
                          <label><input type="radio" name="optradio" value="<?php echo $question["Choices"][1] ?>"><?php echo $question["Choices"][1] ?></label>
                        </div>
                        <div class="radio">
                          <label><input type="radio" name="optradio" value="<?php echo $question["Choices"][2] ?>"><?php echo $question["Choices"][2] ?></label>
                        </div>
                        <div class="form-groups">
                            
                            
                            <button id = "button" type="submit" name="submit" value="British">
                                   <img id ="quill" src="/img/quill.jpg" alt="Submit"/>
                            </button>
                            
                            
                            <!--
                            <button class="btn btn-default" type="submit" name="submit" value="British">
                                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                                Submit
                            </button>
                            -->
                            
                        </div>
                    </font>
                </fielset>
            </form>
        </div>
    </body>
</html>