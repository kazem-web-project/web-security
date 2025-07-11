<?php
// Suppress warnings and notices, but still show fatal errors
error_reporting(E_ERROR);
ini_set('display_errors', 0); // Don't show them in browser

require_once('./inc/component.php');
require_once('./inc/database.php');


// create instance of database
$database = new HotelDatabase();
$page = $_GET['page'];  // e.g. ?page=about.php
include($page);
?>
