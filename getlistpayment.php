<?php
 require_once("init_inc.php");
 $db=new DB; 
 $m=date('Y-m-d');
$query="SELECT
CONCAT(insurance_relationship_view.be,
insurance_relationship_view.cus_name,' ',
insurance_relationship_view.cus_surename) AS Customer,
insurance_sale.create_date,
format(insurance_sale.net_price,2) as net_price,
insurance_sale.pay_type,
insurance_sale.insurance_tax,
insurance_sale.service_charge,
insurance_sale.discount_act,
insurance_sale.discount_tax,
insurance_sale.discount_insure,
format(sum(insurance_sale.insurance_tax+
insurance_sale.service_charge+
insurance_sale.discount_act+
insurance_sale.discount_tax+
insurance_sale.discount_insure),2) AS total_discount,
format(insurance_sale.net_price-sum(insurance_sale.insurance_tax+
insurance_sale.service_charge+
insurance_sale.discount_act+
insurance_sale.discount_tax+
insurance_sale.discount_insure),2) AS total_price,
insurance_sale.cus_id,
insurance_sale.Close_payment,
CONCAT(insurance_emp_view.emp_be,
insurance_emp_view.emp_name,' ',
insurance_emp_view.empsurname) as EmpUser,
CASE WHEN insurance_sale.payment_arrears =0 then format(insurance_sale.net_price-sum(insurance_sale.insurance_tax+
insurance_sale.service_charge+
insurance_sale.discount_act+
insurance_sale.discount_tax+
insurance_sale.discount_insure),2) else format(insurance_sale.net_price-sum(insurance_sale.insurance_tax+
insurance_sale.service_charge+
insurance_sale.discount_act+
insurance_sale.discount_tax+
insurance_sale.discount_insure+insurance_sale.payment_arrears),2) END AS total_remain
FROM
insurance_sale
JOIN insurance_relationship_view
ON insurance_sale.cus_id = insurance_relationship_view.cusno 
JOIN insurance_emp_view
ON insurance_emp_view.id_card = insurance_sale.emp_id
WHERE
insurance_sale.Close_payment=0 AND insurance_sale.pay_type='ผ่อนชำระ' group by Cus_id";
 
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
