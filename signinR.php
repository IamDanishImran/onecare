<?php
include 'connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rec_fullname = mysqli_real_escape_string($condb, $_POST['fullname']);
    $rec_password = mysqli_real_escape_string($condb, $_POST['password']);

    if (empty($rec_fullname) || empty($rec_password)) {
        echo "<script>alert('Please fill the form')</script>";
    } else {
        $login_command = "SELECT * FROM receiver WHERE name = ? AND password = ? LIMIT 1";
        
        # prepare the SQL statement
        $stmt = mysqli_prepare($condb, $login_command);
        # Bind parameter to the prepared statement
        mysqli_stmt_bind_param($stmt, "ss", $rec_fullname, $rec_password);
        # Execute the prepared statement
        mysqli_stmt_execute($stmt);
        # Get result set from executed statement
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) == 1) {
            # Fetch the next row from the result set as an associative array
            $data = mysqli_fetch_assoc($result);
            $_SESSION['register_rec'] = true;
            $_SESSION['fullname'] = $data['name'];
            $_SESSION['password'] = $data['password'];
            echo "<script>alert('Login Success!'); window.location.href = 'index.php';</script>";
        } else {
            $_SESSION['register_rec'] = false;
            echo "<script>alert('Login Failed!'); window.history.back();</script>";
        }
    }
    mysqli_close($condb);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>OneCare</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="CssFiles/signinR.css">
</head>
<body>
    <section class="signinReceiver">
        <form action="signinR.php" method="POST">
            <article class="colOne">
                <div class="row1"><h3>OneCare</h3></div>
                <div class="row2">
                    <h1>Welcome to Family!</h1>
                    <p>Ready to access your account? Login first.</p>
                </div>
                <div class="row3">
                    <img src="media/registerR.png" alt="signin-receiver-image">
                </div>
                <div class="row4"><button class="backBtn"><a href="index.php">Back</a></button></div>
            </article>
            <article class="colTwo">
                <div class="Row">
                    <h1>Welcome Back!</h1>
                    <p>Please enter your credentials.</p>
                </div>
                <div class="input fullname">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" required>
                </div>
                <div class="input password">
                    <label for="password">Password</label>
                    <input type="password" name="password" required>
                </div>
                <div class="Wrap">
                    <button type="submit" class="Btn">Sign In</button>
                    <button class="Btn"><a href="signinVol.php">Sign In as Volunteer</a></button>
                    <p>Don't have account yet? <a href="signupR.php">Sign Up</a></p>
                </div>
            </article>
        </form>
    </section>
</body>
</html>