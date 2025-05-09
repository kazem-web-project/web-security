<?php


$searched_item = str_replace(' ', '+', $_GET["searched_item"]);
$url = "https://www.google.com/maps/search/" . $searched_item . "+in+der+N%C3%A4he+von+Schwedenplatz,+Wien";
header('Location: ' . $url);
//echo $searched_item;