<?php
// Set delay 1 second. 
sleep(1);

require_once('init_inc.php');
$db=new DB; 
 
// Set encoding.
mysql_query('SET NAMES UTF8');

// Next dropdown list.
$nextList = isset($_POST['nextList']) ? $_POST['nextList'] : '';

switch($nextList) {
	case 'amphur':
		$provinceID = isset($_POST['provinceID']) ? $_POST['provinceID'] : '';
		$result = mysql_query("
			SELECT
				AMPHUR_ID,
				AMPHUR_NAME
			FROM
				amphur
			WHERE PROVINCE_ID = $provinceID");
		break;
	case 'tumbon':
		$amphurID = isset($_POST['amphurID']) ? $_POST['amphurID'] : '';
		$result = mysql_query("
			SELECT
				DISTRICT_ID,
				DISTRICT_NAME
			FROM
				district
			WHERE AMPHUR_ID = $amphurID");
		break;
}

$data = array();
while($row = mysql_fetch_assoc($result)) {
	$data[] = $row;
}
// Print the JSON representation of a value
echo json_encode($data);
?>