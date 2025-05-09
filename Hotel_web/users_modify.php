<?php
require_once('./inc/database.php');
require_once('./inc/session_setter.php');
error_reporting(E_ALL ^ E_NOTICE);

session_start();
$rooms_url = "rooms.php";
// TODO : change this to orwerview users:
$users_url_for_admin = "rooms.php";
$admin_modify_user_bool = 0;

// var_dump($_GET);

if (!empty($_GET) && isset($_GET["username"])) {
    //if($_Get["username"]){
    // echo "admin_modify_user_bool = 1";
    if ($_SESSION["is_admin"] == "1") {
        $_SESSION["target_user_username"] = $_GET["username"];
        $admin_modify_user_bool = 1;
    }
}





// to check via select
$username_check = '';
$password_check = '';
//var_dump($_SESSION["is_admin"] == "0");
$is_man = '';
$is_woman = '';

if (isset($_SESSION) && !empty($_SESSION)) {

    if ($_SESSION["is_admin"] == "1") {
        // echo"is_admin";

        $database = new HotelDatabase();

        $target_user = $_GET["username"];


        $result = $database->get_user_admin($target_user);
        // echo $result;
        if (null != $result) {
            while ($row = mysqli_fetch_assoc($result)) {
                //| username| first_name | last_name| email| gender | password| title| is_admin | is_active            
                $_SESSION["target_user_username"] = $row['username'];
                $_SESSION["target_user_first_name"] = $row['first_name'];
                $_SESSION["target_user_last_name"] = $row['last_name'];;
                $_SESSION["target_user_email"] = $row['email'];
                $_SESSION["target_user_gender"] = $row['gender'];
                $_SESSION["target_user_password"] = $row['password'];
                $_SESSION["target_user_title"] = $row['title'];
                $_SESSION["target_user_is_admin"] = $row['is_admin'];
                $_SESSION["target_user_is_active"] = $row['is_active'];
                // echo (. $row['firstname'] . $row['password']); 
                $is_admin = $_SESSION["target_user_is_admin"];
            }
            $is_man = ($_SESSION["target_user_gender"] == 'man') ? 'checked' : '';
            $is_woman = ($_SESSION["target_user_gender"] == 'woman') ? 'checked' : '';

            // echo '$is_woman ($_SESSION["target_user_gender"]   ' . $is_man . '    '. $is_woman;
            // updates the user session!
            //$my_session = new Session_setter();
            //$my_session->get_user_set_session($username, $password);
            //echo "test";
        }
        //echo $_POST["new_password2"] .  "   " . $_POST["new_password1"].  "   " . $_POST["password"].  "   " . $_SESSION["target_user_password"]; 

        // modify another user by admin! GET + POST
        //        if(((isset($_POST)) && !empty($_POST)) && (($_POST["new_password1"]== $_POST["new_password2"]) &&(password_verify($_POST["password"] ,$_SESSION["target_user_password"])))){

        if (((isset($_POST)) && !empty($_POST)) && (($_POST["new_password1"] == $_POST["new_password2"]))) {

            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $email = $_POST["email"];
            $gender  = $_POST["gender"];
            // TODO: implement title in register
            $title = $_POST["title"];

            $is_active = $_POST["is_active"];
            if (isset($_GET["username"])) {
                /*
                $database->del_user($_GET["username"], $_SESSION["target_user_password"]);
                $database->insert_new_user(
                    $_SESSION["target_user_username"],
                    $first_name,
                    $last_name,
                    $email,
                    $gender,
                    password_hash($_POST["new_password1"], PASSWORD_DEFAULT),
                    $title,
                    $is_admin,
                    $is_active
                );
                */
                $database->update_user(
                    $_SESSION["target_user_username"],
                    $first_name,
                    $last_name,
                    $email,
                    $gender,
                    password_hash($_POST["new_password1"], PASSWORD_DEFAULT),
                    $title,
                    $is_admin,
                    $is_active
                );
            }
            // updates the user session!
            $my_session = new Session_setter();
            $my_session->get_user_set_session($username, $password);
            $target_user = $_GET["username"];


            $result = $database->get_user_admin($target_user);
            // echo $result;
            if (null != $result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    //| username| first_name | last_name| email| gender | password| title| is_admin | is_active            
                    $_SESSION["target_user_username"] = $row['username'];
                    $_SESSION["target_user_first_name"] = $row['first_name'];
                    $_SESSION["target_user_last_name"] = $row['last_name'];;
                    $_SESSION["target_user_email"] = $row['email'];
                    $_SESSION["target_user_gender"] = $row['gender'];
                    $_SESSION["target_user_password"] = $row['password'];
                    $_SESSION["target_user_title"] = $row['title'];
                    $_SESSION["target_user_is_admin"] = $row['is_admin'];
                    $_SESSION["target_user_is_active"] = $row['is_active'];
                    // echo (. $row['firstname'] . $row['password']); 
                }
                $is_man = ($_SESSION["target_user_gender"] == 'man') ? 'checked' : '';
                $is_woman = ($_SESSION["target_user_gender"] == 'woman') ? 'checked' : '';

                echo '$is_woman ($_SESSION["target_user_gender"]   ' . $is_man . '    ' . $is_woman;
                // updates the user session!
                $my_session = new Session_setter();
                $my_session->get_user_set_session($username, $password);
            }
            // change the admin user profile itself POST + not Get
        }
    } else {
        header("Location: user.php");
    }
} else {
    header("Location: index.php");
}

