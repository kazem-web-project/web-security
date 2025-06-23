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
    <?php
    require __DIR__ . '/inc/navigation.php';
    error_reporting(E_ALL ^ E_NOTICE);
    echo insert_nav();
    ?>


    <div id=my-news>

        <div class="container">
            <div class="row text-center py-5">
                <form id="info_form" class="card-body my-card-body" action="#" method="GET">
                    <h4 class="mb-3 text-primary">Check Room Availability</h4>
                    <p>Enter the room ID below to find out if it's available for booking.</p>
                    <label for="info_form">Room Number:</label>
                    <input id="search_room_id" type="text" name="id">
                    <input type="submit" name="Submit" value="Submit">
                </form>
                <?php




                // Database connection parameters
                $dbname = "hotel";
                $servername = "db";
                $username = "hotel";
                $password = "password";

                // Create connection
                $conn = mysqli_connect(
                    $servername,
                    $username,
                    $password,
                    $dbname
                );

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // If form is submitted
                if (isset($_GET['Submit'])) {

                    // Retrieve and sanitize data
                    // $id = $conn->real_escape_string($_GET['id']);
                    $id = $_GET['id']; // no real_escape_string


                    // Query the database
                    $query = "SELECT from_date , to_date, reserved_on  FROM reserves WHERE room_id = '$id'";
                    $result = $conn->query($query);

                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<pre>";
                            foreach ($row as $column => $value) {
                                echo $column . ": " . $value . "\n";
                            }
                            echo "</pre><hr>";
                        }
                    } else {
                        echo "No results found.";
                    }

                    $conn->close();
                }
                ?>

            </div>


        </div>
        <!-- JavaScript Bundle with Popper -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>