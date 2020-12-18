<?php
// start a SESSION
session_start();
?>
<!DOCTYPE HTML>
<html lang = "en">
<head>
<meta charset = "utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">

  <title>"Homepage"</title>
  <link rel ="stylesheet" type ="text/css" href = "styling/Homepage.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="font-awesome.min.css">
  <link rel="stylesheet" href="bootstrap.min.css">
  </head>
  <body>
    <header id ="navHeading">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Expert Parking</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactUs.php">Contact Us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#"id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="signUp.php">Signup</a>
          <a class="dropdown-item" href="login.php">Login</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="adminLogin.php">Admin Login</a>
        </div>
      </li>
  </div>
</nav>
      <!--<ul>
        <li class = "active"><a href = "homepage.php">Home</a><i class ="fa fa-fw fa-home"></li>
        <li><a href = "contactUs.php">Contact Us</a><i class ="fa fa-fw-envelope"</li>
        <li><a href = "signUp.php">Sign Up</a></li>
        <li><a href="login.php">Login</a></li>
      </ul> -->
      <div id ="homepageText">
      Expert Parking
        </div>
      </header><br><br>
      <div class="about-section">
        <div class="inner-container">
          <h2>Get to know us</h2>
          <p class="text">
            We are a small parking business located in the heart of
            downtown New Haven, CT <br>and offer a unique parking service.
            <br>
            We call it the open-air concept and it basically means that you are not limited<br>
            to the number of hours you can stay with us. We believe that in a city like New Haven<br>
            where it can be difficult to find parking, it is important that you have a spot that is always available<br>
            to you. You can park the entire day, come in and out at no extra charge. No other parking lot here does that.

          </p>

        </div>

      </div>

        <section id="ourTeam">
          <div class="container my-3 py-5 text-center">
            <div class="row mb-5">
              <div class="col">
                <h1>Meet Our Experts</h1>
                <p class="mt-3">These are the people that put expert in Expert Parking</p>

              </div>
            </div>
            <div class="row cardContainer">
              <div class="col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body">
                    <img src="assets/elonMusk.jpg" alt="Founder and CEO" class="img-fluid rounded-circle w-50 mb-3">
                    <h3>Elon Musk</h3>
                    <h5>Founder and CEO</h5>
                    <p>Elon Musk is the founder and CEO of Expert Parking</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="card">
                  <div class="card-body">
                    <img src="assets/myPic2.jpg" alt="Software Engineer" class="img-fluid rounded-circle w-50 mb-3">
                    <h3>Khaled</h3>
                    <h5>Software Engineer</h5>
                    <p>Khaled is the company's software engineer. He also developed this website</p>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="ourPrices">
  <div class="container text-center py-5">
    <h1 class="display-4 sectionHeading">Parking Rates</h1>
    <p class="lead headingBio">Our parking rates. Unbeatable.</p>
  </div>
  <div class="container text-center">
    <div class="row row-cols-1 row-cols-md-3">
      <div class="col mb-4">
    <div class="card shadow-sm">
      <div class="card-header cardHeading">
        <h4>Daily Rate</h4>
      </div>
      <div class="card-body cardBox1">
        <h1 class="my-0 font-weight-normal">$10.00
          <small class="text-dark">/day</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li class="list">Flat rate daily fee</li><br>
            <li class="list">Unlimited parking for day</li><br>
            <li class="list">Pass only valid for one day</li><br>
            <li class="list">Overnight fee is $20.00</li>
          </ul>
      </div>
    </div>
  </div>
  <div class="col mb-4">
<div class="card shadow-sm">
  <div class="card-header cardHeading">
    <h4>Monthly Rate</h4>
  </div>
  <div class="card-body cardBox2">
    <h1 class="my-0 font-weight-normal">$150.00
      <small class="text-dark">/month</small></h1>
      <ul class="list-unstyled mt-3 mb-4">
        <li class="list">Unlimited parking for month</li><br>
        <li class="list">Pass only valid for one month</li><br>
        <li class="list">Can be auto-renewed</li><br>
      </ul>

  </div>
</div>
</div>

<div class="col mb-4">
<div class="card shadow-lg">
<div class="card-header cardHeading">
  <h4>Semesterly Rate</h4>
</div>
<div class="card-body cardBox3">
  <h1 class="my-0 font-weight-normal">$200.00
    <small class="text-dark">/Semester</small></h1>
    <ul class="list-unstyled mt-3 mb-4">
      <li class="list">Special deal for college students</li><br>
      <li class="list">Pass only valid for one semester</li><br>
      <li class="list">Must have a valid student ID</li>
      <li class="list">Can be auto-renewed</li>
    </ul>

</div>
</div>
</div>
  </div>
  </div>
</section>


</body><script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
