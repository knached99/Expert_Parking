<!DOCTYPE html>
<html lang ="en">
<head>
  <meta charset = "utf-8">
  <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">

    <title>www.ExpertParking.com</title>
    <link rel ="stylesheet" type ="text/css" href = "loginPage.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
    <ul>
      <li><a href = "homepage.php">Home</a><i class ="fa fa-fw fa-home"></li>
      <li><a href = "contactUs.php">Contact Us</a><i class ="fa fa-fw-envelope"</li>
      <li><a href = "signUp.php">Sign Up</a></li>
    <div class ="formWrapper">
      <h1>
      Member Login
      </h1>
      <form id ="lognPage" onsubmit="return validateLogin()">
        <div class ="inputField">
          <input type ="text" placeholder="username" id ="userName">
        </div>
        <div class ="inputField">
          <input type ="password" placeholder="password" id ="passWord">
        </div>
        <div class ="submitButton">
          <input type ="submit" value ="Login">
        </div>
        <div id ="forgotLogin">
        Forgot Password?<a href ="forgotLogin.html" id="hrefStyle"> Click Here </a> // have a way to recover that password. 
        </div>
      </form>
    </div>
    </body>
</html>
