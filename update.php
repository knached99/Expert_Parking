<?php
// Include config file
require( "dbHandler.php");

// Define variables and initialize with empty values
$email = $phoneNum = $vehMake = $vehModel= $vehColor = $vehYear = $vehLicense= "";
$email_err = $phoneNum_err = $make_err =$model_err = $color_err = $year_err = $license_err = "";

// Processing form data when form is submitted
if(isset($_POST["userId"]) && !empty($_POST["userId"])){
    // Get hidden input value
    $param_id = $_POST["userId"];

    // Validate Email
    $input_email = $_POST["email"];
    if(empty($input_email)){
        $email_err = "Please enter the new email";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_err = "Please enter a valid email.";
    } else{
        $email = $input_email;
    }

    // Validate Phone number
    $input_phone = $_POST["phoneNum"];
    if(empty($input_phone)){
        $phoneNum_err = "Please enter a phonenumber";
    } else if(preg_match("/^([1]-)?[0-9]{3}-[0-9]{3}-[0-9]{4}$/i", $phoneNum)){
        $phoneNum = $input_phone;
    }

    // Validate Vehicle Year
    $input_year = $_POST["vehYear"];
    if(empty($input_year)){
        $year_err = "Enter the vehicle's year ";
    } elseif(!ctype_digit($input_year) && $input_year.length($vehYear)!=4){
        $year_err = "Please enter a valid year";
    } else{
        $phoneNum = $input_phone;
    }
    $input_license = $_POST['vehLicense'];
    if(empty($input_license)){
      $license_err = 'Enter the license plate';

    }// Validate License Plate Information
    else if((strlen((string)$vehLicense) <7 ||strlen((string)$vehLicense) >8) && !preg_match("/([A-HJ-PR-Y]{2}([0][1-9]|[1-9][0-9])|[A-HJ-PR-Y]{1}([1-9]|[1-2][0-9]|30|31|33|40|44|55|50|60|66|70|77|80|88|90|99|111|121|123|222|321|333|444|555|666|777|888|999|100|200|300|400|500|600|700|800|900))[ ][A-HJ-PR-Z]{3}$/", (string)$vehLicense)){
      $license_err = "Please enter a valid license plate";

    }
    else{
      $vehLicense = $input_license;
    }

    // Check input errors before inserting in database
    if(empty($email_err) && empty($phoneNum_err) && empty($make_err) && empty($model_err) && empty($color_err)&& empty($year_err)&&empty($license_err)){
        // Prepare an update statement
        $sql = "UPDATE newUsers SET email=?, phoneNum=?, vehMake=?, vehModel =?, vehColor =?, vehYear=?, vehLicense =? WHERE id=?";

        if($stmt = mysqli_prepare($connectToDb, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sisssis",   $param_email, $param_num, $param_make, $param_model, $param_color, $param_year, $param_license);

            // Set parameters
            $param_email = $email;
            $param_num = $phoneNum;
            $param_make = $vehMake;
            $param_model =$vehModel;
            $param_color = $vehColor;
            $param_year = $vehYear;
            $param_license = $vehLicense;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: manageCustomers.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($connectToDb);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM employees WHERE id = ?";
        if($stmt = mysqli_prepare($connectToDb, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    $email = $row["email"];
                    $phoneNum = $row["phoneNum"];
                    $vehMake = $row["vehMake"];
                    $vehModel = $row['vehModel'];
                    $vehColor = $row['vehColor'];
                    $vehYear = $row['vehYear'];
                    $vehLicense = $row['vehLicense'];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($connectToDb);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Customer Information</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($phoneNum_err)) ? 'has-error' : ''; ?>">
                            <label>Phonenumber</label>
                            <input type="tel" class="form-control"><?php echo $phoneNumber; ?></textarea>
                            <span class="help-block"><?php echo $phoneNum_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($make_err)) ? 'has-error' : ''; ?>">
                            <label>Vehicle Make</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $vehMake; ?>">
                            <span class="help-block"><?php echo $make_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($model_err)) ? 'has-error' : ''; ?>">
                            <label>Vehicle Model</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $vehModel; ?>">
                            <span class="help-block"><?php echo $model_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($color_err)) ? 'has-error' : ''; ?>">
                            <label>Vehicle Color</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $vehColor; ?>">
                            <span class="help-block"><?php echo $color_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($veh_err)) ? 'has-error' : ''; ?>">
                            <label>Vehicle Year</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $vehYear; ?>">
                            <span class="help-block"><?php echo $veh_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($year_err)) ? 'has-error' : ''; ?>">
                            <label>License Plate </label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $vehYear; ?>">
                            <span class="help-block"><?php echo $year_err;?></span>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="manageCustomers.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
