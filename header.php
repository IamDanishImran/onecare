<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CssFiles/header.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <header class="headerMain">
        <nav>
            <div class="logo"><h2 id="logo">OneCare</h2></div>
            <div class="navMenu">
                <ul id="nav-links">
                    <!-- PHP Session --->
                     <?php
                     session_start();
                     // Check if user is logged in
                     if (isset($_SESSION['register_vol']) && $_SESSION['register_vol'] === true) {
                        
                        echo '<li><a href="index.php">Home</a></li>
                              <li><a href="aboutus.php">About Us</a></li>
                              <li><a href="donor.php">Donations</a></li>
                              <li><a href="volunteer.php">Volunteers</a></li>
                              <li><a href="newsroom.php">News & Updates</a></li>
                              <li><a href="mailto:imran24022004@gmail.com?subject=Contact Us Inquiry">Contact Us</a></li>
                              <li><button class="btn-sign"><a href="profileVol.php">Profile</a></button></li>';
                            
                    } elseif (isset($_SESSION['register_rec']) && $_SESSION['register_rec'] === true) {

                        echo '<li><a href="index.php">Home</a></li>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li><a href="receiver.php">Receiver</a></li>
                        <li><a href="newsroom.php">News & Updates</a></li>
                        <li><a href="mailto:imran24022004@gmail.com?subject=Contact Us Inquiry">Contact Us</a></li>
                        <li><button class="btn-sign"><a href="profile.php">Profile</a></button></li>';

                    } else {

                        echo '<li><a href="index.php">Home</a></li>
                              <li><a href="aboutus.php">About Us</a></li>
                              <li><a href="donor.php">Donations</a></li>
                              <li><a href="volunteer.php">Volunteers</a></li>
                              <li><a href="newsroom.php">News & Updates</a></li>
                              <li><a href="mailto:imran24022004@gmail.com?subject=Contact Us Inquiry">Contact Us</a></li>
                              <li><button class="btn-sign"><a href="signupVol.php">Sign Up</a></button></li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Javascript Section -->
    <script src="Javascript/header.js"></script>
</body>
</html>
