
<?php
// start the session to remember the user

session_start();
 date_default_timezone_set("America/New_York");
 require('backendLogic/dbHandler.php');
//$query = 'SELECT * FROM newUsers WHERE email="'.$_SESSION['email'].'"';
//if(isset($_SESSION['email'])){
  //echo '<h1>Welcome Back<sup><img src="sillyEmoji.png"</sup></h1>';
//}
if(isset($_SESSION['email'])){
//echo '<h2>Welcome back!</h2>';
}
else{
  header('Location: login.php');
  echo '<h1>You are logged out!</h1>';
  echo '<p>Return to the login page</p>';

  session_unset();
  session_destroy();
  header('Location: login.php');
  exit();

}


require('backendLogic/dbHandler.php');

$queryDb = 'SELECT * FROM newUsers WHERE email="'.$_SESSION["email"].'"';
$queryResults = mysqli_query($connectToDb, $queryDb);
$profile_img = '';
if(mysqli_num_rows($queryResults)>0){
  // store the sessions in variables
  while($row=mysqli_fetch_assoc($queryResults)){
$userId = $_SESSION['userId'] = $row['userId'];
$firstName = $_SESSION['firstName'] =$row['firstName'];
$lastName = $_SESSION['lastName'] =$row['lastName'];
$email=  $_SESSION['email'] =$row['email'];
$phoneNum=  $_SESSION['phoneNum'] =$row['phoneNum'];
$custType = $_SESSION['custType'] = $row['custType'];
$vehMake=  $_SESSION['vehMake']=$row['vehMake'];
$vehModel=  $_SESSION['vehModel']=$row['vehModel'];
$vehColor =  $_SESSION['vehColor']=$row['vehColor'];
$vehYear=  $_SESSION['vehYear']=$row['vehYear'];
$vehLicense=  $_SESSION['vehLicense']=$row['vehLicense'];
$startDate=  $_SESSION['startDate'] =$row['startDate'];
$endDate=  $_SESSION['endDate'] = $row['endDate'];
$profile_img_status = $_SESSION['profile_img_status'] = $row['profile_img_status'];
$wallpaper_img_status = $_SESSION['$wallpaper_img_status'] = $row['$wallpaper_img_status'];
if($profile_img_status ==1){
  $profile_img = 'https://futurestarbio.com/wp-content/uploads/2020/11/lilhuddy_20201115_3-1-11-913x1024.jpg';
}
else if($profile_img_status ==0){
  $profile_img = 'https://moonvillageassociation.org/wp-content/uploads/2018/06/default-profile-picture1.jpg';
}
}
}



?>
<!DOCTYPE HTML>
<html lang="en" dir="ltr">
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
  body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color:  #d4d3d2;/*#EF5350;*/
    background-repeat: no-repeat
}

.card {
    padding: 30px 25px 35px 50px;
    border-radius: 30px;
    box-shadow: 0px 4px 8px 0px  #d4d3d2;/*#B71C1C;*/
    margin-top: 50px;
    margin-bottom: 50px
}

.border-line {
    border-right: 1px solid #BDBDBD
}

.text-sm {
    font-size: 13px
}

.text-md {
    font-size: 18px
}

.image {
    width: 60px;
    height: 30px
}

::placeholder {
    color: grey;
    opacity: 1
}

:-ms-input-placeholder {
    color: grey
}

::-ms-input-placeholder {
    color: grey
}

input {
    padding: 2px 0px;
    border: none;
    border-bottom: 1px solid lightgrey;
    margin-bottom: 5px;
    margin-top: 2px;
    box-sizing: border-box;
    color: #000;
    font-size: 16px;
    letter-spacing: 1px;
    font-weight: 500
}

input:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border-bottom: 1px solid #EF5350;
    outline-width: 0
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

.btn-red {
    background-color: #EF5350;
    color: #fff;
    padding: 8px 25px;
    border-radius: 50px;
    font-size: 18px;
    letter-spacing: 2px;
    border: 2px solid #fff
}

.btn-red:hover {
    box-shadow: 0 0 0 2px #EF5350
}

.btn-red:focus {
    box-shadow: 0 0 0 2px #EF5350 !important
}
.btn-green{
  background-color: #5cb85c;
  color: #fff;
  padding: 8px 25px;
  border-radius: 50px;
  font-size: 18px;
  letter-spacing: 2px;
  border: 2px solid #fff
}
.btn-green:hover{
  box-shadow: 0 0 0 2px #5cb85c;

}
.btn-green:focus{
  box-shadow: 0 0 0 2px #5cb85c !important

}
.btn-blue{
  background-color: #0275d8;
  color: #fff;
  padding: 8px 25px;
  border-radius: 50px;
  font-size: 18px;
  letter-spacing: 2px;
  border: 2px solid #fff
}
.btn-blue:hover{
  box-shadow: 0 0 0 2px #0275d8;

}
.btn-blue:focus{
  box-shadow: 0 0 0 2px #0275d8 !important

}

