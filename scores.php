<?php
    
    // Retrieves scores for that particular location
    //echo "testing"; 
    
    require("includes/config.php");
    
    // ensure proper usage
    if (empty($_GET["battle"]))
    {
        http_response_code(400);
        exit;
    }
    
    // Create new SQL table with scores relevant only to that username
    $username = get_user(); 
    $rows = Database::query("SELECT * FROM `history_maps`. `scores` WHERE username = ? AND Battle = ?", $username, $_GET["battle"]);
    
    $british = $rows[0]["British"];
    $french = $rows[0]["French"];
    
    $values = ["Battle" => $_GET["battle"], "British" => $british, "French" => $french];
    
     
    
    header("Content-type: application/json");
    print(json_encode($values, JSON_PRETTY_PRINT));

?>