<?php
  require_once 'init_inc.php';
  require_once 'connDB.php';

  $smsTemplateID = isset($_GET['smsTemplateID']) ? $_GET['smsTemplateID'] : '';
  $query = "SELECT sms_detail FROM insurance_sms WHERE sms_id = $smsTemplateID";
  //echo $smsTemplateID;
  //echo $query;

  $result = mysql_query($query);
  mysql_query("set NAMES utf8");

  $data = array();
  while ($row= mysql_fetch_assoc($result)) {
    $data[] = $row;
  }

  echo json_encode($data);
 ?>
