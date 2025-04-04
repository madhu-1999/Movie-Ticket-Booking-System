<?php
require_once "config.php";

$query = "SELECT * FROM movies";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {
    $userData[] = $row; // Store each row in the $userData array
}

// Optionally, you can print or process the $userData array here
print_r($userData);

mysqli_close($conn); // Close the connection
?>