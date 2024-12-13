<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION["admin_id"])) {
    // Redirect to login page if not logged in
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        
        h1 {
            color: black;
            text-align: center;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }

        .admin-button {
            display: block;
            padding: 15px 30px;
            margin: 10px;
            font-size: 18px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        
        }

        .admin-button:hover {
            background-color: #0056b3;
        }

        a.logout-link {
            display: block;
            margin-top: 20px;
            color: black;
            text-decoration: none;
            text-align: center;
            font-size:18px;
            border-radius:5px;
                }

        a.logout-link:hover {
            text-decoration: underline;
        }
    </style>
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
                
                if (isset($_SESSION["user_id"])) {
                    // Show logout link if user is logged in
                    echo '<li><a href="logout.php">Logout</a></li>';
                } else {
                    // Show login link if user is not logged in
                    echo '<li><a href="user_login.php">Login</a></li>';
                }
                 // Admin login link
                 echo '<li><a href="login_admin.php">Admin Login</a></li>';
                 ?>
                
            </ul>
        </nav>
    </header>
    <h1>Welcome, <?php echo $_SESSION["admin_id"]; ?></h1>
    <div class="button-container">
        <a class="admin-button" href="manage_flight_bookings.php">Flight Bookings</a>
        <a class="admin-button" href="manage_hotel_bookings.php">Hotel Bookings</a>
        <a class="admin-button" href="manage_tour_bookings.php">Tour Bookings</a>
        <a class="admin-button" href="manage_user_registration.php">User Registration</a>
    </div>
    <a class="logout-link" href="logout.php">Logout</a>
    <br>
<br>
<br>
<br>
<br>
<br>
<br>
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