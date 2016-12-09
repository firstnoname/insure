<?php
session_start();
require_once 'init_inc.php';
$db=new DB;
require_once 'connDB.php';
$total_price=0;
$remain=0;
$cus_id =isset($_POST['cus_id'])? $_POST['cus_id'] : '';
$id=isset($_POST['id'])? $_POST['id'] : '';
$remain=isset($_POST['remain'])? $_POST['remain'] : '';	  
$n_value=isset($_POST['paynum'])? $_POST['paynum'] : '';
if($n_value !=""){
 
   foreach ($n_value as $key => $value1) {
   
	 $getvalue = explode(':', $value1);
	 $sql="update insurance_payment_detail set paid=0 where payment_id=$getvalue[1]";
     mysql_query($sql);
   //echo $sql;
   }
 
}
$sql="update insurance_repayment set repayment_cancel=1 where repay_id=$id";
mysql_query($sql);

$sql="update insurance_sale set payment_arrears=payment_arrears-$remain where cus_id=$cus_id";
mysql_query($sql);

?>