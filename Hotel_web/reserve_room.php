<?php
require('./inc/database.php');
error_reporting(E_ALL ^ E_NOTICE);

session_start();
if (!isset($_SESSION) || empty($_SESSION)) {
    header("Location: index.php");
    exit();
}
$room_id_input = $_GET['room_id'];

$animal_price = 0;
$breakfast_price = 0;
$pet_price = 0;


if (isset($_POST['from_date']) && isset($_POST['to_date'])) {
    $user_name = $_SESSION["username"];

    $database = new HotelDatabase();
    if (!isset($_POST['breakfast_check'])) {
        $_POST['breakfast_check'] = 0;
    }
    if (!isset($_POST['parking_check'])) {
        $_POST['parking_check'] = 0;
    }
    if (!isset($_POST['pet_checkbox'])) {
        $_POST['pet_checkbox'] = 0;
    }
    //  (username, room_id, from_date, to_date, price,has_animal,has_parking,has_breakfast, reserved_on)
    $now = date('Y-m-d H:i:s');
    $datediff = strtotime($_POST['to_date']) - strtotime($_POST['from_date']);
    $stay_days = round($datediff / (60 * 60 * 24));
    // echo "my differnce". $stay_days ;
    ($_POST['parking_check'] == "1") ? $parking_price = ($stay_days * 5) : $parking_price = 0;
    ($_POST['breakfast_check'] == "1") ? $breakfast_price = ($stay_days * 7) : $breakfast_price = (0);
    ($_POST['pet_checkbox'] == "1") ? $pet_price = 10 : $pet_price = 0;
    // echo $pet_price;
    $room_price_input = $_COOKIE['price'];
    $room_price = ($stay_days * $room_price_input);
    echo $room_price . "roooooooooooooom";
    $end_price = $room_price + $parking_price + $breakfast_price + $pet_price;

    echo " " . $end_price . "  " . $room_price . "  " . $parking_price . "  " . $breakfast_price . "  " . $pet_price;
    // insert_reserve($username_insert, $room_id_insert,$from_date_insert,$to_date_insert, $price_insert, $has_animal_insert, $has_parking_insert,$has_breakfast_insert, $reserved_on_insert)
    $date1 = new DateTime($_POST['from_date']);
    $date2 = new DateTime($_POST['to_date']);

    if ($date2 > $date1 && ($database->room_is_free($_GET['room_id'], $_POST['from_date'], $_POST['to_date']))) {
        $database->insert_reserve(
            $user_name,
            $_GET['room_id'],
            $_POST['from_date'],
            $_POST['to_date'],
            $end_price,
            $_POST['pet_checkbox'],
            $_POST['parking_check'],
            $_POST['breakfast_check'],
            $now,
            0
        );
        header("Location: reserve_user.php");
    } else {
        //header("Location: rooms.php");
        echo ("<h2><b>The room is not available in this period of time!<br>Please choose other dates or start date should be before end date</b></h2>");
        exit();
    }

    //echo $_POST['from_date']. "  " . $_POST['to_date']. "  " . $_POST['parking_check']. "  " . $_POST['breakfast_check']. "  " . $_POST['pet_checkbox'];
    echo (($_POST['from_date']) > ($_POST['to_date'])) . " dates";
    echo $_POST['from_date'] . " dates";
    echo $_POST['to_date'] . " dates";
    $date1 = new DateTime($_POST['from_date']);
    $date2 = new DateTime($_POST['to_date']);
}



//echo $_GET[];
if ((!isset($_GET['room_id']) && !isset($_GET['room_price'])) &&
    !(isset($_POST)) && !empty($_POST)
) {
    // $url = http://localhost/startpage3/reserve_room.php?room_id=10&price=20     
    //$new_url = '?room_id='. $_GET['room_id'] . '&price='.$_GET['room_price'] ;
    // echo '<script>location.href = ' . $_SERVER['REQUEST_URI']. ';</script>';

    header("Location: rooms.php");
    //header("Location: reserve_room.php");
    //exit();
}else{
    $room_price_input = $_GET['price'];

// Set the cookie to expire in 1 day
    setcookie('price', $room_price_input, time() + 86400, "/");

}


// $url = "page2.php?username=" . $username;


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

