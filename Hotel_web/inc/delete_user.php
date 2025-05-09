<?php
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
    