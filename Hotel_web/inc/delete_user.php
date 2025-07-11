<?php
    // Suppress warnings and notices, but still show fatal errors
    error_reporting(E_ERROR);
    ini_set('display_errors', 0); // Don't show them in browser
    $users_url = "../users.php";
    require_once('database.php');
    
    session_start();
    // create instance of database
    $database = new HotelDatabase(); 
    
    if(isset($_GET["username"])){
        var_dump($_GET);
        var_dump($_SESSION);
        $database->del_user($_GET["username"],$_SESSION["target_user_password"]);
    }
    header('Location: ' . $users_url);
    