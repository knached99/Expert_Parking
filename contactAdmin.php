

<head>
  <meta charset="utf-8">
  <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
    <title>Contact Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel ="stylesheet" type="text/css" href="styling/contactAdmin.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
  <ul>
    <li><a href="userDashboard.php">Go Back</a></li>
  </ul>
  <div class="container">
    <div class ="row">
      <div class="col-lg-6 m-auto">
        <div class="card mt-5">
          <div class="card-title">
            <h2 class="text-center py-2" style="background-color: #4287f5; color: #fff; font-weight: 700;">Contact Admin</h2>
            <hr>
            <?php
            $Msg = '';
            if(isset($_GET['emptyfields'])){
              $Msg = 'All fields are required';
              echo '<div class="alert alert-danger">'.$Msg. ' <i class="fa fa-warning"></i></div>';
            }
            else if(isset($_GET['invalidNumber'])){
              $Msg = 'Invalid Phonenumber';
              echo '<div class="alert alert-danger">'.$Msg. ' <i class="fa fa-warning"></i></div>';
            }
            else if(isset($_GET['invalidEmail'])){
              $Msg = 'Invalid Email';
              echo '<div class="alert alert-danger">'.$Msg. ' <i class="fa fa-warning"></i></div>';

            }
            else if(isset($_GET['nosubject'])){
              $Msg = 'Must select a subject';

              echo '<div class="alert alert-danger">'.$Msg. ' <i class="fa fa-times"></i></div>';
            }
            else if(isset($_GET['messageLen'])){
              $Msg = 'Message cannot be less than 100 characters';

              echo '<div class="alert alert-danger">'.$Msg. ' <i class="fa fa-times"></i></div>';
            }
            else if(isset($_GET['messagesent'])){
              $Msg = 'We have recieved your message and will be reaching back to you soon!';

              echo '<div class="alert alert-success">'.$Msg. ' <i class="fa fa-check"></i></div>';
            }
            else{
              pass;
            }

            ?>

          </div>
          <div class="card-body wrapper">
            <form action="backendLogic/validateMessage.php" method = "POST">
              <input type ="text" name="firstName"  placeholder="First Name" class="form-control mb-2 input_field">
              <input type ="text" name="lastName"  placeholder="Last Name" class="form-control mb-2 input_field">
              <input type ="text" name="email"  placeholder="Enter your email" class="form-control mb-2 input_field">
              <input type ="tel" name="phoneNum"  placeholder="Phonenumber (no dashes)" class="form-control mb-2 input_field">
              <div class ="=dropDown">
               <select class ="dropDown" name ="subject">
                <option value ="0">Select a subject</option>
                <option value ="1">Cancel Monthly Subscription</option>
                <option value ="2">Cancel Semesterly Subscription</option>
                <option value ="3">Complaint</option>
                <option value="4">General Question</option>
               </select>
              </div>
              <textarea class="form-control input_field" name="message" rows="3" placeholder="Briefly describe why you are contacting us"></textarea>
              <br>
              <button class="btn btn-success" name="submit" style="width: 100%;">Submit your request</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
