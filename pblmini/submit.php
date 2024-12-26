<?php
include 'database.php';
if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['artworkTitle'], $_POST['artworkUrl'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $artworkTitle = $_POST['artworkTitle'];
    $artworkUrl = $_POST['artworkUrl'];

    $sql = "INSERT INTO submissions (name, email, phone, artworkTitle, artworkUrl) 
            VALUES ('$name', '$email', '$phone', '$artworkTitle', '$artworkUrl')";

    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
}

?>
