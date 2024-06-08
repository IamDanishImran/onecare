<?php
include 'connect.php';


$name = $phone = $email = $address = "";

if (isset($_POST['autofill'])) {
    // Fetch user info from database (Assume user ID is 1 for this example)
    $userId = 1;
    $sql = "SELECT name, phone, email, address FROM donor WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $phone = $row['phone'];
        $email = $row['email'];
        $address = $row['address'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donation Form</title>
    <link rel="stylesheet" href="CssFiles/donor.css"> 
</head>
<body>
<section class="main">
        <!-- header sec-->
        <?php include 'header.php'; ?> 

        <!-- Intro Section -->
        <article class="intro-Content">
            <section class="intro">
                <h1>Welcome to the<br><span id="introTitle">OneCare</span></h1>
                <br>
                <p>This is temporary text in a single paragraph. Perhaps it will be
                    change soon before launch the websites. Thank you.  
                    This project will be the best system in UTeM.
                </p>
                <button class="BtnStart">Get Started</button>
            </section>
            <section class="introImage">
                <img src="media/teamIllustrator.png" alt="Intro-illustration">
            </section>
        </article>
    </section>

<div class="DonationSection">
    <form class="DonationForm" action="submit_donation.php" method="post" enctype="multipart/form-data">
        <div class="DonationTitle">
            <h1>Donation Form</h1>
            <p>Please fill in the details below to make a donation</p>
        </div>
        
        <div class="RowOne">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
        </div>

        <div class="RowTwo">
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
        </div>

        <div class="RowThree">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
        </div>

        <div class="RowFour">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($address); ?>">
        </div>

        <div class="RowFive">
            <label for="type_of_donation">Type of Donation:</label>
            <select id="type_of_donation" name="type_of_donation">
                <option value="dry_food">Dry Food</option>
                <option value="diapers">Diapers</option>
                <option value="hygiene_stuff">Hygiene Stuff</option>
                <option value="others">Others</option>
            </select>
        </div>

        <div class="RowSix">
            <label for="item_description">Item Description:</label>
            <textarea id="item_description" name="item_description"></textarea>
        </div>

        <div class="RowSix">
            <label for="item_picture">Item Picture:</label>
            <input type="file" id="item_picture" name="item_picture">
        </div>

        <div class="RowSeven">
            <button class="Btn" type="submit">Submit</button>
            <button class="backBtn" type="submit" name="autofill">Autofill</button>
        </div>
    </form>
</div>

</body>
</html>

<?php
$conn->close();
include 'footer.php';
?>

