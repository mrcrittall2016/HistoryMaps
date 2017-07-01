<?php
    
    // This page renders and controls a view for editing existing questions in the SQL database for back-end quiz
    // Note http://www.valokafor.com/build-a-simple-online-quiz-with-php-and-mysql/ is an excellent resource for showing how to
    // connect to a SQL database outside of CS50. 

    // configuration
    require("includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("edit_questions.php", ["title" => "Quiz Master"]);
    }
    
    
    // if user reached page via POST
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        /* validate submission
        if (empty($_POST["location"]))
        {
            apologize("You must provide a valid battle location.", "edit.php");
        }
        else if (empty($_POST["question"]))
        {
            apologize("You must provide a valid question.", "edit.php");
        }
        
        else if (empty($_POST["correct_answer"]))
        {
             apologize("You must provide a correct answer.", "edit.php");
        }
        
        else if (empty($_POST["wrong_answer1"]))
        {
             apologize("You must provide three possible answers.", "edit.php");
        }
        
        else if (empty($_POST["wrong_answer2"]))
        {
            apologize("You must provide three possible answers.", "edit.php");
        }
        
        
        else if (empty($_POST["wrong_answer3"]))
        {
            apologize("You must provide three possible answers.", "edit.php");
        }
        */ 
        // if delete question radio button is not highlighted then just update...
        
        if ($_POST["optradio"] == "no")
        {
            
            $rows = Database::query("UPDATE `history_maps`. `{$_POST["location"]}` SET name = ?, choice1 = ?, choice2 = ?, choice3 = ?,
            answer = ?, explanation = ? WHERE name = ?", $_POST["question"], $_POST["wrong_answer1"], $_POST["wrong_answer2"], $_POST["wrong_answer3"],
            $_POST["correct_answer"], $_POST["explain"],  $_POST["question"]);
            
            if ($rows)
            {
                render("congrat.php", ["link" => "edit.php", "message" => "Your question has been updated successfully!"]);
            }
            
            else
            {
                apologize("Your question could not be updated - please try again later!", "edit.php");
            }
            
        }
        
        // else if is highlighted, remove question and associated columns from database altogether. 
        else if ($_POST["optradio"] == "yes")
        {
            
            $rows = Database::query("DELETE FROM `history_maps`. `{$_POST["location"]}` WHERE name = ?", $_POST["question"]);
             
            if ($rows)
            {
                render("congrat.php", ["link" => "add.php", "message" => "Your question has been deleted successfully!"]);
            }
            
            else
            {
                apologize("Your question could not be deleted - please try again later!", "edit.php");
            }
        
        }
        
    }
        
?>