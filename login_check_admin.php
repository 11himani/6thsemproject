<?php
session_start();
include_once 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate admin credentials from the database
    $sql = "SELECT * FROM admins WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        // Error in preparing the query
        die("Error in preparing the SQL query: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Admin found, verify password
        $row = $result->fetch_assoc();
        if ($row["password"] === $password) {
            // Admin login successful
            $_SESSION["admin_id"] = $username;
            header("Location: admin_dashboard.php");
            exit();
        } else {
            // Invalid password
            echo "Invalid password.";
        }
    } else {
        // Admin not found
        echo "Admin not found.";
    }
}
?>
