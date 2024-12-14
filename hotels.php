
<!DOCTYPE html>
<html>
<head>
    <title>Travel Agency</title>
    <style>
        /* Add your CSS styles for the hotel search form here */
    
    
.hotelstravel {
    text-align: center;
    margin-top: 20px;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
    background-image: url('images/hotel1.jpg'); /* Replace 'path/to/background_image.jpg' with the actual path to your background image */
    background-repeat: no-repeat;
    background-size: cover;
    color:white;
}


.hotelstravel h1 {
    font-size: 28px;
    margin-bottom: 20px;
}

form {
    max-width: 400px;
    margin: 0 auto;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

form label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

form select,
form input[type="number"],
form input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

form input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    border: none;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #0056b3;
}
/* General styles for the footer */
h1{
    text-align:center;
    font-size:20px;
}
.hotels {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  margin-bottom: 30px;
  color:black;
  }
  
  
  .hotels .hotel {
  width: 200px;
  padding: 20px;
  margin: 10px;
  background-color: #f2f2f2;
  border-radius: 4px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  text-align: center;
  }
  .hotels .hotel h1 {
  font-size: 14px;
  }
  .hotels .hotel img {
    width: 200px;
    height: auto;
    border-radius: 4px;
    margin-bottom: 20px;
  }
  .hotels .hotel h2 {
    font-size: 13px;
    margin-bottom: 10px;
  }
  
  .hotels .hotel p {
    margin-bottom: 12px;
    font-size: 12px;
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
        <form method="post" action="hotels_search.php">
            <label for="location">Location:</label>
            <select name="location" required>
                <option value="kathmandu">Kathmandu</option>
                <option value="chitwan">Chitwan</option>
                <option value="pokhara">Pokhara</option>
            </select>
            <label for="room_type">Room Type:</label>
            <select name="room_type" required>
                <option value="single">Single</option>
                <option value="double">Double</option>
                <option value="deluxe">Deluxe</option>
            </select>
            <label for="guests">Number of Guests:</label>
            <input type="number" name="guests" min="1" required>
            <input type="submit" name="search_hotels" value="Search Hotels">
        </form>
</section>
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
                <li><a href="Tour.php">Tours</a></li>
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
            <p>Email: thapahimani123@gmail.com</p>
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