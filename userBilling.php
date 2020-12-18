<?php
session_start();
require('backendLogic/dbHandler.php');
?>


<html>
<head>
  <meta charset = "utf-8">
  <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<link rel ="stylesheet" type="text/css" href="styling/billing.css">

</head>

<body>
  <ul>
    <li><a href="userDashboard.php">Go Back</a></li>
  </ul>
  <div class="headerSection">
    <div class ="headerSection">

      <h2>
      Payment due on 12/31/2020
</h2>
    </div>
  </div>
<div id ="billingChart">

</div>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src ="jsFiles/billing.js"></script>
</body>
</html>
