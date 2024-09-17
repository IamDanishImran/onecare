<!DOCTYPE html>
<html lang="en">
    <head>
        <title>OneCare</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CssFiles/volunteer.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>
    <body>
        <!-- Intro Section -->
        <section class="IntroSection">
            <!-- Header Section -->
            <?php
            include 'connect.php'; 
            include 'header.php'; 
            
            $query = "SELECT COUNT(*) AS volunteer_count FROM volunteer";
            $result = mysqli_query($condb, $query);
            
            if ($result) {
                $counts = mysqli_fetch_assoc($result);
                $total_count = $counts['volunteer_count'];
            } else {
                echo "Error: " . mysqli_error($condb);
            }
            ?>


            <article class="intro-Content">
                <section class="intro">
                    <h1>A solid team driving a <span id="introTitle">dream</span></h1>
                    <br>
                    <p>Let's tackle poverty in Malacca by providing resources and 
                        raising awareness through informative content and 
                        infographics, with a platform for volunteers to 
                        support those in need.
                    </p>
                </section>
                <section class="introImage">
                    <img src="media/volunteer.png" alt="Intro-illustration">
                </section>
            </article>
        </section>
        
        <!-- Section Statistics -->
        <section class="aboutus">
        <div class="content">
            <section class="container-A">
                <article class="info">
                    <h1>Know about OneCare platform</h1>
                    <p>Discover the heart and soul behind OneCare, your go-to destination for comprehensive 
                        healthcare solutions and support services. In this space, we provide you 
                        with an overview of who we are, what we stand for, and our mission to create meaningful 
                        change and improve the lives of individuals and communities around Melacca. 
                        Join us on our journey to a healthier, happier Melacca.
                    </p>
                </article>
                <article class="bx-content">
                    <div class="bx-one bxAbout">
                        <div class="one bxColor"><h3><?php echo $total_count ?></h3></div>
                        <p>Volunteers</p>
                    </div>
                    <div class="bx-two bxAbout">
                        <div class="two bxColor"><h3>0</h3></div>
                        <p>Places</p>
                    </div>
                </article>
            </section>
            <section class="container-B">
                <img src="media/stats1.png" alt="" id="stats">
            </section>
        </div>
    </section>


    <!-- Volunteering Places Section -->
     <section class="places">
        <article class="places-title">
            <div class="placesWrapper">
                <h1>Join us to unlock opportunities in fighting poverty.</h1>
                <p>Welcome to OneCare, where we're dedicated to making a difference 
                    in Melaka. Join us in empowering our community through 
                    volunteering and support. Together, we can create positive change.
                </p>
            </div>
        </article>
        <article class="places-content">
        <?php
        include 'connect.php';
        # If places for volunteering add by admin it will dispay here
        ?>
        </article>
     </section>


    <!-- Feedback Section -->
    <div class="columnInfo feedback">
        <section class="columnWrapper feedback-section">
            <h1>Tell Us your feedback.</h1>
            <br>
            <p>Welcome to OneCare, where we're dedicated to making a difference in Melacca. Join us in empowering our community through volunteering and support. Together, we can create positive change.</p>
            <br>
            <button class="Btn-Dark B-feedback"><a href="feedback.php" id="link">Tell Us</a></button>
        </section>
    </div>


        <!-- Footer Section -->
        <?php include 'footer.php'; ?>
    </body>
</html>