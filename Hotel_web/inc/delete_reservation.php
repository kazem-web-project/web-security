<?php
// Suppress warnings and notices, but still show fatal errors
error_reporting(E_ERROR);
ini_set('display_errors', 0); // Don't show them in browser

$reserve_url = "../reserve_user.php";
if (isset($_GET["reserved_on"],) && !empty($_GET["reserved_on"])) {
    require_once('database.php');

    session_start();
    // create instance of database
    $database = new HotelDatabase();
    if ($_SESSION["username"] == $_GET["username"]) {
        $database->delete_reservation($_GET["username"], $_GET["reserved_on"]);
    }
}
header('Location: ' . $reserve_url);
