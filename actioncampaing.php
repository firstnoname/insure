<?php
// Set delay 1 second. 
sleep(1);
// Create connection connect to mysql database
 
require_once 'init_inc.php';
$db=new DB; 
// Set encoding.
mysql_query('SET NAMES UTF8');

// Next dropdown list.
$nextList = isset($_GET['nextList']) ? $_GET['nextList'] : '';

switch($nextList) {
	case 'campaign':
		$typeID = isset($_GET['type_id']) ? $_GET['type_id'] : '';
		$sql ="
			SELECT
insurance_company.id,
insurance_company.company_name,
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
insurance_campaign_detail.company_id,
insurance_campaign_detail.insurance_type,
insurance_campaign_detail.insurance_service
FROM
insurance_company
INNER JOIN insurance_campaign_detail ON insurance_campaign_detail.company_id = insurance_company.id
				WHERE insurance_type = '{$typeID}' ";
		break;
	case 'company':
		$ID = isset($_GET['campaignID']) ? $_GET['campaignID'] : '';
		$sql = "
			SELECT  *
			FROM
				insurance_campaign_detail
			WHERE campaign_id = '{$ID}'
		 
		";
		break;
}
 
$data = array();
$rs_detail=mysql_query($sql) or die(mysql_error());
while($row_rs_detail=mysql_fetch_array($rs_detail)){
	$data[] = $row_rs_detail;
}
echo json_encode($data);
?>