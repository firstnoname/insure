<?php
require_once 'init_inc.php';
$db=new DB;
require_once 'connDB.php';
$jqLib = 'https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js';


$query="SELECT distinct
 insurance_relationship_view.vehicle_series,
 insurance_relationship_view.vehicle_brand,
 insurance_relationship_view.vehicle_chassis,
 insurance_relationship_view.vehicle_full_chassis,
 insurance_relationship_view.vehicle_regis,
 insurance_relationship_view.regis_num_cc,
 insurance_relationship_view.regis_car_type,
 insurance_relationship_view.date_deliver,
 insurance_relationship_view.regis_date,
 insurance_relationship_view.cusno,
 CONCAT(insurance_relationship_view.be,'',
 insurance_relationship_view.cus_name,' ',
 insurance_relationship_view.cus_surename) AS Customer,
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
 insurance_customer_activity_sms.send_sms_status
 FROM
 insurance_customer_activity
 RIGHT OUTER JOIN  insurance_relationship_view on  insurance_relationship_view.vehicle_id = insurance_customer_activity.vehicle_id
 LEFT JOIN insurance_activity ON insurance_activity.id = insurance_customer_activity.activity_id
 LEFT JOIN insurance_emp_view ON insurance_customer_activity.emp_id_card = insurance_emp_view.id_card
 LEFT JOIN insurance_customer_activity_sms ON insurance_customer_activity_sms.cusno = insurance_relationship_view.cusno ";

 //Have cus_id.
 if(isset($_POST['checkBox'])){
   $receive_id = $_POST['checkBox'];
   //print_r($receive_id);

   foreach ($receive_id as $val) {
     $myvar[]="insurance_relationship_view.cusno=$val and insurance_relationship_view.cus_tel !=''";
   }
   //Where only recieve id from list_customer_activity_call
   $query .= "WHERE ".implode(" or ", $myvar);
   //$query .= "WHERE ".implode(" or ", $myvar) . " AND insurance_relationship_view.cus_tel != '' ";
   //echo $query;
 }

 //Don't have cus_id.
 if(isset($_POST['selAuto'])){
   
 }



   $result =mysql_query($query) or die(mysql_error());
    mysql_query("set NAMES utf8");
   $arr = array();
   /*while($row=mysql_fetch_array($result)){
   		$arr[] = $row;
      echo "<br>ID: " . $row['cusno'] . ", Cus Name: " . $row['Customer'] .
        ", Vehicle Regis: " . $row['vehicle_regis'] .
        ", Vehicle Series: " . $row['vehicle_series'] .
        ", Vehicle brand: " . $row['vehicle_brand'] .
        ", Track last status: " . $row['track_last_status'] .
        ", Regis date: " . $row['regis_date'].
        ", Date deliver: " . $row['date_deliver'].
        ", Employee name: " . $row['empUser'] .
        ", Cus telephone: " . $row['cus_tel'];
   }*/

?>
<!DOCTYPE html>
 <html ng-app="Insurance" ng-app lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard - Hornbill Insurance Test</title>
 <!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/css/font-awesome.css" />
		<link rel="stylesheet" href="assets/css/datepicker.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.css" />
		<link rel="stylesheet" href="assets/css/colorpicker.css" />
		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.js"></script>

	</head>

	<body class="no-skin">

  <!-- Insert into database. -->

  <form id="form_send_sms">
		<!-- #section:basics/navbar.layout -->
		    <?php include("navbar.php") ; ?>
		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			    <?php include("slidebar.php"); ?>
			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.php">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->

						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
					     						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								SMS
								<small><i class="ace-icon fa fa-angle-double-right"></i>
								แสดงลูกค้าที่จะส่ง SMS
								</small>
							</h1>
						</div>

