<?php

    require(__DIR__ . "/../includes/config.php");
    
    // ensure proper usage
    if (empty($_GET["geo"]))
    {
        echo "geo not filled"; 
        http_response_code(400);
        exit;
    }
    
    // get geography's articles
    $articles = lookup($_GET["geo"]);
    
    //print_r ($articles); 

    // output articles as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($articles, JSON_PRETTY_PRINT));

?>