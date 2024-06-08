<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OneCare</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CssFiles/index.css">
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
                <h1>Welcome to the<br><span id="introTitle">OneCare</span></h1>
                <br>
                <p>This is temporary text in a single paragraph. Perhaps it will be
                    change soon before launch the websites. Thank you. 
                    This project will be the best system in UTeM.
                </p>
                <button class="BtnStart">Get Started</button>
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
                <p>This text might be change soon. Example of text position. To learn more
                    please refer the programmer</p>
            </div>
            <div class="box" id="box-2">
                <h2>News</h2>
                <p>This text might be change soon. Example of text position. To learn more
                    please refer the programmer</p>
            </div>
            <div class="box" id="box-3">
                <h2>Feedback</h2>
                <p>This text might be change soon. Example of text position. To learn more
                    please refer the programmer</p>
            </div>
        </article>
    </div>

    <!-- About Us Section -->
    <section id="aboutus">
        <div id="content">
            <section id="container-A">
                <article id="info">
                    <h1>Know about e-learner Learning Platform</h1>
                    <p>This is a temporary text for this paragraph. Perhaps it will be
                        change soon once the copy writer make a new one. 
                        Stay tune for our first website.</p>
                </article>
                <article class="bx-content">
                    <div class="bx-one bxAbout">
                        <div class="one bxColor"><h3>4M+</h3></div>
                        <p>Students</p>
                    </div>
                    <div class="bx-two bxAbout">
                        <div class="two bxColor"><h3>4M+</h3></div>
                        <p>Active Courses</p>
                    </div>
                    <div class="bx-three bxAbout">
                        <div class="three bxColor"><h3>4M+</h3></div>
                        <p>Free Courses</p>
                    </div>
                </article>
                <button class="btn-about">Learn More</button>
            </section>
            <section id="container-B">
                <div class="bgImage">
                    <div><img src="media/profile.jpg" alt="" id="person"></div>
                </div>
            </section>
        </div>
    </section>

    <!-- Donation Section -->
    <div id="donation">
        <section id="donation-section">
            <h1>Join Our OneCare Donation</h1>
            <br>
            <p>With your donations, we can develop a strong community support to our organization team member and volunteers</p>
            <br>
            <button id="btn-donate">Donate Now</button>
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
                    <p>Encourages community involvement and support for those in need.</p>
                </div>
            </div>
            <div class="benefits-box2 boxBene">
                <div class="box1Title TitleBene">
                    <h3>Efficiency</h3>
                </div>
                <div class="beneText">
                    <p>Streamlines the process of connecting volunteers and aid recipients.</p>
                </div>
            </div>
            <div class="benefits-box3 boxBene">
                <div class="box1Title TitleBene">
                    <h3>Scalability</h3>
                </div>
                <div class="beneText">
                    <p>Can potentially scale to serve larger communities or regions.</p>
                </div>
            </div>
            <div class="benefits-box4 boxBene">
                <div class="box1Title TitleBene">
                    <h3>Transparency</h3>
                </div>
                <div class="beneText">
                    <p>Provides a transparent platform where donors can see the impact of their contributions.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Volunteer Section -->
    <div id="volunteer">
        <section id="volunteer-section">
            <h1>Join us to unlock opportunities in fighting poverty.</h1>
            <br>
            <p>Welcome to OneCare, where we're dedicated to making a difference in Melaka. Join us in empowering our community through volunteering and support. Together, we can create positive change.</p>
            <br>
            <button id="btn-volunteer">Join Us</button>
        </section>
    </div>
    
    <!-- News Section -->
    <section class="news">
        <div class="NewsColumn">
            <article class="NewsOne">
                <div class="NewsTitle">
                    <h3>News & Update</h3>
                    <p>Get the latest news and updates from OneCare, including our impact and 
                        community initiatives. Join us in making a difference!
                    </p>
                </div>
                <div class="NewsBtn">
                    <button class="NewsButton">Learn More</button>
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

<!-- Notes: -->
<!-- 1. Need to make the header responsive to devices such as Phone, Tablet and Laptop -->
<!-- 2. Have to make buttons and any links consistence in styling. -->