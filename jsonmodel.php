<?php
// Set delay 1 second. 
sleep(2);

// Create connection connect to mysql database
require_once('init_inc.php');
$db=new DB; 
// Set encoding.
mysql_query('SET NAMES UTF8');

 
 
		$carmark_id = isset($_POST['carmark_id']) ? $_POST['carmark_id'] : '';
		$result = mysql_query("
			SELECT
				model_id,
				model_name
			FROM
				insurance_model
			WHERE carmark_id = $carmark_id");
 
$data = array();
while($row = mysql_fetch_assoc($result)) {
	$data[] = $row;
}

// Print the JSON representation of a value
echo json_encode($data);
?>