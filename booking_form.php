<!DOCTYPE html>
<html>
<head>
    <title>Travel Agency - Flight Booking</title>
    <style>
    /* Add your CSS styles for the booking form here */
    h1 {
        text-align: center;
        margin-top: 30px;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 20px;
        
    }
    .flight-details {
        max-width: 600px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
        margin-left: 400px;
    }

    .flight-details h2 {
        color: #007BFF;
        font-size: 24px;
        margin-bottom: 10px;
    }

    .flight-details p {
        font-size: 16px;
        margin: 5px 0;
       
    }
    form {
        max-width: 400px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin-left:470px;
    }

    form label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }
    form input[type="text"],
    form input[type="email"],
    form input[type="submit"] {
        width: 100%;
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
        

    <h1>Flight Booking</h1>
    <?php
    // Check if the flight_id is provided in the URL
    if (isset($_GET['flight_id']) && is_numeric($_GET['flight_id'])) {
        $flight_id = $_GET['flight_id'];

        // Connect to your database (Replace 'DB_HOST', 'DB_USERNAME', 'DB_PASSWORD', and 'DB_NAME' with your actual database credentials)
        $connection = mysqli_connect('LocalHost', 'hemu12', 'hemu1234', 'ota');

        // Check if the database connection was successful
        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Prepare and execute the SQL query to fetch flight details
        $query = "SELECT * FROM flights WHERE flight_id = $flight_id";
        $result = mysqli_query($connection, $query);

        // Check if the query was successful and if the flight is found
        if ($result && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            // Display the flight details and booking form
            echo "<div class='flight-details'>";
            echo "<h2>" . $row['airline'] . "</h2>";
            echo "<p><strong>Flight Number:</strong> " . $row['flight_number'] . "</p>";
            echo "<p><strong>Departure City:</strong> " . $row['departure_city'] . "</p>";
            echo "<p><strong>Arrival City:</strong> " . $row['arrival_city'] . "</p>";
            echo "<p><strong>Departure Time:</strong> " . $row['departure_time'] . "</p>";
            echo "<p><strong>Arrival Time:</strong> " . $row['arrival_time'] . "</p>";
            echo "<p><strong>Price:</strong> " . $row['price'] . "</p>";
            echo "</div>";

            // Booking form
            echo "<form method='post' action='confirm_booking.php'>";
            echo "<input type='hidden' name='flight_id' value='" . $row['flight_id'] . "'>";
            echo "<label for='passenger_name'>Passenger Name:</label>";
            echo "<input type='text' name='passenger_name' required>";
            echo "<label for='passenger_email'>Passenger Email:</label>";
            echo "<input type='email' name='passenger_email' required>";
            echo "<input type='submit' name='submit_booking' value='Confirm Booking'>";
            echo "</form>";
        } else {
            echo "<p>Flight not found.</p>";
        }

        // Close the database connection
        mysqli_close($connection);
    } else {
        echo "<p>Invalid request. Please select a valid flight to book.</p>";
    }
    ?>
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
