<?php

// Name validation
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    if (strlen($name) < 3) {
        echo "Name must be at least 3 characters long.";
    } else {
        echo "";
    }
}

// Email validation
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } else {
        echo "";
    }
}

// Phone validation
if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
    if (!preg_match('/^\+?\d{10,15}$/', $phone)) {
        echo "Phone number must be between 10 and 15 digits.";
    } else {
        echo "";
    }
}

// Artwork title validation
if (isset($_POST['artworkTitle'])) {
    $artworkTitle = $_POST['artworkTitle'];
    if (strlen($artworkTitle) < 2) {
        echo "Artwork title must be at least 2 characters long.";
    } else {
        echo "";
    }
}

// Artwork URL validation
if (isset($_POST['artworkUrl'])) {
    $artworkUrl = $_POST['artworkUrl'];
    if (!filter_var($artworkUrl, FILTER_VALIDATE_URL)) {
        echo "Invalid URL format.";
    } else {
        echo "";
    }
}
