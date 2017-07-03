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
            <img id="flag" src="http://downloadwallpaperhd.com/wp-content/uploads/2013/02/Dirty-French-Flag.jpg">
        </div>
        <form action="quiz.php" method="post">
            <fieldset>
                <h3 class="battle"> <?php echo $question["Question"] ?></h3>
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
                    <button class="btn btn-default" type="submit" name="submit" value="French">
                        <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                        Answer
                    </button>
                </div>
            </fielset>
        </form>
    </body>
