<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    // Redirect to login page if not logged in
    header("Location: user_login.php");
    exit();
}

// User is logged in, display the dashboard content
echo "Welcome, User now you can access " . $_SESSION["user_id"];
// Your user dashboard content goes here

echo "<a href='logout.php'>Logout</a>";
?>
