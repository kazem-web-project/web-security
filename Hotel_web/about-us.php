<?php
// Suppress warnings and notices, but still show fatal errors
error_reporting(E_ERROR);
ini_set('display_errors', 0); // Don't show them in browser

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.css">
    <title>Nirvana Hotel</title>
</head>

<body>
    <!-- Navbar Code -->
    <?php
    require __DIR__ . '/inc/navigation.php';
    echo insert_nav();
    ?>
    <!-- end of nav bar Code -->

    <!-- this is the content part! it renders from component.php-->



    <!-- from here-->

    <div id="my-news">
        <div class="container">
            <div class="card shadow news_card">
                <div class="row text-left py-5">
                    <div class="row justify-content-center news_card">
                        <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
                            <div class="card border-0 shadow news_card">
                                <img src="res/img/hacker.jpg" alt="...">
                                <div class="card-body p-1-9 p-xl-5 news_card">
                                    <div class="mb-4">
                                        <h3 class="h4 mb-0">Web Security</h3>
                                        <span class="text-primary"></span>
                                    </div>
                                    <ul class="list-unstyled mb-4">
                                        <li class="mb-3"><a href="#!"><i class="far fa-envelope display-25 me-3 text-secondary"></i>if22b450@technikum-wien.at</a></li>
                                        <li class="mb-3"><a href="#!"><i class="fas fa-mobile-alt display-25 me-3 text-secondary"></i>+4367686965</a></li>
                                        <li><a href="#!"><i class="fas fa-map-marker-alt display-25 me-3 text-secondary"></i>Wien, Österreich</a></li>
                                    </ul>
                                    <ul class="social-icon-style2 ps-0">
                                        <li><a href="#!" class="rounded-3"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#!" class="rounded-3"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#!" class="rounded-3"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#!" class="rounded-3"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="ps-lg-1-6 ps-xl-5">
                                <div class="mb-5 wow fadeIn news_card">
                                    <div class="text-start mb-1-6 wow fadeIn">
                                        <h2 class="h1 mb-0 text-primary">#About Me</h2>
                                    </div>
                                    <p>Mein Name ist Bob Bitzinger, aber im Internet kennt man mich unter dem geheimnisvollen Codenamen "BugLord_9000". Ich komme aus dem wundervollen Land der Sonnenuntergänge und schlechten Internetverbindungen – nennen wir es einfach mal "Codeistan". Seit 2014 lebe ich in Wien – ich kam für die Würstel, blieb aber wegen des Gratis-WLANs im Museum.</p>

<p class="mb-0">Ich studiere Informatik an der legendären Hochschule für angewandte Kaffeephilosophie – im sogenannten "dualen Studium". Das bedeutet: unter der Woche programmiere ich bei einer Firma, am Wochenende programmiere ich für die Uni. In meiner Freizeit? Rate mal: genau, ich programmiere weiter. (Und weine leise in binär.)</p>

<p class="mb-0">Früher war ich an der HTL für technische Magie in Ottakring – dort habe ich gelernt, wie man einen Drucker mit bösen Blicken zum Laufen bringt und wie man Excel zum Absturz bringt, nur indem man es öffnet.</p>

<p class="mb-0">Diese Website habe ich ganz allein gebaut – mit HTML, CSS, JavaScript und einer großen Portion Genialität. Und jetzt kommt’s: Sie ist absolut perfekt. Kein einziger Bug. Null. Nada. Niente. Warum? Weil ich einfach unfassbar gut bin. Mein Code schreibt sich praktisch selbst – mit goldener Tinte und göttlichem Segen. Elon Musk wollte mich schon abwerben, aber ich meinte: „Sorry Bro, meine Website braucht mich.“</p>

