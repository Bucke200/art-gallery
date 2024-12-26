<?php
include("database.php");
$sql_ex = "SELECT image, title FROM exhibitions ORDER BY upload_date DESC LIMIT 8;";
$result = mysqli_query($conn, $sql_ex);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="mouse.css?v=1.2">
    <link rel="stylesheet" href="exhibition_light.css?v=1.6">
</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="800">
        <defs>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="6" result="blur" />
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 35 -15" result="goo" />
                <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
            </filter>
        </defs>
    </svg>
    <div id="cursor" class="Cursor">
    </div>
    <!-- Dashboard Header -->
    <div class="dashboard">
        <div class="navbar">
            <div class="logo">Exhibitions</div>
            <div class="search-container">
    <form action="search.php" method="GET">
        <input type="text" name="search" placeholder="Search..." class="search-box" />
        <button type="submit">Search</button>
    </form>
</div>
            <div class="nav-links">
                <a href="index.php" class="links">Home</a>
                <a href="gallery.php" class="links">Gallery</a>
                <a href="Artists.php" class="links">Artists</a>
                <a href="form.php" class="links">Submit Art</a>
            </div>
        </div>
    </div>

    <!-- Image Track Section -->
    <div id="image-track" data-mouse-down-at="0" data-prev-percentage="0">
        <?php
        while ($row = mysqli_fetch_array($result)) {
            echo '<img class="image" src="data:image/jpg;base64,' . base64_encode($row['image']) . '" alt="Exhibition Image" draggable="false" data-description="' . htmlspecialchars($row['title'], ENT_QUOTES) . '">';
        }
        mysqli_close($conn);
        ?>
    </div>

    <!-- Full-screen overlay -->
    <div id="full-screen" class="full-screen" style="display: none;">
        <img id="full-screen-image" src="" alt="">
        <div id="image-description" class="image-description"></div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <p>
                "Art enables us to find ourselves and lose ourselves at the same time." - Thomas Merton
            </p>
        </div>
    </footer>

    <script src="exhibition.js?v=1.2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js'></script><script  src="jav1.js"></script>
</body>
</html>
