<?php
 require_once("init_inc.php");
 $db=new DB; 
$query="SELECT insurance_relationship_view.vehicle_id,
insurance_relationship_view.cusno,
CONCAT(insurance_relationship_view.be,'',
insurance_relationship_view.cus_name,' ',
insurance_relationship_view.cus_surename) as customer,
insurance_relationship_view.vehicle_series,
insurance_relationship_view.vehicle_brand,
insurance_relationship_view.vehicle_chassis,
insurance_relationship_view.vehicle_full_chassis,
insurance_relationship_view.vehicle_regis,
insurance_sale.id,
insurance_sale.sale_status,
CASE WHEN insurance_sale.customer_type=1 THEN 'ป้ายแดง' WHEN insurance_sale.customer_type=2 THEN 'ลูกค้าปี2' WHEN insurance_sale.customer_type=3 THEN 'ลูกค้าเก่า' else 'ลูกค้า walk in' END As Customer_type
FROM
insurance_sale
INNER JOIN insurance_relationship_view ON insurance_relationship_view.vehicle_id = insurance_sale.vehicle_id AND insurance_relationship_view.cusno = insurance_sale.cus_id
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
