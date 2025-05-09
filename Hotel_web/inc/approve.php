<?php
// TODO: CHANGE THE URL!
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
