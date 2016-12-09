<?php
 require_once("init_inc.php");
 $db=new DB; 
$query="SELECT insurance_customer_delivery.delivery_id, 
	insurance_customer_delivery.delivery_date, 
	insurance_customer_delivery.delivery_chance, 
	insurance_customer_delivery.receipt_by, 
	insurance_customer_delivery.remark, 
CONCAT(insurance_relationship_view.be, '',
	insurance_relationship_view.cus_name,' ', 
	insurance_relationship_view.cus_surename) as customer, 
CONCAT(insurance_emp_view.emp_be, '',
	insurance_emp_view.emp_name, ' ',
	insurance_emp_view.empsurname) as employee , 
	insurance_customer_delivery.delivery_close,
'ส่งมอบเรียบร้อย' as status_delivery,
case when insurance_customer_delivery.delivery_chance=1 then 'รับด้วยตัวเอง' else 'ส่งไปรษณีย์ ' End as de 
FROM insurance_customer_delivery INNER JOIN insurance_relationship_view ON insurance_customer_delivery.vehicle_id = insurance_relationship_view.vehicle_id AND insurance_customer_delivery.cus_id = insurance_relationship_view.cusno
	 INNER JOIN insurance_emp_view ON insurance_customer_delivery.emp_delivery = insurance_emp_view.id_card Where delivery_close=1";
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
