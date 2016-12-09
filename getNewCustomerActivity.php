<?php
 require_once("init_inc.php");
 $db=new DB; 
 $m=date('Y-m-d');
$query="SELECT
insurance_main_cus_ginfo.CusNo,
CONCAT(insurance_main_cus_ginfo.Be,'',
insurance_main_cus_ginfo.Cus_Name, '',
insurance_main_cus_ginfo.Cus_Surename) as Customer,
insurance_main_cus_ginfo.Cus_SecTel,
CONCAT(insurance_main_cus_ginfo.ADDR_VILLAGE, ' ',
insurance_main_cus_ginfo.ADDR_ROOM_NO,' ',
insurance_main_cus_ginfo.ADDR_FLOOR_NO,' ',
insurance_main_cus_ginfo.ADDR_NUMBER,' ',
insurance_main_cus_ginfo.ADDR_GROUP_NO,' ',
insurance_main_cus_ginfo.ADDR_LANE,' ',
insurance_main_cus_ginfo.ADDR_ROAD,' ',
insurance_main_cus_ginfo.ADDR_SUB_DISTRICT,' ',
insurance_main_cus_ginfo.ADDR_PROVINCE,' ',
insurance_main_cus_ginfo.ADDR_POSTCODE) AS Address,
insurance_relationship_view.cus_tel,
CASE WHEN Month(insurance_main_cus_ginfo.Date_Receive)=MONTH(NOW()) and Year(insurance_main_cus_ginfo.Date_Receive)=Year(NOW())  THEN 'true' ELSE 'false' END As StatusCustomer ,
insurance_relationship_view.vehicle_id
FROM
insurance_main_cus_ginfo
INNER JOIN insurance_relationship_view ON insurance_relationship_view.cusno = insurance_main_cus_ginfo.CusNo ";
 
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
