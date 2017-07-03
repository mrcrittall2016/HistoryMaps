<?php

    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $places = [];
    
    if (empty($_GET["geo"]))
    {
        http_response_code(400);
        exit;
    }
    
    // Get matches to user's search box input from SQL table
    // Note: MATCH AGAINST only works for FULLTEXT index. Also, FULLTEXT index must be across the columns that specify in MATCH and only 
    // those columns. 
    // Can add other commands: GROUP BY ensures only one instance of that column is selected. LIMIT (x, y) (start row, number of rows) ensures only a certain number of entries are returned in this case 50
    // ORDER BY x DESC can be used to show rows in certain order once grouped together
    
    // This searches for whole string or postal_code across three indexed columns
    //$places = CS50::query("SELECT * FROM places WHERE MATCH(place_name, admin_name1, postal_code) AGAINST (?) GROUP BY admin_name2 LIMIT 0, 50", $_GET["geo"]); 
    
    // This is an improvement on staff version and above SQL which searches for string as type rather than waiting for whole string to be put in first
    $places = CS50::query("SELECT * FROM places WHERE instr(concat_ws(' ', place_name, admin_name1, postal_code), ?)>0 GROUP BY admin_name2 LIMIT 0, 50", $_GET["geo"]);  
    
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>