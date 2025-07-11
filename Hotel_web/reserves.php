<?php
// Suppress warnings and notices, but still show fatal errors
error_reporting(E_ERROR);
ini_set('display_errors', 0); // Don't show them in browser

require_once('./inc/component.php');
require_once('./inc/database.php');

session_start();
error_reporting(E_ALL ^ E_NOTICE);

if (isset($_SESSION) && !empty($_SESSION)) {
    if (isset($_COOKIE['is_admin'])) {
        if ($_COOKIE['is_admin'] != "1") {
            // load admin components;
            //var_dump($_SESSION);
            $url = "reserve_user.php";
            header('Location: ' . $url);
            exit();
        }
    }
} else {
    $url = "rooms.php";
    header('Location: ' . $url);
    exit();
}

// create instance of database
$database = new HotelDatabase();


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

    <!-- this is the content part! it renders from component.php
    username | room_id | from_date| to_date| price | has_animal | has_parking | has_breakfast | reserved_on | is_approved
-->
    <div id=my-news>

        <div class="container">
            <div class="row text-center py-5">

                <?php

                $result = $database->getReservesData();
                //username | room_id | from_date| to_date| price | has_animal | has_parking | has_breakfast | reserved_on | is_approved

                //echo $result;

                while ($row = mysqli_fetch_assoc($result)) {



                    $room_id = $row['room_id'];
                    $from_date = $row['from_date'];
                    $to_date = $row['to_date'];
                    $price = $row['price'];
                    $has_animal = $row['has_animal'];
                    $has_parking = $row['has_parking'];
                    $has_breakfast = $row['has_breakfast'];
                    $reserved_on = $row['reserved_on'];
                    $is_approved = $row['is_approved'];
                    $username = $row['username'];
                    reserveComponent($username, $room_id, $from_date, $to_date, $price,  $has_animal, $has_parking, $has_breakfast, $reserved_on, $is_approved);
                    //break;
                }

                ?>

            </div>


        </div>
        <!-- JavaScript Bundle with Popper -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>