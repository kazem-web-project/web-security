<?php
require_once('./inc/component.php');
require_once('./inc/database.php');

session_start();

// create instance of database
$database = new HotelDatabase();
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Font Awesomw -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" crossorigin="anonymous">
    <!-- my css -->
    <link rel="stylesheet" href="./res/css/style.css">
    <title>Nirvana Hotel</title>
</head>

<body id="my-help-card">
    <div>
        <!-- Navbar Code -->
        <?php
        require __DIR__ . '/inc/navigation.php';
        echo insert_nav();
        ?>
        <!-- end of nav bar Code -->
        <div class="container" id="myhelpcontainer">
            <div class="card shadow my-card-body">
                <div class="row text-left py-5 ">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">

                                    Getting Started:
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <p>
                                    <h5>How to import database:</h5>
                                    <ol>
                                        <li>Navigate into your mysql bin folder (C:\xampp\mysql\bin)
                                        <li>Enter the command below: </li>
                                        <div class="experience-card">mysql -u root -p < 'path_to_the_file' \schema.sql</div>
                                                <li>Enter your password</li>
                                    </ol>
                                    <h6>Warning:</h6> The import script deletes and defines a new database user 'hotel'@'localhost' and deletes and creates the database 'Hotel'.</p>
                                    <ul>
                                        <li>Admin users:</li>
                                        <ul><br>
                                            <li>username: administrator</li>
                                            <li>password: admin </li>
                                            <br>
                                            <li>username: kazem</li>
                                            <li>password:123</li>
                                            <br>
                                        </ul>
                                        <li>Normal users:</li>
                                        <ul>
                                            <li>username: Huber</li>
                                            <li>password:123</li>
                                            <br>
                                            <li>username: Rohatsch </li>
                                            <li>password:123</li>
                                            <br>
                                            <li>username: Rongitsch </li>
                                            <li>password:123</li>
                                            <br>
                                            <li>username: gates</li>
                                            <li>password:123</li>
                                            <br>
                                            <li>username: johny</li>
                                            <li>password:123</li>
                                            <br>
                                            <li>username: joilie </li>
                                            <li>password:123</li>
                                            <br>
                                            <li>username: obama </li>
                                            <li>password:123</li>
                                            <br>
                                            <li>username: trump </li>
                                            <li>password:123</li>
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Database Schema:
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body"><img src="res/img/db.png" alt="Database"></div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    Database Tables:
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div>
                                        <img src="res/img/sql_designer.png" alt="" srcset=""><br><br>
                                        <p><span class="fw-bold">I used https://www.mockaroo.com/ to generate random SQL data. This means that the data types are generally selected!</p>
                                        <p><span class="fw-bold">rooms:</span>(<u>room id</u> , price, img)</p>
                                        <p><span class="fw-bold">reserves: </span>(from_date, to_date, reserved_on, has_breakfast, has_parking, has_animal, price, is_approved, <u>room id#</u>, <u>username</u>)</p>
                                        <p><span class="fw-bold">users:</span>(<u>username</u>, title, firstname, lastname, gender, email, password, is_admin, is_active )</p>
                                        <p><span class="fw-bold">posts:</span>(<u>username#</u>, <u>news id#</u>)</p>
                                        <p><span class="fw-bold">news: </span>(<u>news id</u>, image, title, text, date)</p>
                                        <p>The Passwords are stored as hash values in the database! Dabei finden Sie Schema.sql. Sie können das <a href="https://github.com/kazem-web-project/web/tree/main/Database_Dump">SQL-Files</a> einfach importieren(Database Schema und sample data).
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseThree">
                                    Programm Design:
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body"><img src="./res/img/structur.png" alt="" srcset=""></div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseThree">
                                    Program Structure:
                                </button>
                            </h2>
                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <p>I have tried to use KISS principle in the design of my website. All the pages are modular! <br>The photos are downloaded from https://unsplash.com/. I'd like to thank them!<br><br><img src="./res/img/menu3.png" alt="" srcset=""></p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                    Design:
                                </button>
                            </h2>
                            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <p>
                                        According to Adobe Color Website this combination of colors is one of the most popular colors in vacation webdesign! The website belongs to a hotel. So I have used these colors:
                                    <h4 class="h4">Color Selection:</h4><br>
                                    <h5>Light Blue:</h5> According to color psychology, blue is associated with trustworthiness and reliability. Blue is also said to promote feelings of tranquility; light blue's gentle appearance means it is particularly likely to make that impression.
                                    It should be popular blue for trust and green for neutrality. It is the color of social media to gain the trust of the visitors!
                                    <br><br>
                                    <h5>Dark Blue:</h5> Dark Blue is a deep, blue shade that is often confused with Navy Blue. It is commonly associated with knowledge, authority, and reliability. Thus, many banks, insurance companies, and investment firms use this color in their branding.
                                    To show the visitor that we are trustable and dark because we have motivation and are powerfull and serious.
                                    Attention: Just the menues have blue colors to show the visitor, that the hotel manaegment is trustable!
                                    <br><br>
                                    <h5>Yellow:</h5> happines and sunshine! Yellow makes you feel happy and spontaneous. Yellow is perhaps the most energetic of the warm colors. It is associated with laughter, hope and sunshine. Accents of yellow help give your design energy and will make the viewer feel optimistic and cheerful.
                                    <br><br>
                                    <h5>Brown</h5> is associated with the earth, wood, and stone. It's a completely natural color and a warm neutral. Brown can be associated with dependability and reliability, with steadfastness, and with earthiness.
                                    <br><br>
                                    <h5>Beige:</h5>the color beige brings a sense of energy and strength
                                    </p>
                                    <img src="res/img/color_theory.png" alt="" srcset=""></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- this is the content part! it renders from component.php-->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </div>
</body>

</html>