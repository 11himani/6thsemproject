<!DOCTYPE html>
<html>
<head>
    <title>Travel Agency - Hotel Booking</title>
    <style>
        /* Your CSS styles go here */
        /* ... (Your existing CSS styles) ... */
        /* Global Styles */

        h1 {
            margin-left: 500px;
        }

        /* Hotel Details and Booking Form Styles */

        .hotel {
            padding: 10px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }

        .hotel h3 {
            margin-top: 0;
            text-align: center;
        }

        .btn-book {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            margin-top: 10px;
        }

        .btn-book:hover {
            background-color: #0056b3;
        }

        .booking-form {
            background-color: #f9f9f9;
            padding: 20px;
            margin-left: 500px;
        }

        .booking-form h2 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
            margin-right: 300px;
        }

        .booking-form label {
            display: block;
            margin-bottom: 5px;
        }

        .booking-form input[type="date"],
        .booking-form input[type="text"],
        .booking-form input[type="email"],
        .booking-form input[type="number"] {
            width: 60%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .booking-form input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .booking-form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        h2 {
            text-align: center;
        }

        p {
            text-align: center;
        }

        /* Footer Styles */

        /* Media Query for Responsive Layout (Adjust the breakpoint as needed) */

        @media screen and (max-width: 768px) {
            .container {
                padding: 10px;
            }
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
<h1>Travel Agency - Hotel Booking</h1>
<section class="hotelstravel">
    <!-- Your section code goes here -->
</section>

<?php
// see_more_hotel.php

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Function to send confirmation email to the user using PHPMailer
function sendConfirmationEmail($guest_name, $guest_email, $hotel_name, $check_in_date, $check_out_date)
{
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server host
    $mail->SMTPAuth = true;
    $mail->Username = 'bhandarihemu88@gmail.com'; // Replace with your SMTP username
    $mail->Password = 'rnboooqzzhjseywo'; // Replace with your SMTP password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Set email data
    $mail->setFrom('bhandarihemu88@gmail.com', 'Travel Agency'); // Replace with your email and name
    $mail->addAddress($guest_email, $guest_name); // Set recipient email and name
    $mail->isHTML(true);

    // Set email data
    $mail->Subject = 'Hotel Booking Confirmation';
    $mail->Body = "Dear $guest_name,<br><br>Your booking for $hotel_name has been confirmed.<br><br>Check-in Date: $check_in_date<br>Check-out Date: $check_out_date<br><br>Thank you for choosing our hotel!<br><br>Best regards,<br>The Travel Agency Team";

    // Send email
    if (!$mail->send()) {
        echo 'Email could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

// Check if the hotel_id parameter is passed in the URL
if (isset($_GET['hotel_id'])) {
    // Connect to your database (Replace 'DB_HOST', 'DB_USERNAME', 'DB_PASSWORD', and 'DB_NAME' with your actual database credentials)
    $connection = mysqli_connect('LocalHost', 'hemu12', 'hemu1234', 'ota');

    // Check if the database connection was successful
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute the SQL query to retrieve the hotel details
    $hotel_id = $_GET['hotel_id'];
    $query = "SELECT * FROM hotels WHERE hotel_id = '$hotel_id'";
    $result = mysqli_query($connection, $query);

    // Check if the query was successful
    if ($result && mysqli_num_rows($result) > 0) {
        $hotel = mysqli_fetch_assoc($result); // Fetch hotel details and store in $hotel variable

        // Check if the booking form is submitted
        if (isset($_POST['submit_booking'])) {
            // Get the form data
            $check_in_date = $_POST['check_in_date'];
            $check_out_date = $_POST['check_out_date'];
            $guest_name = $_POST['guest_name'];
            $guest_email = $_POST['guest_email'];
            $guests = $_POST['guests'];

            // Save booking details to the database
            $query = "INSERT INTO hotels_bookings (hotel_id, check_in_date, check_out_date, guest_name, guest_email, guests) 
                          VALUES ('$hotel_id', '$check_in_date', '$check_out_date', '$guest_name', '$guest_email', $guests)";

            $result = mysqli_query($connection, $query);

            // Check if the query was successful
            if ($result) {
                // Send confirmation email to the user
                sendConfirmationEmail($guest_name, $guest_email, $hotel['name'], $check_in_date, $check_out_date);

                // Display the confirmation message
                echo "<h2>Booking Confirmation</h2>";
                echo "<p>Dear $guest_name, your booking for {$hotel['name']} has been confirmed.</p>";
                echo "<p>Check-in Date: $check_in_date</p>";
                echo "<p>Check-out Date: $check_out_date</p>";
                echo "<p>An email has been sent to $guest_email with the booking details.</p>";
            } else {
                echo "<p>Booking failed. Please try again.</p>";
            }
        }

        // Close the database connection
        mysqli_close($connection);

        // Display the hotel details and booking form
        echo "<div class='hotel'>";
        echo "<h3>" . $hotel['name'] . "</h3>";
        echo "<p>Location: " . $hotel['location'] . "</p>";
        echo "<p>Room Type: " . $hotel['room_type'] . "</p>";
        echo "<p>Price: " . $hotel['price'] . " per night</p>";
        echo "<p>Capacity: " . $hotel['capacity'] . " guests</p>";
        echo "</div>";

        // PHP code to set the minimum date for the check-in date input
        $today = date("Y-m-d");
        echo "<div class='booking-form' id='booking-form'>";
        echo "<h2>Book Hotel: " . $hotel['name'] . "</h2>";
        echo "<form method='post' action='see_more_hotel.php?hotel_id=" . $hotel['hotel_id'] . "'>";
        echo "<input type='hidden' name='hotel_id' value='" . $hotel['hotel_id'] . "'>";
        echo "<label for='check_in_date'>Check-in Date:</label>";
        echo "<input type='date' name='check_in_date' min='" . $today . "' required>";
        echo "<label for='check_out_date'>Check-out Date:</label>";
        echo "<input type='date' name='check_out_date' min='" . $today . "' required>";
        echo "<label for='guest_name'>Guest Name:</label>";
        echo "<input type='text' name='guest_name' required>";
        echo "<label for='guest_email'>Guest Email:</label>";
        echo "<input type='email' name='guest_email' required>";
        echo "<label for='guests'>Number of Guests:</label>";
        echo "<input type='number' name='guests' min='1' required><br>";
        echo "<input type='submit' name='submit_booking' value='Submit Booking'>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "<p>Hotel not found.</p>";
    }
} else {
    echo "<p>Invalid request. Hotel ID not specified.</p>";
}
?>

<footer>
    <!-- Your footer HTML code... -->
</footer>
</body>
</html>
