<!-- PHP Section -->
<?php
# include connect file
include 'connect.php';

# Test if data POST that sent from the sign up form
if (!empty($_POST)) {
    $vol_name     = mysqli_real_escape_string($condb, $_POST['username']);
    $vol_password = mysqli_real_escape_string($condb, $_POST['password']);
    $vol_phone    = mysqli_real_escape_string($condb, $_POST['phoneNumber']);
    $vol_age      = mysqli_real_escape_string($condb, $_POST['age']);

    # Test if data has been filled
    if (empty($vol_name) or empty($vol_password) or empty($vol_phone) or empty($vol_age)) {
        die("<script>alert('Please complete the form');
        window.history.back();</script>");
    }

    # Save volunteer data using prepared statements
    $stmt = $condb->prepare("INSERT INTO volunteer (name, password, phone, age) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $vol_name, $vol_password, $vol_phone, $vol_age);

    # Command sign up success or failed
    if ($stmt->execute()) {
        $_SESSION['register_vol'] = true;
        echo "<script>alert('Sign Up Successfully!');
        window.location.href = 'index.php';</script>";
    } else {
        $_SESSION['register_vol'] = false;
        echo "<script>alert('Sign Up Failed!');
        window.history.back();</script>";
    }    

    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>OneCare</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="CssFiles/signupVol.css">
</head>
<body>
    <!------ Javascript Section -------->
    <script src="Javascript/signPage.js"></script>

    <section class="SignUpSection">
        <form action="signupVol.php" method="POST">
            <div class="SignUpForm">
                <div class="SignUpTitle">
                    <h2>OneCare</h2>
                    <h1>Let's Get Started!</h1>
                    <p>Enter the fields below to join the community.</p>
                </div>
                <div class="RowOne RowInput">
                    <label for="username">Full Name</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="RowTwo RowInput">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="RowThree">
                    <div class="ColOne ColBox">
                        <label for="phone">Phone Number</label>
                        <input type="text" id="phoneNumber" name="phoneNumber" required> 
                    </div>
                    <div class="ColTwo ColBox">
                        <label for="age">Age</label>
                        <input type="number" id="age" name="age" required>
                    </div>
                </div>

                <!-- Error Section -->
                <div class="Error">
                    <p id="errorText"></p>
                </div>
                <!------------------->

                <div class="RowFour">
                    <button type="submit" class="signupBtn Btn">Sign Up</button>
                    <button class="signinReceiver Btn"><a href="signupR.php" id="link">Sign Up as Receiver</a></button>
                </div>
                <div class="RowSix">
                    <button class="backBtn Btn"><a href="index.php" id="link">Back</a></button>
                </div>
                <div class="RowSeven">
                    <p>Already have an account? <span><a href="signinVol.php" id="link">Sign In</a></span></p>
                </div>
            </div>
        </form>
    </section>
</body>
</html>
