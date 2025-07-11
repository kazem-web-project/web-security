<?php
// Suppress warnings and notices, but still show fatal errors
error_reporting(E_ERROR);
ini_set('display_errors', 0); // Don't show them in browser

require_once('./inc/component.php');
require_once('./inc/database.php');
session_start();
//var_dump($_SESSION);
//print($_SESSION["username"]);
echo $_SESSION['username'] . $_SESSION['password'];    

if (!isset($_SESSION["username"])) {
    // loged as a guest!
    //session_unset();
    //$_SESSION["username"] = "Guest";
}
// echo $_SESSION["username"];
// create instance of database
$database = new HotelDatabase();
if (isset($_POST['room_id']) && isset($_POST['room_price'])) {
    $room_id_input = $_POST['room_id'];
    $room_price = $_POST['room_price'];

    $url = "reserve_room.php?room_id=" . $room_id_input . "&room_price=" . $room_price;
    header('Location: ' . $url);
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Font Awesomw -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" crossorigin="anonymous">
    <!-- my css -->
    <link rel="stylesheet" href="./res/css/style.css">
    <title>Nirvana Hotel</title>
</head>

<body>
    <!-- <h1>Welcome to Nirvana Hotel</h1>-->

    <!-- Navbar Code -->
    <?php
    require __DIR__ . '/inc/navigation.php';
    echo insert_nav();
    ?>


    <!-- end of nav bar Code -->

    <!-- this is the content part! it renders from component.php-->

    <div class="container">
        <div class="row text-center py-5">
            <?php

            $result = $database->getRoomData();

            //echo $result;
            while ($row = mysqli_fetch_assoc($result)) {
                component($row['room_id'], $row['price'], $row['img']);
            }
            ?>

        </div>


    </div>

    <!-- until here -->



    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>