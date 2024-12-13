<?php
// manage_user_registration.php

// Start the session and check if the admin is logged in
session_start();
if (!isset($_SESSION["admin_id"])) {
    // Redirect to login page if not logged in
    header("Location: admin_login.php");
    exit();
}

// Connect to the database (Replace 'DB_HOST', 'DB_USERNAME', 'DB_PASSWORD', and 'DB_NAME' with your actual database credentials)
$connection = mysqli_connect('LocalHost', 'hemu12', 'hemu1234', 'ota');
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Retrieve the list of registered users from the "user_signup" table
$query = "SELECT * FROM usersignup";
$result = mysqli_query($connection, $query);

// Handle user approval, blocking, and deletion
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $user_id = $_GET['id'];

    if ($action === 'approve') {
        // Update the user status to "Approved" in the database
        $update_query = "UPDATE usersignup SET status = 'Approved' WHERE user_id = '$user_id'";
        $update_result = mysqli_query($connection, $update_query);
        if ($update_result) {
            // Handle success message after updating user status
            echo '<p class="success">User approved successfully.</p>';
        } else {
            // Handle error message if the update fails
            echo '<p class="error">Failed to approve user. Please try again later.</p>';
        }
    } elseif ($action === 'block') {
        // Update the user status to "Blocked" in the database
        $update_query = "UPDATE usersignup SET status = 'Blocked' WHERE user_id = '$user_id'";
        $update_result = mysqli_query($connection, $update_query);
        if ($update_result) {
            // Handle success message after updating user status
            echo '<p class="success">User blocked successfully.</p>';
        } else {
            // Handle error message if the update fails
            echo '<p class="error">Failed to block user. Please try again later.</p>';
        }
    } elseif ($action === 'delete') {
        // Delete the user from the database
        $delete_query = "DELETE FROM usersignup WHERE user_id = '$user_id'";
        $delete_result = mysqli_query($connection, $delete_query);
        if ($delete_result) {
            // Handle success message after deleting user
            echo '<p class="success">User deleted successfully.</p>';
        } else {
            // Handle error message if the deletion fails
            echo '<p class="error">Failed to delete user. Please try again later.</p>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage User Registration</title>
    <!-- Add your CSS styling here -->
    <style>
         /* ... */
         h1 {
            color:black;
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

    <!-- User Registration Section -->
    <h2>Registered Users</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php
        // Display all registered users in a table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>";
            if (isset($row['user_id'])) {
            echo "<a href='manage_user_registration.php?action=approve&id=" . $row['user_id'] . "'>Approve</a> | ";
            echo "<a href='manage_user_registration.php?action=block&id=" . $row['user_id'] . "'>Block</a> | ";
            echo "<a href='manage_user_registration.php?action=delete&id=" . $row['user_id'] . "' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>";
            echo "</td>";
            echo "</tr>";
         } else {
            echo "N/A";
         }
        }
        ?>
    </table>

    <!-- Add any additional features or elements you need for managing user registrations -->

    <a class="dashboard-link" href="admin_dashboard.php">Back to Admin Dashboard</a>
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

<?php
// Close the database connection
mysqli_close($connection);
?>
