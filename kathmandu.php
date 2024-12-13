<!DOCTYPE html>
<html>
<head>
    <title>Travel Agency</title>
    <style>
           .ktm {
  background-image: url("images/kathmandu.webp");
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
ktm h1 {
  font-size: 20px;
  margin-bottom: 20px;
  text-align: center;
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
<h1>Explore Kathmandu</h1>
      <p>Discover the rich culture and heritage of Nepal's capital city.</p>
  </section>
    
    
      
    

  <div class="offers">
    <h1>Attractions of Kathmandu</h1>
    <p>Choose your next destination</p>
    <div class="card-row">
        <div class="card">
            <h3>Pashupatinath Temple</h3>
            <img src="images/pashupatinath-unesco-world-heritage - Copy.jpg" alt="">
            <p>Pashupatinath is one of the holiest Hindu temples in the world and a UNESCO World Heritage Site. Situated on the banks of the Bagmati River,</p>
        </div>
        <div class="card">
            <h3>Boudhanath Stupa</h3>
            <img src="images/Boudhanath_121127-087.jpg" alt="">
           <p> It serves as a spiritual hub for Buddhist devotees who come here to offer prayers, and perform the ritualistic kora around the stupa.</p>
      </div>
        <div class="card">
            <h3>Kathmandu Durbar Square</h3>
            <img src="images/basanttta.jpeg" alt="">
          <p>Kathmandu Durbar Square is a historic palace complex that was once the residence of Nepalese royals. The square is surrounded by stunning palaces, temples.</p>
        </div>
    </div>
    <div class="card-row">
        <div class="card">
            <h3>Kirtipur</h3>
            <img src="images/kirtipur - Copy (2).jpg" alt="">
          <p>Itoffers a unique glimpse into Newar culture and architecture.The town is known for its narrow alleys, traditional houses, and ancient temples.
            </p>
        </div>
        <div class="card">
            <h3>Garden Of Dreams</h3>
            <img src="images/god.jpg" alt="">
<p>Dreams of Garden is a serene and beautifully landscaped garden located in kathmandu.
            It offers a peaceful escape from the making it an ideal spot for relaxation.
        </div>
        <div class="card">
            <h3>Narayanhiti palace</h3>
            <img src="images/narayan - Copy.jpg" alt="">
           
           <p> Narayanhiti Palace served as the royal residence of the King of Nepal until 2008.
                After Nepal was declared a republic, the palace was turned into a museum.</p>
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