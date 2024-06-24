<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the user is logged in
    session_start();
    if (!isset($_SESSION['register_vol']) || $_SESSION['register_vol'] !== true) {
        echo "<script>alert('Please log in first'); window.location.href = 'signinVol.php';</script>";
        exit();
    }

    if (!empty($_POST)) {
        $donor_email = mysqli_real_escape_string($condb, $_POST['email']);
        $donor_item  = mysqli_real_escape_string($condb, $_POST['donateType']);
        $donor_desc  = mysqli_real_escape_string($condb, $_POST['item_description']);

        if (empty($donor_email) || empty($donor_item)) {
            echo "<script>alert('Please complete the form'); window.history.back();</script>";
            exit();
        }

        // Get volunteer name and password from session
        if (!isset($_SESSION['user_vol']['name']) || !isset($_SESSION['user_vol']['password'])) {
            echo "<script>alert('Session data missing. Please log in again.'); window.location.href = 'signinVol.php';</script>";
            exit();
        }

        $volunteer_name = $_SESSION['user_vol']['name'];
        $volunteer_password = $_SESSION['user_vol']['password'];

        // Verify that the volunteer name and password exist in the volunteer table
        $volunteer_check = $condb->prepare("SELECT VolunteerID FROM volunteer WHERE name = ? AND password = ?");
        $volunteer_check->bind_param("ss", $volunteer_name, $volunteer_password);
        $volunteer_check->execute();
        $volunteer_check->store_result();

        if ($volunteer_check->num_rows > 0) {
            $volunteer_check->bind_result($volunteer_id);
            $volunteer_check->fetch();

            // Save donor data using prepared statements
            $SQL_stmt = $condb->prepare("INSERT INTO donor (email, item_type, description, vol_ID) VALUES (?, ?, ?, ?)");
            $SQL_stmt->bind_param("sssi", $donor_email, $donor_item, $donor_desc, $volunteer_id);

            // Command sign up success or failed
            if ($SQL_stmt->execute()) {
                echo "<script>alert('Donation Successfully Registered!'); window.location.href = 'index.php';</script>";
            } else {
                echo "<script>alert('Donation Registration Failed!'); window.history.back();</script>";
            }
            $SQL_stmt->close();
        } else {
            echo "<script>alert('Invalid volunteer credentials!'); window.history.back();</script>";
        }
        $volunteer_check->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OneCare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CssFiles/donor.css"> 
</head>
<body>
    <section class="main">
        <!-- Include Header Section -->
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

    <?php
    include 'connect.php';
    // Query to get counts
    $query = "SELECT COUNT(*) AS donor_count FROM donor";
    $result = mysqli_query($condb, $query);
    if ($result) {
        $counts = mysqli_fetch_assoc($result);
        $total_count = $counts['donor_count'];
        }
        else {
            echo "Error: " . mysqli_error($condb);
        }    
        // Close the connection
        mysqli_close($condb);
    ?>


            <!-- Statistic Section -->
            <section class="stastistic-section">
                <article class="statistic-content">
                    <div class="container-A">
                        <article class="info">
                            <h1>Statistic Donation</h1>
                            <p>Discover the heart and soul behind OneCare, your go-to destination for comprehensive 
                                healthcare solutions and support services. In this space, we provide you 
                                with an overview of who we are, what we stand for, and our mission to create meaningful 
                                change and improve the lives of individuals and communities around Melacca. 
                                Join us on our journey to a healthier, happier Melacca.
                            </p>
                        </article>
                        <article class="bx-content">
                            <div class="b">
                                <div class="one bxColor"><h3><?php echo $total_count ?></h3></div>
                                <p>Total Donation</p>
                            </div>
                        </article>
                    </div>
                    <div class="container-B">
                        <div class="bgImage">
                            <div><img src="media/stats.png" alt="" id="person"></div>
                        </div>
                    </div>
                </article>
            </section>

        <!-- Donation Form Section -->
        <section class="DonationSection">
            <form action="donor.php" method="post">
                <article class="ColOne">
                    <div class="containerOne">
                        <h1>Let's make a donation!</h1>
                        <p>With your donation, we can develop a strong society for our future.
                            Your donation can change someone's life.
                        </p>
                    </div>
                </article>
                <!-- Form -->
                <article class="ColTwo">
                    <div class="container box1">
                        <div class="Row">
                            <h2>Fill the form to make donation</h2>
                        </div>
                        <div class="Row">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="Row">
                            <label for="donateType">Donation Type</label>
                            <select id="donateType" name="donateType" required>
                                <option value="Clothing">Clothing</option>
                                <option value="Household goods">Household goods</option>
                                <option value="School supplies">School supplies</option>
                                <option value="Books">Books</option>
                                <option value="Toys">Toys</option>
                            </select>
                        </div>
                    </div>
                    <div class="container box2">
                        <div class="Row">
                            <label for="item_description">Item Description</label>
                            <textarea id="item_description" name="item_description" required></textarea>
                        </div>
                        <div class="Row">
                            <button class="Btn" type="submit">Submit</button>
                        </div>
                    </div>
                </article>
            </form>
        </section>
        
        <!-- Feedback Section -->
         <div class="columnInfo volunteer">
            <section class="columnWrapper volunteer-section">
                <h1>Tell us your feedback here</h1>
                <br>
                <p>Welcome to OneCare, where we're dedicated to making a difference in Melacca. Join us in empowering our community through volunteering and support. Together, we can create positive change.</p>
                <br>
                <button class="Btn-Dark B-Feedback"><a href="feedback.php" id="link">Tell Us</a></button>
            </section>
        </div>


        <!-- Include Footer Section -->
        <?php include 'footer.php'; ?>
</body>
</html>