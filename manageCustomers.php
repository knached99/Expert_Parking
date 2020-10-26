<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel ="stylesheet" type="text/css" href="customers.css">

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
  <ul>
    <li><a href="adminDash.php">Go Back</a></li>
  </ul>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  <div class="page-header clearfix">
                        <h2 class="pull-left">Currently Active Customers</h2>
                  </div>
                    <?php
                    // Include config file
                    require('dbHandler.php');

                    // Attempt select query execution
                    $sql = "SELECT * FROM newUsers";
                    if($result = mysqli_query($connectToDb, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>User ID</th>";
                                        echo "<th>First Name</th>";
                                        echo "<th>Last Name</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Phone number</th>";
                                        echo "<th>Make</th>";
                                        echo "<th>Model</th>";
                                        echo "<th>Color</th>";
                                        echo "<th>Year</th>";
                                        echo "<th>License</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['userId'] . "</td>";
                                        echo "<td>" . $row['firstName'] . "</td>";
                                        echo "<td>" . $row['lastName'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['phoneNum'] . "</td>";
                                        echo "<td>" . $row['vehMake'] . "</td>";
                                        echo "<td>" . $row['vehModel'] . "</td>";
                                        echo "<td>" . $row['vehColor'] . "</td>";
                                        echo "<td>" . $row['vehYear'] . "</td>";
                                        echo "<td>" . $row['vehLicense'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='update.php?id=". $row['userId'] ."' title='Update Details' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['userId'] ."' title='Delete Customer' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No Data Is Available.</em></p>";
                        }
                    } else{
                        echo "<strong>ERROR</strong>: Unable to execute the SQL script";
                    }

                    // Close connection
                    mysqli_close($connectToDb);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
