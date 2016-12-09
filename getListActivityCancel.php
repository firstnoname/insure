 
<?php
 require_once("init_inc.php");
 $db=new DB; 
 $year=date('Y');
 $Activityid=$_GET['id'];
   
 $query="SELECT
insurance_relationship_view.vehicle_series,
insurance_relationship_view.vehicle_brand,
insurance_relationship_view.vehicle_chassis,
insurance_relationship_view.vehicle_full_chassis,
insurance_relationship_view.vehicle_regis,
insurance_relationship_view.regis_num_cc,
insurance_relationship_view.regis_car_type,
insurance_relationship_view.date_deliver,
insurance_relationship_view.regis_date,
insurance_relationship_view.cusno,
CONCAT(insurance_relationship_view.be,'',
insurance_relationship_view.cus_name,' ',
insurance_relationship_view.cus_surename) AS Customer,
insurance_relationship_view.relates_type,
insurance_relationship_view.cus_tel,
CASE WHEN ISNULL(insurance_customer_activity.customer_activity_id) THEN 'รายการใหม่' ELSE insurance_customer_activity.track_last_status END AS track_last_status, 
CASE WHEN ISNULL(insurance_customer_activity.customer_activity_id) THEN 'info' ELSE 'success' END AS info, 
insurance_customer_activity.date_appointment,
insurance_customer_activity.activity_Date,
insurance_relationship_view.vehicle_id,
insurance_customer_activity.activity_id,
insurance_activity.activity_name,
insurance_activity.activity_type,
insurance_activity.activity_month,
CONCAT(insurance_emp_view.emp_be,'',
insurance_emp_view.emp_name,' ',
insurance_emp_view.empsurname) AS empUser,
insurance_customer_activity.customer_activity_id,
insurance_customer_activity.activity_IsClose,
insurance_customer_activity.insurance_Status
FROM
insurance_customer_activity
RIGHT OUTER JOIN  insurance_relationship_view on  insurance_relationship_view.vehicle_id = insurance_customer_activity.vehicle_id
LEFT JOIN insurance_activity ON insurance_activity.id = insurance_customer_activity.activity_id
LEFT JOIN insurance_emp_view ON insurance_customer_activity.emp_id_card = insurance_emp_view.id_card ";
" WHERE  insurance_customer_activity.activity_IsClose=1"; 
} 
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
