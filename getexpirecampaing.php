<?php
// Set delay 1 second. 
sleep(1);
// Create connection connect to mysql database
 
require_once 'init_inc.php';
$db=new DB; 
// Set encoding.
mysql_query('SET NAMES UTF8');
$sql="SELECT  *,DATEDIFF(campaign_end,now()) as Dissdate,
	insurance_company.company_name
FROM
insurance_campaign_detail
JOIN insurance_company
ON insurance_campaign_detail.company_id = insurance_company.id
where DATEDIFF(campaign_end,now())<=5";
$data = array();
$rs_detail=mysql_query($sql) or die(mysql_error());
while($row_rs_detail=mysql_fetch_array($rs_detail)){
	$data[] = $row_rs_detail;
}
echo json_encode($data);
?>