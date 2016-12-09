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

$data_ac_cus=array(
		'vehicle_id'  => $ve_id,
		'activity_id'  => 101,
		'cusno'=>$cus_id,
		'track_last_status'  =>'สนใจ',
		'activity_Date'  => date("Y-m-d h:m:s"),
		'emp_id_card'=>$_SESSION['empid']
		);

$db->insert("insurance_customer_activity",$data_ac_cus);

$sql_ac="SELECT customer_activity_id FROM insurance_customer_activity order by customer_activity_id desc limit 1";
$data= $db->selectdata($sql_ac);
$cus_ac_id= $data[0]['customer_activity_id'];

 $data_ac=array(
		'date_create'=>date('Y-m-d h:m:s'),
		'track_last_status'  => 'สนใจ',
		'customer_activity_id' =>$cus_ac_id
		);
 $db->insert("insurance_activity_track_call",$data_ac);
 
 $sql ="SELECT * FROM insurance_activity_track_call  ORDER BY activity_track_call_id  DESC Limit 1";
		 $rs1=mysql_query($sql);
		 
		 $rw1=mysql_fetch_array($rs1);
	$call_id=$rw1['activity_track_call_id'];
$data_pre=array(
		'attend_insurance_type'  => $_POST['seltype'],
		'attend_campaign'  => $_POST['selcampaign'],
		'attend_campaign_discount' =>$_POST['seldiscount'],
		'attend_net_act' =>$_POST['selact_price'],
		'service_charge' =>$_POST['selservice'],
		'net_price'  => $_POST['selnet_total'],
		'insurance_tax'     =>$_POST['seltax'],
		'activities_track_call_id' =>$call_id,
		'insurance_startDate' =>$_POST['start_date'],
		'insurance_endDate' =>$_POST['end_date'],
		'vehicle_code_id' =>$_POST['car_type'],
		'vehicle_model_id' =>$_POST['vehicle_model'],
		'discount_insure' =>$_POST['seldiscount'],
		'discount_act' =>$_POST['seldiscount_act'],
		'discount_tax' =>$_POST['seldiscount_tax'],
		'vehicle_id'  => $ve_id,
		'cus_id'  => $cus_id
		);

	 

		$db->insert($tb_name_3,$data_pre);

?>