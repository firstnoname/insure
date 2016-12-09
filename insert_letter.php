<?php
  require_once 'init_inc.php';
  require_once 'connDB.php';
  $db=new DB;


  $date_time = date('Y-m-d h:m:s');
  $send_status = "ส่งจดหมายแล้ว";
  $activity_id = '1';

  
  foreach ($_POST['jscusno'] as $val) {
    $sql = "INSERT INTO insurance_customer_activity_letter(date_send_letter,send_letter_status,activity_id,cusno)
            VALUES ('$date_time','$send_status','$activity_id','$val')";
    $result = mysql_query($sql) or die ("Error in query: $sql" . mysql_error());
    $data[]=array($val);
  }//End foreach

  $json_cusno = json_encode($data);
  echo $json_cusno;
?>
