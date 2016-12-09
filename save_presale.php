<?php session_start();
require_once 'init_inc.php';
$db=new DB;
require_once 'connDB.php';

$id=isset($_POST['id'])? $_POST['id'] : '';
$cu_id =isset($_POST['cu_id'])? $_POST['cu_id'] : '';
$ve_id =isset($_POST['ve_id'])? $_POST['ve_id'] : '';
if($_POST['action']==1){
	
$sql="SELECT
insurance_presale.id,
insurance_presale.attend_insurance_company,
insurance_presale.attend_insurance_type,
insurance_presale.attend_campaign,
insurance_presale.attend_campaign_discount,
insurance_presale.attend_net_act,
insurance_presale.attend_net_tax,
insurance_presale.net_fund,
insurance_presale.net_premium,
insurance_presale.insurance_tax,
insurance_presale.service_charge,
insurance_presale.net_price,
insurance_presale.pay_approach,
insurance_presale.paying_month,
insurance_presale.sale_status,
insurance_presale.activities_track_call_id,
insurance_presale.vehicle_id,
insurance_presale.cus_id,
insurance_presale.vehicle_code_id,
insurance_presale.vehicle_model_id,
insurance_presale.insurance_startDate,
insurance_presale.insurance_endDate,
insurance_type.insurance_type,
insurance_company.company_name
FROM
insurance_presale
INNER JOIN insurance_type ON insurance_presale.attend_insurance_type = insurance_type.id
INNER JOIN insurance_campaign_detail ON insurance_presale.attend_campaign = insurance_campaign_detail.campaign_id
INNER JOIN insurance_company ON insurance_campaign_detail.company_id = insurance_company.id
 WHERE insurance_presale.id=$id";
$rs_cus=mysql_query($sql);
$rw_cus=mysql_fetch_array($rs_cus);

$seltype=$rw_cus['insurance_type'];
$selcampaign=$rw_cus['attend_campaign'];
$car_type=$rw_cus['vehicle_model_id'];
 
$act_price=$rw_cus['attend_net_act'];
$discount=$rw_cus['attend_campaign_discount'];
$service=$rw_cus['service_charge'];
$selinsurance_price_total=$rw_cus['net_price'];
$selact_price=$rw_cus['attend_net_act'];
$payment_name=$rw_cus['company_name'];
$edate=(date('Y')+1).'-'.date('m').'-'.date('d');
$ac_number=isset($_POST['ac_number'])? $_POST['ac_number'] : '';

$payamount=isset($_POST['pay_amount'])? $_POST['pay_amount'] : '';
$paybaht=isset($_POST['pay_baht'])? $_POST['pay_baht'] : '';
$paytype=isset($_POST['pay_type'])? $_POST['pay_type'] : '';
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
'net_act'							=>$act_price,
'service_charge'				=>$_POST['service'],
'insurance_tax'               =>$_POST['tax'],         
'discount_insure'				=>$_POST['discount_insure'],
'discount_act'				    =>$_POST['discount_act'],
'discount_tax'				    =>$_POST['discount_tax'],
'net_price'						=>$_POST['selnet_total'],
'price_with_tax'				=>0,
'vehicle_code_id'             =>$rw_cus['vehicle_code_id'],
'insure_pay_premium'		=>0,
'insure_pay'					=>0,
'act_pay_premium'			=>0,
'act_pay'						=>0,
'partially_pay_premium'	=>0,
'partially_pay'					=>0,
'partially_act_premium'	=>0,
'partially_act'					=>0,
'pay_type'						=>$paytype , 
'pay_per_month'				=>$paybaht , 
'pay_amount'				    =>$payamount , 
'pay_name'						=>$payment_name,
'pay_to_insure'				=>0,
'sale_status'					=>2,   //1=ปิดการขาย,0 =รอชำระเงิน,2 ชำระเงินเรียบร้อย,3 ชำระบางส่วน
'customer_type'				=>2,    //1 รถป้ายแดง ,2=ลูกค้าปี2 ,3 ลูกค้าเก่า,4 walk in
'emp_id'							=>isset($_SESSION['empid'])? $_SESSION['empid'] : '',
'act_number'					=>$ac_number,
'pay_date'						=>$_POST['pay_date'],
'pay_by'							=>isset($_POST['pay_by'])? $_POST['pay_by'] : '',
'financial_id'					=>isset($_POST['pay_bank'])? $_POST['pay_bank'] : '',
'branch_name'				=>isset($_POST['pay_branch_name'])? $_POST['pay_branch_name'] : '',
'financial_number'			=>isset($_POST['pay_number'])? $_POST['pay_number'] : '',
'insure_startdate'			=>date('Y-m-d'),
'insure_enddate'				=>$edate
);
 
$db->insert('insurance_sale',$data);

$sql="SELECT id FROM insurance_sale ORDER by id desc limit 1";
$rs_0= mysql_query($sql);
$rw_0=mysql_fetch_array($rs_0);
$lastid= $rw_0['id'];
function multiexplode ($delimiters,$string) {
    $ary = explode($delimiters[0],$string);
    array_shift($delimiters);
    if($delimiters != NULL) {
        foreach($ary as $key => $val) {
             $ary[$key] = multiexplode($delimiters, $val);
        }
    }
    return  $ary;
}

$n_value=isset($_POST['paynum'])? $_POST['paynum'] : '';
//echo $n_value[0];
if($n_value !=""){
   $string = $n_value;
   $delimiters = Array(",");

  // $res = multiexplode($delimiters,$string);

   foreach ($n_value as $key => $value) {
    // $arr[3] will be updated with each value from $arr...
     //echo $value."<br>";
	 $getvalue = explode(':', $value);
	 $sql="insert insurance_payment_detail(sale_id,payment_amount,payment_no,cus_id,vehicle_id) Values($lastid,$getvalue[1],$getvalue[0],$cu_id,$ve_id)";
     mysql_query($sql);
    //print_r($arr);
   }

}
$sql="UPDATE insurance_presale SET sale_status=1  WHERE id=$id";
mysql_query($sql);

$sql="UPDATE insurance_customer_activity SET  	track_last_status='ปิดการขาย',insurance_Status=1,insurance_EndDate ='$edate' WHERE vehicle_id=$ve_id and cusno=$cu_id";
mysql_query($sql);
}else{
	
	$data_pre=array(
	    'attend_insurance_type'  => $_POST['seltype'],
		'attend_campaign'  => $_POST['selcampaign'],
		'net_price'  => $_POST['selnet_total'],
		'attend_net_act' =>$_POST['selact_price'],
		'insurance_tax'     =>$_POST['tax'],
		'vehicle_code_id' =>$_POST['car_type'],
		'vehicle_model_id' =>$_POST['vehicle_model'],
		'service_charge'   =>$_POST['service'],
		'discount_insure'  =>$_POST['discount_insure'],
		'discount_act'       =>$_POST['discount_act'],
		'discount_tax'       =>$_POST['discount_tax']
		);
		$data_ac_con=array(
		'id' =>$id
		);
		$db->update('insurance_presale',$data_pre,$data_ac_con);

}

?>
