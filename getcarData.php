<?php
// Set delay 1 second. 
sleep(1);

// Create connection connect to mysql database
require_once 'init_inc.php';
$db=new DB; 

// Set encoding.
mysql_query('SET NAMES UTF8');

// Next dropdown list.
$nextList = isset($_GET['nextList']) ? $_GET['nextList'] : '';

switch($nextList) {
	case 'carmake':
		$typeID = isset($_GET['type_id']) ? $_GET['type_id'] : '';
		$sql ="
			SELECT
				model_id,
				model_name
			FROM
				insurance_model
			WHERE carmake_id = '{$typeID}'
		";
		break;
	
}

$data = array();
$rs=mysqli_query($db->con,$sql);
foreach($rs as $row){
	$data[] = $row;
}

// Print the JSON representation of a value
echo json_encode($data);
?>