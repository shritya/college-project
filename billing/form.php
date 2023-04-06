<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="form.css" />
    <title>AdiShakti Health Rental Services</title>
    <link
      rel="shortcut icon"
      href="./assets/favicon-16x16.png"
      type="image/x-icon"
    />
    <script
      src="https://code.jquery.com/jquery-3.4.1.js"
      integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
      crossorigin="anonymous"
    ></script>
    <script>
      function SubForm() {
        $.ajax({
          url: "https://api.apispreadsheets.com/data/wa2xVXrH2kB0ycks/",
          type: "post",
          data: $("#myForm").serializeArray(),
          success: function () {
            alert("Order Confirmed");
          },
          error: function () {
            alert("There was an error");
          },
        });
      }
    </script>
  </head>
  <body>
    <section class="navbar">
      <header>
        <nav>
          <div class="nav-left">
            <a href="index.html">
              <img src="./assets/logo.png" alt="Logo" class="logo" />
            </a>
          </div>
          <!-- <h1>ADISHAKTI</h1> -->
          <div class="nav-right">

            <ul class="nav-child">
              <li class="rest-pg"><a href="index.html">Home</a></li>
              <li class="rest-pg"><a href="ourservice.html">Our Serivce</a></li>
              <li class="rest-pg"><a href="whoweare.html">Who are we?</a></li>
              <li class="rest-pg"><a href="product.html">All Products</a></li>
            </ul>
          </div>
        </nav>
      </header>
    </section>
    <!-- HEADER END -->
    <!-- Hero section starts -->
    <section class="hero">
      <div class="hero-content">
        <img src="./assets/hero-img.webp" alt="HERO IMAGE" class="hero-img" />
        <ul class="hero-qualities">
          <li class="quality-service">
            <img
              class="quality-img"
              src="./assets/shopping_cart_FILL0_wght400_GRAD0_opsz48.svg"
              alt="S"
            />Cash On Delivery
          </li>
          <li class="quality-service">
            <img
              class="quality-img"
              src="./assets/heart_plus_FILL0_wght400_GRAD0_opsz48.svg"
              alt="S"
            />Clean Equipment
          </li>
          <li class="quality-service">
            <img
              class="quality-img"
              src="./assets/package_FILL0_wght400_GRAD0_opsz48.svg"
              alt="S"
            />Low Deposit
          </li>
          <li class="quality-service">
            <img
              class="quality-img"
              src="./assets/inventory_FILL0_wght400_GRAD0_opsz48.svg"
              alt="S"
            />Low Rent
          </li>
        </ul>
      </div>
    </section>
    <!-- HERO SECTION END -->
    <!-- FORM START -->
    <form id="myForm">
      <h1>Confirm Your Order</h1>
      <label>Your Item Name</label>
      <select name="Item" class="name">
        <option name="Item" value="">Fowler Bed</option>
        <option name="Item" value="">Adjustable Hospital Bed</option>
        <option name="Item" value="">Remote Control Wheelchair</option>
        <option name="Item" value="">Oxygen Concentrator</option>
        <option name="Item" value="">Aluminium Chair</option>
        <option name="Item" value="">Toilet Chair</option>
        <option name="Item" value="">BP Monitor</option>
        <option name="Item" value="">Wheelchair With Accesibility</option>
        <option name="Item" value="">Oxygen Cylinder</option>
        <option name="Item" value="">Paitent Walker</option>
        <option name="Item" value="">Walking Stick</option>
      </select>
      <!-- <input type="text" name="Item" class="name" placeholder="Enter Your Item Name"> -->
      <label>Name</label>
      <input class="name" placeholder="Enter Your Name" name="Name" />
      <label>Phone Number</label>
      <input
        class="name"
        type="number"
        placeholder="Enter Your Number"
        name="Number"
      />
      <label>Address 1</label>
      <input class="name" placeholder="House no./Building Name/Locality" name="Address_1" />
      <label>Landmark</label>
      <input class="name" placeholder="Landmark/Area No." name="Address_2" />
      <label>Pincode</label>
      <input
        class="name"
        type="number"
        placeholder="Enter Your Pincode"
        name="pincode"
      />
      <label>From Date</label>
      <input
        class="name"
        type="date"
        placeholder="From Date"
        name="from_date"
      />
      <label>Upto Date</label>
      <input
        class="name"
        type="date"
        placeholder="Upto Date"
        name="upto_date"
      />
      <button class="btn" onclick="SubForm()">Submit</button>
    </form>
    <section class="margin">
    </section>
    <section class="end">
      <footer>
        <a href="index.html">
          <img src="./assets/logo.png" alt="Logo" class="logo" />
        </a>
        <div class="adi-footer">
          <section class="link-footer">
            <div class="links">
              <h2>Our Links</h2>
              <ul class="links-footer">
                <li>Instagram</li>
                <li>Whatsapp</li>
                <li>Facebook</li>
                <li>Linkedin</li>
              </ul>
            </div>
            <div class="privacy-policy">
              <h2>Our Policy</h2>
              <ul class="policy">
                <li>Privacy</li>
                <li>Policy</li>
              </ul>
            </div>
          </section>
          <h4 class="logo-footer-txt">
            ADISHAKTI | &#169;
            <span class="footer-contact"
              >Contact&nbsp;:&nbsp;+91&nbsp;7887805948 +91&nbsp;7378837011</span
            >
          </h4>
        </div>
      </footer>
    </section>
  </body>
</html>
