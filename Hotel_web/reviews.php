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

        <div class="container mt-5">
    <h4 class="text-primary mb-4">Leave a Review</h4>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="writer_name" class="form-label">Your Name</label>
            <input type="text" class="form-control" name="writer_name" required>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" name="subject" required>
        </div>
        <div class="mb-3">
            <label for="review_text" class="form-label">Review</label>
            <textarea class="form-control" name="review_text" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Rating</label>
            <div id="star-rating" class="mb-2">
                <!-- Stars inserted by JS -->
            </div>
            <input type="number" id="stars" name="stars" min="1" max="5" required>
        </div>
        <button type="submit" name="submit_review" class="btn btn-primary">Submit Review</button>
    </form>
</div>

<?php
// Handle review POST
if (isset($_POST['submit_review'])) {
    $writer = $_POST['writer_name'];
    $subject = $_POST['subject'];
    $text = $_POST['review_text'];
    $stars = intval($_POST['stars']);

    $conn = mysqli_connect("db", "hotel", "password", "hotel");

    if (!$conn) {
        die("DB connection failed");
    }

    $stmt = $conn->prepare("INSERT INTO reviews (writer_name, subject, review_text, stars) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $writer, $subject, $text, $stars);
    $stmt->execute();
    echo "<div class='alert alert-success mt-3'>Thank you! Your review has been submitted.</div>";

    $stmt->close();
    $conn->close();
}
?>

<div class="container mt-5">
    <h4 class="text-primary">Recent Reviews</h4>
    <?php
    $conn = mysqli_connect("db", "hotel", "password", "hotel");
    if ($conn) {
        $result = $conn->query("SELECT * FROM reviews ORDER BY created_at DESC LIMIT 5");
        while ($row = $result->fetch_assoc()) {
            echo "<div class='border rounded p-3 mb-3'>";
            echo "<h5>{$row['subject']}</h5>";
            echo "<p><strong>" . $row['writer_name'] . "</strong> - ";
            echo str_repeat("<i class='fa fa-star text-warning'></i>", $row['stars']);
            echo str_repeat("<i class='fa fa-star text-secondary'></i>", 5 - $row['stars']);
            echo "</p>";
            echo "<p>" . $row['review_text'] . "</p>";
            echo "</div>";
        }
        $conn->close();
    }
    ?>
</div>

        <!-- JavaScript Bundle with Popper -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>