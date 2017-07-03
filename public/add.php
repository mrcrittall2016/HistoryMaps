<?php
    
    // This page renders and controls a view for adding new questions to the SQL database for back-end quiz
    // Note http://www.valokafor.com/build-a-simple-online-quiz-with-php-and-mysql/ is an excellent resource for showing how to
    // connect to a SQL database outside of CS50. 

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // Check that user has administrator privileges
        $rows = CS50::query("SELECT admin FROM `final project`. `users` WHERE id = ?", $_SESSION["id"]);
        
        if ($rows[0]["admin"] != "yes")
        {
            apologize("You do not have the necessary privileges to alter quiz contents", "introduction.php");
        }
        
        // render form
        render("add_questions.php", ["title" => "Quiz Master"]);
    }
    
    
    // if user reached page via POST
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        // validate submission
        if (empty($_POST["location"]))
        {
            apologize("You must provide a valid battle location.", "add.php");
        }
        else if (empty($_POST["question"]))
        {
            apologize("You must provide a valid question.", "add.php");
        }
        
        else if (empty($_POST["correct_answer"]))
        {
             apologize("You must provide a correct answer.", "add.php");
        }
        
        else if (empty($_POST["wrong_answer1"]))
        {
             apologize("You must provide three possible answers.", "add.php");
        }
        
        else if (empty($_POST["wrong_answer2"]))
        {
            apologize("You must provide three possible answers.", "add.php");
        }
        
        
        else if (empty($_POST["wrong_answer3"]))
        {
            apologize("You must provide three possible answers.", "add.php");
        }
        
        
        // If passes validation, then insert question into relevant table in database
        $rows = CS50::query("INSERT INTO `final project`. `{$_POST["location"]}` (questionid, name, choice1, choice2, choice3, answer, explanation) 
        VALUES (NULL, ?, ?, ?, ?, ?, ?)", $_POST["question"], $_POST["wrong_answer1"], $_POST["wrong_answer2"], $_POST["wrong_answer3"], $_POST["correct_answer"], $_POST["explain"]);
        
        if ($rows)
        {
            render("congrat.php", ["link" => "add.php",  "message" => "Your question has been added successfully!"]);
        }
        
        else
        {
            apologize("Your question could not be added to the database - please try again later!", "/");
        }
        
    }
        
?>