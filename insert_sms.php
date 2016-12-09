<?php
  require_once 'init_inc.php';
  $db=new DB;
  require_once 'connDB.php';


  //$receive_id[] = isset($_POST['jscusno']);
  $date_time = date('Y-m-d h:m:s');
  $send_status='ส่ง SMS แล้ว';
  $activity_id='1';
  $cusno = $_POST['jscusno'];
  $templateID = $_POST['smsID'];
  $cus_name = array();
  $cus_lastname = array();
  $cus_regis = array();

  //Get customer info.
  $sql = "SELECT
                insurance_relationship_view.cusno,
                insurance_relationship_view.cus_name,
                insurance_relationship_view.cus_surename,
                insurance_relationship_view.vehicle_regis
              FROM
                insurance_relationship_view ";
  //Where only recieve id from list_customer_activity_call
  foreach ($_POST['jscusno'] as $val) {
    $cusID[]="insurance_relationship_view.cusno=$val";
  }
  $sql .= "WHERE ".implode(" or ", $cusID);
  $sqlQuery=mysql_query($sql);

  while($info_detail=mysql_fetch_array($sqlQuery)){
    $cus_name[] = $info_detail['cus_name'];
    $cus_lastname[] = $info_detail['cus_surename'];
    $cus_regis[] = $info_detail['vehicle_regis'];
  }
  //End get customer info.
  foreach ($cusno as $key => $value) {
    //echo $value;
  }

  //Get sms detail.
  $sqlSMS = "SELECT sms_detail
             FROM insurance_sms
             WHERE sms_id=".$templateID;
  $resultSMS= mysql_query($sqlSMS);
  $detail=$sms_detail=mysql_fetch_array($resultSMS);
  //End get sms detail.



  //Insert sms detail to database.
  foreach ($_POST['jscusno'] as $key => $value) {
      $arr_replace = array($cus_name[$key],$cus_lastname[$key],$cus_regis[$key]);
      $originName = array("{ชื่อลูกค้า}","{นามสกุลลูกค้า}","{ทะเบียนรถ}");
      $content_sms = $detail['sms_detail'];
      $content_sms = str_ireplace($originName,$arr_replace,$content_sms);

      $sql = "INSERT INTO insurance_customer_activity_sms(date_send_sms,send_sms_status,sms_detail,activity_id,cusno)
                VALUES ('$date_time','$send_status','$content_sms','$activity_id','$value')";
      $result = mysql_query($sql) or die ("Error in query: $sql" . mysql_error());
    }
    //echo "Insert SMS success.";
    
 ?>
