<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION["admin_id"])) {
    // Redirect to login page if not logged in
    header("Location: login_admin.php");
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
        // Handle updating of hotel bookings
        $booking_id = $_GET['id'];
        // Retrieve the booking details based on the booking ID
        $query = "SELECT * FROM hotels_bookings WHERE id = '$booking_id'";
        $hotels_result = mysqli_query($connection, $query);
        
        // Check if the query executed successfully
        if (!$hotels_result) {
            die("Error in query: " . mysqli_error($connection));
        }

        $booking = mysqli_fetch_assoc($hotels_result);
    } elseif ($_GET['action'] === 'delete' && isset($_GET['id'])) {
        // Handle deleting of hotel bookings
        $booking_id = $_GET['id'];
        // Delete the booking based on the booking ID
        $delete_query = "DELETE FROM hotels_bookings WHERE id = '$booking_id'";
        $delete_result = mysqli_query($connection, $delete_query);
        if ($delete_result) {
            echo '<p class="success">Booking deleted successfully.</p>';
        } else {
            echo '<p class="error">Failed to delete booking. Please try again later.</p>';
        }
    }
}

// Retrieve all hotel booking data from the database
$query = "SELECT * FROM hotels_bookings";
$hotels_result = mysqli_query($connection, $query);

// Check for errors in the query
if (!$hotels_result) {
    die("Error in query: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Hotel Bookings</title>
    <!-- CSS and other styles --><style>
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
      
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 50px;
            margin-left:700px;
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


        a.dashboard-link {
            display: inline-block;
            padding: 10px 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-left:600px;
        }

        /* Hover effect */
        a.dashboard-link:hover {
            background-color: #0056b3;
            text-decoration: underline;
        }
        </style>
         <link rel="stylesheet" type="text/css" href="styling.css">
    <!-- ... -->
</head>
<body>
<!-- Header and navigation -->
<!-- ... -->
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
            <div class="button-container">
    <a class="admin-button" href="manage_hotels_details.php">Hotels Deatils</a>
            </div>
    <h1>Hotel Bookings</h1>
  
    <table>
        <tr>
            <th>Booking ID</th>
            <th>Hotel ID</th>
            
            <th>Check-In Date</th>
            <th>Check-Out Date</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>Number of Guests</th>
            <th>Actions</th>
        </tr>
        <?php
        // Display all hotel bookings in a table
        while ($row = mysqli_fetch_assoc($hotels_result)) {
            echo "<tr>";
            echo "<td>" . $row['booking_id'] . "</td>";
            echo "<td>" . $row['hotel_id'] . "</td>";
            echo "<td>" . $row['check_in_date'] . "</td>";
            echo "<td>" . $row['check_out_date'] . "</td>";
            echo "<td>" . $row['guest_name'] . "</td>";
            echo "<td>" . $row['guest_email'] . "</td>";
            echo "<td>" . $row['guests'] . "</td>";
         
            echo "<td class='action-links'>";
            // Add links for update and delete actions
            echo "<a href='manage_hotel_bookings.php?action=update&id=" . $row['booking_id'] . "'>Update</a>";
            echo "<a href='manage_hotel_bookings.php?action=delete&id=" . $row['booking_id'] . "' onclick='return confirm(\"Are you sure you want to delete this booking?\");'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <a class="dashboard-link" href="admin_dashboard.php">Back to Admin Dashboard</a>
    <!-- Footer -->
    <!-- ... -->
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

<?php
// Close the database connection
mysqli_close($connection);
?>
