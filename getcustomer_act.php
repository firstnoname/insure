<?php
 require_once("init_inc.php");
 $db=new DB;
$query="SELECT insurance_relationship_view.cusno,
 CONCAT(insurance_relationship_view.be, '',
	insurance_relationship_view.cus_name, ' ',
	insurance_relationship_view.cus_surename) as Customer,
	insurance_relationship_view.relates_type,
	insurance_relationship_view.address_full_name,
	insurance_sale.insure_type_desc,
	insurance_sale.insure_type,
	insurance_relationship_view.vehicle_regis,
	insurance_relationship_view.vehicle_full_chassis,
	insurance_relationship_view.vehicle_chassis,
	insurance_relationship_view.vehicle_brand,
	insurance_relationship_view.vehicle_series, 
  insurance_sale.cus_id,
  insurance_sale.vehicle_id,
  insurance_customer_delivery.delivery_close,
case when	insurance_customer_delivery.delivery_id is null then 'รอเอกสาร' when insurance_customer_delivery.delivery_close=0 then 'รอลูกค้ารับเอกสาร' else '' end as status_delivery,
case when	insurance_customer_delivery.delivery_id is null then 'warning' when insurance_customer_delivery.delivery_close=0 then 'info' else '' end as class_status,
	CONCAT(insurance_emp_view.emp_be, '',
	insurance_emp_view.emp_name, ' ',
	insurance_emp_view.empsurname) as employee
FROM insurance_sale LEFT OUTER JOIN insurance_relationship_view ON insurance_sale.cus_id = insurance_relationship_view.cusno AND insurance_sale.vehicle_id = insurance_relationship_view.vehicle_id
	 LEFT OUTER JOIN insurance_customer_delivery ON insurance_customer_delivery.cus_id = insurance_sale.cus_id AND insurance_customer_delivery.vehicle_id = insurance_sale.vehicle_id
	 INNER JOIN insurance_emp_view ON insurance_sale.emp_id = insurance_emp_view.id_card  Where ISNULL(insurance_customer_delivery.delivery_close ) or  insurance_customer_delivery.delivery_close =0";
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
