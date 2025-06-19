<?php

use LDAP\Result;

require_once('./inc/database.php');
session_start();
$rooms_url = "rooms.php";
$servername = "localhost";
$dbusername = "hotel";
$password = "password";
$dbname = "hotel";

// to check via select
$username_check = '';
$password_check = '';


// insert using PDO
try {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  /*
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




    $username = $_POST["username"];
    $username_check = $username;
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    // password_hash($password,PASSWORD_DEFAULT);
    $password_check = $password;
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $gender  = $_POST["gender"];
    // TODO: implement title in register
    $title = $_POST["title"];
    $is_admin = 0;
    $is_active = 1;

    // prepare and bind
    // echo $gender,$username, $first_name, $last_name, $email,$password,$title, $is_admin, $is_active; 
    // TODO: PASS -> HASH1
    $stmt = $conn->prepare("INSERT INTO users (username, first_name,last_name, email, gender, password, title, is_admin,is_active ) VALUES (:username, :first_name,:last_name, :email, :gender, :password, :title, :is_admin,:is_active )");
    // $stmt->bindParam($username, $first_name, $last_name, $email,$gender,$password,$title, $is_admin, $is_active);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':is_admin', $is_admin);
    $stmt->bindParam(':is_active', $is_active);
    //if ($_POST["password"] == $_POST["password2"]) {
*/
    $username = $_POST["username"];
    $username_check = $username;
    // $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $password = hash('sha256', $_POST["password"]);
    // password_hash($password,PASSWORD_DEFAULT);
    $password_check = $password;
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $gender  = $_POST["gender"];
    // TODO: implement title in register
    $title = $_POST["title"];
    $is_admin = 0;
    $is_active = 1;

    
    $database = new HotelDatabase();

    if ($_POST["password2"]== $_POST["password"]) {
      echo "i am here";
      $database->insert_new_user($username, $first_name, $last_name, $email, $gender, $password, $title, $is_admin, $is_active);
      // $stmt->execute();
    } else {
      header('Location: ' . 'register.php');
    }

    // // TODO: PASS -> HASH1
    $result = $database->get_user($username, $password);
    // echo $result;
    if (null != $result) {

      while ($row = mysqli_fetch_assoc($result)) {
        var_dump($row);
        //| username| first_name | last_name| email| gender | password| title| is_admin | is_active            
        $_SESSION["username"] = $row['username'];
        $_SESSION["first_name"] = $row['first_name'];
        $_SESSION["last_name"] = $row['last_name'];;
        $_SESSION["email"] = $row['email'];
        $_SESSION["gender"] = $row['gender'];
        $_SESSION["password"] = $row['password'];
        $_SESSION["title"] = $row['title'];
        $_SESSION["is_admin"] = $row['is_admin'];
        $_SESSION["is_active"] = $row['is_active'];
        // echo (. $row['firstname'] . $row['password']); 

      }
      if (!empty($_SESSION["username"]) || !isset($_SESSION["username"])) {
        header('Location: ' . $rooms_url);
      }
    } else {
      echo "ERROR";
    }
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}

if (isset($_FILES['profile_picture'])) {
  echo "***********************************";
    $target_path = basename($_FILES['profile_picture']['name']);
    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_path)) {
        echo $target_path . ' successfully uploaded!';
    } else {
        echo 'Your image was not uploaded.';
    }
}






$conn = null;

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./res/css/style.css">

  <title>Document</title>
</head>

<body id="my-help-card" class="font-blue">
  <div class="container-fluid bg">
    <div class="row">
      <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12"></div>
      <div class="col-lg-4 border border-1 col-md-6 col-sm-6 col-xs-12 rounded my-reserve">
        <img src="logo_final.png" class="logo my-reserve" alt="">
        <!--form start-->
        <!-- <form action="new_user.php" method="POST" class="form-container"> -->
        <form action="#" method="POST" class="form-container" enctype="multipart/form-data">
          <h1>Please Sign Up:</h1>
          <select name="title" class="dropdown my-text font-blue">
            <option value="Mr">Mr</option>
            <option value="Mrs">Mrs</option>
            <option value="Miss">Miss</option>
            <option value="Ms">Ms</option>
            <option value="Dr">Dr</option>
          </select>
          <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" name="first_name" class="form-control my-text" aria-describedby="emailHelp" placeholder="John" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" name="last_name" class="form-control my-text" aria-describedby="emailHelp" placeholder="Doe" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control my-text" aria-describedby="emailHelp" placeholder="Enter email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="username" class="form-control my-text" aria-describedby="emailHelp" placeholder="Doe" required>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control my-text" id="exampleInputPassword1" placeholder="Password" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Enter Password Again</label>
            <input type="password" name="password2" class="form-control my-text" id="exampleInputPassword2" placeholder="Password" required>
          </div><br>


          <input id="man" type="radio" name="gender" value="man" class="my-check" required>
           <label for="man">Man</label><br>


          <input id="woman" type="radio" name="gender" value="woman" class="my-check">
           <label for="woman">Woman</label><br>

          <div class="form-check" id="check-box">
            <input type="checkbox" class="form-check-input my-check" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Send Me Newsletter</label>
          </div>

        

<div class="form-group">
  <label for="profile_picture">upload photo:</label>
  <input type="file" name="profile_picture" value="profile_picture" class="form-control-file my-text" accept="image/*">
</div>




          <div class="d-grid gap-2">

            <button type="submit" class="btn btn-success btn-block my_button my-element my-font-register">Sign Up</button>
            <a href="index.php" class="btn btn-danger my_button  my-element"><button class="btn btn-danger btn-block my_button my-button-sizes my-font-register">Cancel</button></a>
          </div>
        </form>
        <!--form end-->
      </div>
      <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12"></div>
    </div>
  </div>
</body>

</html>