<?php
 require_once("init_inc.php");
 $db=new DB; 
 $m=date('Y-m-d');
$query="SELECT
insurance_repayment.repay_id,
insurance_repayment.repayment_date,
insurance_repayment.repayment_next_date,
insurance_repayment.cus_id,
insurance_repayment.repayment_emp_id,
CONCAT(insurance_relationship_view.be,
insurance_relationship_view.cus_name,' ',
insurance_relationship_view.cus_surename) as Customer,
insurance_repayment.repayment_status,
format(insurance_repayment.repayment_amount,2) as repayment_amount,
insurance_repayment.repayment_remark,
insurance_relationship_view.vehicle_regis,
CONCAT(insurance_emp_view.emp_be,
insurance_emp_view.emp_name,' ',
insurance_emp_view.empsurname) as employee
FROM
insurance_relationship_view
JOIN insurance_repayment
ON insurance_relationship_view.cusno = insurance_repayment.cus_id 
JOIN insurance_emp_view
ON insurance_emp_view.id_card = insurance_repayment.repayment_emp_id WHERE repayment_cancel=0";
 
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
