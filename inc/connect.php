<?php
$servername = "localhost";
$username = "insert username here";
$password = "insert password here";
$dbname = "insert_db here";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
