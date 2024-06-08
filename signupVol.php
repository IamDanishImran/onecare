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
        <form action="#">
            <div class="SignUpForm">
                <div class="SignUpTitle">
                    <h2>OneCare</h2>
                    <h1>Let's Get Started!</h1>
                    <p>Enter the fields below to join the community.</p>
                </div>
                <div class="RowOne RowInput">
                    <label for="username">Full Name</label>
                    <input type="text" id="username">
                </div>
                <div class="RowTwo RowInput">
                    <label for="password">Password</label>
                    <input type="password" id="password">
                </div>

                <div class="RowThree">
                    <div class="ColOne ColBox">
                        <label for="phone">Phone Number</label>
                        <input type="text" id="phoneNumber">
                    </div>
                    <div class="ColTwo ColBox">
                        <label for="age">Age</label>
                        <input type="number" id="age">
                    </div>
                </div>

                <!-- Error Section -->
                <div class="Error">
                    <p id="errorText"></p>
                </div>
                <!------------------->

                <div class="RowFour">
                    <button class="signupBtn Btn"><a href="#" id="link">Sign Up</a></button>
                    <button class="signinReceiver Btn"><a href="#" id="link">Sign Up as Receiver</a></button>
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
