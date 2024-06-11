<?php
#start session
session_start();

# Destroy variable value session
session_unset();

# stop session function
session_destroy();

# Open index.php
echo "<script>window.location.href = 'index.php';</script>";
?>