<?php
include('Hotel.php');
include('connection.php');


//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('travel');
// Create an instance of the Hotel class
$sampleHotel = new Hotel("Sample Hotel", "City, Country", "A description of the hotel.");


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="hi.css" />
    <title>Web Design Mastery | WDM&Co</title>
  </head>
  <body>
    <nav>
      <div class="nav__logo"></div>
      <ul class="nav__links">
        <li class="link"><a href="ahome.php">Home</a></li>
        <li class="link"><a href="#">Book</a></li>
        <li class="link"><a href="create.php">logout</a></li>
        <li class="link"><a href="#">Contact Us</a></li>
      </ul>
    </nav>
    <header class="section__container header__container">
      <div class="header__image__container">
      
        <div class="header__content">
          <h1>Enjoy Your Dream Vacation</h1>
          <p>Book Hotels, Flights and stay packages at lowest price.</p>
        </div>
        <div class="booking__container">
        <form method="post" action="search.php">
            <div class="form__group">
              <div class="input__group">
                <input  name="location" type="text" />
                <label>Location</label>
              </div>
              <p>Where are you going?</p>
            </div>
            <div class="form__group">
              <div class="input__group">
                <input name="checkIn" type="text" />
                
                <label>Check In</label>
              </div>
              <p>Add date</p>
            </div>
            <div class="form__group">
              <div class="input__group">
                <input name="checkOut" type="text" />
                <label>Check Out</label>
              </div>
              <p>Add date</p>
            </div>
            <div class="form__group">
              <div class="input__group">
                <input name="guests" type="text" />
                <label>Guests</label>
              </div>
              <p>Add guests</p>
            </div>
          </form>
          <button type="submit" class="btn" name="search" class="btn"><i class="ri-search-line"></i></button>
        </div>
      </div>
    </header>

    <section class="section__container popular__container">
      <h2 class="section__header">Popular Hotels</h2>
      <div class="popular__grid">
        <div class="popular__card">
          <a href="https://www.theplazany.com/"><img src="hotel-1.jpg" alt="popular hotel" /></a>
          <div class="popular__content">
            <div class="popular__card__header">
              <h4>The Plaza Hotel</h4>
              
            </div>
            <p>New York City, USA</p>
          </div>
        </div>
        <div class="popular__card">
        <a href="https://mamounia.com/"><img src="hotelmarra.jpg" alt="popular hotel" /></a>
          <div class="popular__content">
            <div class="popular__card__header">
              <h4>La Mamounia</h4>
              
            </div>
            <p>Marrakech, Morocco</p>
          </div>
        </div>
        <div class="popular__card">
        <a href="https://www.peninsula.com/en/hong-kong/5-star-luxury-hotel-kowloon"> <img src="hotel-3.jpg" alt="popular hotel" /></a>
          <div class="popular__content">
            <div class="popular__card__header">
              <h4>The Peninsula</h4>
              
            </div>
            <p>Hong Kong</p>
          </div>
        </div>
        <div class="popular__card">
        <a href="https://www.atlantis.com/dubai"><img src="hotel-4.jpg" alt="popular hotel" /></a>
          <div class="popular__content">
            <div class="popular__card__header">
              <h4>Atlantis The Palm</h4>
             
            </div>
            <p>Dubai, United Arab Emirates</p>
          </div>
        </div>
        <div class="popular__card">
        <a href="https://www.ritzcarlton.com/en/hotels/tyorz-the-ritz-carlton-tokyo/overview/"><img src="hotel-5.jpg" alt="popular hotel" /></a>
          <div class="popular__content">
            <div class="popular__card__header">
              <h4>The Ritz-Carlton</h4>
              
            </div>
            <p>Tokyo, Japan</p>
          </div>
        </div>
        <div class="popular__card">
        <a href="https://www.fairmont.com/tangier/"><img src="fairmont_tazi_palace_tangier.jpg" alt="popular hotel" /></a>
          <div class="popular__content">
            <div class="popular__card__header">
              <h4>Fairmont Tazi Palace</h4>
              
            </div>
            <p>Tangier, Morocco</p>
          </div>
        </div>
      </div>
    </section>

    <section class="client">
      <div class="section__container client__container">
        <h2 class="section__header">What our client say</h2>
        <div class="client__grid">
          <div class="client__card">
            <img src="IMG_6661.jpg" alt="client" />
            <p>
              The booking process was seamless, and the confirmation was
              instant. I highly recommend WDM&Co for hassle-free hotel bookings.
            </p>
          </div>
          <div class="client__card">
            <img src="client-2.jpg" alt="client" />
            <p>
              The website provided detailed information about hotel, including
              amenities, photos, which helped me make an informed decision.
            </p>
          </div>
          <div class="client__card">
            <img src="client-3.jpg" alt="client" />
            <p>
              I was able to book a room within minutes, and the hotel exceeded
              my expectations. I appreciate WDM&Co's efficiency and reliability.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="section__container">
      <div class="reward__container">
        <p>100+ discount codes</p>
        <h4>Join rewards and discover amazing discounts on your booking</h4>
        <a href="reservationfrm.php"> <button  class="reward__btn">make your reservation</button></a>
      </div>
    </section>

    <footer class="footer">
      <div class="section__container footer__container">
        <div class="footer__col">
          <h3>salmasy</h3>
          <p>
          salmasy is a premier hotel booking website that offers a seamless and
            convenient way to find and book accommodations worldwide.
          </p>
          <p>
            With a user-friendly interface and a vast selection of hotels,
            salmasy aims to provide a stress-free experience for travelers
            seeking the perfect stay.
          </p>
        </div>
        <div class="footer__col">
          <h4>Company</h4>
          <p>About Us</p>
          <p>Our Team</p>
          <p>Blog</p>
          <p>Book</p>
          <p>Contact Us</p>
        </div>
        
        <div class="footer__col">
          <h4>Resources</h4>
          <p>Social Media</p>
          <p>Help Center</p>
          <p>Partnerships</p>
        </div>
      </div>
      <div class="footer__bar">
        Copyright © 2023 Web Design salmasy. All rights reserved.
      </div>
    </footer>
    <?php 



?>

</body>
</html>