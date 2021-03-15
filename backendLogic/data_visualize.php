<?php
// Dynamically pull profit data
// Data visualize using graph
require('dbHandler.php');
header('Content-Type: application/json');
$get_revenue = sprintf('SELECT * FROM profitTable');
$get_results = mysqli_query($connectToDb, $get_revenue);
$data = array(); // Create an empty array to append JSON data to
foreach($get_results as $row){
  $data = $row();
}
$get_results->close();
mysqli_close($connectToDb);
print json_encode($data);

?>
