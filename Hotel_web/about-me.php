<?php
require_once('./inc/component.php');
require_once('./inc/database.php');


// create instance of database
$database = new HotelDatabase();
$page = $_GET['page'];  // e.g. ?page=about.php
include($page);
?>
