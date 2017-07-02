<?php
    
    // Retrieves all battle locations from SQL database
    
    require("includes/config.php");
    
    $rows = Database::query("SELECT * FROM `history_maps`.`battles` ORDER BY id");
    
    // Required to prevent json_encode from failing when encounters non-UTF-8 characters such as ç Roliça and ñ in Fuentes de Oñoro
    $rows = utf8_encode_recursive ($rows);
    
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($rows, JSON_PRETTY_PRINT));
    
?>