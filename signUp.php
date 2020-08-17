<!DOCTYPE html>
<html>
  <head>
    <title>Simple registration form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel ="stylesheet" type="text/css" href ="signUp.css">

  </head>
  <body>
    <ul>
      <li><a href = "homepage.php">Home</a></li>
      <li><a href = "contactUs.php">Contact Us</a></li>
      <li class ="active"><a href = "signUp.php">Sign Up</a></li>
    </ul>
    <div class="main-block">
      <h1>Vehical Signup</h1>
      <form action="/">
        <hr>

      <!-- For vehMake, vehModel, vehYear
        // I want to have a DB with all these vehicles and years
        // i want to dynanically inject the drop down from the DB

        // Once they sign up it takes the user to their dash board. And it shows them their info
        // there could be a section called payments and they can see if they need to pay and when their renewal expires

      -->
        <label id="icon" for="name"><i class="fas fa-envelope"></i></label>
        <input type="text" name="name" id="email" placeholder="Email" required/>
        <label id="icon" for="name"><i class="fas fa-user"></i></label>
        <input type="text" name="name" id="name" placeholder="First name" required/>
        <label id="icon" for="name"><i class="fas fa-user"></i></label>
        <input type="text" name="name" id="name" placeholder="Last name" required/>
        <label id="icon" for="name"><i class="fas fa-phone"></i></label>
        <input type="tel" name = "name" placeholder = "(xxx)-xxx-xxxx" id ="phoneNum" required/>
        <label id ="icon" for ="name"><i class ="fas fa-car"></i></label>
          <input type ="text" name ="name" placeholder ="Make"id = vehMake required>
          <label id ="icon" for ="name"><i class ="fas fa-car"></i></label>
          <input type ="text" name ="name" placeholder="Model" id ="vehModel" required>
          <label id ="icon" for ="name"><i class ="fas fa-calendar"></i></label>
          <input type ="text" name ="name" placeholder="Year"id ="vehYear" required>
          <br>
          <label id ="icon" for ="name"><i class ="fas fa-address-card"></i></label>
          <input type ="text" name ="name" placeholder="License plate" id ="vehLicense" required>

        <hr>
        <hr>
        <div class="btn-block">
          <button type="submit" href="/">Submit</button>
        </div>
      </form>
    </div>
  </body>
</html>
