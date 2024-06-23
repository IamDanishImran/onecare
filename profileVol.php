<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Dashboard</title>
    <link rel="stylesheet" href="CssFiles/profileVol.css">
</head>
<body>
    <section class="dashboard">
        <div class="main">
            <header class="profile-header">
                <h1>Profile Dashboard</h1>
                <div class="link">
                    <a href="index.php">Return</a>
                    <a href="logout.php">Logout</a>
                </div>
            </header>

            <?php
                session_start();
                include 'connect.php';

                if (isset($_SESSION['user'])) {
                    $user_vol = $_SESSION['user'];
                    // Output user information in a table row
                    $user_vol["name"]; $user_vol["password"]; $user_vol["address"]; $user_vol["phone"]; $user_vol["age"]; $user_vol["work"];
                }
            ?>

            <!-- User Information Panel -->
            <div class="infoTitle"><h2>User Information</h2></div>
            <section class="user-info">
                <article class="infoWrapper">
                    <div class="infoBox">
                        <h3 class="info">Name: &nbsp</h3><p class="name info"><?php echo htmlspecialchars($user_vol["name"]); ?></p>
                    </div>
                    |
                    <div class="infoBox">
                        <h3 class="info">Address: &nbsp</h3><p class="address info"><?php echo htmlspecialchars($user_vol["address"]); ?></p>
                    </div>
                    |
                    <div class="infoBox">
                        <h3 class="info">Phone No: &nbsp</h3><p class="phone info"><?php echo htmlspecialchars($user_vol["phone"]); ?></p>
                    </div>
                    |
                    <div class="infoBox">
                        <h3 class="info">Age: &nbsp</h3><p class="age info"><?php echo htmlspecialchars($user_vol["age"]); ?></p>
                    </div>
                    |
                    <div class="infoBox">
                        <h3 class="info">Occupation: &nbsp</h3><p class="work info"><?php echo htmlspecialchars($user_vol["work"]); ?></p>
                    </div>
                </article>
            </section>

            <section class="panels">
                <!-- Donation Panel -->
                <article class="donation-panel panelBox">
                    <div class="title"><h2>Donation</h2></div>
                    <div class="panelWrapper donation">
                        <?php ?>
                    </div>
                </article>
                <!-- Volunteering Panel -->
                <article class="volunteer-panel panelBox">
                    <div class="title"><h2>Volunteer</h2></div>
                    <div class="panelWrapper volunteer">
                        <?php ?>
                    </div>
                </article>
                <!-- Activity Panel -->
                <article class="activity-panel panelBox">
                    <div class="title"><h2>Activity</h2></div>
                    <div class="panelWrapper activity">
                        <?php ?>
                    </div>
                </article>
            </section>
        </div>
    </section>
</body>
</html>
