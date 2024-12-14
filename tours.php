<!DOCTYPE html>
<html>
<head>
    <title>Travel Agency</title>
    <style>
        .packages {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    margin-bottom: 30px;
    }
    
    .packages .package {
    width: 200px;
    padding: 20px;
    margin: 10px;
    background-color: #f2f2f2;
    border-radius: 4px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    }
    .packages .package h1 {
    font-size: 14px;
    }
    .packages .package img {
      width: 200px;
      height: auto;
      border-radius: 4px;
      margin-bottom: 20px;
    }
    
    .packages .package h2 {
      font-size: 13px;
      margin-bottom: 10px;
    }
    
    .packages .package p {
      margin-bottom: 12px;
      font-size: 12px;
    }
    
    .packages .package .btn {
      display: inline-block;
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 4px;
      size: 20px;
    }
    
    .packages .package .btn:hover {
      background-color: #0056b3;
    }

/* Existing CSS styles for other elements */

/* Styles for the "Book Tour" button */
.book-tour-btn {
  display: inline-block;
  background-color: #007bff;
  color: #fff;
  padding: 12px 24px;
  font-size: 16px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  text-decoration: none;
  transition: background-color 0.3s ease;
  margin-top: 10px;
}

.book-tour-btn:hover {
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
<section class="hero">
        <div class="hero-content">
            <div class="hero-image">
                <img src="images/tour.webp" alt="Picture">
            </div>
            <div class="hero-text">
                <h1>Amazing Tour Package</h1>
                <p>Explore the wonders of this beautiful destination with our exciting tour package. Book now to avail of exclusive offers!</p>
            </div>
        </div>
    </section>
    
    <section class="packages">
        <div class="package">
            <h1>Family package at Pokhara</h1>
            <img src="images/crou2.jpg" alt="">
            <p>Experience a wonderful family tour at Pokhara on the 3-day package! Enjoy quality time with your loved ones amidst the picturesque landscapes.</p>
           
            <button class="btn read-more-btn" onclick="toggleReadMore(this, 1)">See More</button>
            <div class="more-info-1" style="display: none;">
                <p><strong>Duration:</strong> 3 days</p>
                <p><strong>Price:</strong> 9000 </p>
                <p><strong>Highlights:</strong> Family-friendly activities, Family-friendly accommodations</p>
                <p><strong>Hotel in Pokhara:</strong> Pokhara Grande</p>
            </div>
            <button class="btn read-less-btn-1" style="display: none;" onclick="toggleReadMore(this, 1)">Read Less</button>
            <a href="booking_tour.php?packageNum=1" class="btn book-tour-btn">Book Tour</a>
        </div>
        </div>
    
        <div class="package">
            <h1>Chitwan Adventure Package</h1>
            <img src="images/crou1.jpg" alt="">
            <p>Embark on a thrilling 4-day adventure at Chitwan National Park. Explore the wildlife and enjoy exciting activities in the jungle. Limited seats available!</p>
            <button class="btn read-more-btn" onclick="toggleReadMore(this, 2)">See More</button>
            <div class="more-info-2" style="display: none;">
                <p><strong>Duration:</strong> 4 days</p>
                <p><strong>Price:</strong> 8000</p>
                <p><strong>Highlights:</strong> Jungle safari, Canoe ride, Elephant bathing</p>
                <p><strong>Hotel in Chitwan:</strong> Hotel Tigerland Safari Resort</p>
            </div>
            <button class="btn read-less-btn-2" style="display: none;" onclick="toggleReadMore(this, 2)">Read Less</button>
            <a href="booking_tour.php?packageNum=2" class="btn book-tour-btn">Book Tour</a>
        </div>
    
        <div class="package">
            <h1>Kathmandu Exploration</h1>
            <img src="images/crou3.jpg" alt="">
            <p>Discover the cultural heritage and ancient history of Kathmandu during this 5-day tour. Enjoy a comfortable stay at Hotel Annapurna and explore the city's iconic landmarks.</p>
            <button class="btn read-more-btn" onclick="toggleReadMore(this, 3)">See More</button>
            <div class="more-info-3" style="display: none;">
                <p><strong>Duration:</strong> 5 days</p>
                <p><strong>Price:</strong> 9000</p>
                <p><strong>Highlights:</strong> Temples and stupas, UNESCO World Heritage Sites, Local markets</p>
                <p><strong>Hotel in Kathmandu:</strong> Hotel Annapurna</p>
            </div>
            <button class="btn read-less-btn-3" style="display: none;" onclick="toggleReadMore(this, 3)">Read Less</button>
            <a href="booking_tour.php?packageNum=3" class="btn book-tour-btn">Book Tour</a>

        </div>
    </section>
    

    <script>
        // Function to show the booking form and set the package number
       
        function toggleReadMore(btn, packageNum) {
            const moreInfoDiv = document.querySelector('.more-info-' + packageNum);
            const readLessBtn = document.querySelector('.read-less-btn-' + packageNum);

            if (moreInfoDiv.style.display === 'none') {
                moreInfoDiv.style.display = 'block';
                btn.style.display = 'none';
                readLessBtn.style.display = 'inline-block';
            } else {
                moreInfoDiv.style.display = 'none';
                btn.style.display = 'inline-block';
                readLessBtn.style.display = 'none';
            }
        }
        </script>
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
