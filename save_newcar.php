<?php  session_start();
require_once 'init_inc.php';
$db=new DB;
require_once 'connDB.php';

$cu_id =isset($_POST['cu_id'])? $_POST['cu_id'] : '';
$ve_id =isset($_POST['ve_id'])? $_POST['ve_id'] : '';

$seltype=isset($_POST['seltype'])? $_POST['seltype'] : '';
$selcampaign=isset($_POST['selcampaign'])? $_POST['selcampaign'] : '';
$car_type=isset($_POST['car_type'])? $_POST['car_type'] : '';
$s_date=isset($_POST['s_date'])? $_POST['s_date'] : '';
$e_date=isset($_POST['e_date'])? $_POST['e_date'] : '';

$act_price=isset($_POST['act_price'])? $_POST['act_price'] : '';
$discount=isset($_POST['discount'])? $_POST['discount'] : '';
$service=isset($_POST['service'])? $_POST['service'] : '';
$selinsurance_price_total=isset($_POST['selinsurance_price_total'])? $_POST['selinsurance_price_total']: '';
$selact_price=isset($_POST['selact_price'])? $_POST['selact_price'] : '';
$selnet_total=isset($_POST['selnet_total'])? $_POST['selnet_total']: '';
 $discount_act=isset($_POST['discount_act'])? $_POST['discount_act']: '';
 $discount_tax=isset($_POST['discount_tax'])? $_POST['discount_tax']: '';
 //  Box1 ประกัน
 $free_price1=isset($_POST['free_price1'])? $_POST['free_price1'] : '';
 $pay_price1=isset($_POST['pay_price1'])? $_POST['pay_price1'] : '';
 $other_free_price1=isset($_POST['other_free_price1'])? $_POST['other_free_price1'] : '';
 $other_pay_price1=isset($_POST['other_pay_price1'])? $_POST['other_pay_price1'] : '';
 $act_pay1=isset($_POST['act_pay1'])? $_POST['act_pay1'] : '';
 $payment_name=isset($_POST['payment_name'])? $_POST['payment_name'] : '';
  //  Box2 พรบ
 $free_price2=isset($_POST['free_price2'])? $_POST['free_price2'] : '';
 $pay_price2=isset($_POST['pay_price2'])? $_POST['pay_price2'] : '';
 $other_free_price2=isset($_POST['other_free_price2'])? $_POST['other_free_price2'] : '';
 $other_pay_price2=isset($_POST['other_pay_price2'])? $_POST['other_pay_price2'] : '';
 $act_number=isset($_POST['act_number'])? $_POST['act_number'] : '';
 $payment_name=isset($_POST['payment_name'])? $_POST['payment_name'] : '';
 $net_total =isset($_POST['selnet_total'])? $_POST['selnet_total'] : '';


$data=array(
'cus_id'							=>$cu_id,
'vehicle_id'						=>$ve_id,
'create_date'				    =>date("Y-m-d h:m:s"),
'company_name'				=>$payment_name,
'car_type'						=>$car_type,
'insurance_type'				=>$seltype,
'vehicle_code_id'				=>$seltype,
'campaign_id'					=>$selcampaign,
'campaign_discount'		=>$discount,
'discount_insure'				=>$discount,
'discount_act'				    =>$discount_act,
'discount_tax'				    =>$discount_tax,
'net_act'							=>$act_price,
'service_charge'				=>$service,
'net_price'						=>$net_total,
'price_with_tax'				=>$selinsurance_price_total,
'insure_pay_premium'		=>$free_price1,
'insure_pay'					=>$pay_price1,
'act_pay_premium'			=>$free_price2,
'act_pay'						=>$pay_price2,
'partially_pay_premium'	=>$other_free_price1,
'partially_pay'					=>$other_pay_price1,
'partially_act_premium'	=>$other_free_price2,
'partially_act'					=>$other_pay_price2,
'pay_type'						=>'เงินสด' , // สด,ผ่อน
'pay_name'						=>$payment_name,
'pay_to_insure'				=>$act_pay1,
'sale_status'					=>1,   //1=ปิดการขาย,0 =รอชำระเงิน,2 ชำระเงินเรียบร้อย,3 ชำระบางส่วน
'customer_type'				=>1,    //1 รถป้ายแดง ,2=ลูกค้าปี2 ,3 ลูกค้าเก่า,4 walk in
'emp_id'							=>$_SESSION['empid'],
'act_number'					=>$act_number,
'insure_startdate'				=>$s_date,
'insure_enddate'				=>$e_date
);
 
$db->insert('insurance_sale',$data);
?>