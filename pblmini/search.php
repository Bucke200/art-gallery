<?php
include("database.php");

// Get the search term from the query parameter
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

// Construct the SQL query to search in various fields
$sql_ex = "
SELECT image, title, artist_name, description
FROM art
WHERE REPLACE(LOWER(tags), ' ', '') LIKE REPLACE(LOWER('%$search%'), ' ', '') OR
      REPLACE(LOWER(title), ' ', '') LIKE REPLACE(LOWER('%$search%'), ' ', '') OR
      REPLACE(LOWER(genre), ' ', '') LIKE REPLACE(LOWER('%$search%'), ' ', '') OR
      REPLACE(LOWER(artist_name), ' ', '') LIKE REPLACE(LOWER('%$search%'), ' ', '')

UNION

SELECT image, title, NULL AS artist_name, description
FROM exhibitions
WHERE REPLACE(LOWER(tags), ' ', '') LIKE REPLACE(LOWER('%$search%'), ' ', '') OR
      REPLACE(LOWER(title), ' ', '') LIKE REPLACE(LOWER('%$search%'), ' ', '') OR
      REPLACE(LOWER(genre), ' ', '') LIKE REPLACE(LOWER('%$search%'), ' ', '');

";

$result = mysqli_query($conn, $sql_ex);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="search.css">
    <title>Art Gallery Search Results</title>
</head>
<body>
    <header>
        <h1>Search Results for "<?php echo htmlspecialchars($search); ?>"</h1>
    </header>

    <div class="search-results" id="results-container">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="result-item">
                <?php
                // Display the image in base64 format
                echo '<img src="data:image/jpg;base64,' . base64_encode($row['image']) . '" alt="' . htmlspecialchars($row['title']) . '" class="result-image">';
                ?>
                <div class="result-text">
                    <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                    <?php if (!empty($row['artist_name'])) { ?>
                        <p>Artist: <?php echo htmlspecialchars($row['artist_name']); ?></p>
                    <?php } ?>
                    <?php if (!empty($row['description'])) { ?>
                        <p>Description: <?php echo htmlspecialchars($row['description']); ?></p>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>

    <?php
    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
