<!DOCTYPE html>
<html>
<head>
    <title>Travel Agency</title>
    <style>
       

        .flight-card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 20px;
            width: calc(33.33% - 20px);
            margin-left:500px;
        }
        .flight-card h2 {
            color: #007BFF;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .flight-card p {
            font-size: 14px;
            margin: 5px 0;
        }
        .book-now-button {
            display: inline-block;
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
            transition: background-color 0.3s;
            align-items: center;
        }

        .book-now-button:hover {
            background-color: #0056b3;
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
        </nav>
    </header>

    






<?php
// search_flights.php

// Connect to your database (Replace 'DB_HOST', 'DB_USERNAME', 'DB_PASSWORD', and 'DB_NAME' with your actual database credentials)
$connection = mysqli_connect('LocalHost', 'root', '', 'Travel');

// Check if the database connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST['search'])) {
    $departure_city = $_POST['departure_city'];
    $arrival_city = $_POST['arrival_city'];

    // Perform the database query to fetch flight details
    $query = "SELECT * FROM flights WHERE departure_city = '$departure_city' OR arrival_city = '$arrival_city'";
    $result = mysqli_query($connection, $query);

    // Check if the query was successful and if flights are found
    if ($result && mysqli_num_rows($result) > 0) {
        // Display the flight details
        echo '<div class="flight-cards">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='flight-card'>";
            echo "<h2>" . $row['airline'] . "</h2>";
            echo "<p><strong>Flight Number:</strong> " . $row['flight_number'] . "</p>";
            echo "<p><strong>Departure City:</strong> " . $row['departure_city'] . "</p>";
            echo "<p><strong>Arrival City:</strong> " . $row['arrival_city'] . "</p>";
            echo "<p><strong>Departure Time:</strong> " . $row['departure_time'] . "</p>";
            echo "<p><strong>Arrival Time:</strong> " . $row['arrival_time'] . "</p>";
            echo "<p><strong>Price:</strong> " . $row['price'] . "</p>";
            // Book Now button with a link to the booking form
            echo "<a href='booking_form.php?flight_id=" . $row['flight_id'] . "' class='book-now-button'>Book Now</a>";
            echo "</div>";
        }
        echo '</div>';
    } else {
        echo "<p>No flights found for the selected criteria.</p>";
    }
}

// Close the database connection
mysqli_close($connection);
?>


        <!-- ... (existing form code) ... -->
    </form>

    
    <footer>
    <div class="footer-content">
        <!-- Quick Links Column -->
        <div class="footer-column">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="flights.php">Flights</a></li>
                <li><a href="hotels.php">Hotels</a></li>
                <li><a href="Tour.php">Tours</a></li>
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