.custom-checkbox .custom-control-input:checked~.custom-control-label::before {
    background-color: #EF5350
}

@media screen and (max-width: 575px) {
    .border-line {
        border-right: none;
        border-bottom: 1px solid #EEEEEE
    }
}
  </style>
</head>
<body>
<?php
if($custType =='semesterly'){

echo '
  <div class="container-fluid px-1 px-md-2 px-lg-4 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-sm-11">
        <a href="memberdashboard/memberDash2.php" class="btn btn-blue font-weight-bold">Go Home</a>

            <div class="card border-0">
                <div class="row justify-content-center">
                    <h3 class="mb-4">Expert Parking Invoice</h3>
                </div>
                <div class="row">
                    <div class="col-sm-7 border-line pb-3">
                        <div class="form-group">
                            <p class="text-muted text-sm mb-0">Name on the card</p> <input type="text" name="name" placeholder="Name"  size="15">
                        </div>
                        <div class="form-group">
                            <p class="text-muted text-sm mb-0">Card Number</p>
                            <div class="row px-3"> <input type="text" name="card-num" placeholder="0000 0000 0000 0000" size="18" id="cr_no" minlength="19" maxlength="19">
                                <p class="mb-0 ml-3">/</p> <img class="image ml-1" src="https://i.imgur.com/WIAP9Ku.jpg">
                            </div>
                        </div>
                        <div class="form-group">
                            <p class="text-muted text-sm mb-0">Expiry date</p> <input type="text" name="exp" placeholder="MM/YY" size="6" id="exp" minlength="5" maxlength="5">
                        </div>
                        <div class="form-group">
                            <p class="text-muted text-sm mb-0">CVV/CVC</p> <input type="password" name="cvv" placeholder="000" size="1" minlength="3" maxlength="3">
                        </div>
                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input" checked> <label for="chk1" class="custom-control-label text-muted text-sm">save my card for future payment</label> </div>
                        </div>
                    </div>
                    <div class="col-sm-5 text-sm-center justify-content-center pt-4 pb-4"> <small class="text-sm text-muted">Confirmation number</small>
                        <h5 class="mb-5">'.$userId.'</h5> <small class="text-sm text-muted">Payment amount</small>
                        <div class="row px-3 justify-content-sm-center">
                            <h2 class=""><span class="text-md font-weight-bold mr-2">$</span><span class="text-success">$200.00</span></h2>
                        </div> <button type="submit" class="btn btn-red text-center mt-4">PAY</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
';
}
else if($custType == 'monthly'){
  echo '

    <div class="container-fluid px-1 px-md-2 px-lg-4 py-5 mx-auto">

      <div class="row d-flex justify-content-center">

          <div class="col-xl-7 col-lg-8 col-md-9 col-sm-11">
          <a href="memberdashboard/memberDash2.php" class="btn btn-blue font-weight-bold">Go Home</a>

              <div class="card border-0">
                  <div class="row justify-content-center">
                      <h3 class="mb-4">Expert Parking Invoice</h3>
                  </div>
                  <div class="row">
                      <div class="col-sm-7 border-line pb-3">
                          <div class="form-group">
                              <p class="text-muted text-sm mb-0">Name on the card</p> <input type="text" name="name" placeholder="Name"  size="15">
                          </div>
                          <div class="form-group">
                              <p class="text-muted text-sm mb-0">Card Number</p>
                              <div class="row px-3"> <input type="text" name="card-num" placeholder="0000 0000 0000 0000" size="18" id="cr_no" minlength="19" maxlength="19">
                                  <p class="mb-0 ml-3">/</p> <img class="image ml-1" src="https://i.imgur.com/WIAP9Ku.jpg">
                              </div>
                          </div>
                          <div class="form-group">
                              <p class="text-muted text-sm mb-0">Expiry date</p> <input type="text" name="exp" placeholder="MM/YY" size="6" id="exp" minlength="5" maxlength="5">
                          </div>
                          <div class="form-group">
                              <p class="text-muted text-sm mb-0">CVV/CVC</p> <input type="password" name="cvv" placeholder="000" size="1" minlength="3" maxlength="3">
                          </div>
                          <div class="form-group mb-0">
                              <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input" checked> <label for="chk1" class="custom-control-label text-muted text-sm">save my card for future payment</label> </div>
                          </div>
                      </div>
                      <div class="col-sm-5 text-sm-center justify-content-center pt-4 pb-4"> <small class="text-sm text-muted">Confirmation number</small>
                          <h5 class="mb-5">'.$userId.'</h5> <small class="text-sm text-muted">Payment amount</small>
                          <div class="row px-3 justify-content-sm-center">
                              <h2 class=""><span class="text-md font-weight-bold mr-2">$</span><span class="text-success">$150.00</span></h2>
                          </div> <button type="submit" class="btn btn-red text-center mt-4">PAY</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  ';
}
?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
