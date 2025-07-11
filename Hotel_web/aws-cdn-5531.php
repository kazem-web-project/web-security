<?php
// Suppress warnings and notices, but still show fatal errors
error_reporting(E_ERROR);
ini_set('display_errors', 0); // Don't show them in browser

require_once('./inc/database.php');
require_once('./inc/session_setter.php');

session_start();
// error_reporting(E_ALL ^ E_NOTICE);

$rooms_url = "rooms.php";
// TODO : change this to orwerview users:
$users_url_for_admin = "rooms.php";
$servername = "db";
$dbusername = "hotel";
$dbpassword = "password";
$dbname = "hotel";
if (isset($_POST["firstname"]) && isset($_POST["surname"]) && !empty($_POST["firstname"]) && !empty($_POST["surname"])) {
    //echo "hello";
  // create instance of database
  $database = new HotelDatabase();
  
  $username = $_SESSION["username"];
  $first_name =  $_POST["firstname"];
  $sur_name =  $_POST["surname"];
  $sql = "UPDATE users SET first_name = '$first_name', last_name = '$sur_name' WHERE username = '$username'";

  
  $result_update = $database->exec_query($sql);
  $sql_retrieve = "SELECT * FROM users WHERE username = '$username'";  
  $result = $database->exec_query($sql_retrieve); 

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();  
    $_SESSION["first_name"] = $row['first_name'];
    $_SESSION["last_name"] = $row['last_name'];;      
  }
}
header('Location: ' . "daniela_loves_you.php");

?>
<script>//window.close();</script>
