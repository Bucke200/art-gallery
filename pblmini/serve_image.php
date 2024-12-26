<?php
include("database.php"); // Include your database connection

$image_id = $_GET['id'];

$query = "SELECT image FROM exhibitions WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $image_id);
$stmt->execute();
$stmt->bind_result($image_data);
$stmt->fetch();
$stmt->close();

// Output the correct header and image data
header("Content-Type: image/jpeg"); // Adjust MIME type as necessary
echo $image_data;

mysqli_close($conn); // Close the database connection
?>
