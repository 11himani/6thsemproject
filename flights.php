<!DOCTYPE html>
<html>
<head>
    <title>Travel Agency</title>
    <style>
        /* ... (existing styles) */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            background-image: url('images/plane12.jpg'); /* Replace 'path/to/background_image.jpg' with the actual path to your background image */
            background-repeat: no-repeat;
            background-size: cover;
        }
        h1 {
            text-align: center;
            margin: 20px 0;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        form select,
        form input[type="date"],
        form input[type="submit"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        form input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
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
                session_start();
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

    <h1>Flight Search</h1>
    <form method="post" action="search_flights.php">
        <label for="departure_city">Departure City:</label>
        <select name="departure_city" required>
            <option value="Pokhara">Pokhara</option>
            <option value="Kathmandu">Kathmandu</option>
            <option value="Chitwan">Chitwan</option>
        </select>

        <label for="arrival_city">Arrival City:</label>
        <select name="arrival_city" required>
            <option value="Pokhara">Pokhara</option>
            <option value="Kathmandu">Kathmandu</option>
            <option value="Chitwan">Chitwan</option>
        </select>

        <input type="submit" name="search" value="Search Flights">
    </form>
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