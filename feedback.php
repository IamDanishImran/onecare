<html>
    <head>
        <link rel="stylesheet" href="CssFiles/feedback.css"></link>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title>Feedback</title>
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
                     <form action="" class="form-1">
                        <div class="name-form">
                            <label for="fName">Full Name: </label><br>
                            <input type="text" id="fName"><br>
                        </div>
                        <div class="email-form">
                            <label for="email">Email: </label><br>
                            <input type="text" id="fName"><br>
                        </div>
                        <div class="contact-form">
                            <label for="contact">Contact: </label><br>
                            <input type="text" id="fName"><br>
                        </div>
                        <div class="message-form">
                            <label for="message">Message: </label><br>
                            <textarea id="message" placeholder="Type here your message"></textarea><br>
                        </div>
                        <div class="submit-form">
                            <button class="submitBtn-Btn">submit</button>
                        </div>
                        <div class="back-form">
                            <button class="backBtn-Btn"><a href="index.php">back</a></button>
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