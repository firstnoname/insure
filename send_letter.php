<?php
require_once 'init_inc.php';
$db=new DB;
require_once 'connDB.php';

$receive_id = $_POST['checkBox'];

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
  CASE WHEN ISNULL(insurance_relationship_view.address_full_name) THEN 'ไม่ระบุที่อยู่' ELSE insurance_relationship_view.address_full_name END AS address_full_name,
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
 insurance_customer_activity_letter.send_letter_status,
 insurance_sale.insure_enddate
 FROM
 insurance_customer_activity
 RIGHT OUTER JOIN  insurance_relationship_view on  insurance_relationship_view.vehicle_id = insurance_customer_activity.vehicle_id
 LEFT JOIN insurance_activity ON insurance_activity.id = insurance_customer_activity.activity_id
 LEFT JOIN insurance_emp_view ON insurance_customer_activity.emp_id_card = insurance_emp_view.id_card
 LEFT JOIN insurance_customer_activity_letter ON insurance_customer_activity_letter.cusno = insurance_relationship_view.cusno
 LEFT JOIN insurance_sale ON insurance_sale.cus_id = insurance_relationship_view.cusno ";

   foreach ($receive_id as $val) {
     //
     $myvar[]="insurance_relationship_view.cusno=$val and insurance_relationship_view.address_full_name != ''";
   }
   //Where only recieve id from list_customer_activity_call
   $query .= "WHERE ".implode(" or ", $myvar);

   //echo $query;

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
		<title>Dashboard - Hornbill Insurance </title>
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

  <form id="form_send_letter">
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
								พิมพ์จดหมาย
								<small><i class="ace-icon fa fa-angle-double-right"></i>
								แสดงลูกค้าที่จะส่งจดหมาย
								</small>
							</h1>
						</div>

<div class="col-xs-12" ng-controller="filterLetterCrtl">
	                  <div class="widget-box">
											<div class="widget-header">
												<h4 class="smaller">
													แบบฟอร์มจดหมาย
												</h4>
											</div>

                      <div class="widget-body">
												<div class="widget-main form-horizontal">
                          <div class="form-group" >
										        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">เลือกแบบฟอร์ม SMS:</label>
										        <div class="col-sm-9">
                              <select id="selectTemplateLetterID" name="selectTemplateLetterID" ng-model="entryLimit" class="form-control">
                                <option>กรุณาเลือกตัวอย่างจดหมาย</option>
                                  <?php
                                    $template = "SELECT * FROM insurance_letter";
                                    $queryTemplate = mysql_query($template);
                                    while ($rowTemplate=mysql_fetch_array($queryTemplate)) {?>
                                      <option value="<?php echo $rowTemplate['letter_id'];?>"><?php echo $rowTemplate['letter_title']; ?></option>
                                  <?php } ?>
                              </select>
										        </div>
									        </div>
                        <div class="space-4"></div>
                        <!-- <div class="form-group">
										      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ตัวอย่างแบบฟอร์ม จดหมาย: </label>
										    <div class="col-sm-9">
											    <textarea class="form-control" id="showTemplateID" name="showTemplateID" placeholder="ตัวอย่างรูปแบบจดหมาย"></textarea>

										    </div>
									      </div> -->
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

													<th class="hidden-480">ที่อยู่</th>
													<th class="hidden-480">สถานะ</th>
													<th>วันที่หมดอายุกรมธรรม์</th>
													<th>
														<i class="ace-icon 	fa fa-users  hidden-480"></i>
														ผู้ส่ง

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

                          <td ><?php echo $row['address_full_name']; ?></td>

                          <td><span class="label label-{{data.info}} arrowed-right arrowed-in">
                            <?php echo $row['send_letter_status']; ?></span></td>
                          <td><?php echo $row['insure_enddate']; ?></td>


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
                          <button class="btn btn-info" type="button value="submit id="btnSendLetter" name="btnSendLetter">
                                <i class="ace-icon fa bigger-110"></i>พิมพ์จดหมาย</button>
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
        <script>
        $(document).ready(function(){
          //Get array values from checkbox.
          var jscusno = new Array();
          $("input[name=checkBox]").each(function() {
            jscusno.push($(this).val());
          });
          //alert("Result: "+jscusno);

          //Show letter template.
          $("#selectTemplateLetterID").change(function(){
            var templateID = $("#selectTemplateLetterID option:selected").val();

            //alert("Test: " + templateID);
            $.ajax({
              url: "json_select_letter_template.php",
              data:({letterTemplateID: templateID}),
              dataType: "json",
              success: function(json){
                $.each(json, function(index, value){
                  $('#showTemplateID').val(value.letter_detail);
                })
              }
            });
          });

          //Send Letter.
          $("#btnSendLetter").click(function(){
            var selectValue = $('#selectTemplateLetterID option:selected');

            if(selectValue.val()!="กรุณาเลือกตัวอย่างจดหมาย"){
              $.ajax({
                type: "POST",
                //dataType: "json",
                url: "insert_letter.php",
                data: {jscusno},
                success: function(data){
                  var cus_id="";
                  //alert(data);

                  for (var i = 0; i < jscusno.length; i++) {
                    cus_id += jscusno[i] + " ";
                  }
                  alert("บันทึกข้อมูลจดหมายสำเร็จ")
                  var templateID = $("#selectTemplateLetterID option:selected").val();
                  window.location.href = "preview.php?type="+templateID+"&data=" + cus_id ;
                }
              });
            }else{
              alert("กรุณาเลือกแบบฟอร์มจดหมาย!");
            }

          });//End btnSendLetter.

          //Click cancel.
          $('#btnCancel').click(function(){
            window.location.href = 'list_customer_activity_send.php';
          });
      });//End scriip.
        </script>

  </form>
	</body>
</html>
