<?php
include 'connect.php'; // Include your database connection file

// Ensure $condb is initialized correctly in connect.php

// Fetch and display news articles
$SQL_news = "SELECT * FROM news";
$news_result = mysqli_query($condb, $SQL_news); // Use $condb for database connection

// Other HTML and PHP code for displaying news
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>OneCare</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CssFiles/newsroom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<section class="main">
    <!-- Header Section -->
    <?php include 'header.php'; ?>

    <!-- Intro Section -->
    <article class="intro-Content">
        <section class="intro">
            <h1>Empowering People to <br> change the <span id="introTitle">World</span></h1>
            <br>
            <p>This is temporary text in a single paragraph. Perhaps it will be
                change soon before we launch the websites, thank you. 
            </p>
        </section>
        <section class="introImage">
            <img src="media/news.png" alt="Intro-illustration">
        </section>
    </article>
</section>

<section class="newsGallery">
    <article class="newsContainer">
        <!-- News & Update Content -->
        <div class="newsBox">
            <div class="titleNews">
                <h1>What's on news</h1>
            </div>
            <?php
            if ($news_result && mysqli_num_rows($news_result) > 0) {
                while ($row = mysqli_fetch_assoc($news_result)) {
                    echo '<div class="newsArticle">';
                    echo '<div class="newsImage">';
                    if (!empty($row["image"])) {
                        echo '<img src="' . htmlspecialchars($row["image"]) . '" alt="News Image">';
                    }
                    echo '</div>';
                    echo '<div class="newsContent">';
                    echo '<h3>' . htmlspecialchars($row["title"]) . '</h3>';
                    echo '<p>' . htmlspecialchars($row["content"]) . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No news available.</p>';
            }
            ?>
        </div>
    </article>
</section>

<!-- Footer Section -->
<?php include 'footer.php'; ?>
</body>
</html>

<?php
mysqli_close($condb); // Close the database connection at the end of the script
?>
