<?php
// Suppress warnings and notices, but still show fatal errors
error_reporting(E_ERROR);
ini_set('display_errors', 0); // Don't show them in browser

$searched_item = str_replace(' ', '+', $_GET["searched_item"]);
$url = "https://www.google.com/maps/search/" . $searched_item . "+in+der+N%C3%A4he+von+Schwedenplatz,+Wien";
header('Location: ' . $url);
//echo $searched_item;