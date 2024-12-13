<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION["admin_id"])) {
    // Redirect to login page if not logged in
    header("Location: admin_login.php");
    exit();
}
// Connect to the database (Replace 'DB_HOST', 'DB_USERNAME', 'DB_PASSWORD', and 'DB_NAME' with your actual database credentials)
$connection = mysqli_connect('LocalHost', 'hemu12', 'hemu1234', 'ota');

// Check if the database connection was successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
// Check if the booking ID is provided for update or delete
if (isset($_GET['action'])) {
    if ($_GET['action'] === 'update' && isset($_GET['id'])) {
        // Handle updating of tour bookings
        $booking_id = $_GET['id'];
        // Retrieve the booking details based on the booking ID
        $query = "SELECT * FROM tour_bookings WHERE id = '$booking_id'";
        $result = mysqli_query($connection, $query);
        $booking = mysqli_fetch_assoc($result);
    } elseif ($_GET['action'] === 'delete' && isset($_GET['id'])) {
        // Handle deleting of tour bookings
        $booking_id = $_GET['id'];
        // Delete the booking based on the booking ID
        $delete_query = "DELETE FROM tour_bookings WHERE id = '$booking_id'";
        $delete_result = mysqli_query($connection, $delete_query);
        if ($delete_result) {
            echo '<p class="success">Booking deleted successfully.</p>';
        } else {
            echo '<p class="error">Failed to delete booking. Please try again later.</p>';
        }
    }
}

// Check if the flight ID is provided for update or delete
if (isset($_GET['flight_action'])) {
    if ($_GET['flight_action'] === 'update' && isset($_GET['flight_id'])) {
        // Handle updating of flights
        $flight_id = $_GET['flight_id'];
        // Retrieve the flight details based on the flight ID
        $flight_query = "SELECT * FROM flights WHERE flight_id = '$flight_id'";
        $flight_result = mysqli_query($connection, $flight_query);
        $flight = mysqli_fetch_assoc($flight_result);
    } elseif ($_GET['flight_action'] === 'delete' && isset($_GET['flight_id'])) {
        // Handle deleting of flights
        $flight_id = $_GET['flight_id'];
        // Delete the flight based on the flight ID
        $delete_query = "DELETE FROM flights WHERE flight_id = '$flight_id'";
        $delete_result = mysqli_query($connection, $delete_query);
        if ($delete_result) {
            echo '<p class="success">Flight deleted successfully.</p>';
        } else {
            echo '<p class="error">Failed to delete flight. Please try again later.</p>';
        }
    }
}

// Retrieve all tour booking data from the database
$query = "SELECT * FROM tour_bookings";
$result = mysqli_query($connection, $query);

// Retrieve all flights data from the database
$flight_query = "SELECT * FROM flights";
$flight_result = mysqli_query($connection, $flight_query);
// Check if the form for adding a new flight is submitted
if (isset($_POST['add_flight'])) {
    // Get the form data
    $airline = $_POST['airline'];
    $flight_number = $_POST['flight_number'];
    
    $departure_city = $_POST['departure_city'];
   
    $arrival_city = $_POST['arrival_city'];
    $departure_time = $_POST['departure_time'];
    $arrival_time = $_POST['arrival_time'];
    $price = $_POST['price'];

    // Insert the flight data into the database
    $insert_query = "INSERT INTO flights (airline, flight_number, departure_city, arrival_city, departure_time, arrival_time, price) VALUES ('$airline', '$flight_number',' $departure_city', '$arrival_city', '$departure_time', '$arrival_time', '$price')";
    $insert_result = mysqli_query($connection, $insert_query);

}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Manage Flights</title>
    <style>
        

        h1 {
            color: black;
            text-align: center;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #f0f0f0;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #ddd;
        }

        .action-links {
            display: flex;
        }

        .action-links a {
            display: inline-block;
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .action-links a:hover {
            text-decoration: underline;
        }

        .success {
            color: #28a745;
        }

        .error {
            color: #dc3545;
        }

      /* Style for the link as a button */
a.dashboard-link {
    display: inline-block;
    padding: 10px 20px;
    
    color: black;
    text-decoration: none;
    
    font-size: 16px;
    transition: background-color 0.3s ease;
    align-items:center;
    margin-left:600px;
}

/* Hover effect */
.dashboard-link:hover {
    background-color: #0056b3;
    text-decoration: underline;
}


        form {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 20px;
            width: 400px;
            align-items: center;
            margin-left: 500px;
        }

        form label {
            display: block;
            margin-bottom: 10px;
        }

        form input[type="text"],
        form input[type="number"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form input[type="submit"] {
            display: block;
            width: 80%;
            padding: 12px;
            font-size: 18px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
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
    <?php
if (isset($_POST['add_flight'])) {
    if ($insert_result) {
        echo '<p class="success">Flight added successfully.</p>';
    } else {
        echo '<p class="error">Failed to add flight. Please try again later.</p>';
    }
}
?>
    <!-- Flights Section -->
    <h2>Flights</h2>
    <table>
        <tr>
            <th>Flight ID</th>
            <th>Airline</th>
            <th>Flight Number</th>
            <th>Departure City</th>
            <th>Arrival City</th>
            <th>Departure Time</th>
            <th>Arrival Time</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php
        // Display all flights in a table
        while ($flight_row = mysqli_fetch_assoc($flight_result)) {
            echo "<tr>";
            echo "<td>" . $flight_row['flight_id'] . "</td>";
            echo "<td>" . $flight_row['airline'] . "</td>";
            echo "<td>" . $flight_row['flight_number'] . "</td>";
            echo "<td>" . $flight_row['departure_city'] . "</td>";
            echo "<td>" . $flight_row['arrival_city'] . "</td>";
            echo "<td>" . $flight_row['departure_time'] . "</td>";
            echo "<td>" . $flight_row['arrival_time'] . "</td>";
            echo "<td>" . $flight_row['price'] . "</td>";
            echo "<td class='action-links'>";
            echo "<a href='manage_flight_bookings.php?flight_action=update&flight_id=" . $flight_row['flight_id'] . "'>Update</a>";
            echo "<a href='manage_flight_bookings.php?flight_action=delete&flight_id=" . $flight_row['flight_id'] . "' onclick='return confirm(\"Are you sure you want to delete this flight?\");'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>

   

    <!-- Add New Flight Form -->
    <h2>Add New Flight</h2>
    <form action="manage_flight_bookings.php" method="post">
        <label for="airline">Airline:</label>
        <input type="text" name="airline" id="airline" required>

        <label for="flight_number">Flight Number:</label>
        <input type="text" name="flight_number" id="flight_number" required>
        <label for="arrival_city">Departure  City:</label>
        <input type="text" name="departure_city" id="arrival_city" required>

        <label for="arrival_city">Arrival City:</label>
        <input type="text" name="arrival_city" id="arrival_city" required>

        <label for="departure_time">Departure Time:</label>
        <input type="text" name="departure_time" id="departure_time" required>

        <label for="arrival_time">Arrival Time:</label>
        <input type="text" name="arrival_time" id="arrival_time" required>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" required>

        <input type="submit" name="add_flight" value="Add Flight">
    </form>

    <a class="dashboard-link" href="admin_dashboard.php">Back to Admin Dashboard</a>
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
            
<?php
// Close the database connection
mysqli_close($connection);
?>


</body>
</html>

