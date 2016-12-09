<?php  session_start();
require_once 'init_inc.php';
$db=new DB;
require_once 'connDB.php';

$tb_name='insurance_activity_track_call';
$tb_name_2='insurance_customer_activity';
$tb_name_3='insurance_presale';
$data='';
$msg="บันทึกข้อมูลเรียบร้อยแล้ว!";
$action =isset($_POST['ac_tion'])? $_POST['ac_tion'] : '';
$ac_id =isset($_POST['ac_id'])? $_POST['ac_id'] : '';
$cu_id =isset($_POST['cu_id'])? $_POST['cu_id'] : '';
$ve_id =isset($_POST['ve_id'])? $_POST['ve_id'] : '';
$ac_save=isset($_POST['ac_save'])? $_POST['ac_save'] : '';
$m_status=$_POST['status'];
$yr=date('Y');
$sql="SELECT * FROM insurance_customer_activity ";
$sql.=" WHERE cusno='$cu_id' AND vehicle_id='$ve_id' AND activity_id='$ac_id'";
//$sql.=" AND YEAR('')='$yr'";
// 'emp_id_card'=>$_SESSION['empid']
$last_id=0;
$rs=mysql_query($sql);
 mysql_query("set NAMES utf8");
$cu=mysql_num_rows($rs);

if($cu<=0){
//insurance_customer_activity 	customer_activity_id,vehicle_id,track_last_status,date_appointment,acitivity_id	
 
$data=$_POST['data_save'];
$data_ac_cus=array(
		'vehicle_id'  => $ve_id,
		'activity_id'  => $ac_id,
		'cusno'=>$cu_id,
		'track_last_status'  =>$data,
		'activity_Date'  => date("Y-m-d h:m:s"),
		'main_status'    =>$m_status,
		'call_count'=>0,
		'emp_id_card'=>$_SESSION['empid']
		);

$last_id=$db->insert($tb_name_2,$data_ac_cus);

 
		
//insurance_customer_activity 	customer_activity_id,vehicle_id,track_last_status,date_appointment,acitivity_id
//

//$sql="INSERT INTO insurance_customer_activity(vehicle_id,track_last_status,date_appointment,activity_id)";
//$sql.=" VALUES('$ve_id','','','')";
        $sql ="SELECT * FROM insurance_customer_activity ";
        $sql .=" WHERE cusno='$cu_id' AND vehicle_id='$ve_id' AND activity_id='$ac_id'";
		$rs1=mysql_query($sql);
		$rw1=mysql_fetch_array($rs1);
	   $last_id=$rw1['customer_activity_id'];
}else{
	$rw=mysql_fetch_array($rs);
	$last_id=$rw['customer_activity_id'];
}

