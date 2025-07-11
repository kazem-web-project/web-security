<?php
// Suppress warnings and notices, but still show fatal errors
error_reporting(E_ERROR);
ini_set('display_errors', 0); // Don't show them in browser

require_once('./inc/component.php');
require_once('./inc/database.php');
session_start();


// create instance of database
$database = new HotelDatabase();
if (isset($_GET["username"]) &&  !empty($_GET["username"])) {
  $database = new HotelDatabase();
  $user_input =  $_GET['username'];
  $sql = "SELECT * FROM users WHERE username = '$user_input'";
  $result = $database->exec_query($sql);

if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
        $_SESSION["username"] = $row['username'];
        $_SESSION["first_name"] = $row['first_name'];
        $_SESSION["last_name"] = $row['last_name'];;
        $_SESSION["email"] = $row['email'];
        $_SESSION["gender"] = $row['gender'];
        $_SESSION["password"] =   $row['password'];
        $_SESSION["title"] = $row['title'];
        // $_SESSION["is_admin"] = $row['is_admin'];
        setcookie("is_admin", $row['is_admin'], time() + (86400 * 30), "/");
        $_SESSION["is_active"] = $row['is_active'];
      
      } else {
    echo "User not found.";
}
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

    <!-- Navbar Code -->
    <?php
    require __DIR__ . '/inc/navigation.php';
    echo insert_nav();
    ?>
    <!-- end of nav bar Code -->

    <!-- this is the content part! it renders from component.php-->
    <div id="my-news">
        <div class="container">
            <div class="row text-center py-5">
                <div class="">

                    <div class="card shadow my-news-cards">
                        <?php

                        $result = $database->get_news();

                        //echo $result;
                        if ($result != null) {

                            while ($row = mysqli_fetch_assoc($result)) {
                                // (news_id, image, title, text, date)
                                // function news_component($news_id,$news_image,$news_title,$news_text,$news_date)

                                if (isset($_COOKIE['is_admin'])) {
                                    if ($_COOKIE['is_admin'] == "1") {
                                        // load admin components;
                                        news_component_admin($row['news_id'], $row['image'], $row['title'], $row['text'], $row['date']);
                                    } else if ($_COOKIE['is_admin'] == "0") {
                                        news_component($row['news_id'], $row['image'], $row['title'], $row['text'], $row['date']);
                                    }
                                } else {
                                    news_component($row['news_id'], $row['image'], $row['title'], $row['text'], $row['date']);
                                }
                            }
                            if (isset($_COOKIE['is_admin'])) {
                                if ($_COOKIE['is_admin'] == "1") {
                                    insert_upload_form();
                                }
                            }
                        } else {
                            echo "Nothing to Show!";
                        }
                        ?>

                    </div>


                </div>
            </div>


        </div>

        <!-- until here -->

    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>