<?php

    require(__DIR__ . "/../includes/config.php");
    
    /*
    // ensure proper usage
    if (!isset($_GET["sw"], $_GET["ne"]))
    {
        echo "not set"; 
        http_response_code(400);
        exit;
    }
    */
    
    // The initial starting coodinates when the webpage is refreshed
    $_GET["ne"] = "41.321649367735354,-3.243613671874982";
    
    $_GET["sw"] = "38.996235494669826,-14.515586328124982"; 
    
    var_dump($_GET["ne"]);
    
    var_dump($_GET["sw"]);
    
    
    // ensure each parameter is in lat,lng format
    if (!preg_match("/^-?\d+(?:\.\d+)?,-?\d+(?:\.\d+)?$/", $_GET["sw"]) ||
        !preg_match("/^-?\d+(?:\.\d+)?,-?\d+(?:\.\d+)?$/", $_GET["ne"]))
    {
        http_response_code(400);
        exit;
    }

    // explode southwest corner into two variables
    list($sw_lat, $sw_lng) = explode(",", $_GET["sw"]);
    
    
    // explode northeast corner into two variables
    list($ne_lat, $ne_lng) = explode(",", $_GET["ne"]);
    
    
    echo "\n"; 
    
    echo $sw_lat. "\n"; 
    echo $sw_lng. "\n";
    
    echo "\n"; 
    
    echo $ne_lat. "\n";  
    echo $ne_lng. "\n";
    
    
    // find 10 cities within view, pseudorandomly chosen if more within view
    if ($sw_lng <= $ne_lng)
    {
        // doesn't cross the antimeridian
        // Most of the time (all the time for Portugal and Spain) $sw_lng will be $ne_lng
        //$rows = CS50::query("SELECT * FROM `final project`.`battles` WHERE ? <= latitude AND latitude <= ? AND (? <= longitude AND longitude <= ?) GROUP BY place_name ORDER BY RAND() LIMIT 10", $sw_lat, $ne_lat, $sw_lng, $ne_lng);
        echo "Have not crossed the antimeridian"; 
        
        echo "\n"; 
        
        $rows = CS50::query("SELECT * FROM `final project`.`battles` WHERE ? <= latitude AND latitude <= ? AND (? <= longitude AND longitude <= ?)", $sw_lat, $ne_lat, $sw_lng, $ne_lng);
        
        
        foreach($rows as $row)
        {
            echo $row["latitude"];
            echo "\n"; 
            echo $row["longitude"]; 
            echo "\n";
        }
        
    }
    
    else
    {
        // crosses the antimeridian
        //$rows = CS50::query("SELECT * FROM `final project`.`battles` WHERE ? <= latitude AND latitude <= ? AND (? <= longitude OR longitude <= ?) GROUP_BY place_name ORDER BY RAND() LIMIT 10", $sw_lat, $ne_lat, $sw_lng, $ne_lng);
        echo "Crossed the antimeridian";
        $rows = CS50::query("SELECT * FROM `final project`.`battles` WHERE ? <= latitude AND latitude <= ? AND (? <= longitude OR longitude <= ?)", $sw_lat, $ne_lat, $sw_lng, $ne_lng);
        
    }

    
    var_dump($rows); 
    
    // output places as JSON (pretty-printed for debugging convenience)
    //header("Content-type: application/json");
    //print(json_encode($rows, JSON_PRETTY_PRINT));
    
    $rows = utf8_encode_recursive ($rows); 
    
    if (function_exists('json_encode')) 
    {
        echo "json_encode is available";
        
        echo "\n"; 
        
        $json_string = json_encode($rows); 
        
        if ($json_string == FALSE)
        {
            echo "jsnon encode returned false..."; 
        }
    
        if (empty($json_string)) 
        {
            echo '$json_string is either 0, empty, or not set at all';
        }
        
        // From http://php.net/manual/en/function.json-last-error.php 
        switch (json_last_error()) 
        {
            case JSON_ERROR_NONE:
                echo ' - No errors';
            break;
            case JSON_ERROR_DEPTH:
                echo ' - Maximum stack depth exceeded';
            break;
            case JSON_ERROR_STATE_MISMATCH:
                echo ' - Underflow or the modes mismatch';
            break;
            case JSON_ERROR_CTRL_CHAR:
                echo ' - Unexpected control character found';
            break;
            case JSON_ERROR_SYNTAX:
                echo ' - Syntax error, malformed JSON';
            break;
            case JSON_ERROR_UTF8:
                echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
            break;
            default:
                echo ' - Unknown error';
            break;
        }
       
    } 
    
    else 
    {
        echo "json_encode is not available on this server.<br />\n";
    }
    
    //http://stackoverflow.com/questions/20255954/how-to-convert-this-array-into-json-in-php. Related to 
    // "malformed UTF-8 characters, possibly incorrectly encoded" error that receive from above list when try to
    // run json_encode
    
    
?>