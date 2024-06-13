<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $phone = htmlspecialchars(strip_tags(trim($_POST['phone'])));
    $address = htmlspecialchars(strip_tags(trim($_POST['address'])));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $item_type = htmlspecialchars(strip_tags(trim($_POST['donateType'])));
    $item_description = htmlspecialchars(strip_tags(trim($_POST['item_description'])));

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["item_picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is an actual image or fake image
    $check = getimagesize($_FILES["item_picture"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["item_picture"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["item_picture"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["item_picture"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Insert data into the database
    if ($uploadOk == 1 && $email) {
        $sql = "INSERT INTO donor (name, phone, address, email, item_type, item_description, item_picture) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("sssssss", $name, $phone, $address, $email, $item_type, $item_description, $target_file);

        if ($stmt->execute()) {
            echo "<script>alert("New record created successfully");</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid input data.";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donation Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CssFiles/donor.css"> 
</head>
<body>
    <section class="main">
        <!-- Header Section -->
        <?php include 'header.php'; ?> 
         
        <!-- Intro Section -->
        <article class="intro-Content">
            <section class="intro">
                <h1>Transform Lives<br><span>Your Donation Makes a World of Difference</span></h1>
                <br>
                <p>Donations greatly impact the poor in Melaka by providing essential resources like food, clean water, education, and healthcare.
                   These contributions help families overcome daily struggles, ensure children can attend school, and offer adults necessary medical care.
                    By supporting local charities, donors empower individuals to break the cycle of poverty and improve their quality of life.
                </p>
            </section>
            <section class="introImage">
                <img src="media/donation.png" alt="Intro-illustration">
            </section>
        </article>
    </section>
    
    <section class="DonationSection">
        <form action="donor.php" method="post" enctype="multipart/form-data">
            <article class="ColOne">
                <div class="containerOne">
                    <h1>Let's make a donation!</h1>
                    <p>With your donation, we can develop a strong society for our future.
                        Your donation can change someone's life.
                    </p>
                </div>
            </article>
            <article class="ColTwo">
                <div class="container box1">
                    <div class="Row">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="Row">
                        <label for="phone">Phone Number</label>
                        <input type="text" id="phone" name="phone" required>
                    </div>
                    <div class="Row">
                        <label for="address">Home Address</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                    <div class="Row">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="Row">
                        <label for="donateType">Donation Type</label>
                        <select id="donateType" name="donateType" required>
                            <option value="Dry food">Dry Food</option>
                            <option value="Diapers">Diapers</option>
                            <option value="Hygiene stuff">Hygiene Stuff</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
                <div class="container box2">
                    <div class="Row">
                        <label for="item_description">Item Description</label>
                        <textarea id="item_description" name="item_description" required></textarea>
                    </div>
                    <div class="Row RowFile">
                        <label for="item_picture">Item Picture</label>
                        <input type="file" id="item_picture" name="item_picture" required>
                    </div>
                    <div class="Row">
                        <button class="Btn" type="submit">Submit</button>
                    </div>
                </div>
            </article>
        </form>
    </section>

    <!-- Feedback Section -->
    <div class="columnInfo donation">
        <section class="columnWrapper donation-section">
            <h1>Join Our OneCare Donation</h1>
            <br>
            <p>With your donations, we can develop a strong community support to our organization team member and volunteers</p>
            <br>
            <button class="Btn-Dark B-Donate"><a href="donor.php" id="link">Donate Now</a></button>
        </section>
    </div>
    
    <!-- Footer Section -->
    <?php include 'footer.php'; ?>
</body>
</html>