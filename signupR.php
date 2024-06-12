<!-- PHP Section -->
<?php
# include connect file
include 'connect.php';

# Test if data POST that sent from the sign up form
if (!empty($_POST)) {
    $rec_name     = mysqli_real_escape_string($condb, $_POST['username']);
    $rec_password = mysqli_real_escape_string($condb, $_POST['password']);
    $rec_address = mysqli_real_escape_string($condb, $_POST['address']);
    $rec_occupation = mysqli_real_escape_string($condb, $_POST['occupation']);
    $rec_age      = mysqli_real_escape_string($condb, $_POST['age']);
    $rec_district      = mysqli_real_escape_string($condb, $_POST['district']);
    $rec_phone    = mysqli_real_escape_string($condb, $_POST['phone']);
    $rec_salary      = mysqli_real_escape_string($condb, $_POST['salary']);

    # Test if data has been filled
    if (empty($rec_name) or empty($rec_password) or empty($rec_address) or empty($rec_occupation) or empty($rec_age) or empty($rec_district) or empty($rec_phone) or empty($rec_salary)) {
        die("<script>alert('Please complete the form');
        window.history.back();</script>");
    }

    # Save volunteer data using prepared statements
    $stmt = $condb->prepare("INSERT INTO receiver (name, password, address, occupation, age, district, phone, salary) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssissd", $rec_name, $rec_password, $rec_address, $rec_occupation, $rec_age, $rec_district, $rec_phone, $rec_salary);

    # Command sign up success or failed
    if ($stmt->execute()) {
        $_SESSION['register_rec'] = true;
        echo "<script>alert('Sign Up Successfully!');
        window.location.href = 'index.php';</script>";
    } else {
        $_SESSION['register_rec'] = false;
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
    <link rel="stylesheet" href="CssFiles/signupR.css">
</head>
<body>
    <section class="signupReceiver">
        <form action="signupR.php" method="POST">
            <article class="colOne">
                <div class="row1"><h3>OneCare</h3></div>
                <div class="row2">
                    <h1>Great to see you here!</h1>
                    <p>Join our community by signing up first.</p>
                </div>
                <div class="row3">
                <img src="media/registerR.png" alt="signup-receiver-image">
                </div>
                <div class="row4"><button class="backBtn"><a href="index.php">Back</a></button></div>
            </article>
            <article class="colTwo">
                <div class="Row">
                    <h1>Let's Get Started!</h1>
                    <p>Enter the fields below to join the community</p>
                </div>
                <div class="input fullname">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="username"> <!-- Change to username -->
                </div>
                <div class="input password">
                    <label for="password">Password</label>
                    <input type="password" name="password"> <!-- Change input type to password -->
                </div>
                <div class="input address">
                    <label for="address">Home Address</label>
                    <input type="text" name="address">
                </div>
                <div class="input occupation">
                    <label for="occupation">Occupation</label>
                    <input type="text" name="occupation">
                </div>
                <!-- Wrapper -->
                <div class="Wrapper One">
                    <div class="input age">
                        <label for="age">Age</label>
                        <input type="number" name="age">
                    </div>
                    <div class="input district">
                        <label for="district">District</label>
                        <select name="district" id="district">
                            <option value="Ayer Keroh">Ayer Keroh</option>
                            <option value="Bukit Baru">Bukit Baru</option>
                            <option value="Bandar Melaka">Bandar Melaka</option>
                            <option value="Batu Berendam">Batu Berendam</option>
                            <option value="Paya Rumput">Paya Rumput</option>
                            <option value="Tanjung Kling">Tanjung Kling</option>
                            <option value="Ujong Pasir">Ujong Pasir</option>
                            <option value="Klebang">Klebang</option>
                            <option value="Bukit Katil">Bukit Katil</option>
                            <option value="Durian Tunggal">Durian Tunggal</option>
                            <option value="Peringgit">Peringgit</option>
                            <option value="Pekan Alor Gajah">Pekan Alor Gajah</option>
                            <option value="Masjid Tanah">Masjid Tanah</option>
                            <option value="Lubok China">Lubok China</option>
                            <option value="Rembia">Rembia</option>
                            <option value="Durian Tunggal">Durian Tunggal</option>
                            <option value="Sungai Udang">Sungai Udang</option>
                            <option value="Selandar">Selandar</option>
                            <option value="Kuala Sungai Baru">Kuala Sungai Baru</option>
                            <option value="Pekan Jasin">Pekan Jasin</option>
                            <option value="Merlimau">Merlimau</option>
                            <option value="Sungai Rambai">Sungai Rambai</option>
                            <option value="Kesang">Kesang</option>
                            <option value="Asahan">Asahan</option>
                            <option value="Bemban">Bemban</option>
                        </select>
                    </div>
                </div>
                <div class="Wrapper Two">
                    <div class="input phone">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone">
                    </div>
                    <div class="input salary">
                        <label for="salary">Salary</label>
                        <input type="text" name="salary">
                    </div>
                </div>
                <div class="Wrap">
                    <button type="submit" class="Btn">Sign Up</button> <!-- Changed to type="submit" -->
                    <button class="Btn"><a href="signupVol.php">Sign Up as Volunteer</a></button>
                    <p>Already have an account? <a href="signinR.php">Sign In</a></p>
                </div>
            </article>
        </form>
    </section>
</body>
</html>
