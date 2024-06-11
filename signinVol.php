<?php
include 'connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vol_username = mysqli_real_escape_string($condb, $_POST['username']);
    $vol_password = mysqli_real_escape_string($condb, $_POST['password']);
    $user         = "volunteer";

    if (empty($vol_username) || empty($vol_password)) {
        echo "<script>alert('Please fill the form')</script>";
    } else {

        $login_command = "SELECT * FROM $user
                          WHERE name = ? AND password = ? LIMIT 1";
        
        $stmt = mysqli_prepare($condb, $login_command);
        mysqli_stmt_bind_param($stmt, "ss", $vol_username, $vol_password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) == 1) {
            $data = mysqli_fetch_assoc($result);
            $_SESSION['register_vol'] = true;
            $_SESSION['username'] = $data['username']; // Assuming 'username' is the correct column name for username
            $_SESSION['password'] = $data['password']; // Assuming 'password' is the correct column name for password
            echo "<script>alert('Login Success!');
                  window.location.href = 'index.php';</script>";
        } else {
            $_SESSION['register_vol'] = false;
            echo "<script>alert('Login Failed!.');
                  window.history.back();</script>";
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
    <link rel="stylesheet" href="CssFiles/signinVol.css">
</head>
<body>
    <section class="loginSection">
        <form action="signinVol.php" method="POST">
            <div class="loginForm">
                <div class="loginTitle">
                    <h2>OneCare</h2>
                    <h1>Welcome Back!</h1>
                    <p>Enter the fields below to login to your account.</p>
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
                    <button type="submit" class="signinBtn Btn">Sign In</button>
                    <button class="signinReceiver Btn"><a href="#" id="link">Sign In as Receiver</a></button>
                </div>
                <div class="RowFour">
                    <p><a href="#" id="link">I forgot my password</a></p>
                </div>
                <div class="RowFive">
                    <button class="backBtn Btn"><a href="index.php" id="link">Back</a></button>
                </div>
                <div class="RowSix">
                    <p>Don't have an account yet? <span><a href="signupVol.php" id="link">Sign Up</a></span></p>
                </div>
            </div>
        </form>
    </section>
</body>
</html>
