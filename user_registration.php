<?php
session_start();

// Check if the user is already logged in, redirect to user dashboard if logged in
if (isset($_SESSION["user_id"])) {
    header("Location: user_dashboard.php");
    exit();
}

// Include the database configuration file
include_once 'db_config.php';

// Define variables to store error messages
$error_message = '';
$success_message = '';
// Process the user registration
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    // Check if the user with the same email already exists
    $check_sql = "SELECT id FROM usersignup WHERE email = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Email already registered
        $error_message = "The email is already registered. Please use a different email.";
    } else {
        // Insert the new user into the database
        $insert_sql = "INSERT INTO usersignup (name, email, password, phone) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bind_param("ssss", $name, $email, $password, $phone);

        if ($stmt->execute()) {
            // User registration successful, set success message
            $success_message = "Your registration is done! Now you can login.";
        } else {
            // Handle any errors that occurred during insertion
            $error_message = "Error registering user: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <style>
        /* Styling for the User Registration Form */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

h1 {
    text-align: center;
    margin: 20px 0;
}

form {
    max-width: 400px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

form label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

form input[type="text"],
form input[type="email"],
form input[type="password"] {
    width: 90%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

form input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #0056b3;
}

p {
    text-align: center;
}

p a {
    color: #007BFF;
}

p a:hover {
    text-decoration: underline;
}
</style>
    <!-- Add your CSS and other head content here -->
</head>
<link rel="stylesheet" type="text/css" href="styling.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="#">Travel Agency</a>
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="flights.php">Flights</a></li>
                <li><a href="hotels.php">Hotels</a></li>
                <li><a href="tours.php">Tours</a></li>
                <li class="right"><input type="text" placeholder="Search"></li>
                <?php
                // session_start();
                // if (isset($_SESSION["user_id"])) {
                //     // Show logout link if user is logged in
                //     echo '<li><a href="logout.php">Logout</a></li>';
                // } else {
                //     // Show login link if user is not logged in
                    echo '<li><a href="user_login.php">Login</a></li>';
                
                 // Admin login link
                 echo '<li><a href="login_admin.php">Admin Login</a></li>';
                 ?>
                
            </ul>
        </nav>

    <h1>User Registration</h1>
    <?php
    if (!empty($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    } elseif (!empty($success_message)) {
        echo "<p style='color: green;'>$success_message</p>";
    }
    ?>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" required><br>

        <input type="submit" name="register" value="Register">
    

    <p>Already have an account? <a href="user_login.php">Login here</a></p>
</form>
<br>
<br>
<footer>
    <div class="footer-content">
        <!-- Quick Links Column -->
        <div class="footer-column">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="flights.php">Flights</a></li>
                <li><a href="hotels.php">Hotels</a></li>
                <li><a href="tours.php">Tours</a></li>
            </ul>
        </div>

        <!-- Destinations Column -->
        <div class="footer-column">
            <h3>Destinations</h3>
            <ul>
                <li><a href="kathmandu.php">Kathmandu</a></li>
                <li><a href="chiwan.php">Chitwan</a></li>
                <li><a href="pokhara.php">Pokhara</a></li>
                <!-- Add more destinations as needed -->
            </ul>
        </div>

        <!-- Contact Column -->
        <div class="footer-column">
            <h3>Contact Us</h3>
            <p>Email: thapahimani123@gmail.com</p>
            <p>Phone: 0912481005</p>
        </div>

        <!-- Follow Us Column -->
        <div class="footer-column">
            <h3>Follow Us</h3>
            <p><a href="https://www.facebook.com/travelagency" target="_blank">Facebook</a></p>
            <p><a href="https://www.instagram.com/travelagency" target="_blank">Instagram</a></p>
        </div>
    </div>

    <!-- Copyright and additional links -->
    <div class="footer-bottom">
        <p>&copy; 2023 Travel Agency. All rights reserved.</p>
    </div>
</footer>
            </body>
            </html>