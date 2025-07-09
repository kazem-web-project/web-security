<?php
require_once('./inc/database.php');
require_once('./inc/session_setter.php');

session_start();
error_reporting(E_ALL ^ E_NOTICE);

$rooms_url = "rooms.php";
// TODO : change this to orwerview users:
$users_url_for_admin = "rooms.php";
$servername = "db";
$dbusername = "hotel";
$dbpassword = "password";
$dbname = "hotel";




// to check via select
$username_check = '';
$password_check = '';
if (!isset($_SESSION) || empty($_SESSION)) {
    header("Location: index.php");
    exit();
}
if (isset($_SESSION["is_admin"]) && (isset($_POST["new_password1"]) && isset($_POST["new_password2"]))) {
    // insert using PDO5
    try {
        //$conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
        echo "hello";
        // set the PDO error mode to exception
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $username = $_POST["username"];
        $username_check = $username;
        // TODO: PASS -> HASH1
        $password = $_POST["new_password1"];
        $password_check = $password;
        //var_dump($_POST);
        // echo '<br>' . hash('sha256',$_SESSION["password"]) . '<br>' .  password_hash($_POST["password"], PASSWORD_DEFAULT). '<br>' ;
        
        //var_dump($_SESSION);  
        $password_to_check = hash('md5', $_POST['password'] );
        $database = new HotelDatabase();
        if (($_POST["new_password2"] == $_POST["new_password1"]) &&  $password_to_check == $_SESSION["password"]) {
            echo 'passsword' . password_verify($_POST["password"], $_SESSION["password"]);
            
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $email = $_POST["email"];
            $gender  = $_POST["gender"];
            $title = $_POST["title"];
            $is_admin = ($_SESSION["is_admin"] == 1) ? 1 : 0;
            $is_active = 1;
            // change to hash
            $password = password_hash($_POST["new_password1"], PASSWORD_DEFAULT);
            
            // TODO: PASS -> HASH1
            //$stmt = $conn->prepare("INSERT INTO users (username, first_name,last_name, email, gender, password, title, is_admin,is_active ) VALUES (:username, :first_name,:last_name, :email, :gender, :password, :title, :is_admin,:is_active )");
            try {
                $database->update_user($username, $first_name, $last_name, $email, $gender, $password, $title, $is_admin, $is_active);
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
            
            /*
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':is_admin', $is_admin);
            $stmt->bindParam(':is_active', $is_active);

            $stmt->execute();
            */
        } else {
            echo "Wrong Passwords!";
        }
        // updates the user session!
        $my_session = new Session_setter();
        $my_session->get_user_set_session($username, $password);
        var_dump($_SESSION);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
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
    <!--<link rel="stylesheet" href="res/css/sign_up_style.css"> -->
    <link rel="stylesheet" href="./res/css/style.css">
    <title>Document</title>
</head>

<body id="my-help-card" class="font-blue">
    <!-- insertr nav -->
    <?php
    require __DIR__ . '/inc/navigation.php';
    echo insert_nav();
    ?>
    <div class="container-fluid bg">
        <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-lg-4 border border-1 col-md-6 col-sm-6 col-xs-12 rounded my-reserve my-user">

                <img src="logo_final.png" alt="">
                <!--form start-->
                <!-- <form action="new_user.php" method="POST" class="form-container"> -->
                <form action="#" method="POST" class="form-container">
                    <h1>Edit User:</h1>
                    <select name="title" class="dropdown my-text font-blue" value="<?php echo $_SESSION["title"]; ?>">
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                        <option value="Ms">Ms</option>
                        <option value="Dr">Dr</option>
                    </select>
                    <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" name="first_name" class="font-blue form-control my-text" aria-describedby="emailHelp" value="<?php echo $_SESSION["first_name"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" name="last_name" class="font-blue form-control my-text" aria-describedby="emailHelp" value="<?php echo $_SESSION["last_name"]; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="font-blue form-control my-text" aria-describedby="emailHelp" value="<?php echo $_SESSION["email"]; ?>" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="font-blue form-control my-text" readonly="readonly" aria-describedby="emailHelp" value="<?php echo $_SESSION["username"]; ?>" placeholder="<?php echo $_SESSION["username"]; ?>">
                    </div>
                    <input id="man" type="radio" name="gender" value="man" <?php if ($_SESSION["gender"] == 'man') echo 'checked' ?> required>
                     <label for="man">Man</label><br>


                    <input id="woman" type="radio" name="gender" value="woman" <?php if ($_SESSION["gender"] == 'woman') echo 'checked' ?>>
                     <label for="woman">Woman</label><br>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Old Password</label>
                        <input type="password" name="password" class="font-blue form-control my-text" id="exampleInputPassword1" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="new_password1" class="font-blue form-control my-text" id="exampleInputPassword2" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Enter the New Password Again</label>
                        <input type="password" class="font-blue form-control my-text" id="exampleInputPassword3" name="new_password2" required>
                    </div><br>



                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success btn-block btn btn-success btn-block my_button my-element my-font-register">Save</button>
                    </div>
                </form>

                <!--form end-->
            </div>
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12"></div>
        </div>
    </div>
</body>

</html>