<p class="mb-0">Wenn ich gerade keine Bugs vertreibe (nicht, dass es bei mir welche gäbe!) oder mit dem Toaster über KI philosophiere, pflege ich mein Repository des Lebens – jedes Commit ein Meisterwerk. Und sollte irgendwann ein Bug auftauchen, dann ist das kein Bug. Es ist ein verstecktes Feature für Fortgeschrittene.</p>

                                </div>
                                <div class="mb-5 wow fadeIn">
                                    <div class="text-start mb-1-6 wow fadeIn">
                                        <h2 class="mb-0 text-primary">#Education</h2>
                                    </div>
                                    <div class="row mt-n4 news_card">
                                        <div class="col-sm-6 col-xl-4 mt-4">
                                            <div class="card text-center border-0 rounded-3">
                                                <div class="card-body experience-card">
                                                    <i class="ti-bookmark-alt icon-box medium rounded-3 mb-4"></i>
                                                    <h3 class="h5 mb-3">Education</h3>
                                                    <p class="mb-0">HTL-Ottakring, IT (System Technology)</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-4 mt-4">
                                            <div class="card text-center border-0 rounded-3">
                                                <div class="card-body experience-card">
                                                    <i class="ti-pencil-alt icon-box medium rounded-3 mb-4"></i>
                                                    <h3 class="h5 mb-3">Career Start</h3>
                                                    <p class="mb-0">I would like to find a junior job with a partner of the FH.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xl-4 mt-4">
                                            <div class="card text-center border-0 rounded-3">
                                                <div class="card-body experience-card">
                                                    <i class="ti-medall-alt icon-box medium rounded-3 mb-4"></i>
                                                    <h3 class="h5 mb-3">Experience</h3>
                                                    <p class="mb-0">Fullstack Bug-Beseitiger & Kaffeevernichter – TechFirma.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wow fadeIn news_card">
                                    <div class="text-start mb-1-6 wow fadeIn">
                                        <h2 class="mb-0 text-primary">#Used Technologies</h2>
                                    </div>
                                    <p class="mb-4">I programmed the website myself!</p>
                                    <div class="progress-style1">
                                        <div class="progress-text">
                                            <div class="row">
                                                <div class="col-6 fw-bold">PHP</div>
                                                <div class="col-6 text-end">73%</div>
                                            </div>
                                        </div>
                                        <div class="custom-progress progress rounded-3 mb-4">
                                            <div class="animated custom-bar progress-bar bg-success slideInLeft" style="width:73%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10" role="progressbar"></div>
                                        </div>
                                        <div class="progress-text">
                                            <div class="row">
                                                <div class="col-6 fw-bold">HMTL</div>
                                                <div class="col-6 text-end">15%</div>
                                            </div>
                                        </div>
                                        <div class="custom-progress progress rounded-3 mb-4">
                                            <div class="animated custom-bar progress-bar  slideInLeft" style="width:15%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10" role="progressbar"></div>
                                        </div>
                                        <div class="progress-text">
                                            <div class="row">
                                                <div class="col-6 fw-bold">SQL</div>
                                                <div class="col-6 text-end">25%</div>
                                            </div>
                                        </div>
                                        <div class="custom-progress progress rounded-3 mb-4">
                                            <div class="animated custom-bar progress-bar slideInLeft" style="width:25%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="10" role="progressbar"></div>
                                        </div>
                                        <div class="progress-text">
                                            <div class="row">
                                                <div class="col-6 fw-bold">CSS</div>
                                                <div class="col-6 text-end">12%</div>
                                            </div>
                                        </div>
                                        <div class="custom-progress progress rounded-3 mb-4">
                                            <div class="animated custom-bar progress-bar bg-secondary slideInLeft" style="width:12%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                                        </div>
                                        <div class="progress-text">
                                            <div class="row">
                                                <div class="col-6 fw-bold">Aministratoration</div>
                                                <div class="col-6 text-end">80%</div>
                                            </div>
                                        </div>
                                        <div class="custom-progress progress rounded-3">
                                            <div class="animated custom-bar progress-bar bg-dark slideInLeft" style="width:80%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>