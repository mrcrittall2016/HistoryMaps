<!DOCTYPE html

<html>
<!-- This page makes use of embedded Javascript (as opposed to PHP) to add elements to form selectors. See: http://www.w3schools.com/jsref/met_select_add.asp -->
   
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
        
        <title><?= htmlspecialchars($title) ?></title>

    </head>
    
    <body id = "titlepage">
        
        <div id ="titleframe">                               
            <img id ="titlepaper" src="img/pages/paper.jpg">
            <font id="titlehead" style ="left:100px; width:600px;">Road to Waterloo</font>
        </div>
        
        <div id ="quizframe"> 
            <img id = "loginpaper" style="height:628px; top:5px;" src = "img/pages/paper.jpg">
            <font id="login" style="top:90px;">Add New Question</font>
            <a href = "edit.php" id="href" style="top:130px; left:245px;"value="correct"><font id="options">or click to edit existing question...</font></a>
            <form action="add.php" method="post">
                <fieldset>
                    <div class = "form-groups, additive">
                        <label for="Question_Location">Battle</label>
                            <select id = "mySelect" name="location" autofocus class="form-control">
                                <option value="">Please select Battle for addition of new question</option>
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
                    <div class="form-groups, additive">
                        <label for="question">Question</label>
                        <input autocomplete="off" autofocus class="form-control" id="question" name="question" placeholder="Enter your question here" type="text"/>
                     </div>
                     <div class="form-groups, additive">
                        <label for="correct answer">Correct answer</label>
                        <input autocomplete="off" autofocus class="form-control" id="correct_answer" name="correct_answer" placeholder="Enter the correct answer here" type="text"/>
                     </div>
                     <div class="form-groups, additive">
                        <label for="correct answer">Choices</label>
                        <input autocomplete="off" autofocus class="form-control" id="wrong_answer1" name="wrong_answer1" placeholder="Option1" type="text"/>
                     </div>
                    <div class="form-groups, additive">
                        <label class="sr-only" for="wrong_answer2">Wrong Answers 2</label>
                        <input autocomplete="off" autofocus class="form-control" id="wrong_answer2" name="wrong_answer2" placeholder="Option2" type="text"/>
                    </div>
                    <div class="form-groups, additive">
                        <label class="sr-only" for="wrong_answer3">Wrong Answers 3</label>
                        <input autocomplete="off" autofocus class="form-control" id="wrong_answer3" name="wrong_answer3" placeholder="Option3" type="text"/>
                    </div>
                    <div class="form-groups, additive">
                        <label for="question">Comments</label>
                        <input autocomplete="off" autofocus class="form-control" id="explain" name="explain" placeholder="Please explain the reasoning behind the correct answer" type="text"/>
                     </div>
                    <button class="btn btn-default" style = "position:absolute; z-index: 10; top:650px; left:360px;" type="submit">
                        <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                        Submit
                    </button>
                </fieldset>
            </form>
            <a href = "introduction.php" id="href" style="left:310px; top:684px" value="correct"><font id="options">Click to return</font></a>
        </div>
    </body>
</html>