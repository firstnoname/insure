<?php
  require_once 'init_inc.php';
  require_once 'connDB.php';
  $db=new DB;

  $insure_req_date = "";
  $insure_req_deler = "";
  $insure_req_code = "";
  $insure_req_cus_id = "";
  $insure_req_emp_id = "";
  $insure_req_detail_org = "";
  $insure_req_detail_new = "";
  $insure_req_exchange_rate_type = "";
  $insure_req_exchange_rate = "";
  $insure_req_doc_retrun = "";
  $insure_req_doc_retrun_other = "";
  $insure_edit_req_remark = "";
  $insure_req_remark = "";
  $action = "";

  if(isset($_POST['receipt_date'])){
    $insure_req_date = $_POST['receipt_date'];
    // echo "receipt_date : ".$insure_req_date;
    $insure_req_date = date("Y/m/d");
    //echo $insure_req_date;
  }
  if(isset($_POST['insure_req_deler'])){
    $insure_req_deler = $_POST['insure_req_deler'];
    //echo "insure_req_deler : ".$insure_req_deler;
  }

  if(isset($_POST['insure_req_code'])){
    $insure_req_code = $_POST['insure_req_code'];
    //echo "insure_req_code : ".$insure_req_code;
  }

  if(isset($_POST['cus_id'])){
    $insure_req_cus_id = $_POST['cus_id'];
    //echo "cus_id : ".$insure_req_cus_id;
  }

  if(isset($_POST['insure_req_emp_id'])){
    $insure_req_emp_id = $_POST['insure_req_emp_id'];
    //echo "insure_req_emp_id : ".$insure_req_emp_id;
  }


  if(isset($_POST['insure_req_detail'])){
    $insure_req_detail = $_POST['insure_req_detail'];
    //print_r($insure_req_detail);
  }

  if(isset($_POST['edit_detail_remark'])){
    $insure_edit_req_remark = $_POST['edit_detail_remark'];
    //echo $insure_edit_req_remark;
  }

  if(isset($_POST['insure_req_detail_org'])){
    $insure_req_detail_org = $_POST['insure_req_detail_org'];
    //echo "insure_req_detail_org : ".$insure_req_detail_org;
  }

  if(isset($_POST['insure_req_detail_new'])){
    $insure_req_detail_new = $_POST['insure_req_detail_new'];
    //echo "insure_req_detail_new : ".$insure_req_detail_new;
  }

  if(isset($_POST['insure_req_exchange_rate_type'])){
      $insure_req_exchange_rate_type = $_POST['insure_req_exchange_rate_type'];
  }

  if(isset($_POST['insure_req_exchange_rate'])){
    $insure_req_exchange_rate = $_POST['insure_req_exchange_rate'];
    //echo "insure_req_exchange_rate : ".$insure_req_exchange_rate;
  }

	if(isset($_POST['insure_req_doc_retrun'])){
    $insure_req_doc_retrun = $_POST['insure_req_doc_retrun'];
    //echo "insure_req_doc_retrun : ".$insure_req_doc_retrun;
  }

	if(isset($_POST['insure_req_doc_retrun_other'])){
    $insure_req_doc_retrun_other = $_POST['insure_req_doc_retrun_other'];
    //echo "insure_req_doc_retrun_other : ".$insure_req_doc_retrun_other;
  }

  if(isset($_POST['insure_req_remark'])){
    $insure_req_remark = $_POST['insure_req_remark'];
    //echo "remark : ".$remark;
  }

  if(isset($_POST['insure_req_status'])){
    $insure_req_status = $_POST['insure_req_status'];
    //echo "insure_req_status : ".$insure_req_status;
  }

  if(isset($_POST['delivery_close'])){
    $delivery_close = $_POST['delivery_close'];
    //echo "delivery_close : ".$delivery_close;
  }

  if(isset($_POST['action'])){
    $action = $_POST['action'];
    //echo "action : ".$action;

  }
  echo $insure_req_remark;
  if(isset($_POST['cus_id'])){
    $sql = "INSERT INTO insurance_insure_request
              (`insure_req_date`,`insure_req_deler`,`insure_req_code`,
              `insure_req_cus_id`,`insure_req_emp_id`,`insure_req_detail_org`,
              `insure_req_detail_new`,`insure_req_exchange_rate_type`,
              `insure_req_exchange_rate`,`insure_req_doc_retrun`,
              `insure_req_doc_retrun_other`,`insure_req_remark`,
              `insure_req_status`)
            VALUES
              ('$insure_req_date','$insure_req_deler','$insure_req_code',
              '$insure_req_cus_id','$insure_req_emp_id','$insure_req_detail_org',
              '$insure_req_detail_new','$insure_req_exchange_rate_type',
              '$insure_req_exchange_rate','$insure_req_doc_retrun',
              '$insure_req_doc_retrun_other','$insure_req_remark',
              '$action')";

    $result =  mysql_query($sql) or die ("Error in query: $sql" . mysql_error());


  //   $arr_data = array(
  //     'insure_req_date' => $insure_req_date,
  //     'insure_req_deler' => $_POST['insure_req_deler'],
  //     'insure_req_code' => $_POST['insure_req_code'],
  //     'insure_req_cus_id' => $_POST['cus_id'],
  //     'insure_req_emp_id' => $_POST['insure_req_emp_id'],
  //     'insure_req_detail_org' => $_POST['insure_req_detail_org'],
  //     'insure_req_detail_new' => $_POST['insure_req_detail_new'],
  //     'insure_req_exchange_rate_type' => $_POST['insure_req_exchange_rate_type'],
  //     'insure_req_exchange_rate' => $_POST['insure_req_exchange_rate'],
  //     'insure_req_doc_retrun' => $_POST['insure_req_doc_retrun'],
  //     'insure_req_doc_retrun_other' => $_POST['insure_req_doc_retrun_other'],
  //     'insure_req_remark' => $_POST['insure_req_remark'],
  //     'insure_req_status' => $_POST['insure_req_status']
  //   );
   //
  //  $db->insert('insurance_insure_request',$arr_data);


   //Insert into table detail.

   $last_id = mysql_insert_id($link);
   //echo $last_id;
   if(isset($_POST['insure_req_detail'])){
     $insure_req_detail = $_POST['insure_req_detail'];

    //  if(isset($_POST['edit_detail_remark'])){
    //    $insure_edit_req_remark = $_POST['edit_detail_remark'];
    //  }

     foreach ($insure_req_detail as $key => $value) {
       if($value != 12){
         $insure_edit_req_remark = "";
       }
       if($value == 12){
         $insure_edit_req_remark = $_POST['edit_detail_remark'];

       }
       $arr_data = array(
         'insure_req_id' => $last_id,
         'insure_req_type_id' => $value,
         'insure_req_start' => '',
         'insure_req_end' => '',
         'insure_req_remark' => $insure_edit_req_remark
       );
       $db->insert('insurance_insure_request_detail',$arr_data);
     }

   }
   echo " <script> alert('ระบบทำการบันทึกข้อมูลเรียบร้อย');javascript:location='print_act.php?last_id=".$last_id."';</script>";
  }

 ?>
