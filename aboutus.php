<!DOCTYPE html>
<html lang="en">
    <head>
        <title>OneCare</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CssFiles/about.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    </head>
    <body>
        <!-- Intro Section -->
        <section class="aboutSection">
            <!-- Header Section -->
            <?php include 'header.php'; ?>

            <article class="intro-Content">
                <section class="intro">
                    <h2>About Us</h2>
                    <h1>A solid team driving a <span id="introTitle">dream</span></h1>
                    <br>
                    <p>Let's tackle poverty in Malacca by providing resources and 
                        raising awareness through informative content and 
                        infographics, with a platform for volunteers to 
                        support those in need.
                    </p>
                </section>
                <section class="introImage">
                    <img src="media/aboutUs.png" alt="Intro-illustration">
                </section>
            </article>
        </section>

        <section class="ourPurpose">
            <div class="PurposeWrapper">
                <div class="PurposeOne Purpose">
                    <h1>Our History</h1>
                    <p>When we started Codecademy, our goal was to give anyone in the
                        world the ability to learn the skills they'd need to succeed in 
                        the 21st century. We set out to create a new, interactive way of 
                        learning — making it engaging, flexible, and accessible for as many 
                        people as possible. Since then, we have helped millions of people 
                        worldwide unlock modern technical skills and reach their full 
                        potential through code.
                    </p>
                </div>
                <div class="PurposeTwo Purpose">
                    <h1>Our Mission</h1>
                    <p>We want to create a world where anyone can build something meaningful 
                        with technology, and everyone has the learning tools, resources, 
                        and opportunities to do so. Code contains a world of possibilities — all 
                        that's required is the curiosity and drive to learn. At Codecademy, we are 
                        committed to empowering all people, regardless of where they are in their 
                        coding journeys, to continue to learn, grow, and make an impact on the world 
                        around them.
                    </p>
                </div>
            </div>
        </section>

        <section class="gallerySection">
  <div class="galleryWrapper">
    <div class="galleryTitle">
      <h2>Our Gallery</h2>
      <p>This is who we are. We are the members of the team that organised this community.</p>
    </div>
    <div class="galleryPic">
      <marquee behavior="scroll" direction="left">
        <div class="galleryItem" style="display: inline-block;">
          <img src="" alt="Gallery Image 1">
        </div>
        <div class="galleryItem" style="display: inline-block;">
          <img src="" alt="Gallery Image 2">
        </div>
        <div class="galleryItem" style="display: inline-block;">
          <img src="" alt="Gallery Image 3">
        </div>
        <div class="galleryItem" style="display: inline-block;">
          <img src="" alt="Gallery Image 4">
        </div>
        <div class="galleryItem" style="display: inline-block;">
          <img src="" alt="Gallery Image 5">
        </div>
      </marquee>
    </div>
  </div>
</section>
        
        <!-- Documentry Section -->
        <Section class="documentSection">
            <div class="documentWrapper">
                <div class="DocColumn">
                    <div class="Document">
                        <h1>Test</h1>
                    </div>
                </div>
                <div class="DocColumn">
                    <div class="Document">
                    <h1>Test</h1>
                    </div>
                </div>
                <div class="DocColumn">
                    <div class="Document">
                    <h1>Test</h1>
                    </div>
                </div>
            </div>
        </Section>

        <!-- Team Member Section -->
        <section class="teamSection">
            <div class="teamWrapper">
                <div class="teamTitle">
                    <h1>Meet the people behind OneCare</h1>
                    <p>At OneCare, our team consists of knowledge, working together 
                        to deliver the best solutions for our community.
                    </p>
                </div>
                <div class="teamPic">
                    <div class="members">
                        <img src="media/imran.png" alt="Imran's picture">
                        <div class="Role">
                            <p>Imran <br> Project Manager</p>
                        </div>
                    </div>
                    <div class="members">
                        <img src="media/fudhail.png" alt="Fudhail's picture">
                        <div class="Role">
                            <p>Fudhail <br> Front-End Developer</p>
                        </div>
                    </div>
                    <div class="members">
                        <img src="media/danish.png" alt="Danish's picture">
                        <div class="Role">
                            <p>Danish <br> Designer</p>
                        </div>
                    </div>
                    <div class="members">
                        <img src="media/irwan.png" alt="Irwan's picture">
                        <div class="Role">
                            <p>Irwan <br> Back-End Developer</p>
                        </div>
                    </div>
                    <div class="members">
                        <img src="media/nazhan.png" alt="Nazhan's picture">
                        <div class="Role">
                            <p>Nazhan <br> Content Specialist</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Promote Section -->
         <section class="promoteSection">
            <div class="promoWrapper">
                <div class="promoContainer">
                    <div class="PromoteBox1 PromoteBox">
                        <h2>We're in the news sometimes</h2>
                        <p>Maybe more than sometimes!</p>
                        <a href="#" class="link linkOne">Check out our news & updates</a>
                    </div>
                </div>
                <div class="promoContainer">
                    <div class="PromoteBox2 PromoteBox">
                        <h2>We have volunteering openings all over Melacca</h2>
                        <p>We're always looking for people help us deliver an even 
                            better volunteer community to reduce poverty in Malacca
                        </p>
                        <a href="#" class="link linkTwo">Join Us</a>
                    </div>
                </div>
            </div>
         </section>

        <!-- Footer Section -->
        <?php include 'footer.php'; ?>
    </body>
</html>
