<!DOCTYPE html>
<html>
<head>
    <title>Travel Agency</title>
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

<?php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Check if the form is submitted
if (isset($_POST['confirm_booking'])) {
    // Get form data from the previous page
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tourPackage = $_POST['tour_package'];
    $tourDate = $_POST['tour_date'];
    $totalPrice = $_POST['total_price'];

    // Connect to your database (Replace 'DB_HOST', 'DB_USERNAME', 'DB_PASSWORD', and 'DB_NAME' with your actual database credentials)
    $connection = mysqli_connect('LocalHost', 'hemu12', 'hemu1234', 'ota');

    // Check if the database connection was successful
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Prepare and execute the SQL query to insert the booking details into the "tour_bookings" table
    $insert_query = "INSERT INTO tour_bookings (name, email, tour_package, tour_date, total_price) VALUES ('$name', '$email', '$tourPackage', '$tourDate', '$totalPrice')";
    $insert_result = mysqli_query($connection, $insert_query);
 // Close the database connection
 mysqli_close($connection);

 if ($insert_result) {
     // Booking successful
     echo '<p>Booking successful! Thank you for booking the tour.</p>';

     // Send confirmation email using PHPMailer
    

     $mail = new PHPMailer;
     $mail->isSMTP();
     $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server host
     $mail->SMTPAuth = true;
     $mail->Username = 'bhandarihemu88@gmail.com'; // Replace with your SMTP username
     $mail->Password = 'rnboooqzzhjseywo'; // Replace with your SMTP password
     $mail->SMTPSecure = 'ssl';
     $mail->Port = '465';
     $mail->setFrom('bhandarihemu88@gmail.com', 'Travel Agency'); // Replace with your email and name
     $mail->addAddress($email, $name);
     $mail->isHTML(true);

     $mail->Subject = 'Booking Confirmation - Travel Agency';
     $mail->Body = "Dear $name,<br><br>
         Thank you for booking the tour package: $tourPackage.<br>
         Your tour date is: $tourDate.<br>
         Total Price: $totalPrice.<br><br>
         We are excited to have you on board! Enjoy your trip.<br><br>
         Best regards,<br>
         Travel Agency";
     if (!$mail->send()) {
         // Email sending failed
         echo '<p>Failed to send confirmation email.</p>';
        } else {
            // Email sent successfully
            echo '<p>An email with the tour details has been sent to your email address.</p>';
        }

    } else {
        // Booking failed
        echo '<p>Booking failed. Please try again later.</p>';
    }
}
?>
<!-- in this code total price is not showing in confirmation mail -->