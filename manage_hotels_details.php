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

// Check if the form is submitted for adding new hotel details
if (isset($_POST['add_hotel'])) {
    // Retrieve data from the form
    $hotel_name = $_POST['hotel_name'];
    $location = $_POST['location'];
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $capacity = $_POST['capacity'];

    // Perform validation on the data (e.g., check for required fields, data formats, etc.)

    // Insert the data into the database
    $insert_query = "INSERT INTO hotels (name, location, room_type, price, capacity) VALUES ('$hotel_name', '$location', '$room_type', '$price', '$capacity')";
    $insert_result = mysqli_query($connection, $insert_query);
    if ($insert_result) {
        echo '<p class="success">Hotel details added successfully.</p>';
    } else {
        echo '<p class="error">Failed to add hotel details. Please try again later.</p>';
    }
}

// Check if the hotel ID is provided for update or delete
if (isset($_GET['action'])) {
    if ($_GET['action'] === 'update' && isset($_GET['id'])) {
        // Handle updating of hotel details
        $hotel_id = $_GET['id'];
        // Retrieve the hotel details based on the hotel ID
        $query = "SELECT * FROM hotels WHERE hotel_id = '$hotel_id'";
        $hotels_result = mysqli_query($connection, $query);

        // Check if the query executed successfully
        if (!$hotels_result) {
            die("Error in query: " . mysqli_error($connection));
        }

        $hotel = mysqli_fetch_assoc($hotels_result);
    } elseif ($_GET['action'] === 'delete' && isset($_GET['id'])) {
        // Handle deleting of hotel details
        $hotel_id = $_GET['id'];
        // Delete the hotel details based on the hotel ID
        $delete_query = "DELETE FROM hotels WHERE hotel_id = '$hotel_id'";
        $delete_result = mysqli_query($connection, $delete_query);
        if ($delete_result) {
            echo '<p class="success">Hotel details deleted successfully.</p>';
        } else {
            echo '<p class="error">Failed to delete hotel details. Please try again later.</p>';
        }
    }
}

// Retrieve all hotel details from the database
$query = "SELECT * FROM hotels";
$hotels_result = mysqli_query($connection, $query);

// Check for errors in the query
if (!$hotels_result) {
    die("Error in query: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Hotel Details</title>
    <!-- CSS and other styles -->
    <!-- ... -->
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
</head>
<body>
<!-- Header and navigation -->
<!-- ... -->

<header>
        <!-- Your header content goes here -->
        <!-- Navigation bar, etc. -->
        
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


<!-- Table for displaying existing hotel details -->
<h2>Hotels Deatils</h2>
<table>
    <tr>
        <th>Hotel ID</th>
        <th>Name</th>
        <th>Location</th>
        <th>Room Type</th>
        <th>Price</th>
        <th>Capacity</th>
        <th>Actions</th>
    </tr>
    <?php
    // Display all hotel details in a table
    while ($row = mysqli_fetch_assoc($hotels_result)) {
        echo "<tr>";
        echo "<td>" . $row['hotel_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
        echo "<td>" . $row['room_type'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['capacity'] . "</td>";
        echo "<td class='action-links'>";
        // Add links for update and delete actions
        echo "<a href='manage_hotels_details.php?action=update&id=" . $row['hotel_id'] . "'>Update</a>";
        echo "<a href='manage_hotels_details.php?action=delete&id=" . $row['hotel_id'] . "' onclick='return confirm(\"Are you sure you want to delete this hotel?\");'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>
<!-- Form for adding new hotel details -->
<h2>Add New Hotel</h2>
<form method="post">
    <label for="hotel_name">Hotel Name:</label>
    <input type="text" name="hotel_name" required>
    <br>
    <label for="location">Location:</label>
    <input type="text" name="location" required>
    <br>
    <label for="room_type">Room Type:</label>
    <input type="text" name="room_type" required>
    <br>
    <label for="price">Price:</label>
    <input type="number" name="price" required>
    <br>
    <label for="capacity">Capacity:</label>
    <input type="number" name="capacity" required>
    <br>
    <input type="submit" name="add_hotel" value="Add Hotel">
</form>
<!-- Footer -->
<!-- ... -->

<a class="dashboard-link" href="admin_dashboard.php">Back to Admin Dashboard</a>
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

