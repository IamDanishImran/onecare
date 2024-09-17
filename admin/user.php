<?php
include '../connect.php';

// Delete records if form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['VolunteerID'])) {
        $volunteerID = $_POST['VolunteerID'];
        $SQL_volunteer = "DELETE FROM volunteer WHERE VolunteerID = ?";
        if ($stmt = $condb->prepare($SQL_volunteer)) {
            $stmt->bind_param("i", $volunteerID);
            if ($stmt->execute()) {
                echo "<script>alert('Volunteer record deleted successfully');</script>";
            } else {
                echo "<script>alert('Error deleting volunteer record');</script>";
            }
            $stmt->close();
        }
    } elseif (isset($_POST['ReceiverID'])) {
        $receiverID = $_POST['ReceiverID'];
        $SQL_receiver = "DELETE FROM receiver WHERE ReceiverID = ?";
        if ($stmt = $condb->prepare($SQL_receiver)) {
            $stmt->bind_param("i", $receiverID);
            if ($stmt->execute()) {
                echo "<script>alert('Receiver record deleted successfully');</script>";
            } else {
                echo "<script>alert('Error deleting receiver record');</script>";
            }
            $stmt->close();
        }
    }
}

// Query to retrieve volunteer data from the database
$SQL_volunteer = "SELECT * FROM volunteer";
$Vol_Result = mysqli_query($condb, $SQL_volunteer);

