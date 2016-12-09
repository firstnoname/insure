<?php
  require_once 'init_inc.php';
  $db=new DB;
  require_once 'connDB.php';
  include("sms.class.php");
  //$receive_id[] = isset($_POST['jscusno']);
  $date_time = date('Y-m-d h:m:s');
  $send_status='ส่ง SMS แล้ว';
  $activity_id='1';
  $cusno = $_POST['jscusno'];
  $templateID = $_POST['smsID'];
  $cus_name = array();
  $cus_lastname = array();
  $cus_regis = array();

  //Variable for api send sms.
  $url = "http://www.thaibulksms.com/sms_api.php";
  $username = "0968899061";
  $password = "320016"; //862086
  $msisdn = "0968899061";
  $sender = "";
  $ScheduledDelivery = "";
  $force = "credit_remain_premium";
  $credit_type ="credit_remain_premium";

  //$message = "Test send message.";

  //Get customer info.
  $sql = "SELECT distinct
   insurance_relationship_view.vehicle_series,
   insurance_relationship_view.vehicle_brand,
   insurance_relationship_view.vehicle_chassis,
   insurance_relationship_view.vehicle_full_chassis,
   insurance_relationship_view.vehicle_regis,
   insurance_relationship_view.regis_num_cc,
   insurance_relationship_view.regis_car_type,
   insurance_relationship_view.date_deliver,
   insurance_relationship_view.regis_date,
    CASE WHEN ISNULL(insurance_relationship_view.address_full_name) THEN 'ไม่ระบุที่อยู่' ELSE insurance_relationship_view.address_full_name END AS address_full_name,
   insurance_relationship_view.cusno,
   insurance_relationship_view.be,
   insurance_relationship_view.cus_name,
   insurance_relationship_view.cus_surename,
   insurance_relationship_view.relates_type,
   insurance_relationship_view.cus_tel,
   CASE WHEN ISNULL(insurance_customer_activity.customer_activity_id) THEN 'รายการใหม่' ELSE insurance_customer_activity.track_last_status END AS track_last_status,
   CASE WHEN ISNULL(insurance_customer_activity.customer_activity_id) THEN 'info' ELSE 'success' END AS info,
   insurance_customer_activity.date_appointment,
   insurance_customer_activity.activity_Date,
   insurance_relationship_view.vehicle_id,
   insurance_customer_activity.activity_id,
   insurance_activity.activity_name,
   insurance_activity.activity_type,
   insurance_activity.activity_month,
   CONCAT(insurance_emp_view.emp_be,'',
   insurance_emp_view.emp_name,' ',
   insurance_emp_view.empsurname) AS empUser,
   insurance_customer_activity.customer_activity_id,
   insurance_customer_activity.activity_IsClose,
   insurance_customer_activity.insurance_Status,
   insurance_customer_activity_letter.send_letter_status,
   insurance_sale.insure_enddate
   FROM
   insurance_customer_activity
   RIGHT OUTER JOIN  insurance_relationship_view on  insurance_relationship_view.vehicle_id = insurance_customer_activity.vehicle_id
   LEFT JOIN insurance_activity ON insurance_activity.id = insurance_customer_activity.activity_id
   LEFT JOIN insurance_emp_view ON insurance_customer_activity.emp_id_card = insurance_emp_view.id_card
   LEFT JOIN insurance_customer_activity_letter ON insurance_customer_activity_letter.cusno = insurance_relationship_view.cusno
   LEFT JOIN insurance_sale ON insurance_sale.cus_id = insurance_relationship_view.cusno ";
  //Where only recieve id from list_customer_activity_call
  foreach ($_POST['jscusno'] as $val) {
    $cusID[]="insurance_relationship_view.cusno=$val";
  }
  $sql .= "WHERE ".implode(" or ", $cusID);
  $sqlQuery=mysql_query($sql);

  //Set format date.
  $monthNames= array("","มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");

  while($info_detail=mysql_fetch_array($sqlQuery)){
    $cus_name[] = $info_detail['cus_name'];
    $cus_lastname[] = $info_detail['cus_surename'];
    $cus_regis[] = $info_detail['vehicle_regis'];
    $cus_tel[] = $info_detail['cus_tel'];

    //Convert date format.
    $d = date('d',strtotime($info_detail['insure_enddate']));
    $m = $monthNames[date('m',strtotime($info_detail['insure_enddate']))];
    $y = date('Y',strtotime($info_detail['insure_enddate']))+543;
    $campaign_enddate[] = $d.' '.$m.' '.$y;
  }
  //End get customer info.
  // foreach ($cusno as $key => $value) {
  //   //echo $value;
  // }

  //Get sms detail.
  $sqlSMS = "SELECT sms_detail
             FROM insurance_sms
             WHERE sms_id=".$templateID;
  $resultSMS= mysql_query($sqlSMS);
  $detail=$sms_detail=mysql_fetch_array($resultSMS);
  //End get sms detail.


  //Replace and insert sms detail to database.
  foreach ($cusno as $key => $value) {
      $arr_replace = array($cus_name[$key],$cus_lastname[$key],$cus_regis[$key],$campaign_enddate[$key]);
      $originName = array("{ชื่อลูกค้า}","{นามสกุลลูกค้า}","{ทะเบียนรถ}","{วันหมดอายุกรมธรรม์}");
      $content_sms = $detail['sms_detail'];
      $message = str_ireplace($originName,$arr_replace,$content_sms);
      //$msisdn = $cus_tel[$key];
      // echo $message;
      // echo $cusno[$key];
      // echo $content_sms;
      //echo $msisdn."<br>";

      $count_tel = strlen($cus_tel[$key]);

      if($count_tel > 10){
        $string = $cus_tel[$key];
        $arr_cus_tel = explode ( ",", $string );
        foreach ($arr_cus_tel as $keys => $value) {
          echo $message;
          echo $cusno[$key];
          echo $content_sms;
          echo $arr_cus_tel[$keys]."---------";
        }
      }else{
        // $sql = "INSERT INTO insurance_customer_activity_sms(date_send_sms,send_sms_status,sms_detail,activity_id,cusno)
        //           VALUES ('$date_time','$send_status','$content_sms','$activity_id','$value')";
        // $result = mysql_query($sql) or die ("Error in query: $sql" . mysql_error());

        //Send SMS via API.
        //$result = sms::send_sms($username,$password,$msisdn,$message,$sender,$ScheduledDelivery,$force);
        //$result = sms::check_credit($username,$password,$force);
        //$result = sms::sending_fsock($username,$password,$msisdn,$message,$sender,$ScheduledDelivery,$force);
        //$result = sms::check_credit_fsock($username,$password,$credit_type);

        //echo $result;
      }
    }
    //echo "Insert SMS success.";


 ?>
