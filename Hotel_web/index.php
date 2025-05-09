<?php
require_once('./inc/database.php');
require_once('./inc/session_setter.php');

session_start();
$errors = [];
$rooms_url = "rooms.php";


// session_unset();
if (isset($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
  // create instance of database
  $database = new HotelDatabase();
  // echo $_POST['username'] . $_POST['password'] ;
  $username = $_POST['username'];
  //echo "my Pass: ". $_POST['password'];
  // $password = password_hash($_POST['password'] , PASSWORD_DEFAULT); 

  //echo "my hash Pass: ". $password . '<br>';
  // echo '<br>    '. $password . '   ssssssssssssssssssssss' . $_POST['password'] . 'aaa';
  $result = $database->get_user_hash($username);
  // echo $result;
  if (null != $result) {

    while ($row = mysqli_fetch_assoc($result)) {
      
      //| username| first_name | last_name| email| gender | password| title| is_admin | is_active
      if (password_verify($_POST['password'], $row['password'])) {

        $_SESSION["username"] = $row['username'];
        $_SESSION["first_name"] = $row['first_name'];
        $_SESSION["last_name"] = $row['last_name'];;
        $_SESSION["email"] = $row['email'];
        $_SESSION["gender"] = $row['gender'];
        $_SESSION["password"] =   $row['password'];

        //echo '<br>aaaaaaaaaaaaaaaa' . $_SESSION["password"] ;
        $_SESSION["title"] = $row['title'];
        $_SESSION["is_admin"] = $row['is_admin'];
        $_SESSION["is_active"] = $row['is_active'];
        //echo $_SESSION['username'] . $_SESSION['password'];    
        header('Location: ' . $rooms_url);
        // new
        //$my_session = new Session_setter();
        //$my_session->get_user_set_session($username, $password);
      }
    }
  } else {
    // echo "No data!";
  }
}

//echo $_SESSION["username"];

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="res/css/style_login.css">
  <title>Book Hotel for Holiday - Nirvana Hotel</title>
  <meta name="description" content="Book a romantic Hotel in Austria. Beautiful and air-conditioned rooms for your holiday. Nirvana Hotel has the most comfortable suits very close to the city center of Vienna and the airport! There is a possibility for having parking, breakfast and animals in the room.">
  <meta name="keywords" content="Hotel, Booking Rooms, Hotel close to the airport, hotel parking, hotel Vienna city center, airconditioner, comfortable rooms, parking, animal in the room, breakfast">
  <meta name="Author" content="Kazem Gholibeigian">
  <link rel="shortcut icon" type="image/ico" href="./res/img/logo_final.ico">
</head>

<body class="p-3 m-0 border-0 bd-example">
  <div class="container-fluid bg my-container">
    <div id="my-div">
      <div id="my-login-box" class="row my-box">

        <div class="col-md-12 col-sm-12 col-xs-12">
          <img src="logo_final.png" class="logo" alt="Nirvana Hotel">
          <!--form start-->
          <form class="form-container my-form" action="#" method="POST">
            <h1>Please Login:</h1>
            <div class="form-group my-element">
              <!--<label for="exampleInputEmail1" class="my-label">Username</label>-->
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username" name="username">
              <!--<small id="emailHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>-->
            </div>
            <div class="form-group my-element">
              <!--<label for="exampleInputPassword1" class="my-label">Password</label>-->
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            </div>
            <!--<div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label my-label" for="exampleCheck1">Remember me</label>
                    </div>-->
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-success btn-block my_button my-element">Login</button>
              <a href="register.php" class="btn btn-success my_button my-element"><button class="btn btn-success btn-block my_button my-button-sizes">Sign Up</button></a>
              <a href="rooms.php" class="btn btn-success my_button my-element"><button class="btn btn-success btn-block my_button my-button-sizes">Continue as Guest</button></a><!--guest_button-->
            </div>
          </form>
          <!--form end-->
        </div>
      </div>

      <!-- Example Code -->

      <div id="carouselExampleDark" class="carousel carousel-dark slide my-box my-overlay" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>

          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 3" class=""></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4" aria-label="Slide 4" class=""></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5" aria-label="Slide 5" class=""></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="6" aria-label="Slide 6" class=""></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="7" aria-label="Slide 7" class=""></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="8" aria-label="Slide 8" class=""></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="9" aria-label="Slide 9" class=""></button>


        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="2000">
            <img src="./res/img/h1.jpg" class="d-block w-100" alt="Camera" />
          </div>

          <div class="carousel-item" data-bs-interval="2000">
            <img src="./res/img/a1.jpg" class="d-block w-100" alt="Exotic Fruits" />
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="./res/img/b1.jpg" class="d-block w-100" alt="Exotic Fruits" />
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="./res/img/c1.jpg" class="d-block w-100" alt="Exotic Fruits" />
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="./res/img/d1.jpg" class="d-block w-100" alt="Exotic Fruits" />
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="./res/img/e1.jpg" class="d-block w-100" alt="Exotic Fruits" />
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="./res/img/f1.jpg" class="d-block w-100" alt="Exotic Fruits" />
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="./res/img/g1.jpg" class="d-block w-100" alt="Exotic Fruits" />
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="./res/img/background.jpg" class="d-block w-100" alt="Wild Landscape" />
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="./res/img/background2.jpg" class="d-block w-100" alt="Exotic Fruits" />
          </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>


      </div>
      <!-- End Example Code -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>