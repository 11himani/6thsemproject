<!DOCTYPE html>
<html>
<head>
    <title>Travel Agency</title>
    <style>
      /* styles.css */

/* ... previous CSS code ... */

/* Style the hero section */
.ktm {
  background-image: url("images/pk.jpg");
  background-size: cover;
  background-position: center;
  height: 400px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  color: #fff;
}

.ktm h1 {
  font-size: 20px;
  margin-bottom: 20px;
  text-align: left;
}

.ktm p {
  font-size: 18px;
  margin-bottom: 20px;
}

/* styles.css */

.offers {
  text-align: center;
  margin: 50px 0;
}

.offers h1 {
  font-size: 30px;
  margin-bottom: 10px;
}

.offers p {
  font-size: 18px;
  margin-bottom: 30px;
}

.card-row {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  margin-bottom: 30px;
}

.card {
  width: 200px;
  padding: 20px;
  margin: 10px;
  background-color: #f2f2f2;
  border-radius: 4px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  text-align: center;
}
.card p{
  font-size: 12px;
}

.card h3 {
  font-size: 15px;
  margin-bottom: 10px;
}

.card img {
  width: 100%;
  height: auto;
  border-radius: 4px;
  margin-bottom: 10px;
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
    <section class="ktm">
      <h1>Explore Pokhara</h1>
      <p>Explore the city surrounded with culture and nature .</p>
    </section>
  </section>
    
    <div class="offers">
      <h1>Attractions of Pokhara</h1>
      <p>Choose your next destination</p>
      <div class="card-row">
          <div class="card">
              <h3>Phewa Lake</h3>
              <img src="images/phewa.webp" alt="">
              <p>Experience the beauty of Phewa Lake, surrounded by lush hills and the stunning reflection of the Annapurna range.</p>
          </div>
          <div class="card">
              <h3>Davis Falls</h3>
              <img src="images/decis.jpg" alt="">
              <p>Explore the mesmerizing Davis Falls, a unique waterfall that disappears into an underground tunnel, creating a thrilling spectacle.</p>
          </div>
          <div class="card">
              <h3>Sarangkot</h3>
              <img src="images/sarang.jpg" alt="">
              <p>Embark on an early morning trek to Sarangkot, to witness breathtaking sunrise views over the Annapurna and Dhaulagiri mountain ranges.</p>
          </div>
      </div>
      <div class="card-row">
          <div class="card">
              <h3>Pudmikot</h3>
              <img src="images/pud.jpg" alt="">
              <p>Hike to Pumdikot, a viewpoint offering panoramic views of the Pokhara Valley, Phewa Lake, and the surrounding mountains.</p>
          </div>
          <div class="card">
              <h3>Talbarahi Temple</h3>
              <img src="images/tal.png" alt="">
              <p>Visit it, a pagoda-style temple located on an island in Phewa Lake, dedicated to the goddess Durga.</p>
          </div>
          <div class="card">
              <h3>Bindabasini Temple</h3>
              <img src="images/binda.jpg" alt="">
              <p>Pay a visit to the Bindabasini Temple, a sacred Hindu temple dedicated to the goddess Durga, and soak in the spiritual atmosphere.</p>
          </div>
      </div>
    </div>
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



