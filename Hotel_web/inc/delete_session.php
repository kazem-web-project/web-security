<?php
    // Suppress warnings and notices, but still show fatal errors
    error_reporting(E_ERROR);
    ini_set('display_errors', 0); // Don't show them in browser
    $rooms_url = "../rooms.php";
    session_start();
    unset($_COOKIE['is_admin']);
    session_destroy();
    header('Location: '.$rooms_url);