// Query to retrieve receiver data from the database
$SQL_receiver = "SELECT * FROM receiver";
$Rec_Result = mysqli_query($condb, $SQL_receiver);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>OneCare</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<section class="dashboard">
    <!-- Control Panel Section -->
    <section class="control-panel">
        <div class="title-panel"><h2>Volunteer</h2></div>
        <article class="user-volunteer block">
            <?php
            if (mysqli_num_rows($Vol_Result) > 0) {
                echo "<div class='info'>";
                while($row = mysqli_fetch_assoc($Vol_Result)) {
                    echo "<div class='Wrapper'>";
                    echo "<p>ID: ".$row["VolunteerID"]. "&nbsp</p>" . "<p>|&nbsp;Name: ".$row["name"]. "&nbsp</p>" . "<p>|&nbsp;Password: ".$row["password"]."&nbsp</p>";
                    echo "<form method='post' style='display:inline;'>";
                    echo "<input type='hidden' name='VolunteerID' value='".$row["VolunteerID"]."'>";
                    echo "<button type='submit'>Delete</button>";
                    echo "</form>";
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "No volunteers found.";
            }
            ?>
        </article>

        <!-- Receiver Panel -->
        <div class="title-panel"><h2>Receiver</h2></div>
        <article class="user-receiver block">
            <?php
            if (mysqli_num_rows($Rec_Result) > 0) {
                echo "<div class='info'>";
                while($row = mysqli_fetch_assoc($Rec_Result)) {
                    echo "<div class='Wrapper'>";
                    echo "<p>ID: ".$row["ReceiverID"]. "&nbsp</p>" . "<p>|&nbsp;Name: ".$row["name"]. "&nbsp</p>" . "<p>|&nbsp;Password: ".$row["password"]."&nbsp</p>";
                    echo "<form method='post' style='display:inline;'>";
                    echo "<input type='hidden' name='ReceiverID' value='".$row["ReceiverID"]."'>";
                    echo "<button type='submit'>Delete</button>";
                    echo "</form>";
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "No receivers found.";
            }
            ?>
        </article>
        
        <!-- News & Update Panel -->
        <article class="news">
            <div class="title-panel"><h2>Upload News Panel</h2></div>
            <article class="newsWrapper">
                <div class="uploadContainer">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group">
                            <input type="file" name="upload" id="upload" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="title" id="title" placeholder="Insert Title" required>
                        </div>
                        <div class="form-group">
                            <textarea name="uploadText" class="uploadText" placeholder="Insert Content" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit">
                        </div>
                    </form>
                </div>
            </article>

            <div class="title-panel viewPanel"><h2>View News Panel</h2></div>
            <article class="newsWrapper viewWrapper">
                <?php
                // Fetch and display existing news
                $SQL_news = "SELECT * FROM news";
                $news_result = mysqli_query($condb, $SQL_news);
                if (mysqli_num_rows($news_result) > 0) {
                    while ($row = mysqli_fetch_assoc($news_result)) {
                        echo '<div class="viewContainer">';
                        // Display image if path is not empty
                        if (!empty($row["image"])) {
                            echo '<img src="' . htmlspecialchars($row["image"]) . '" class="viewImage">';
                        }
                        echo '<h3>' . htmlspecialchars($row["title"]) . '</h3>';
                        echo '<p class="viewText">' . htmlspecialchars($row["content"]) . '</p>';
                        echo '<form method="post" action="admin/user.php">';
                        echo '<input type="hidden" name="newsID" value="' . $row["newsID"] . '">';
                        echo '<button type="submit" class="deleteBtn">Delete</button>';
                        echo '</form>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No news available.</p>';
                }
                ?>
            </article>
        </article>


        <article class="placeWrapper">
    <?php
    # Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        # Collect Place's Data
        $place_name = mysqli_real_escape_string($condb, $_POST['title']);
        $place_description = mysqli_real_escape_string($condb, $_POST['description']);
        $place_address = mysqli_real_escape_string($condb, $_POST['address']);
        $place_date = mysqli_real_escape_string($condb, $_POST['date']);

        # Check if data is filled
        if (empty($place_name) || empty($place_description) || empty($place_address) || empty($place_date)) {
            echo "<script>alert('Please complete the form'); window.history.back();</script>";
            exit;
        }

        # Save place data using prepared statements
        $stmt = $condb->prepare("INSERT INTO activity (title, description, address, date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $place_name, $place_description, $place_address, $place_date);

        # Command sign up success or failed
        if ($stmt->execute()) {
            echo "<script>alert('Submit Successfully!'); window.history.back();</script>";
        } else {
            echo "<script>alert('Submit Failed!'); window.history.back();</script>";
        }

        $stmt->close();
    }
    ?>

    <!-- Place Panel -->
    <form method="post" action="admin/user.php">
        <!-- Place Name -->
        <div class="box-title input-box">
            <label for="title">Place Name</label>
            <input type="text" name="title" id="title" class="input-title" required>
        </div>
        <!-- Description -->
        <div class="box-desc input-box">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="input-desc" required>
        </div>
        <!-- Address -->
        <div class="box-address input-box">
            <label for="address">Place Address</label>
            <input type="text" name="address" id="address" class="input-address" required>
        </div>
        <!-- Date -->
        <div class="box-date input-box">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="input-date" required>
        </div>
        <!-- Submit Button -->
        <div class="box-title input-box">
            <input type="submit" class="submit-btn" value="Submit">
        </div>
    </form>
</article>




















        <!-- Feedback Panel -->
        <div class="feedbackPanel">
    <div class="title-panel"><h2>Feedback Panel</h2></div>
    <div class="feedbackWrapper">
        
        <!-- Display Feedback -->
        <?php
        // Delete feedback if form submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['FeedbackID'])) {
            $feedbackID = $_POST['FeedbackID'];
            $SQL_feedback = "DELETE FROM feedback WHERE FeedbackID = ?";
            if ($stmt = $condb->prepare($SQL_feedback)) {
                $stmt->bind_param("i", $feedbackID);
                if ($stmt->execute()) {
                    echo "<script>alert('Feedback deleted successfully');</script>";
                } 
                else {
                    echo "<script>alert('Error deleting feedback');</script>";
                }
                $stmt->close();
            }
        }
        // Query to retrieve feedback data from the database
        $SQL_feedback = "SELECT * FROM feedback";
        $feedback_result = mysqli_query($condb, $SQL_feedback);
        ?>
            <!-- Feedback Panel -->
            <article class="feedbackWrapper block">
                <?php
                if (mysqli_num_rows($feedback_result) > 0) {
                    echo "<div class='info'>";
                    while($row = mysqli_fetch_assoc($feedback_result)) {
                        echo "<div class='feedbackContainer'>";
                        echo "</div>";
                    }
                    echo "</div>";
                } else {
                    echo "No feedback found.";
                }
                ?>
            </article>
    </section>
</section>
<?php mysqli_close($condb); ?>
</body>
</html>
