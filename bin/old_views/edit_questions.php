<!DOCTYPE html>

<!-- This page makes use of embedded Javascript (as opposed to PHP) to add elements to form selectors. See: http://www.w3schools.com/jsref/met_select_add.asp -->
<!-- Fairly involved Javascript enables the user to edit existing questions in the quiz and choose which questions to edit or delete altogether-->   

<html>
    <head>
    
        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <!-- app's own CSS -->
        <link href="/css/styles.css" rel="stylesheet"/>
        
          <!-- http://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>
        
        <!--script file containing an array of objects for each place and Battle description -->
        <script src = "/js/battles.js"></script>
        
        <!-- script to detect when user has clicked on and changed and option from dropdown menu. As such, the remaining fields are auto-filled. See 
        http://stackoverflow.com/questions/17155146/how-to-detect-when-a-user-clicks-on-an-option-in-a-drop-down-menu-select-tag
        (Misters -1) and http://stackoverflow.com/questions/1085801/get-selected-value-in-dropdown-list-using-javascript -->
        <script src = "/js/edit_questions.js"></script>
        
        <title><?= htmlspecialchars($title) ?></title>

    </head>
    
    <body id = "titlepage">
        
        <div id ="titleframe">                               
            <img id ="titlepaper" src="img/pages/paper.jpg">
            <font id="titlehead" style ="left:100px; width:600px;">Road to Waterloo</font>
        </div>
        
        <div id ="quizframe"> 
            <img id = "loginpaper" style="height:628px; top:5px;" src = "img/pages/paper.jpg">
            <font id="login" style="top:90px;">Edit Existing Question</font>
            <form action="edit.php" method="post">
                <fieldset>
                    <div class = "form-groups, additive2">
                        <label for="Question_Location">Battle</label>
                            <select id = "mySelect" name="location" autofocus class="form-control">
                                <option value="">Please select Battle Location</option>
                                
                                <script>
                                
                                    var option = document.getElementById("mySelect");
                                    
                                    for (var i in scenarios){
                                        
                                        var addition = document.createElement("option");
                                        addition.value = scenarios[i].title; 
                                        addition.text = scenarios[i].title;
                                        option.add(addition);
                                        
                                    }
                                    
                                </script>
                                
                            </select>
                        </label>
                    </div>
                    <div class = "form-groups, additive2">
                        <label for="Questions">Questions</label>
                            <select id = "mySelect2" name="question" autofocus class="form-control">
                                <option value="">Please select Question to edit</option>
                            </select>
                        </label>
                    </div>
                    <label style ="position:absolute; z-index: 10; top:290px; left:315px;">Delete Question from Quiz?</label>
                    <div class="radio-inline" style="top:145px; left:-20px;">
                        <label><input id="input1" type="radio" name="optradio" value="yes"><font id="options" style="left:20px;" >yes</font></label>
                    </div>
                    <div class="radio-inline" style="top:145px;">
                        <label><input id="input2" type="radio" name="optradio" value="no" checked="checked"><font id="options"style="left:15px;">no</font></label>
                    </div>
                    <div class="form-groups, additive2" style = "top:145px;">
                        <label for="correct answer">Correct answer - edit text below</label>
                        <input autocomplete="off" autofocus class="form-control" id="correct_answer" name="correct_answer" value="" type="text"/>
                    </div>
                    <div class="form-groups, additive2">
                        <label for="correct answer">Choices - edit text below</label>
                        <input autocomplete="off" autofocus class="form-control" id="wrong_answer1" name="wrong_answer1" value="" type="text"/>
                       
                    </div>
                    <div class="form-groups, additive2">
                        <label class="sr-only" for="wrong_answer2">Wrong Answers 2</label>
                        <input autocomplete="off" autofocus class="form-control" id="wrong_answer2" name="wrong_answer2" value="" type="text"/>
                    </div>
                    <div class="form-groups, additive2">
                        <label class="sr-only" for="wrong_answer3">Wrong Answers 3</label>
                        <input autocomplete="off" autofocus class="form-control" id="wrong_answer3" name="wrong_answer3" value="" type="text"/>
                    </div>
                     <div class="form-groups, additive2" style = "top:120px;">
                        <label class="explain" for="explain">explain - edit text below</label>
                        <input autocomplete="off" autofocus class="form-control" id="explain" name="explain" value="" type="text"/>
                    </div>
                    <button class="btn btn-default" style = "position:absolute; z-index: 10; top:635px; left:360px;" type="submit">
                        <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                        Submit
                    </button>
                </fieldset>
            </form>
            <a href = "add.php" id="href" style="left:345px; top:675px" value="correct"><font id="options">Back</font></a>
        </div>
    </body>
</html>