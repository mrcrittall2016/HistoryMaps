<!DOCTYPE html>
<html>
    <head>

        <title>History Maps demo</title>

        <meta charset = "utf-8">
        <meta name = "viewport" content = "width=device-width, intial-scale = 1">

        <!--Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!--Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Niconne" rel="stylesheet">

         <!-- cdn link to fontawesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

        <!-- link to own stylesheet -->
        <link rel = "stylesheet" type = "text/css" href = "css/css-main_3.css"/>  

        <!-- Array of objects containing historical content -->
        <script src="/js/battles.js"></script>

        <!-- Javascript for modal -->
        <script src="/js/edit.js"></script>


    </head>
    <body class = "background">
        <div class = "header header-secondary">
            <div class = "container-fluid">                
                <div class = "row">
                    <div class = "col-xs-12"><div class = "dialogue dialogue-secondary well_custom well-primary"><h1>Road to Waterloo</h1></div></div>
                </div>                
            </div>
        </div>         
        <div class = "supporting-1">
            <div class = "container">
                <div class = "row">
                    <!--<div class = "col-xs-12"><div class = "display well_custom well-primary"></div></div>-->
                    <div class = "col-xs-12"><div class = "dialogue well_custom well-primary register_login add_edit"><h2 id = "title">Edit Existing Question<h2>                   
                        <form action="edit.php" method="post">
                            <div class = "form-group">
                                <label for="mySelect">Battle</label>
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
                            </div>
                             <div class = "form-group">
                                <label for="mySelect2">Questions</label>
                                <select id = "mySelect2" name="question" autofocus class="form-control">
                                    <option value="">Please select Question to edit</option>
                                </select>                                
                            </div>
                            <label>Delete Question from Quiz?</label></br>
                            <div id = "radio_wrap">
                                <div class="radio-inline">
                                    <label><input id="input1" type="radio" name="optradio" value="yes">yes</label>
                                </div>
                                <div class="radio-inline">
                                    <label><input id="input2" type="radio" name="optradio" value="no" checked="checked">no</label>
                                </div>
                            </div>
                            <div class = "form-group">
                               <label for="correct answer">Correct answer - edit text below</label>
                                <input autocomplete="off" autofocus class="form-control" id="correct_answer" name="correct_answer" value="" type="text"/>  
                            </div>
                             <div class = "form-group">
                                <label for="correct answer">Choices - edit text below</label>
                                <input autocomplete="off" autofocus class="form-control" id="wrong_answer1" name="wrong_answer1" value="" type="text"/>
                            </div>
                            <div class = "form-group">
                                <label class="sr-only" for="wrong_answer2">Wrong Answers 2</label>
                                <input autocomplete="off" autofocus class="form-control" id="wrong_answer2" name="wrong_answer2" value="" type="text"/>
                            </div>
                            <div class = "form-group">
                                <label class="sr-only" for="wrong_answer3">Wrong Answers 3</label>
                                <input autocomplete="off" autofocus class="form-control" id="wrong_answer3" name="wrong_answer3" value="" type="text"/>
                            </div>   
                            <div class = "form-group">
                                <label class="explain" for="explain">Explain - edit text below</label>
                                <input autocomplete="off" autofocus class="form-control" id="explain" name="explain" value="" type="text"/>  
                            </div>                               
                            <div class = "form-group">
                                <button type = "submit" class = "btn_block">Submit</button>
                            </div>                                                      
                        </form>                        
                        <p><a href = "add.php">Back</a></p>                       
                    </div></div>
                </div>
            </div>
        </div>        
        <div class = "footer"><a href = "www.drcrittall.com"><p>COPYRIGHT MATTHEW R CRITTALL</p></a></div>
        <div class="modal fade modal-customise" id="myModal" role="dialog">
            <div class="modal-dialog">                      
                <!-- Modal content -->
                <div class="modal-content well_custom well-primary">
                    <div class="modal-header">                        
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="close" data-dismiss="modal">Close</button>
                    </div>
                </div>                                    
            </div>
        </div>
    </body>
</html>