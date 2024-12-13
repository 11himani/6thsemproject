<!DOCTYPE html>
<html>
<head>
    <title>Travel Agency - Book Tour</title>
    <!-- Add your CSS styles here -->

    <style>
        /* Styling for the tour booking form */
        .tour-booking {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .tour-booking h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .tour-booking label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
        }

        .tour-booking input[type="text"],
        .tour-booking input[type="email"],
        .tour-booking select,
        .tour-booking input[type="date"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .tour-booking input[type="submit"] {
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

        .tour-booking input[type="submit"]:hover {
            background-color: #0056b3;
        }

    </style>
     <link rel="stylesheet" type="text/css" href="styling.css">
</head>
<body>
    <header>
        <!-- Your header content goes here -->
        <!-- Navigation bar, etc. -->
        
        <nav>
            <!-- ... (navigation code as in the original code) ... -->
        </nav>

    </header>

    <section class="tour-booking">
        <h2>Book Your Tour</h2>
        <form action="confirmation_tour.php" method="post">
            <!-- Name -->
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>

            <!-- Email Address -->
            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" required>
            <label for="tour_package">Select Tour Package:</label>
            <select name="tour_package" id="tour_package" required>
                <option value="">Select Tour Package</option>
                <option value="Family package at Pokhara">Family package at Pokhara</option>
                <option value="Chitwan Adventure Package">Chitwan Adventure Package</option>
                <option value="Kathmandu Exploration">Kathmandu Exploration</option>
                <!-- Add more options as needed -->
            </select>
            <label for="tour_date">Tour Date:</label>
            <input type="date" name="tour_date" id="tour_date" required>

            <p>Total Price: <span id="total_price">0</span></p>
            <input type="hidden" name="total_price" id="total_price" value="0">
            <input type="submit" name="confirm_booking" value="Book Now">
        </form>

        <?php
        // ... (PHPMailer and form processing code as in the previous code) ...
        ?>

    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Function to calculate and update the total price based on tour package selection
            function updateTotalPrice() {
                var selectedPackage = $("#tour_package").val();
                var price = 0;
                // Update the price based on the selected package
                switch (selectedPackage) {
                    case "Family package at Pokhara":
                        price = 5000;
                        break;
                    case "Chitwan Adventure Package":
                        price = 8000;
                        break;
                    case "Kathmandu Exploration":
                        price = 9000;
                        break;
                    // Add more cases for other tour packages
                }

                // Update the total price on the page
                $("#total_price").text(price);
            }

            // Call the function when the page loads to set the initial total price
            updateTotalPrice();
            // Call the function whenever the user changes the tour package selection
            $("#tour_package").change(function () {
                updateTotalPrice();
            });
        });
    </script>
</body>
</html>
