<!DOCTYPE html>
<html>
<head>
    <title>Travel Agency - Hotels</title>
    <style>
        /* Add your CSS styles here */
        /* ... (Your existing CSS styles) ... */
        .hotelstravel{
            margin-left:450px;
        }
        h2{
            margin-left:450px;
        }
        .hotel{
            margin-left:500px;
        }
        .btn-book {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }

        .btn-book:hover {
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
    
    <section class="hotelstravel">
        <h1>Find the Perfect Hotel for Your Stay</h1>
        <form method="post" action="hotels.php">
            <!-- Your hotel search form code goes here -->
            <!-- ... (Your existing hotel search form) ... -->
        </form>
    </section>

    <?php
    // hotels_search.php

    // Check if the form is submitted
    if (isset($_POST['search_hotels'])) {
        // Get the user's search criteria
        $location = $_POST['location'];
        $room_type = $_POST['room_type'];
        $guests = $_POST['guests'];

        // Connect to your database (Replace 'DB_HOST', 'DB_USERNAME', 'DB_PASSWORD', and 'DB_NAME' with your actual database credentials)
        $connection = mysqli_connect('LocalHost', 'root', '', 'Travel');

        // Check if the database connection was successful
        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        // Prepare and execute the SQL query to retrieve hotels that match the user's criteria
        $query = "SELECT * FROM hotels WHERE location = '$location' AND room_type = '$room_type' AND capacity >= $guests";
        $result = mysqli_query($connection, $query);

        // Check if the query was successful
        if ($result && mysqli_num_rows($result) > 0) {
            // Display the hotels that match the user's criteria
            echo "<h2>Available Hotels</h2>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='hotel'>";
                echo "<h3>" . $row['name'] . "</h3>";
                echo "<p>Location: " . $row['location'] . "</p>";
                echo "<p>Room Type: " . $row['room_type'] . "</p>";
                echo "<p>Price: " . $row['price'] . " per night</p>";
                echo "<p>Capacity: " . $row['capacity'] . " guests</p>";
                // Add the "Book Room" button with a link to the booking page
                echo "<a href='see_more_hotel.php?hotel_id=" . $row['hotel_id'] . "' class='btn-book'>Book Now</a>";
                echo "</div>";
            }
        } else {
            echo "<p>No hotels found that match your criteria.</p>";
        }

        // Close the database connection
        mysqli_close($connection);
    }
    ?>

    <footer>
        <!-- Your footer code goes here -->
        <!-- ... (Your existing footer code) ... -->
    </footer>
</body>
</html>
