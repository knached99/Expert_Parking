<!DOCTYPE HTML>
<html lang ="en" dir="ltr">
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
  <div class="container">
<?php
if(isset($_POST['search_cust'])){
  require('dbHandler.php');
  $customer = mysqli_real_escape_string($connectToDb, $_POST['cust_name']);
  if(empty($customer)){
    header('Location: ../adminDashboard2/template/pages/tables/customer_data.php?emptySearch');
    exit();
  }
  else{
    $search_query = "SELECT * FROM newUsers WHERE firstName LIKE '%$customer%'";
    $queryResults = mysqli_query($connectToDb, $search_query);
    $search_results = mysqli_num_rows($queryResults);

    if($search_results > 0){
      echo '
      <table class="table table-bordered table-light shadow-lg p-3 mb-5 bg-light rounded">
      <thead class="bg-primary text-light">
      <tr>
      <th scope="col">User ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Vehicle Make</th>
      <th scope="col">Vehicle Model</th>
      <th scope="col">Vehicle Color</th>
      <th scope="col">Vehicle Year</th>
      <th scope="col">License Plate</th>
      <th scope="col">Customer Type</th>
      <th scope="col">Account Status</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      </tr>
      </thead>
      <tbody>
      ';
      echo '<p class=" alert alert-primary" style="width: 40%;">We found <b class="text-dark">'.$search_results.'</b> result(s) matching <b class="text-dark">'.$customer.'</b> <a href="../adminDashboard2/template/pages/tables/customer_data.php"><i title="go back" class="far fa-arrow-alt-circle-left"></i></a></p>';
      while($row = mysqli_fetch_assoc($queryResults)){
        switch($row['verified']){
          case 0:
          $account_status= '
          <div class="badge badge-danger font-weight-bold text-white">Account not yet verified <i class="fa fa-exclamation-circle"></i></div>
          ';
          break;
          case 1:
          $account_status = '
          <div class="badge badge-success font-weight-bold text-white">Account verified <i class="fa fa-check-circle"></i></div>

          ';
        }
        echo '<tr>';
        echo '<td>'.$row['userId'].'</td>';
        echo '<td>'.$row['firstName'].'</td>';
        echo '<td>'.$row['lastName'].'</td>';
        echo '<td>'.$row['email'].'</td>';
        echo '<td>'.$row['phoneNum'].'</td>';
        echo '<td>'.$row['vehMake'].'</td>';
        echo '<td>'.$row['vehModel'].'</td>';
        echo '<td>'.$row['vehColor'].'</td>';
        echo '<td>'.$row['vehYear'].'</td>';
        echo '<td>'.$row['vehLicense'].'</td>';
        echo '<td>'.$row['custType'].'</td>';
        echo '<td>'.$account_status.'</td>';
        echo '<td>'.DATE('F, jS, Y', strtotime($row['start_date'])).'</td>';
        if(!isset($row['end_date'])){
          echo '<td class="text-danger font-weight-bold">No end date specified <i class="fa fa-exclamation-circle"></i></td>';
        }
        echo '</tr>';


      }
    }
    else{
      header('Location: ../adminDashboard2/template/pages/tables/customer_data.php?noResults');
      exit();
      //echo '<h2 class=" alert alert-danger" style="width: 40%;">We found <b class="text-dark">'.$search_results.'</b> results matching <b class="text-dark">'.$ticket.'</b> <i class="far fa-times-circle"></i></h2>';
      //echo '<img src="https://cdn.dribbble.com/users/1554526/screenshots/3399669/no_results_found.png">';
      //header('Location: adminView.php?noResults');
      //exit();
    }
  }
}
?>
</table>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
