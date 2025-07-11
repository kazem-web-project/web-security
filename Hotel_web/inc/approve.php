<?php
// TODO: CHANGE THE URL!
// Suppress warnings and notices, but still show fatal errors
error_reporting(E_ERROR);
ini_set('display_errors', 0); // Don't show them in browser

$reservePage = "../reserves.php";
//$reservePage = "../playground.php";
require_once('database.php');

session_start();
// create instance of database
$database = new HotelDatabase();


if (isset($_GET["reserved_on"]) && !empty($_GET["reserved_on"])) {
    var_dump($_GET);
    // $database->delete_news($_GET["news_id"]);

    $database->update_reserve_approve($_GET["username"], $_GET["reserved_on"], $_GET['approve']);
}
header('Location: ' . $reservePage);
