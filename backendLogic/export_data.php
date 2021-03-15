<?php
require('dbHandler.php');
// Set server time to Eastern Time Zone
date_default_timezone_set('AMERICA/New_York');
$file_name = 'Gross_revenue_as_of_'.DATE("m/d/Y").'.csv';
$open_file = fopen('php://output', 'w');
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename='.$file_name.'');
fputcsv($open_file, $header);

$fetch_data = 'SELECT * FROM profitTable';
$results = mysqli_query($connectToDb, $fetch_data);
if(mysqli_num_rows($results) <= 0){
  echo 'There is no data to be exported';
  exit();
}
while($row = mysqli_fetch_row($results)){
  fputcsv($open_file, $row);
}
exit();

?>
