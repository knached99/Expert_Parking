<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Account Creation</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    -->
    <!-- custom CSS-->
    <link href="styling/signUp.css" rel="stylesheet" media="all">
</head>

<body>
  <ul>
    <li><a href="homepage.php">Home</a></li>
    <li><a href="homepage.php">Contact Us</a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Create your account</h2>
                    <form method="POST" action="backendLogic/validateSignup.php">
                      <?php
                      $webUrl = "http://$_SERVER[HTTP_POST]$_SERVER[REQUEST_URI]";
                      if(strpos($webUrl, "emptyFields")){
                        echo '<p style="background-color: #d9534f; font-size: 25px; color: #fff; font-weight: bolder;"> All fields are required <i class="fa fa-exclamation-circle"></i></p>';
                      }
                      else if(strpos($webUrl, "invalidEmail")){
                        echo '<p style="background-color: #d9534f; font-size: 25px; color: #fff; font-weight: bolder;">Email entered is not valid <i class="fa fa-exclamation-circle"></i></p>';

                      }
                       else if(strpos($webUrl, "invalidNum")){
                         echo '<p style="background-color: #d9534f; font-size: 25px; color: #fff; font-weight: bolder;">Phonenumber entered is not valid <i class="fa fa-exclamation-circle"></i></p>';

                       }
                       else if(strpos($webUrl, "invalidPassword")){
                         echo '<p style="background-color: #d9534f; font-size: 25px; color: #fff; font-weight: bolder;">Password must meet the following requirements <i class="fa fa-exclamation-circle"></i></p>
                         <ul style="background-color: #000; color: #fff; word-spacing: 4px;">
                         <li>Must be at least 8 characters long</li><br>
                         <li>Must have at least 1 UPPERCASE letter</li><br>
                         <li>Must have at least 1 number</li><br>
                         <li>Must have at least 1 special character</li>
                         </ul>
                         ';

                       }
                       else if(strpos($webUrl, "passwordsNotMatched")){
                         echo '<p style="background-color: #d9534f; font-size: 25px; color: #fff; font-weight: bolder;">Both passwords must match <i class="fa fa-exclamation-circle"></i></p>';

                       }
                       else if(strpos($webUrl, "invalidLicense")){
                         echo '<p style="background-color: #d9534f; font-size: 25px; color: #fff; font-weight: bolder;">License plate entered is not valid <i class="fa fa-exclamation-circle"></i></p>';

                       }
                       else if(strpos($webUrl, "sqlError")){
                         echo '<p style="background-color: #f0ad4e; font-size: 25px; color: #fff; font-weight: bolder;">Error in SQL connection to database <i class="fa fa-exclamation-circle"></i></p>';

                       }
                       else if(strpos($webUrl, "secondSqlError")){
                         echo '<p style="background-color: #f0ad4e; font-size: 25px; color: #fff; font-weight: bolder;">Error in SQL connection to database <i class="fa fa-exclamation-circle"></i></p>';

                       }
                       else if(strpos($webUrl, "noneSelected")){
                         echo '<p style="background-color: #d9534f; font-size: 25px;  color: #fff; font-weight: bolder;">Must select customer type <i class="fa fa-exclamation-circle"></i></p>';

                       }
                       else if(strpos($webUrl, 'not_a_student') == TRUE){
                         echo '<p style="background-color: #d9534f; font-size: 25px;  color: #fff; font-weight: bolder;">To be a semesterly student, you must enter your <b style="color: #000;">.edu</b> email address <i class="fa fa-exclamation-circle"></i></p>';
                       }
                       else if(strpos($webUrl, "userExists")){
                         echo '<p style="background-color: #f0ad4e; font-size: 25px; color: #fff; font-weight: bolder;">Looks like you already have an account with us. Go ahead and login or reset password if forgotten <i class="fa fa-exclamation-circle"></i></p>';

                       }
                       else if(strpos($webUrl, "invalidYear")){
                         echo '<p style="background-color: #d9534f; font-size: 25px; color: #fff; font-weight: bolder;">Year entered is not a valid year <i class="fa fa-exclamation-circle"></i></p>';

                       }
                       else if(strpos($webUrl, "signupSuccessful")){
                         echo '<p style="background-color: #5cb85c; font-size: 25px; color: #fff; font-weight: bolder;">Successfully created account, go ahead and login <i class="fa fa-check-circle"></i></p>';

                       }


                      ?>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input class="input--style-4" type="text" name="firstName">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" name="lastName">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Choose Customer Type</label>
                                    <div class="p-t-10">
                                      <select name="custType" class="selectStyling">
                                        <option value="0">Must select customer type</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="semesterly">Semesterly</option>
                                      </select>
                                      <!--
                                        <label class=" radio-container m-r-45">Monthly
                                            <input type="radio"  name="custType" value="monthly">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Semesterly
                                            <input type="radio" name="gender" value="semesterly">
                                            <span class="checkmark"></span>
                                        </label>
                                      -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone number</label>
                                    <input class="input--style-4" type="tel" name="phoneNum" placeholder="123-456-7890">
                                </div>

                            </div>
                            <div class="col-2">
                              <label class="label">Password</label>
                              <input type="password" class="input--style-4" name="passWord">
                            </div>
                            <div class="col-2">
                              <label class="label">Retype Password</label>
                              <input type="password" class="input--style-4" placeholder="Enter same password"name="retypePassword">
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Vehicle Make</label>
                                    <input class="input--style-4" type="text" placeholder="Example: Toyota"name="vehMake">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                        <div class="col-2">
                        <div class="input-group">
                            <label class="label">Vehicle Model</label>
                            <input class="input--style-4" type="text" name="vehModel" placeholder="Example: Camry">
                        </div>
                      </div>
                      <div class="col-2">
                      <div class="input-group">
                          <label class="label">Vehicle Color</label>
                          <input class="input--style-4" type="text" name="vehColor" placeholder="Example: Red">
                      </div>
                    </div>
                    <div class="col-2">
                    <div class="input-group">
                        <label class="label">Vehicle Year</label>
                        <input class="input--style-4" type="text" name="vehYear" placeholder="Example: 2020">
                    </div>
                  </div>
                  <div class="col-2">
                  <div class="input-group">
                      <label class="label">Vehicle License Plate</label>
                      <input class="input--style-4" type="text" name="vehLicense" placeholder="Example: MURICA20">
                  </div>
                </div>

                </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="createAcct">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
