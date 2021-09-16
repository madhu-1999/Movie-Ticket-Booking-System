<?php
$servername = "localhost";
$username = "root";
$password = "@sAp0123";
$db = "movie_booking";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?> 