<?php
session_start();
require_once 'init_inc.php';
$db=new DB;
require_once 'connDB.php';

$be =isset($_POST['be'])? $_POST['be'] : '';
if($be !=4){$BeType =1;}else{$BeType =2;}

$cus_name =isset($_POST['cus_name'])? $_POST['cus_name'] : '';
$cus_surname =isset($_POST['cus_surname'])? $_POST['cus_surname'] : '';
$cus_phone =isset($_POST['cus_phone'])? $_POST['cus_phone'] : '';

$no =isset($_POST['no'])? $_POST['no'] : '';
$vi =isset($_POST['vi'])? $_POST['vi'] : '';
$group_no =isset($_POST['group_no'])? $_POST['group_no'] : '';
$lane =isset($_POST['lane'])? $_POST['lane'] : '';
$road =isset($_POST['road'])? $_POST['road'] : '';
$province =isset($_POST['province'])? $_POST['province'] : '';
$amphur =isset($_POST['amphur'])? $_POST['amphur'] : '';
$tumbon =isset($_POST['tumbon'])? $_POST['tumbon'] : '';
$zipcode =isset($_POST['zipcode'])? $_POST['zipcode'] : '';
$carmark =isset($_POST['carmark'])? $_POST['carmark'] : '';
$model =isset($_POST['model'])? $_POST['model'] : '';
//$vehicle =isset($_POST['vehicle'])? $_POST['vehicle'] : '';
$macname =isset($_POST['macname'])? $_POST['macname'] : '';
$chassis=isset($_POST['chassis'])? $_POST['chassis'] : '';
$regis_date =isset($_POST['regis_date'])? $_POST['regis_date'] : '';
$cartype =isset($_POST['cartype'])? $_POST['cartype'] : '';
$regis_no =isset($_POST['regis_no'])? $_POST['regis_no'] : '';

$selcampaign =isset($_POST['selcampaign'])? $_POST['selcampaign'] : '';
$s_date =isset($_POST['s_date'])? $_POST['s_date'] : '';
$e_date =isset($_POST['e_date'])? $_POST['e_date'] : '';
$act_price =isset($_POST['act_price'])? $_POST['act_price'] : '';
$discount =isset($_POST['discount'])? $_POST['discount'] : '';
$service =isset($_POST['service'])? $_POST['service'] : '';
$selnet_total =isset($_POST['selnet_total'])? $_POST['selnet_total'] : '';
$discount_act=isset($_POST['discount_act'])? $_POST['discount_act'] : '';
$discount_tax=isset($_POST['discount_tax'])? $_POST['discount_tax'] : '';
$seltax = isset($_POST['seltax'])? $_POST['seltax'] : '';
$s_cus="INSERT INTO main_cus_ginfo(Be,BeType,Cus_Name,Cus_Surename,Cus_IDNo,company_type) VALUES('$be',$BeType,'$cus_name','$cus_surname','',1) ";
$db->insertdata($s_cus);
$data=array();
$sql_cus="SELECT * FROM main_cus_ginfo ORDER BY CusNo DESC LIMIT 1";
$data= $db->selectdata($sql_cus);

$cus_id= $data[0]['CusNo'];
 
$s_phone="INSERT INTO main_telephone(TEL_CUS_NO,TEL_MAIN_ACTIVE) VALUES($cus_id,'$cus_phone') ";
$db->insertdata($s_phone);

 $s_address="INSERT INTO main_address(ADDR_CUS_NO,ADDR_VILLAGE,ADDR_ROOM_NO,ADDR_GROUP_NO,ADDR_LANE,ADDR_ROAD,ADDR_SUB_DISTRICT,ADDR_DISTRICT,ADDR_PROVINCE,ADDR_POSTCODE) VALUES($cus_id,'$vi','$no','$group_no','$lane','$road',$tumbon,$amphur ,$province,'$zipcode') ";
$db->insertdata($s_address);

	 
			 $d=substr($regis_date,0,2);
			  $m=substr($regis_date,3,2);
			  $y=substr($regis_date,6,4);			   
$regisdate=$y.'-'.$m.'-'.$d;
$s_vehicle="INSERT INTO vehicle_info(vehicle_series,vehicle_crand_name,vehicle_engines,vehicle_chassis,vehicle_full_chassis,vehicle_regis,regis_car_type) VALUES($model,$carmark,'$macname','$chassis','$chassis','$regis_no',$cartype) ";
$db->insertdata($s_vehicle); 
$data1=array();
$sql_ve="SELECT * FROM vehicle_info ORDER BY vehicle_id DESC LIMIT 1";
$data1= $db->selectdata($sql_ve);

$ve_id= $data1[0]['vehicle_id'];


 
 



$data=array(
'cus_id'							=>$cus_id,
'vehicle_id'						=>$ve_id,
'create_date'				    =>date("Y-m-d h:m:s"),
'company_name'				=>'',
'car_type'						=>$car_type,
'insurance_type'				=>$seltype,
'vehicle_code_id'				=>$seltype,
'campaign_id'					=>$selcampaign,
'campaign_discount'		=>$discount,
'discount_act'					=>$discount_act,
'discount_tax'				    =>$discount_tax,
'discount_insure'			    =>$discount,
'net_act'							=>$act_price,
'insurance_tax'				=>$seltax,
'service_charge'				=>$service,
'net_price'						=>$selnet_total,
'price_with_tax'				=>$selinsurance_price_total,
'insure_pay_premium'		=>0,
'insure_pay'					=>0,
'act_pay_premium'			=>0,
'act_pay'						=>0,
'partially_pay_premium'	=>0,
'partially_pay'					=>0,
'partially_act_premium'	=>0,
'partially_act'					=>0,
'pay_type'						=>'เงินสด' , // สด,ผ่อน
'pay_name'						=>'',
'pay_to_insure'				=>0,
'sale_status'					=>1,   //1=ปิดการขาย,0 =รอชำระเงิน,2 ชำระเงินเรียบร้อย,3 ชำระบางส่วน
'customer_type'				=>4,    //1 รถป้ายแดง ,2=ลูกค้าปี2 ,3 ลูกค้าเก่า,4 walk in
'emp_id'							=>$_SESSION['empid'],
'act_number'					=>0,
'insure_startdate'				=>$s_date,
'insure_enddate'				=>$e_date
);
 
$db->insert('insurance_sale',$data);

?>