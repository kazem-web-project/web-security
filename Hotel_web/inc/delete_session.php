<?php
    $rooms_url = "../rooms.php";
    session_start();
    session_destroy();
    header('Location: '.$rooms_url);
