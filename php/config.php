<?php
$servername = "db";
$username = "movie_user";
$password = "userpassword";
$db = "movie_booking";
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>