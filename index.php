<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OneCare</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CssFiles/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  </head>
  <body>
    <!-- Main Section -->
    <section class="main">
        <!-- Header Section -->
        <?php include 'header.php'; ?>

        <!-- Intro Section -->
        <article class="intro-Content">
            <section class="intro">
                <h1>Welcome to the<br><span id="introTitle">OneCare</span></h1>
                <br>
                <p>Welcome to OneCare, where community spirit and compassion make a real difference. Our mission is to support those in need in the Malaca area by providing basic necessities, educational opportunities, and health services. Volunteering with us means making an impact, connecting with like-minded individuals, and gaining new skills. With a range of flexible opportunities, you can find the perfect way to contribute. Join OneCare today and help create a stronger, more resilient community.
                </p>
                <button class="Btn-Blue B-Start"><a href="signupVol.php" id="link">Get Started</a></button>
            </section>
            <section class="introImage">
                <img src="media/teamIllustrator.png" alt="Intro-illustration">
            </section>
        </article>
    </section>

    <!-- Boxes Section -->
    <div class="boxes">
        <article class="boxGroup">
            <div class="box">
                <h2>Community</h2>
                <p>Community brings people together, fostering connections, support, and a sense of belonging. It enriches lives, promotes collective well-being, and creates a stronger, more resilient society.</p>
            </div>
            <div class="box" id="box-2">
                <h2>News</h2>
                <p>News connects communities by keeping people informed, fostering awareness, and promoting engagement. It enriches public discourse, supports transparency, and helps create an informed, resilient society.</p>
            </div>
            <div class="box" id="box-3">
                <h2>Feedback</h2>
                <p>Your feedback helps us improve! Share your thoughts to make our website better for everyone.</p>
            </div>
        </article>
    </div>

    <!-- About Us Section -->
    <?php
    // include connect file
    include 'connect.php';
    // Query to get counts
    $query = "SELECT 
    (SELECT COUNT(*) FROM volunteer) AS volunteer_count,
    (SELECT COUNT(*) FROM receiver) AS receiver_count,
    (SELECT COUNT(*) FROM volunteer) + (SELECT COUNT(*) FROM receiver) AS total_count";
    
    $result = mysqli_query($condb, $query);
    if ($result) {
        $counts = mysqli_fetch_assoc($result);
        $volunteer_count = $counts['volunteer_count'];
        $receiver_count = $counts['receiver_count'];
        $total_count = $counts['total_count'];
    } else {
        echo "Error: " . mysqli_error($condb);
    }
    
    // Close the connection
    mysqli_close($condb);
    ?>

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
                    <p>Total Users</p>
                </div>
                <div class="bx-two bxAbout">
                    <div class="two bxColor"><h3><?php echo $volunteer_count ?></h3></div>
                    <p>Volunteers</p>
                </div>
                <div class="bx-three bxAbout">
                    <div class="three bxColor"><h3><?php echo $receiver_count ?></h3></div>
                    <p>Receivers</p>
                </div>
                </article>
                <button class="Btn-Blue B-About"><a href="aboutus.php" id="link">Learn More</a></button>
            </section>
            <section class="container-B">
                <div class="bgImage">
                    <div><img src="media/profile.jpg" alt="" id="person"></div>
                </div>
            </section>
        </div>
    </section>


    <!-- Donation Section -->
    <div class="columnInfo donation">
        <section class="columnWrapper donation-section">
            <h1>Join Our OneCare Donation</h1>
            <br>
            <p>With your donations, we can develop a strong community support to our organization team member and volunteers</p>
            <br>
            <button class="Btn-Dark B-Donate"><a href="donor.php" id="link">Donate Now</a></button>
        </section>
    </div>

    <!-- Benefits Section -->
    <section class="benefits">
        <div class="benefits-Container">
            <div class="benefits-Title">
                <h3>Benefits From Our Organization</h3>
                <p>As a caring organization dedicated to helping society, here are a few benefits of joining OneCare</p>
            </div>
            <div class="benefits-box1 boxBene">
                <div class="box1Title TitleBene">
                    <h3>Community Engagement</h3>
                </div>
                <div class="beneText">
                    <p>Join our volunteering service to engage with the community directly, making a real difference in areas like education, healthcare, and more. Find flexible opportunities that match your interests and schedule, and connect with others who share your passion for community support. Start making an impact today by becoming a volunteer and helping us build a stronger community together.</p>
                </div>
            </div>
            <div class="benefits-box2 boxBene">
                <div class="box1Title TitleBene">
                    <h3>Efficiency</h3>
                </div>
                <div class="beneText">
                    <p>Joining our volunteering service is quick and easy. Simply sign up on our website to start making a difference right away. We ensure efficiency by matching your skills and interests with meaningful opportunities. Your involvement not only benefits others but also contributes to a more effective and supportive community.</p>
                </div>
            </div>
            <div class="benefits-box3 boxBene">
                <div class="box1Title TitleBene">
                    <h3>Scalability</h3>
                </div>
                <div class="beneText">
                    <p>Joining our volunteering service is easy and scalable to fit your availability and interests. Whether you have a few hours a week or want to commit more time, there's a role for everyone. Your contributions help us expand our impact and reach more people in need, creating a positive change in our community. Sign up today to start making a difference, no matter how big or small your commitment.</p>
                </div>
            </div>
            <div class="benefits-box4 boxBene">
                <div class="box1Title TitleBene">
                    <h3>Transparency</h3>
                </div>
                <div class="beneText">
                    <p> We ensure transparency by sharing how donations are used and showcasing the impact of your efforts. You'll have access to regular updates and reports, ensuring you're always informed about our initiatives. Together, we strive for accountability and trust, making a real difference in our community.</p>
                </div>
            </div>
        </div>
    </section>
    
        <!-- Volunteer Section -->
        <div class="columnInfo volunteer">
        <section class="columnWrapper volunteer-section">
            <h1>Join us to unlock opportunities in fighting poverty.</h1>
            <br>
            <p>Welcome to OneCare, where we're dedicated to making a difference in Melacca. Join us in empowering our community through volunteering and support. Together, we can create positive change.</p>
            <br>
            <button class="Btn-Dark B-Volunteer"><a href="volunteer.php" id="link">Join Us</a></button>
        </section>
    </div>
    
    <!-- News Section -->
    <section class="news">
        <div class="NewsColumn">
            <article class="NewsOne">
                <div class="NewsTitle">
                    <h3>News & Updates</h3>
                    <p>Get the latest news and updates from OneCare, including our impact and 
                        community initiatives. Join us in making a difference!
                    </p>
                </div>
                <div class="NewsBtn">
                    <button class="Btn-Blue B-News"><a href="newsroom.php" id="link">Learn More</a></button>
                </div>
            </article>
            <article class="NewsTwo">
                    <div class="grid-item">
                        <div class="grid-panel">
                            <h3>No Events</h3>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="grid-panel">
                            <h3>No Events</h3>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="grid-panel">
                            <h3>No Events</h3>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="grid-panel">
                            <h3>No Events</h3>
                        </div>
                    </div>
            </article>
        </div>
    </section>

    <!-- Footer Section -->
    <?php include 'footer.php'; ?>
</body>
</html>