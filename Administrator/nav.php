<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OneCare</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Administrator\nav.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  </head>
  <body>
    <section class="dashboard">
      <!-- Navigator Section -->
      <aside>
        <nav>
          <ul>
            <li><div class="title"><h1>OneCare</h1></div></li>
            <li><h2>Admin Dashboard</h2></li>
            <li><a href = "<?php echo $user_section ?>">Users</a></li>
            <li><a href = "<?php echo $donation_section ?>">Donation</a></li>
            <li><a href = "<?php echo $news_section ?>">News & Updates</a></li>
            <li><a href = "<?php echo $place_section ?>">Places</a></li>
            <li><a href = "<?php echo $help_section ?>">Help</a></li>
            <li id="logout"><a href="logout.php">Logout</a></li>
          </ul>
        </nav>
      </aside>
      <!-- Control Panel Section -->
      <section class="control-panel">
        <?php
        ?>
      </section>
    </section>
  </body>
</html>
