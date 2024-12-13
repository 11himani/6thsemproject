<!DOCTYPE html>
<html>
<head>
    <title>Travel Agency</title>
    <style>
          .ktm {
  background-image: url("images/narayani.jpg");
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
      <h1>Explore Chitwan</h1>
      <p>Experience the wildlife and natural beauty of the Chitwan National Park.</p>

  </section>
    
    <div class="offers">
      <h1>Attractions of Chitwan</h1>
      <p>Choose your next destination</p>
      <div class="card-row">
          <div class="card">
              <h3>Chitwan National Park</h3>
              <img src="images/national.jpg" alt="">
              <p>Explore the Chitwan National Park, one of the best-preserved national parks in Asia, and witness a diverse range of wildlife, including tigers, rhinos, elephants, and crocodiles.</p>
          </div>
          <div class="card">
              <h3>Elephant Safari</h3>
              <img src="images/Elephant_Safari_inside_Chitwan_National_Park.jpg" alt="">
              <p>Embark on an exciting elephant safari and traverse through the dense forests of Chitwan, getting up close with the wildlife and experiencing the thrill of the jungle.</p>
        </div>
          <div class="card">
              <h3>Sauraha</h3>
              <img src="images/sauraha.jpg" alt="">
              <p>Experience an exhilarating jungle safari  in Sauraha, wildlife such as one-horned rhinos, elephants, and various bird species in their natural habitat.</p>
          </div>
      </div>
      <div class="card-row">
          <div class="card">
              <h3>Tharu villager</h3>
              <img src="images/tharu.jpg" alt="">
              <p>Visit a traditional Tharu village and immerse yourself in the local culture, witnessing their unique lifestyle, traditional dances, and hospitality.</p>
          </div>
          <div class="card">
              <h3>Narayani River</h3>
              <img src="images/na.jpg" alt="">
              <p>Visit the scenic Narayani River, one of the largest rivers in Nepal, and enjoy boating, fishing, or simply relax by the riverside.</p>
          </div>
          <div class="card">
              <h3>Jalbire Jharana</h3>
              <img src="images/jalbire.jpg" alt="">
              <p>Visit Jalbire Jharana, a stunning waterfall located in the outskirts of chitwan, offering a refreshing escape into nature's beauty.</p>
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