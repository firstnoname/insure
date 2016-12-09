<?php
 require_once("init_inc.php");
 $db=new DB; 
$query="SELECT
insurance_company.id,
insurance_company.company_name,
insurance_company.company_address,
insurance_company.company_tel,
insurance_company.company_coordination,
insurance_company.company_coordination_tel
FROM
insurance_company";
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
