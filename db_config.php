<?php
$host = "localhost"; // Database host (usually "localhost" for local development)
$db_user = "root"; // Replace with the database username
$db_pass = ""; // Replace with the database password
$db_name = "Travel"; // Use your actual database name here, in this case, "ota"

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
