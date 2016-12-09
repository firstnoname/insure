<?php
require_once 'init_inc.php';

$db=new DB;
$rs=$db->select_alert('view_vehicle_customer',3);
//echo "<pre>";
//print_r($rs);

foreach($rs as $rw){
	echo $rw['customer_name'] . "-" . $rw['vehicle_deliver'] . "<br>";
}
?>