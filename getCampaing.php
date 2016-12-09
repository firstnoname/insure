<?php
 require_once("init_inc.php");
 $db=new DB; 
$query="SELECT
insurance_company.company_name,
insurance_company.company_address,
insurance_company.company_tel,
insurance_campaign_detail.campaign_id,
insurance_campaign_detail.campaign_description,
insurance_campaign_detail.campaign_discount,
insurance_campaign_detail.campaign_car_age,
insurance_campaign_detail.campaign_income,
insurance_campaign_detail.insurance_startfund,
insurance_campaign_detail.insurance_endfund,
insurance_campaign_detail.insurance_price_repair_center,
insurance_campaign_detail.insurance_price_repair_garage,
insurance_campaign_detail.insurance_tax,
insurance_campaign_detail.act_price,
insurance_campaign_detail.campaign_detail_file,
insurance_campaign_detail.insurance_service,
insurance_type.insurance_type

FROM
insurance_campaign_detail
JOIN insurance_company
ON insurance_campaign_detail.company_id = insurance_company.id 
JOIN insurance_type
ON insurance_type.id = insurance_campaign_detail.insurance_type ";
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
