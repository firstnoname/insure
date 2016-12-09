 
<?php
 require_once("init_inc.php");
 $db=new DB; 
 $query="SELECT
insurance_presale.id,
insurance_relationship_view.vehicle_id,
insurance_relationship_view.vehicle_series,
insurance_relationship_view.vehicle_brand,
insurance_relationship_view.vehicle_chassis,
insurance_relationship_view.vehicle_full_chassis,
insurance_relationship_view.vehicle_regis,
insurance_relationship_view.cusno,
CONCAT(insurance_relationship_view.be,'',
insurance_relationship_view.cus_name,' ',
insurance_relationship_view.cus_surename) AS Customer,
insurance_relationship_view.relates_type,
insurance_presale.sale_status,
CONCAT(insurance_emp_view.emp_be,'',
insurance_emp_view.emp_name,' ',
insurance_emp_view.empsurname) AS empUser,
insurance_presale.activities_track_call_id,
insurance_activity_track_call.date_create,
CASE WHEN insurance_presale.sale_status=0 then 'info' else 'default' END as info_button,
CASE WHEN insurance_presale.sale_status=0 then 'eye' else 'check' END as info_icon,
CASE WHEN insurance_presale.sale_status=0 then '' else 'disabled' END as info_class,
CASE WHEN insurance_presale.sale_status=0 then 'disabled' else '' END as print_class,
CASE WHEN insurance_presale.sale_status=0 then 'info' else 'success' END as info,
CASE WHEN insurance_presale.sale_status=0 then 'รอปิดการขาย' else 'ปิดการขาย' END as track_last_status
FROM
insurance_presale
INNER JOIN insurance_relationship_view ON insurance_presale.vehicle_id = insurance_relationship_view.vehicle_id
INNER JOIN insurance_activity_track_call ON insurance_activity_track_call.activity_track_call_id = insurance_presale.activities_track_call_id
INNER JOIN insurance_customer_activity ON insurance_activity_track_call.customer_activity_id = insurance_customer_activity.customer_activity_id
INNER JOIN insurance_emp_view ON insurance_customer_activity.emp_id_card = insurance_emp_view.id_card
 
";

 
 
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
