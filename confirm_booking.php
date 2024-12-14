<?php
// confirm_booking.php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Check if the form is submitted
if (isset($_POST['submit_booking'])) {
    $flight_id = $_POST['flight_id'];
    $passenger_name = $_POST['passenger_name'];
    $passenger_email = $_POST['passenger_email'];

    // Connect to your database (Replace 'DB_HOST', 'DB_USERNAME', 'DB_PASSWORD', and 'DB_NAME' with your actual database credentials)
    $connection = mysqli_connect('LocalHost', 'root', '', 'Travel');

    // Check if the database connection was successful
    if (!$connection) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Fetch the flight details from the database based on the provided flight_id
    $flight_query = "SELECT * FROM flights WHERE flight_id = '$flight_id'";
    $flight_result = mysqli_query($connection, $flight_query);

    if ($flight_result && mysqli_num_rows($flight_result) > 0) {
        // Flight details found, extract and use them in the email
        $flight_data = mysqli_fetch_assoc($flight_result);
        $airline = $flight_data['airline'];
        $flight_number = $flight_data['flight_number'];
        $departure_city = $flight_data['departure_city'];
        $arrival_city = $flight_data['arrival_city'];
        $departure_time = $flight_data['departure_time'];
        $arrival_time = $flight_data['arrival_time'];
        $price = $flight_data['price'];
    } else {
        // Flight details not found, you may handle this case based on your application's requirements
        // For example, you can show an error message or log the issue for further investigation.
        // Here, I will simply set some default values.
        $airline = 'Unknown Airline';
        $flight_number = 'Unknown Flight';
        $departure_city = 'Unknown Departure City';
        $arrival_city = 'Unknown Arrival City';
        $departure_time = 'Unknown Departure Time';
        $arrival_time = 'Unknown Arrival Time';
        $price = 0;
    }

    // Prepare and execute the SQL query to insert the booking details into the database
    $query = "INSERT INTO bookings (flight_id, user_name, user_email) VALUES ('$flight_id', '$passenger_name', '$passenger_email')";
    $result = mysqli_query($connection, $query);

    // Check if the booking was successful
    if ($result) {
        // Booking successful, now send the confirmation email

        // Create a new PHPMailer instance
        $mail = new PHPMailer;

        // Set SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server address
        $mail->Port = 465; // Replace with your SMTP port number
        $mail->SMTPAuth = true;
        $mail->Username = 'thapahimani123@gmail.com'; // Replace with your email address
        $mail->Password = 'rnboooqzzhjseywo'; // Replace with your email password
        $mail->SMTPSecure = 'ssl'; // Use 'tls' or 'ssl' for Gmail

        // Set email content
        $mail->setFrom('your_email@gmail.com', 'Your Name'); // Replace with your name and email address
        $mail->addAddress($passenger_email, $passenger_name); // Replace with the recipient's email and name
        $mail->Subject = 'Flight Booking Confirmation';
        $mail->Body = "Dear " . $passenger_name . ",\n\nThank you for booking your flight with us.\n\nYour booking details:\nAirline: $airline\nFlight Number: $flight_number\nDeparture City: $departure_city\nArrival City: $arrival_city\nDeparture Time: $departure_time\nArrival Time: $arrival_time\nPrice: $price\n\nHave a safe journey!\n\nBest regards,\nThe Travel Agency Team";

        // Send the email
        if ($mail->send()) {
            echo "<p>Booking Successful. Confirmation email sent to " . $passenger_email . ".</p>";
        } else {
            echo "<p>Booking Successful, but there was an issue sending the confirmation email. Please contact support.</p>";
        }
    } else {
        echo "<p>Booking failed. Please try again.</p>";
    }

    // Close the database connection
    mysqli_close($connection);
}
?>
