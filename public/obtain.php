<?php
    
    // Retrieves all questions associated with a particular place from SQL database. Called from edit_questions.js in order to populate dropdown menu in form
    
    require(__DIR__ . "/../includes/config.php");
    
    // ensure proper usage
    if (empty($_GET["battle"]))
    {
        http_response_code(400);
        exit;
    }
    
    $rows = CS50::query("SELECT * FROM `final project`. `{$_GET["battle"]}`");
    
    // Check that SQL table is not empty. If it is...
    if (!$rows)
    {
        $rows [] = ["Question" => "none"];
        header("Content-type: application/json");
        print(json_encode($rows, JSON_PRETTY_PRINT));
    }
    
    // if table is not empty get questions
    else
    {
        $question_number = 0; 
        
        foreach($rows as $row)
        {
            $questions [] = ["Number" => $question_number,"Question" => $row["name"], "Answer" => $row["answer"], 
            "Choices" => [$row["choice1"], $row["choice2"], $row["choice3"]], "Explain" => $row["explanation"]];
             $question_number++; 
        }
        
        // Required to prevent json_encode from failing when encounters non-UTF-8 characters such as ç Roliça and ñ in Fuentes de Oñoro
        $questions = utf8_encode_recursive ($questions);
        
        // output places as JSON (pretty-printed for debugging convenience)
        header("Content-type: application/json");
        print(json_encode($questions, JSON_PRETTY_PRINT));
    
    }
        
?>