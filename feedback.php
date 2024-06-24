<?php
// Include the database condb file
include 'connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $email = mysqli_real_escape_string($condb, $_POST['email']); // Assuming 'email' is the correct name in your form
    $message = mysqli_real_escape_string($condb, $_POST['message']);

    // Insert query
    $query = "INSERT INTO feedback (email, feedback) VALUES ('$email', '$message')";

    // Execute query
    if (mysqli_query($condb, $query)) {
        // Success message with JavaScript redirect
        echo "<script>alert('Feedback submitted successfully.');
              window.location.href = 'index.php';</script>";
        exit; // Ensure script execution stops after redirect
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($condb);
    }

    // Close condb
    mysqli_close($condb);
}
?>




<html>
    <head>
        <link rel="stylesheet" href="CssFiles/feedback.css"></link>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title>OneCare</title>
    </head>
    <body>
        <section class="sec-1">
            <div class="div-1">
                <img src="media/Charity-cuate.png" alt="">
            </div>
            <div class="div-2">
                <div class="div-2-form">
                    <div class="title">
                    <h1>OneCare</h1><br>
                    <h2>Feedback</h2>
                    <h3>Let us know what your comments, suggestion and ideas</h3>      
                    </div>
                    <br>
                    <form action="feedback.php" method="post">
    <div class="email-form">
        <label for="email">Email: </label><br>
        <input type="text" id="email" name="email"><br>
    </div>
    <div class="message-form">
        <label for="message">Feedback Message: </label><br>
        <textarea id="message" name="message" placeholder="Type here your message"></textarea><br>
    </div>
    <div class="submit-form">
        <button type="submit" class="submitBtn-Btn">Submit</button>
    </div>
    <div class="back-form">
        <button class="backBtn-Btn"><a href="index.php">Back</a></button>
    </div>
</form>


                </div>
            </div>
        </section>
        <script>
        $(document).ready(function() {
            $(".submitBtn-Btn").click(function() {
                alert("Your Feedback submitted")
            })
        });
        
        </script>
    </body>
</html>