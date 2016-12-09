<?php
session_start();
require_once 'init_inc.php';
$db=new DB;
require_once 'connDB.php';
$total_price=0;
$remain=0;
$cus_id =isset($_POST['cus_id'])? $_POST['cus_id'] : '';
$repaydate =formatdatestr($_POST['pay_date']);		  
$nextdate =formatdatestr($_POST['next_pay_date']);
$remark =isset($_POST['remark'])? $_POST['remark'] : '';
$total_price =isset($_POST['cal_price1'])? $_POST['cal_price1'] : '';
//$regis_no =isset($_POST['regis'])? $_POST['regis'] : '';
$remain=isset($_POST['remain'])? $_POST['remain'] : '';
$n_value=isset($_POST['paynum'])? $_POST['paynum'] : '';
//cu_id:cus_id,repaydate:pay_date,nextdate:next_pay_date,remark:remark,total_price:cal_price,regis_no:regis,paynum:arrNumber
$status="ชำระบางส่วน";
$is_close=0;
if(floatval($total_price) >= floatval($remain)){
	$status="ชำระเสร็จสิ้น";$is_close=1;
}
//echo $repaydate.'-'.$nextdate;
$data=array(
'repayment_date'							=>$repaydate,
'repayment_next_date'						=>$nextdate,
'cus_id'				    =>$cus_id,
'repayment_emp_id'				=>$_SESSION['empid'],
'repayment_amount'               =>$total_price,
'repayment_status'						=>$status,
'repayment_remark'				=>$remark

);
 
$db->insert('insurance_repayment',$data);
$sql="SELECT repay_id FROM insurance_repayment ORDER by repay_id desc limit 1";
$rs_0= mysql_query($sql);
$rw_0=mysql_fetch_array($rs_0);
$lastid= $rw_0['repay_id'];

$n_ve=isset($_POST['arrveh'])? $_POST['arrveh'] : '';
 foreach ($n_ve as $value) {
    // $arr[3] will be updated with each value from $arr...
     //echo $value."<br>";
	 $getvalue = explode(':', $value);
     //print_r($getvalue);	 
	 $sql="insert into insurance_repayment_detail(repayment_id,sale_id,vehicle_id,payno,repayment_amount,payment_id) values($lastid,$getvalue[1],$getvalue[0],$getvalue[2],$getvalue[3],$getvalue[4])";
     mysql_query($sql);
   //echo $sql;
   }
   //echo $sql;

//echo $n_value[0];
if($n_value !=""){
   //$string = $n_value;
   //$delimiters = Array(",");

  // $res = multiexplode($delimiters,$string);

   foreach ($n_value as $key => $value1) {
    // $arr[3] will be updated with each value from $arr...
     //echo $value."<br>";
	 $getvalue = explode(':', $value1);
	 $sql="update insurance_payment_detail set paid=1 where payment_id=$getvalue[1]";
     mysql_query($sql);
   //echo $sql;
   }
 
}

$sql="update insurance_sale set payment_arrears=payment_arrears+$total_price,Close_payment=$is_close where cus_id=$cus_id";
mysql_query($sql);
	
	 function  formatdatestr($strdate){
		      $d=substr($strdate,0,2);
			  $m=substr($strdate,3,2);
			  $y=substr($strdate,6,4); 
		return  $y.'-'.$m.'-'.$d;
	 }
	 
	//return $sql;
?>