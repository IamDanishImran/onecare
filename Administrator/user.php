<? include '..\connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OneCare</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  </head>
  <body>
    <section class="dashboard">
      <!-- Navigator Section -->
       <?php include 'nav.php'; ?>
      <!-- Control Panel Section -->
      <section class="control-panel">
        <div class="title-panel"><h2>Volunteer</h2></div>
        <article class="user-volunteer block">
        <?php
// Include the connection file
include '../connect.php';

// Query to retrieve volunteer data from the database
$sql = "SELECT * FROM volunteer";
$result = mysqli_query($condb, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    echo "<div class='volunteer-info'>";
    while($row = mysqli_fetch_assoc($result)) {
      echo "<div class='volWrapper'>";
        echo "<p>ID: ".$row["VolunteerID"]. "&nbsp</p><p>|&nbsp;Name: ".$row["name"]."&nbsp</p><p>|&nbsp;Password: ".$row["password"]."</p>" . "&nbsp;<button>Drop</button>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "0 results";
}

// Close the connection
mysqli_close($condb);
?>

        </article>

        <div class="title-panel"><h2>Receiver</h2></div>
        <article class="user-receiver block">
        <?php
// Include the connection file
include '../connect.php';

// Query to retrieve volunteer data from the database
$sql = "SELECT * FROM receiver";
$result = mysqli_query($condb, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    echo "<div class='volunteer-info'>";
    while($row = mysqli_fetch_assoc($result)) {
      echo "<div class='volWrapper'>";
        echo "<p>ID: ".$row["VolunteerID"]. "&nbsp</p><p>|&nbsp;Name: ".$row["name"]."&nbsp</p><p>|&nbsp;Password: ".$row["password"]."</p>" . "&nbsp;<button>Drop</button>";
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "0 results";
}

// Close the connection
mysqli_close($condb);
?>
        </article>
      </section>
    </section>
  </body>
</html>