<div class="col-xs-12" ng-controller="filterSMSCrtl">
	                  <div class="widget-box">
											<div class="widget-header">
												<h4 class="smaller">
													แบบฟอร์ม SMS
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main form-horizontal">
                          <div class="form-group" >
										        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> เลือกแบบฟอร์ม SMS:</label>
										        <div class="col-sm-9">
                              <select id="selectTemplateSMSID" name="selectTemplateSMSID" ng-model="entryLimit" class="form-control">
                                <option id="templateID" name="templateID">กรุณาเลือกตัวอย่าง SMS</option>
                                  <?php
                                    $template = "SELECT * FROM insurance_sms";
                                    $queryTemplate = mysql_query($template);
                                    while ($rowTemplate=mysql_fetch_array($queryTemplate)) {?>
                                      <option value="<?php echo $rowTemplate['sms_id'];?>"><?php echo $rowTemplate['sms_title']; ?></option>
                                  <?php   } ?>
                              </select>
										        </div>
									        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
										      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ตัวอย่างแบบฟอร์ม SMS: </label>
										    <div class="col-sm-9">
											    <textarea class="form-control" id="showTemplateID" placeholder="ตัวอย่างรูปแบบ SMS"></textarea>
										    </div>
									      </div>
                        <div class="space-4"></div>
											</div>
										</div>


							<div class="row">
								<div class="col-md-12" ng-show="filteredItems > 0">
									<table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>

												<tr>
													<th class="center">
																<!--<i class="ace-icon fa fa-eye "></i>-->

													</th>
													<th>ชื่อ นามสกุลลูกค้า</th>

													<th class="hidden-480">เบอร์โทร</th>
													<th class="hidden-480">สถานะการส่ง SMS</th>

													<th>
														<i class="ace-icon 	fa fa-users  hidden-480"></i>
														ผู้รับผิดชอบ

													</th>
												</tr>
											</thead>

											<tbody>
                        <?php
                        $i=1;
                        while($row=mysql_fetch_array($result)){ ?>
												<tr>
                          <td class="center">
                            <!--<button class="btn btn-xs btn-info" >
                                <i class="ace-icon fa fa-eye "></i>-->
                                <div class="checkbox">
                                  <label><input type="checkbox" value="<?php echo $row['cusno']?>" id="checkBoxID'.$i.'" name="checkBox" checked disabled="true"><?php echo $row['cusno']; ?></label>
                                </div>
                              <!--</button>-->
                              </a>
                          </td>

                          <td>
                            <?php echo $row['Customer']; ?>
                          </td>

                          <td ><?php echo $row['cus_tel']; ?></td>

                          <td class="hidden-480"><span class="label label-{{data.info}} arrowed-right arrowed-in">
                          <?php echo $row['send_sms_status']; ?></span>
                          </td>

                          <td><?php echo $row['empUser'];?></td>

												</tr>
                        <?php
                        $i++;
                        } ?>
											</tbody>

										</table>
											</div>

												<div class="col-md-12" ng-show="filteredItems > 0">
													<div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>


												</div>
											</div>
                      <tr>
                        <center>
                          <button class="btn btn-info" type="button value="submit id="btnSendSMS" name="btnSendSMS">
                                <i class="ace-icon fa bigger-110"></i>ส่ง SMS</button>
                          <button class="btn btn-info" type="button value="submit id="btnCancel" name="btnCancel">
                                  <i class="ace-icon fa bigger-110"></i>ยกเลิก</button>
                        </center>
                      </tr>
                      <div class="space-4"></div>
										</div>
									</div>

					<div class="hr hr32 hr-dotted"></div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->

					 <!-- /.page-content -->
					</div><!-- /.page-content -->
				</div>
			</div>
			<!-- /.main-content -->
               <?php include("footer.php"); ?>
			<!-- /.main-container -->

            <!-- for search -->
		    <script src="assets/js/angular.min.js"></script>
        <script src="assets/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
        <script src="app/app.js"></script>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo $jqLib; ?>"></script>
        <script>
        $(document).ready(function(){
          /*$("#btnSendSMS").click(function(){
            $("#form_send_sms").attr("action","insert_sms.php");
            $("#form_send_sms").submit();
          });*/
          // var a = [1,2];
          // var b = new Array();
          // b.push(3);
          // b.push(4);
          // alert(a);
          // alert(b);
          var loadingImage  = '<img src="images/loading4.gif" alt="loading" />';
          var jscusno = new Array();
          var templateID = "";

          //Get array values from checkbox.
          $("input[name=checkBox]").each(function() {
            jscusno.push($(this).val());
          });
          //alert("Result: "+jscusno);

          $("#btnSendSMS").click(function(){
            var selectValue = $('#selectTemplateSMSID option:selected');

            if(selectValue.val()!="กรุณาเลือกตัวอย่าง SMS"){
              var smsID = selectValue.val();

              $.ajax({
                type: "POST",
                url: "api_send_sms.php",
                data:{jscusno:jscusno,smsID:smsID},
                //data:{jscusno:jscusno},
                success: function(response){
                  //alert("บันทึกการส่ง SMS สำเร็จ");
                  alert(response);
                  //window.location.href = 'list_customer_activity_send.php';
                }
              });
            }else{
              alert("โปรดเลือกรูปแบบ SMS!");
            }
          });

          //Get id from option.
          $("#selectTemplateSMSID").change(function(){
            templateID = $("#selectTemplateSMSID option:selected").val();
            //alert("Test: " + templateID);
            $.ajax({
        			url: "json_select_sms_template.php",
        			data: ({ smsTemplateID: templateID }),
        			dataType: "json",
        			beforeSend: function() {
        			//$("#waitcompany").html(loadingImage);
        			},
        			success: function(json){
          				$.each(json, function(index, value) {
                    $('#showTemplateID').val(value.sms_detail);
                  });
                }
              });
            });
          //Click cancel.
          $('#btnCancel').click(function(){
            window.location.href = 'list_customer_activity_send.php';
          });
        });
        </script>

  </form>
	</body>
</html>
