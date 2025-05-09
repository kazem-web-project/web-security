<?php

class Session_setter
{
    public $users_url = "../users.php";
    public function __construct()
    {
        session_start();
    }

    public function get_user_set_session($username, $password)
    {
        $database = new HotelDatabase();
        $result = $database->get_user($username, $password);
        
        // echo $result;
        if (null != $result) {

            while ($row = mysqli_fetch_assoc($result)) {
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
                echo($row['firstname'] . $row['password']); 
            }
            if (!empty($_SESSION["username"]) || !isset($_SESSION["username"])) {

                // echo"================";
                //var_dump($_SESSION);
                //header('Location: '.$rooms_url);
            }
        } else {
            // echo "No data!";
        }
    }
}
