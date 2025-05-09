<?php

use LDAP\Result;

class HotelDatabase
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;


    public function __construct(
        $dbname = "hotel",
        $servername = "db",
        $username = "hotel",
        $password = "password"
    ) {
        $this->dbname = $dbname;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        // connection using mysqli
        $this->con = mysqli_connect(
            $servername,
            $username,
            $password,
            $dbname
        );

        // check connection
        if (!$this->con) {
            die("Connection Not Successfull!" . mysqli_connect_error());
        }
    }

    public function getRoomData()
    {
        // query
        // $myTable = "rooms";
        $sql = "SELECT * FROM rooms;";

        $result = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }

    // get reserves:   
    public function getReservesData()
    {
        // query
        // $myTable = "rooms";
        $sql = "SELECT * FROM reserves;";

        $result = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }

    // get reserves:   
    public function getReservesUserData($username)
    {
        // query
        // $myTable = "rooms";
        $sql = "SELECT * FROM reserves where username='$username';";

        $result = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }

    public function insert_reserve($username_insert, $room_id_insert, $from_date_insert, $to_date_insert, $price_insert, $has_animal_insert, $has_parking_insert, $has_breakfast_insert, $reserved_on_insert, $is_approved)
    {
        $sql = "insert into reserves (username, room_id, from_date, to_date, price,has_animal,has_parking,has_breakfast, reserved_on, is_approved)
        values('$username_insert',$room_id_insert, '$from_date_insert', '$to_date_insert', $price_insert, $has_animal_insert,$has_parking_insert,$has_breakfast_insert,'$reserved_on_insert',$is_approved)";

        if (mysqli_query($this->con, $sql)) {
            // to do delete this line!
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->con);
        }
    }

    // news page:
    public function get_news()
    {
        $sql = "SELECT * FROM news order by 1 desc;";
        $result = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }

    public function get_user($user_name, $password)
    {
        $sql = "select * from users where username='$user_name' and password='$password';";
        $result = mysqli_query($this->con, $sql);
        //echo $sql;
        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_user_hash($user_name)
    {
        $sql = "select * from users where username='$user_name';";
        $result = mysqli_query($this->con, $sql);
        //echo $sql;
        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_users()
    {
        $sql = "select * from users ;";
        $result = mysqli_query($this->con, $sql);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function get_user_admin($user_name)
    {
        $sql = "select * from users where username='$user_name' limit 1;";
        $result = mysqli_query($this->con, $sql);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function del_user($user_name, $password)
    {
        $sql = "delete from users where username='$user_name' and password='$password';";

        $result = mysqli_query($this->con, $sql);
        var_dump($sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function delete_reservation($username, $reserved_on)
    {
        $sql = "delete from reserves where username='$username' and reserved_on='$reserved_on';";
        $result = mysqli_query($this->con, $sql);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function delete_news($news_id)
    {
        $sql = "delete from news where news_id='$news_id';";
        $result = mysqli_query($this->con, $sql);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            return null;
        }
    }

    public function insert_news($title, $text, $image)
    {
        // insert into news (news_id, image, title, text, date) values (9, 'news9.jpg', 'Cashdispenser is Now Working Again!', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in t over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2022-10-11');
        $sql = "insert into news (image, title, text) values ('$image', '$title', '$text')";

        if (mysqli_query($this->con, $sql)) {
            // to do delete this line!
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->con);
        }
    }

    public function insert_new_user($username, $first_name, $last_name, $email, $gender, $password, $title, $is_admin, $is_active)
    {
        // insert into news (news_id, image, title, text, date) values (9, 'news9.jpg', 'Cashdispenser is Now Working Again!', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in t over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2022-10-11');
        $sql = "insert into users (username, first_name, last_name,email,gender,password,title,is_admin,is_active) 
                    values ('$username', '$first_name', '$last_name', '$email', '$gender', '$password', '$title', '$is_admin', '$is_active')";

        if (mysqli_query($this->con, $sql)) {
            // to do delete this line!
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->con);
        }
    }

    public function update_reserve_approve($username, $reserved_on, $approve)
    {
        $is_approved = ($approve == 'on') ? 1 : 0;


        $sql = "update reserves set is_approved='$is_approved' where username='$username' and reserved_on='$reserved_on';";
        //echo $sql;
        if (mysqli_query($this->con, $sql)) {
            // to do delete this line!
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->con);
        }
    }

    public function room_is_free($room_id, $from_date, $to_date)
    {
        $sql = "select * from reserves where not (('$to_date'< from_date and '$from_date' < from_date) or ('$to_date'> to_date and '$from_date' > to_date )) and room_id='$room_id';";

        // echo $sql;
        $result = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($result) > 0) {
            var_dump($result);
            return false;
        } else {

            return true;
        }
    }

    public function delete_user($username){
        $sql = "DELETE FROM users WHERE username='".$username . "';";
        if (mysqli_query($this->con, $sql)) {
            // to do delete this line!
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->con);
        }
    }

    public function update_user($username, $first_name, $last_name, $email, $gender, $password, $title, $is_admin, $is_active)
    {
        // insert into news (news_id, image, title, text, date) values (9, 'news9.jpg', 'Cashdispenser is Now Working Again!', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in t over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2022-10-11');
        $sql = "UPDATE users SET 
        username = '$username', 
        first_name = '$first_name', 
        last_name = '$last_name', 
        email = '$email', 
        gender = '$gender', 
        password = '$password', 
        title = '$title', 
        is_admin = '$is_admin', 
        is_active = '$is_active' 
    WHERE username = '$username'";
                

        if (mysqli_query($this->con, $sql)) {
            // to do delete this line!
            echo "User data updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->con);
        }
    }

}