<body class="font-blue">
    <!-- Navbar Code -->
    <?php
    require __DIR__ . '/inc/navigation.php';
    echo insert_nav();
    ?>
    <div class="container">
        <div class="row text-center py-5">

            <!--image at the top-->
            <img src=<?php echo "res\img\\room" . $room_id_input . ".jpg"; ?> class="img-fluid" alt="...">
            <!--end of image -->
            <h1 class="h1">Die zeitgemäße Interpretation des Salzburger Stils</h1>
            <p class="text-justify room_description">
                Nach einem umfassenden Redesign im Jahr 2017 präsentieren sich die Zimmer im Hotel Amadeus in neuer
                Atmosphäre: luftig, modern, hell. Die historische Gebäudestruktur macht jedes Zimmer zu einem Unikat.
                Hier gibt es keine Standardlösungen. Hier gibt es viel Liebe zum Detail. Und das klare Bekenntnis zur
                Individualität. Mal ein Himmelbett, dann wieder ein hochwertiges Boxspringbett. Hier eine natürlich raue
                Holzdecke, dort ein exquisites Lederfauteuil. Farbliche Akzente geben den Ton an. Ausgesuchte
                Designstücke unterstreichen gekonnt den Salzburger Stil. Mit viel Fein- und Stilgefühl entstehen Räume
                voll wohnlicher Behaglichkeit. Genießen Sie eine heimelige Ruhe trotz zentraler Lage dieses Hotels in
                der Salzburger Innenstadt.</p>

            <!-- form -->
            <!-- count of people-->
            <form action="#" method="post" onsubmit="openExtraTab()">
                <div class="form-floating form-control myselect my-text font-blue">

                    <label for="floatingSelect">Number of People:</label>
                    <select class="form-select my-reserve" id="floatingSelect" aria-label="Floating label select example">
                        <option selected>Please Select</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="3">More Than Three People</option>
                    </select>

                    <!-- end of count of people-->

                    <!-- date picker -->
                    <div class="mb-3 datepickers">
                        <div class="d-flex justify-content-around">
                            <label for="start" id="datePickerStart" class="col-sm-2 col-form-label datePicker">Start
                                date:</label>
                            <input class="my-reserve" name="from_date" type="date" name="trip-start" min="2022-10-01" max="2028-12-31" required>

                            <label for="start" id="datePickerEnd" class="col-sm-2 col-form-label datePicker">End
                                date:</label>
                            <input class="my-reserve" name="to_date" type="date" name="trip-start" min="2022-10-01" max="2028-12-31" required>
                        </div>
                    </div>
                    <!--end date picker -->

                    <!-- chcek boxes-->
                    <div class="form-check mycheck">
                        <input name="parking_check" class="form-check-input my-check" type="checkbox" value="1">
                        <label class="form-check-label" for="flexCheckDefault">
                            I need a Parking lot.
                        </label>
                    </div>
                    <div class="form-check mycheck">
                        <input name="breakfast_check" class="form-check-input my-check" type="checkbox" value="1">
                        <label class="form-check-label" for="flexCheckChecked">
                            I would like to have Breakfast.
                        </label>
                    </div>
                    <div class="form-check mycheck">
                        <input name="pet_checkbox" class="form-check-input my-check" type="checkbox" value="1">
                        <label class="form-check-label" for="flexCheckChecked">
                            I own a pet.
                        </label>
                    </div>
                    <!-- end of check boxes-->
                    <!-- price and room number-->
                    <div class="border border-light">
                        <div>Room Number: <?php echo  $room_id_input ?></div>
                        <div>Price per night: €<?php 
                            // Broken Access Control: Example
                            //Storing Information in Cookies

                            if (isset($_COOKIE['price'])) {
                                $room_price_input = $_COOKIE['price'];
                                echo $room_price_input; 
                            } else {
                                $price = 'not set'; // fallback value
                                echo $room_price_input;
                            }
                            
                            //echo $room_price_input 
                            ?>
                        </div>
                    </div>
                    <!-- buttons-->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn my-3" type="submit">Reserve!</button>
                    </div>
                </div>

                <!-- end of form -->
            </form>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="reserve_room.js"></script>
</body>

</html>