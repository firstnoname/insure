<?php
// Set delay 1 second. 
sleep(1);
// Create connection connect to mysql database
 
require_once 'init_inc.php';
$db=new DB; 
// Set encoding.
mysql_query('SET NAMES UTF8');

// Next dropdown list.
//$nextList = isset($_GET['nextList']) ? $_GET['nextList'] : '';
$data = array();
		$cus_id = isset($_POST['cu_id']) ? $_POST['cu_id'] : '';
		$regis_id = isset($_POST['regis']) ? $_POST['regis'] : '';
		
if($regis_id !=""){
		$sql ="SELECT
insurance_payment_detail.payment_id,
insurance_payment_detail.payment_no,
insurance_payment_detail.payment_amount,
insurance_payment_detail.cus_id,
insurance_payment_detail.paid,
insurance_payment_detail.sale_id,
insurance_payment_detail.vehicle_id
FROM
insurance_payment_detail
				WHERE insurance_payment_detail.cus_id='{$cus_id}' and insurance_payment_detail.paid=0";
if($regis_id !="all"){
  $sql .=" and insurance_payment_detail.vehicle_id='{$regis_id}' ";	
}

$data = array();
$rs_detail=mysql_query($sql) or die(mysql_error());
while($row_rs_detail=mysql_fetch_array($rs_detail)){
	$data[] = $row_rs_detail;
}
}
echo json_encode($data);
?>