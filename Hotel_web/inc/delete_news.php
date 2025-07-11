<?php
// Suppress warnings and notices, but still show fatal errors
error_reporting(E_ERROR);
ini_set('display_errors', 0); // Don't show them in browser

$news_url = "../news_page.php";
require_once('database.php');

session_start();
// create instance of database
$database = new HotelDatabase();

if (isset($_GET["news_id"])) {
    $database->delete_news($_GET["news_id"]);
}
header('Location: ' . $news_url);
