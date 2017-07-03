<?php
// Enables html for info window to be loaded into maps.php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("info.php", ["title" => "Battle_name"]);
    }
    
?>