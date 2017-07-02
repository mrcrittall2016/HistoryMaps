<?php

    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
    require("includes/helpers.php");

    // CS50 Library
    require("../connect.php");
    Database::init(__DIR__ . "/../history_config.json");

    // enable sessions
    session_start();

    // require authentication for all pages except /login.php, /logout.php, and /register.php (added reset.php and reset2.php by MRC)
    if (!in_array($_SERVER["PHP_SELF"], ["index.php", "/login.php", "/logout.php", "/register.php", "/reset.php", "/reset2.php"]))
    {
        /*
        if (empty($_SESSION["id"]))
        {
            redirect("login.php");
        }
        */
    }

?>
