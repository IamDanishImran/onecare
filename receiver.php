<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>OneCare Receiver</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CssFiles/receiver.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <!-- Main Section -->
    <section class="main">
        <!-- Header Section -->
        <?php include 'header.php'; ?>

        <!-- Intro Section -->
        <article class="intro-Content">
            <section class="intro">
                <h1>Welcome to the<br><span id="introTitle">OneCare Receiver</span></h1>
                <br>
                <p>As a receiver, you have access to various aids and support from our community. Thank you for being a part of OneCare.</p>
                <button class="BtnStart">Get Started</button>
            </section>
            <section class="introImage">
                <img src="media/receiver.png" alt="Receiver-illustration">
            </section>s
        </article>
    </section>

    <!-- Boxes Section -->
    <section class="boxes">
        <div class="boxGroup">
            <div class="box">
                <h2>Do you need basic necessities?</h2>
                <p>(Clothing, Food, Water, Shelter, Healthcare, Sanitation, Education, Safety, Utilities)</p>
            </div>
            <div class="box">
                <h2>Need manpower assistance?</h2>
                <p>(Flood relief, Fire incidents, Cleaning)</p>
            </div>
        </div>
        <div class="boxGroup single">
            <div class="box">
                <h2>Request Aid</h2>
                <form class="aid-form">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" required>
                    <label for="aid-type">Type of Aid Needed:</label>
                    <select id="aid-type" name="aid-type" required>
                        <option value="necessities">Basic Necessities</option>
                        <option value="manpower">Manpower Assistance</option>
                    </select>
                    <label for="details">Details:</label>
                    <textarea id="details" name="details" rows="4" required></textarea>
                    <button type="submit" class="BtnStart">Submit</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <?php include 'footer.php'; ?>
</body>
</html>
