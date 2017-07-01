<?php
    
    // This controller is used to set the initial map options when the user arrives at the map screen - ie based on their
    // progress through the campaign/quiz
    
    require("includes/config.php");
    
    // Query SQL database to get battle index and scores. 
    // The latest battle index should always be the highest number for that particular username in the table.
    
    // Get username 
    $username = get_user(); 
    
    // Now obtain rows relevant only to that username and order by battle index
    $battle_index = battle_index($username);
    $id = $battle_index + 1; 
    
    // Now need to obtain and send back coordinates of place battle index corresponds to
    $rows = Database::query("SELECT * FROM `history_maps`. `battles` WHERE id = ?", $id);
    $latitude = $rows[0]["latitude"];
    $longitude = $rows[0]["longitude"];
    $battle = $rows[0]["place_name"];
    
    $values = ["Battle" => $battle, "battle_index" => $battle_index, "latitude" => $latitude, "longitude" => $longitude];
    
    // Escape dodgy characters such as in Rolica and Fuentes de Orno
    $values = utf8_encode_recursive ($values);
    
    header("Content-type: application/json");
    print(json_encode($values, JSON_PRETTY_PRINT));

?>