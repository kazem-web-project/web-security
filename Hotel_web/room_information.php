


        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <form action="#" method="GET">
			<input type="text" name="id">
			<input type="submit" name="Submit" value="Submit">
		</form>



        <?php    
        /*

    if(isset($_GET['Submit'])){
        
        // Retrieve data
        
        $id = $_GET['id'];

        $getid = "select from_date , to_date, reserved_on from reserves where room_id = '$id'";
        
        $result = mysql_query($getid) or die('<pre>' . mysql_error() . '</pre>' );

        $num = mysql_numrows($result);

        $i = 0;

        while ($i < $num) {

            $first = mysql_result($result,$i,"from_date");
            $last = mysql_result($result,$i,"to_date");
            
            echo '<pre>';
            echo 'ID: ' . $id . '<br>From date: ' . $first . '<br>To date: ' . $last;
            echo '</pre>';

            $i++;
        }
    }
    */
    ?>
<?php
// Database connection parameters
 $dbname = "hotel" ;
$servername = "db" ;
$username = "hotel" ;
$password = "password" ;

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

        </body>
        </html>