//var_dump($_SESSION);

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
        <div class="row my-user">
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-lg-4 border border-1 col-md-6 col-sm-6 col-xs-12 rounded my-reserve my-user">
                <img src="logo_final.png" class="logo" alt="">
                <!--form start-->
                <!-- <form action="new_user.php" method="POST" class="form-container"> -->
                <form action="#" method="POST" class="form-container">
                    <h1>Edit User:</h1>
                    <select name="title" class="dropdown my-text font-blue" value="<?php echo ($admin_modify_user_bool == 1 ? $_SESSION["target_user_title"] : $_SESSION["title"]); ?>">
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                        <option value="Ms">Ms</option>
                        <option value="Dr">Dr</option>
                    </select>
                    <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" name="first_name" class="form-control my-text font-blue" aria-describedby="emailHelp" value="<?php echo ($admin_modify_user_bool == 1 ? $_SESSION["target_user_first_name"] : $_SESSION["first_name"]); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" name="last_name" class="form-control my-text font-blue" aria-describedby="emailHelp" value="<?php echo ($admin_modify_user_bool == 1 ? $_SESSION["target_user_last_name"] : $_SESSION["last_name"]); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control my-text font-blue" aria-describedby="emailHelp" value="<?php echo ($admin_modify_user_bool == 1 ? $_SESSION["target_user_email"] : $_SESSION["email"]); ?>" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" class="form-control my-text font-blue" readonly="readonly" aria-describedby="emailHelp" value="<?php echo ($admin_modify_user_bool == 1 ? $_SESSION["target_user_username"] : $_SESSION["username"]); ?>" placeholder="<?php echo $_SESSION["username"]; ?>">
                    </div>
                    <input id="man" type="radio" name="gender" value="man" <?php echo $is_man ?> required>
                     <label for="man">Man</label><br>


                    <input id="woman" type="radio" name="gender" value="woman" <?php echo $is_woman ?>>
                     <label for="woman">Woman</label><br>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Old Password</label>
                        <input type="password" name="password" class="form-control my-text font-blue" id="exampleInputPassword1" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="new_password1" class="form-control my-text font-blue" id="exampleInputPassword2" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Enter the New Password Again</label>
                        <input type="password" class="form-control my-text font-blue" id="exampleInputPassword3" name="new_password2" required>
                    </div><br>
                    <!-- todo add checkbox -->
                    <?php if ($admin_modify_user_bool == 1) {
                        echo "<label for=\"is_active\"> Is an active user</label><br>
                        <input type=\"checkbox\" name=\"is_active\" id=\"tag_1\" value=\"1\" ";
                        echo ($_SESSION["target_user_is_active"] == 1 ? 'checked' : '');
                        echo ">";
                    }  ?>


                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success btn-block  my_button my-element my-font-register">Save</button>
                    </div>
                </form>
                <?php
                if (isset($_SESSION["is_admin"])) {
                    if ($_SESSION["is_admin"] == "1" && $admin_modify_user_bool) {
                        $delete_btn1 = "<div class=\"d-grid gap-2\"> <a href=\"./inc/delete_user.php?username=";
                        $delete_btn2 = $_SESSION["target_user_username"];
                        $delete_btn3 = "\" class=\"btn btn-danger  my_button  my-element\"><button  class=\"btn btn-danger btn-block my_button my-button-sizes my-font-register\">Delete</button></a>";
                        echo $delete_btn1 . $delete_btn2 . $delete_btn3 . "</div>";
                    }
                }
                ?>
                <!--form end-->
            </div>
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12"></div>
        </div>
    </div>
</body>

</html>