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
    <section class="hero">
    <div class="hero-content">
            <div class="hero-image">
                <img src="images/holiday.avif" alt="Picture">
            </div>
            <div class="hero-text">
                <h1>Welcome to our Travel Agency</h1>
                <p>Discover amazing destinations and book your dream vacation!</p>
                
                <form method="post">
                    <button type="submit" class="btn" name="getStartedBtn">Get Started</button>
                </form>

                <?php
                // PHP code to handle the button click action
                if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["getStartedBtn"])) {
                    echo "<p>Welcome! Get ready for your dream vacation!</p>";
                }
                ?>
            </div>
                 <!-- ... Rest of the hero section remains the same ... -->
    </section>
   
    <section class="features">
    <div class="feature">
    <img src="images/plane.jpg" alt="Flights">
            <h2>Flights</h2>
            <p>Find the best flight deals to your desired destinations.</p>
            <a href="flights.php" class="btn">Book Now</a>
        </div>
        
        <div class="feature">
            <img src="images/hotels.webp" alt="Hotels">
            <h2>Hotels</h2>
            <p>Discover a wide range of hotels and accommodations.</p>
            <a href="hotels.php" class="btn">Book Now</a>
        </div>
        <div class="feature">
            <img src="images/tours.png" alt="Tours">
            <h2>Tours</h2>
            <p>Explore guided tours and local attractions and enjoy your trip.</p>
            <a href="#" class="btn">Book Now</a>
        </div>
        <!-- ... Rest of the features section remains the same ... -->
    </section>
    <section class="destinations">
    <h2>Destinations</h2>
        <div class="destination">
            <div class="destination-item">
                <img src="images/swa1.jpg" alt="Kathmandu">
                <h3>Kathmandu</h3>
                <a href="kathmandu.php" class="btn">See More</a>
            </div>
            <div class="destination-item">
                <img src="images/sau.jpg" alt="Chitwan">
                <h3>Chitwan</h3>
                <a href="chiwan.php" class="btn">See More</a>
            </div>
            <div class="destination-item">
                <img src="images/pokharaa.jpg" alt="Pokhara">
                <h3>Pokhara</h3>
                <a href="pokhara.php" class="btn">See More</a>
            </div>
        </div>
        <!-- ... Rest of the destinations section remains the same ... -->
    </section>
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