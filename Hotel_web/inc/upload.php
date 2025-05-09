<?php
require_once('database.php');
session_start();
function resize_image($fileDestination, $fielActualExt)
{
    if ($fielActualExt == 'jpg') {
        $orginal_image =  imagecreatefromjpeg($fileDestination);
    } else if ($fielActualExt == 'jpeg') {
        $orginal_image =  imagecreatefromjpeg($fileDestination);
    } else if ($fielActualExt == 'png') {
        $orginal_image = imagecreatefrompng($fileDestination);
    }
    //$orginal_image =  ($fileDestination);

    $width = imagesx($orginal_image);
    $height = imagesy($orginal_image);

    $new_width = round($width * 0.8);
    $new_height = round($height * 0.8);

    $new_image = imagecreate($new_width, $new_height);
    imagecopyresized($new_image, $orginal_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    imagejpeg($new_image, $fileDestination);

    imagedestroy($new_image);
    imagedestroy($orginal_image);
}
// create instance of database
$database = new HotelDatabase();

if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $text = $_POST["text"];
    $file = $_FILES['file'];
    print_r($file);
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode(".", $fileName);
    $fielActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fielActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 10000000) {
                $fileNameNew = "news" . uniqid('', true) . "." . $fielActualExt;


                echo $fielActualExt;
                $fileDestination = '../uploads/news/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                resize_image($fileDestination, $fielActualExt);

                //header("Location: index.php?uploadsuccess");
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "Error uploading your file!";
        }
    } else {
        echo "You are not allowed to upload this file type!";
    }

    // insert into news:
    $database->insert_news($title, $text, $fileNameNew);

    // redirect to the news page
    $news_url = "../news_page.php";
    //resize_image("salam");
    header('Location: ' . $news_url);
}
