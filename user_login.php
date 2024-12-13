<?php
session_start();

// Check if the user is already logged in, redirect to home page if logged in
if (isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}

// Include the database configuration file
include_once 'db_config.php';

// Process user login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user exists in the database and verify login credentials
    $login_sql = "SELECT id, name FROM usersignup WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($login_sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User exists and provided correct login credentials
        $row = $result->fetch_assoc();
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["user_name"] = $row["name"];
        $success_message = "Welcome! You can access now.";

        // Redirect to the home page
        header("Location: index.php");
        exit();
    } else {
        // Invalid login credentials
        $error_message = "Invalid email or password. Please try again.";
    }
}

?>








   

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <style>
        /* Styling for the User Login Form */
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

        /* Styling for Success Message */
        .success-message {
            text-align: center;
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }

        /* Styling for Error Message */
        .error-message {
            text-align: center;
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
    <!-- Add your CSS and other head content here -->
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
                
                    // Show login link if user is not logged in
                    echo '<li><a href="user_login.php">Login</a></li>';
                
                 // Admin login link
                 echo '<li><a href="login_admin.php">Admin Login</a></li>';
                 ?>
                
            </ul>
        
        </nav>
    </header>

    <h1>User Login</h1>
    <?php
    if (isset($error_message)) {
        echo "<p class='error-message'>$error_message</p>";
    } elseif (isset($success_message)) {
        echo "<p class='success-message'>$success_message</p>";
    }
    ?>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" name="login" value="Login">
   

    <p>Don't have an account? <a href="user_registration.php">Register here</a></p>
    </form>
 <br>
 <br>
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
            <p>Email: Bhandarihemu88@gmail.com</p>
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