switch ($action) {
	case '1':
		$data=$_POST['data_save'];
		$data_ac=array(
		'date_create'=>date('Y-m-d h:m:s'),
		'track_last_status'  => $data,
		
		'customer_activity_id' =>$last_id
		);

		$db->insert($tb_name,$data_ac);

	 $data_ac_up=array(
		'track_last_status'  => $data,
	    'emp_id_card'=>$_SESSION['empid'],
	    'cusno'=>$cu_id,
		'main_status'    =>$m_status,
		'activity_Date'  => date("Y-m-d h:m:s")
		);
		$data_ac_con=array(
		'customer_activity_id' =>$last_id
		);


		$db->update($tb_name_2,$data_ac_up,$data_ac_con);
		
		$sql ="update  insurance_customer_activity set call_count=call_count+1  WHERE  	customer_activity_id=".$last_id." ";
		mysql_query($sql);
		
		//decline_description
		//	customer_activity_id
//insurance_customer_activity 	customer_activity_id,vehicle_id,track_last_status,date_appointment,acitivity_id
//
		break;
	case '2':
//dd:dd,tt:tt
	//$tb_name='insurance_activity_track_call';
//$tb_name_2='insurance_customer_activity';
	//call_repeat,date_appointment
 
	$setdate_app=date('Y-m-d h:m:s',$_POST['dd'].' '.$_POST['tt']);
	//$setdate_app = date('Y-m-d h:m:s',$date_app)
		$data=$_POST['data_save'];
		$data_ac=array(
		'date_create'=>date('Y-m-d h:m:s'),
		'track_last_status'  => $data,
		'call_repeat'  => 1,
		'date_appointment'  => $_POST['dd'].' '.$_POST['tt'],
		'customer_activity_id' =>$last_id,
		);

		$db->insert($tb_name,$data_ac);

		$data_ac_up=array(
		'track_last_status'  => $data,
		'date_appointment'  => $setdate_app,
		'emp_id_card'=>$_SESSION['empid'],
		'cusno'=>$cu_id,
		'main_status'    =>$m_status,
	
		'activity_Date'  => date("Y-m-d h:m:s")
		);
		$data_ac_con=array(
		'customer_activity_id' =>$last_id
		);


		$db->update($tb_name_2,$data_ac_up,$data_ac_con);
		
		$sql ="update  insurance_customer_activity set call_count=call_count+1  WHERE  	customer_activity_id=".$last_id." ";
		mysql_query($sql);
	break;

	case '3' :
	 
		$data=$_POST['data_save'];
		//bought_other_company,bought_other_company_price,bought_other_pay_approach
		$data_ac=array(
		'date_create'=>date('Y-m-d h:m:s'),
		'track_last_status'  => $data,
		'customer_activity_id' =>$last_id,
		'bought_other_company'  => $_POST['data_in'],
		'bought_other_company_price'  => $_POST['price'],
		'bought_other_pay_approach' =>$_POST['pay_type'],
		);

		$db->insert($tb_name,$data_ac);

		$data_ac_up=array(
		'track_last_status'  => $data,
		'emp_id_card'=>$_SESSION['empid'],
		'cusno'=>$cu_id,
		'main_status'    =>$m_status,
		
		'activity_Date'  => date("Y-m-d h:m:s")
		);
		$data_ac_con=array(
		'customer_activity_id' =>$last_id
		);


		$db->update($tb_name_2,$data_ac_up,$data_ac_con);
		$sql ="update  insurance_customer_activity set call_count=call_count+1  WHERE  	customer_activity_id=".$last_id." ";
		mysql_query($sql);
	break;

	case '4' :
//data_save:'มีบริษัทประกันอื่นติดต่อมา',ac_tion:'4',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id,data_in:data_in,price:price,pay_type:pay_type,insur_type:insur_type
		$data=$_POST['data_save'];
		//bought_other_company,bought_other_company_price,bought_other_pay_approach
		//offer_insurance_company,offer_insurance_type,offer_insurance_premium,offer_pay_approach
		$data_ac=array(
		'date_create'=>date('Y-m-d h:m:s'),
		'track_last_status'  => $data,
		'customer_activity_id' =>$last_id,
		'offer_insurance_company'  => $_POST['data_in'],
		
		'offer_insurance_type' =>$_POST['insur_type'],
		'offer_insurance_premium'  => $_POST['price'],
		'offer_pay_approach' =>$_POST['pay_type'],
		);

		$db->insert($tb_name,$data_ac);

		$data_ac_up=array(
		'track_last_status'  => $data,
		'emp_id_card'=>$_SESSION['empid'],
		'cusno'=>$cu_id,
		'main_status'    =>$m_status,
		
		'activity_Date'  => date("Y-m-d h:m:s")
		);
		$data_ac_con=array(
		'customer_activity_id' =>$last_id
		);


		$db->update($tb_name_2,$data_ac_up,$data_ac_con);
   		$sql ="update  insurance_customer_activity set call_count=call_count+1  WHERE  	customer_activity_id=".$last_id." ";
		mysql_query($sql);

	break;

	case '5' :
//insurance_presale attend_insurance_company,attend_insurance_type,	attend_campaign,attend_campaign_discount,attend_net_act,attend_net_tax,net_fund,net_premium,service_charge,net_price,pay_approach,paying_month,sale_status,activities_track_call_id,vehicle_id,	cus_id
       
		$data=$_POST['data_save'];
//seltype,selcampaign,selfund,selinsurance_price,selinsurance_price_total,selact_price,seldiscount,selservice
		 $data_ac=array(
		'date_create'=>date('Y-m-d h:m:s'),
		'track_last_status'  => $data,
		'customer_activity_id' =>$last_id
		);
         //$db->insert($tb_name,$data_ac);
		 
		$sql ="DELETE FROM insurance_activity_track_call  WHERE  	customer_activity_id=".$last_id." and track_last_status='สนใจ'   ";
		mysql_query($sql);
		
		
		 $db->insert($tb_name,$data_ac);
	 	 $sql ="SELECT * FROM insurance_activity_track_call  ORDER BY activity_track_call_id  DESC Limit 1";
		 $rs1=mysql_query($sql);
		 
		 $rw1=mysql_fetch_array($rs1);
	     $call_id=$rw1['activity_track_call_id'];
		 
	   $sql ="DELETE FROM insurance_presale  WHERE  	vehicle_id=".$ve_id." and cus_id=".$cu_id."   ";
		mysql_query($sql);
		
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
		'cus_id'  => $cu_id
		);

	 

		$db->insert($tb_name_3,$data_pre);

 

		$data_ac_up=array(
		'track_last_status'  => $data,
		'emp_id_card'=>$_SESSION['empid'],
		'cusno'=>$cu_id,
		'main_status'    =>$m_status,
		
		'activity_Date'  => date("Y-m-d h:m:s")
		);
		$data_ac_con=array(
		'customer_activity_id' =>$last_id
		);


		$db->update($tb_name_2,$data_ac_up,$data_ac_con);
	    $sql ="update  insurance_customer_activity set call_count=call_count+1  WHERE  	customer_activity_id=".$last_id." ";
		mysql_query($sql);
	break;

	case  '6':
		$data=$_POST['data_save'];
		//bought_other_company,bought_other_company_price,bought_other_pay_approach
		//offer_insurance_company,offer_insurance_type,offer_insurance_premium,offer_pay_approach
		$data_ac=array(
		'date_create'=>date('Y-m-d h:m:s'),
		'track_last_status'  => $data,
		'customer_activity_id' =>$last_id
		);
        
		$db->insert($tb_name,$data_ac);
		
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
		'activities_track_call_id' =>$call_id,
		'vehicle_id'  => $ve_id,
		'cus_id'  => $cu_id
		);

	 

		//$db->insert($tb_name_3,$data_pre);
		
		
		$data_ac_up=array(
	    'track_last_status'  => $data,
		'emp_id_card'=>$_SESSION['empid'],
		'cusno'=>$cu_id,
		'main_status'    =>$m_status,
	
		'activity_Date'  => date("Y-m-d")
		);
		$data_ac_con=array(
		'customer_activity_id' =>$last_id
		);


		$db->update($tb_name_2,$data_ac_up,$data_ac_con);
		$sql ="update  insurance_customer_activity set call_count=call_count+1  WHERE  	customer_activity_id=".$last_id." ";
		mysql_query($sql);
	break;
	case  '7':
		$data=$_POST['data_save'];
		//bought_other_company,bought_other_company_price,bought_other_pay_approach
		//offer_insurance_company,offer_insurance_type,offer_insurance_premium,offer_pay_approach
		$data_ac=array(
		'date_create'=>date('Y-m-d'),
		'track_last_status'  => $data,
		'customer_activity_id' =>$last_id
		);

		$db->insert($tb_name,$data_ac);
		
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
		'activities_track_call_id' =>$call_id,
		'vehicle_id'  => $ve_id,
		'cus_id'  => $cu_id
		);

		//$db->insert($tb_name_3,$data_pre);
		
		$data_ac_up=array(
	    'track_last_status'  => $data,
		'emp_id_card'=>$_SESSION['empid'],
		'cusno'=>$cu_id,
		'main_status'    =>$m_status,
	
		'activity_Date'  => date("Y-m-d")
		);
		$data_ac_con=array(
		'customer_activity_id' =>$last_id
		);


		$db->update($tb_name_2,$data_ac_up,$data_ac_con);
		$sql ="update  insurance_customer_activity set call_count=call_count+1  WHERE  	customer_activity_id=".$last_id." ";
		mysql_query($sql);
	break;
		case  '99':
		$data=$_POST['data_save'];
	 
		$data_ac_up=array(
	    'track_last_status'  => $data,
		'emp_id_card'=>$_SESSION['empid'],
		'cusno'=>$cu_id,
	    'main_status'    =>$m_status,
	    'reject_by'=>$_SESSION['empid'],
		'is_reject'=>1,
		'activity_Date'  => date("Y-m-d")
		);
		$data_ac_con=array(
		'customer_activity_id' =>$last_id
		);


		$db->update($tb_name_2,$data_ac_up,$data_ac_con);
		$sql ="update  insurance_customer_activity set call_count=call_count+1  WHERE  	customer_activity_id=".$last_id." ";
		mysql_query($sql);
	break;
		case  '100':
		$data=$_POST['data_save'];
	 
		$data_ac_up=array(
	    'track_last_status'  => $data,
	    'main_status'    =>$m_status,
	    'approve_reject_by'=>$_SESSION['empid'],
		'activity_IsClose'=>1,
		'approve_reject_date'  => date("Y-m-d")
		);
		$data_ac_con=array(
		'customer_activity_id' =>$last_id
		);


	break;
	default:
		# code...
		
}


//echo $msg . '=' . $ac_id . '=' . $cu_id  . '=' . $ve_id  . '=' . $cu  ;
 
?>