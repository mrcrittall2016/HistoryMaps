<?php
    
    // Attempt to learn and use MediaWikiAPI

    require(__DIR__ . "/../includes/config.php");
    
    if (empty($_GET["geo"]))
    {
        echo "geo not filled"; 
        http_response_code(400);
        exit;
    }

    // Lookup place and county associated with post_code from SQL
    
    $rows = CS50::query("SELECT * FROM `final project`. `places` WHERE postal_code = ?", $_GET["geo"]); 
     
    //print_r ($rows); 
    
    // Now pick out place name and county
    
    foreach($rows as $row)
    {
        $place = $row["place_name"];
        $county = $row["admin_name1"];
    }
    
    // return associative array from helpers.php 
    $text = wiki($place, $county, $_GET["geo"]);
    
    //print_r ($text); 
    
    header("Content-type: application/json");
    print(json_encode($text, JSON_PRETTY_PRINT));
    
?>