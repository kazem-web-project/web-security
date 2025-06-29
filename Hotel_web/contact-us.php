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



<body>
    <?php
    require __DIR__ . '/inc/navigation.php';
    error_reporting(E_ALL ^ E_NOTICE);
    echo insert_nav();
    ?>


    <div id=my-news>

       <div class="container-fluid vh-100 d-flex flex-column px-0">
    <div class="card flex-grow-1 rounded-0 shadow">
        <div class="card-header bg-primary text-white">
            Messaging Assistant | Customer Service
        </div>
        <div class="card-body overflow-auto" id="chat-box">
            <div class="mb-3">
                <div class="text-muted small">1:20 PM</div>
                <div class="p-2 bg-light rounded d-inline-block">So, what can I help you with?</div>
            </div>
            
        </div>
        <div class="card-footer d-flex gap-2">
            <input type="text" class="form-control" placeholder="Type your message..." id="chat-input">
            <button class="btn btn-primary">Send</button>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="./contact-us.js"></script>

</body>

</html>