<?php
$name_host = "localhost";
$user_sql = "root";
$pass_sql = "abc123";
$name_db = "onecare";

$condb = mysqli_connect($name_host, $user_sql, $pass_sql, $name_db);

if (!$condb) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    # echo "Connection successful";
}

?>