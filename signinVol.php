<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="CssFiles/signinVol.css">
</head>
<body>
    <section class="loginSection">
        <form action="#">
            <div class="loginForm">
                <div class="loginTitle">
                    <h2>OneCare</h2>
                    <h1>Welcome Back!</h1>
                    <p>Enter the fields below to login to your account.</p>
                </div>
                <div class="RowOne RowInput">
                    <label for="username">Full Name</label>
                    <input type="text" id="username">
                </div>
                <div class="RowTwo RowInput">
                    <label for="password">Password</label>
                    <input type="password" id="password">
                </div>

                <!-- Error Section -->
                <div class="Error">
                    <p id="errorText"></p>
                </div>
                <!------------------->

                <div class="RowThree">
                    <button class="signinBtn Btn"><a href="#" id="link">Sign In</a></button>
                    <button class="signinReceiver Btn"><a href="#" id="link">Sign In as Receiver</a></button>
                </div>
                <div class="RowFour">
                    <p><a href="#" id="link">I forgot my password</a></p>
                </div>
                <div class="RowFive">
                    <button class="backBtn Btn"><a href="#" id="link">Back</a></button>
                </div>
                <div class="RowSix">
                    <p>Don't have an account yet? <span><a href="signupVol.php" id="link">Sign Up</a></span></p>
                </div>
            </div>
        </form>
    </section>
    <script src="Javascript/register.js"></script>
</body>
</html>
