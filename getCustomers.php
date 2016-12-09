<?php
 require_once("init_inc.php");
 $db=new DB; 
$query="SELECT
insurance_customer_activity.vehicle_id,
insurance_customer_activity.track_last_status,
insurance_customer_activity.activity_Date,
insurance_customer_activity.activity_IsClose,
insurance_activity.activity_name,
CONCAT(insurance_emp_view.emp_be,'',
insurance_emp_view.emp_name,' ',insurance_emp_view.empsurname) AS emp_user,
CONCAT(insurance_relationship_view.be,'',
insurance_relationship_view.cus_surename,' ',
insurance_relationship_view.cus_name) AS customer,
insurance_relationship_view.vehicle_series,
insurance_relationship_view.vehicle_brand,
insurance_relationship_view.vehicle_chassis,
insurance_relationship_view.vehicle_regis,
insurance_relationship_view.vehicle_full_chassis,
insurance_relationship_view.regis_car_type,
insurance_relationship_view.relates_type,
insurance_customer_activity.activity_id,
insurance_relationship_view.cusno
FROM
insurance_customer_activity
INNER JOIN insurance_emp_view ON insurance_emp_view.id_card = insurance_customer_activity.emp_id_card
INNER JOIN insurance_activity ON insurance_activity.id = insurance_customer_activity.activity_id
INNER JOIN insurance_relationship_view ON insurance_relationship_view.vehicle_id = insurance_customer_activity.vehicle_id
order by activity_Date desc 	";
$result =mysql_query($query) or die(mysql_error());
 mysql_query("set NAMES utf8");
$arr = array();
 
while($row=mysql_fetch_array($result)){
		$arr[] = $row;	
	}
 
# JSON-encode the response
$json_response = json_encode($arr);

// # Return the response
echo $json_response;
?>
