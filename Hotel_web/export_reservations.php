
<?php
$rooms_url = "reserve_user.php";
require_once('./inc/database.php');
// session_start();

//if( isset( $_POST[ 'submit' ] ) && isset($_SESSION["username"])) {
if( isset( $_POST[ 'submit' ] )) {

    $database = new HotelDatabase();
    // $target = $_REQUEST[ 'ip' ];
    // $user_name = $_SESSION["username"];
    // $result = $database->getReservesUserData($_SESSION['username']);
    $result = $database->getReservesUserData('huber');
    $result_str ="";
    //echo $result;
    if ($result == null) {
        echo "<br><br><h1>There is no resevations to show</h1>";
        //die();
        //return;
    } else {

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
            $result_str .= $username . ';' . $room_id . ';' . $from_date . ';' . $to_date . ';' . $price . ';' . $has_animal . ';' . $has_parking . ';' . $has_breakfast . ';' . $reserved_on . ';' . $is_approved . "\n";

            //break;
        }
    }
    // $result = "i am here";

    //$cmd = 'mysql -u hotel -ppassword -D hotel -B -e "select * from reserves where username = '. $user_name . ';" > confirmed1.csv';
    $cmd = 'echo "' . $result_str . '" >> ' . $_POST["file_name"];

    echo $cmd;
        //$cmd = "echo $result  >>  confirmed.txt";
    //$cmd = "touch confirmed.txt";

    
    $cmd_sql = shell_exec( $cmd );


    
    // $cmd = shell_exec( 'ls');
    echo '<pre>' .$cmd_sql .'</pre>';
    /*
        
    // Determine OS and execute the ping command.
    if (stristr(php_uname('s'), 'Windows NT')) { 
    
        $cmd = shell_exec( 'ping  ' . $target );
        echo '<pre>'.$cmd.'</pre>';
        
    } else { 
    
        $cmd = shell_exec( 'ping  -c 3 ' . $target );
        echo '<pre>'.$cmd.'</pre>';
        
    }
  */ 
  
  
}
//header('Location: ' . $rooms_url);
?>
