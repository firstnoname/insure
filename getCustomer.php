<?php
 require_once("init_inc.php");
 $db=new DB; 
$query="SELECT
insurance_main_cus_ginfo.CusNo,
CONCAT(insurance_main_cus_ginfo.Be,'',
insurance_main_cus_ginfo.Cus_Name,' ',
insurance_main_cus_ginfo.Cus_Surename) AS Customer,
case when insurance_main_cus_ginfo.BeType=1 then 'บุคคล' else 'ชมรม / สมาคม / นิติบุคล' end as BeType,
 
insurance_main_cus_ginfo.Date_Receive,
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
insurance_main_cus_ginfo.Cus_MasterTel
FROM
insurance_main_cus_ginfo
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
