<?php
require_once 'init_inc.php';
$jqLib = 'https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js';
$db=new DB;
include_once "connDB.php";

?>
 <!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8">
		<title>CALL - Hornbill Insurance </title>


		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/css/font-awesome.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/ace-fonts.css" />
        	<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.css" />
		<link rel="stylesheet" href="assets/css/chosen.css" />
		<link rel="stylesheet" href="assets/css/datepicker.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.css" />
		<link rel="stylesheet" href="assets/css/colorpicker.css" />

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

	</head>

	<body class="no-skin">
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
								<a href="#">Home</a>							</li>
							<li class="active">Requests</li>
						</ul><!-- /.breadcrumb -->


						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Requests
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									คำขอใบแจ้งสลักหลัง พรบ 						</h1>
						</div><!-- /.page-header -->

							 <div class="row">


											<div class="col-xs-12">
											 	 <?php  include('customer_notrack_info.php'); ?>
												<div class="widget-box1">
													<div class="widget-header widget-header-flat">
														<h4 class="smaller">
															<i class="ace-icon fa fa-code"></i>
															รายละเอียดใบคำขอออกเอกสารแนบท้าย (ภาคบังคับ)													</h4>
													</div>

      <?php
      //Get id.
      if(isset($_GET['insure_req_id'])){
        //Select insurance_insure_request
        $req_id = $_GET['insure_req_id'];

        $select_request = "SELECT *
                           FROM insurance_insure_request
                           WHERE insure_req_id = $req_id ";
        $request_query = mysql_query($select_request);
        $row_request = mysql_fetch_array($request_query);

        //Select insurance_insure_request_detail
        $select_req_detail = "SELECT *
                              FROM insurance_insure_request_detail
                              WHERE insure_req_id = $req_id ";
        $request_detail_query = mysql_query($select_req_detail);

        while ($row_request_detail = mysql_fetch_array($request_detail_query)) {
          $insure_req_type_id[] = $row_request_detail['insure_req_type_id'];
        }
        //print_r($insure_req_type_id);

        //Select insurance_insure_reguest_type

      }
      //print_r($insure_req_type_id);

       ?>
													<div class="widget-body">

														<div class="widget-main">
														  <div class="modal-body" style="overflow-y: auto; overflow-x: hidden; max-height: 650px;"><div class="onpage-help-content">
                                <div class="col-sm-12" >
                                  <div class="profile-user-info profile-user-info-striped col-sm-12">
                                		<div class="profile-info-row">
                                			<div class="profile-info-name">วันที่แจ้ง</div>
                                			<div class="profile-info-value">
                                			 <div  class="col-md-5">
                                        <div class="input-group">
                                					<input class="form-control date-picker" id="receipt_date" value="<?php echo date("d-m-Y",strtotime($row_request['insure_req_date']));?>" />
                              							<span class="input-group-addon">
                              								<i class="fa fa-calendar bigger-110"></i>
                              							</span>
                              						</div>
                                  			</div>
                                  		</div>
                                  	</div>

                                 <div class="profile-info-row">
                                			<div class="profile-info-name">เลขที่กรมธรรม์</div>

                                			<div class="profile-info-value">
                                			 <div class="col-md-5">
                                        <input class="form-control input-mask-product" id="txtnumber"  type="text" value="">
                                			</div>
                                			</div>

                                	</div>

                                                        	<div class="profile-info-row">
                                			<div class="profile-info-name">รหัสตัวแทน</div>

                                			<div class="profile-info-value">
                                			 <div  class="col-md-5">
                                        <input class="form-control input-mask-product" id="insure_req_deler"  type="text" value="<? echo $row_request['insure_req_deler'];?>">
                                			</div>
                                		   </div>
                                	</div>


                                    <div class="profile-info-row" id="div_address">
                                			<div class="profile-info-name">เลขที่สลักหลัง</div>
                                			  <div class="profile-info-value">
                                			    <div class="col-md-5" id="prices">
                                           <input class="form-control input-mask-product" id="insure_req_code"  type="text" value="<? echo $row_request['insure_req_code'];?>">
                                         </div>
                                		  </div>
                                	  </div>

                                <div class="profile-info-row">
                                 <div class="profile-info-name">รายการที่ขอแก้ไข</div>
                                	<div class="profile-info-value">
                                	 <div class=" col-md-9" >
                                    <table id="paytable" class="table table-striped table-bordered table-hover">
                                      <thead>
                                        <tr>
                                          <th>รายการ</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                       <?php
                                        $sql_req="Select * from insurance_insure_reguest_type";
                                				$rs_type2=mysql_query($sql_req);
                                				while($row_type2=mysql_fetch_array($rs_type2)){
                                        ?>
                                        <tr>
                                         <td>
                                          <div class="checkbox">
                                					 <label>
                                						<!-- <input class="ace ace-checkbox-2" name="chk_req_detail" onchange="getcheckbox()" value="<?=$row_type2['insure_reguest_type']?>" type="checkbox"> -->
                                            <?php echo $db->checkbox_edit($row_type2['insure_reguest_type'],$insure_req_type_id[0]);  ?>
                                            <span class="lbl"><?=$row_type2['insure_reguest_name']?></span>
                                					 </label>
                                		      </div>
                                         </td>
                                       </tr>
                                       <?php }; ?>
                                       <tr>
                                        <td>
                                          <div id="detail_remark_textbox" style="display: none;">
                                            <input type="text" name="edit_detail_remark" id="edit_detail_remark">
                                          </div>
                                        </td>
                                       </tr>

                                     </tbody>
                                  </table>
                                </div>
                                </div>
                                </div>

                                <div class="profile-info-row" >
                                <div class="profile-info-name">รายละเอียดเดิม</div>
                                <div class="profile-info-value">
                                  <div class="col-md-9" >
                                    <textarea class="form-control limited" id="insure_req_detail_org" maxlength="250"><?echo $row_request['insure_req_detail_org'];?></textarea>
                                	</div>
                                </div>
                                </div>

                                <div class="profile-info-row" >
                                <div class="profile-info-name">รายละเอียดใหม่</div>
                                <div class="profile-info-value">
                                  <div class="col-md-9" >
                                    <textarea class="form-control limited" id="insure_req_detail_new" maxlength="250"><?echo $row_request['insure_req_detail_new'];?></textarea>
                                	</div>
                                </div>
                                </div>

                                <div class="profile-info-row">
                                <div class="profile-info-name">การปรับอัตราเบี้ยประกันภัย</div>
                                <div class="profile-info-value">
                                  <div class="col-sm-9">
                                    <!-- #section:elements.form.input-icon -->
                                    <span class="input-icon input-icon-right">
                                      <select name="insure_req_exchange_rate_type" id="insure_req_exchange_rate_type" data-placeholder="Choose a State...">
                                        <?php
                                          $arr_exchange_type = array(
                                            "0" => "เลือก",
                                            "1" => "คืน",
                                            "2" => "เพิ่ม"
                                          );
                                          echo $db->select_options($arr_exchange_type,$row_request['insure_req_exchange_rate_type']);
                                        ?>
                                    </select>
                                  </span>

                                    <span class="input-icon input-icon-right">
                                        <input id="insure_req_exchange_rate" type="text" value="<?echo $row_request['insure_req_exchange_rate'];?>" > บาท
                                    </span>

                                    <!-- /section:elements.form.input-icon -->
                                  </div>
                                </div>
                                </div>

                                <div class="profile-info-row" id="div_address">
                                	<div class="profile-info-name">จัดส่งสลักหลังประประกัน</div>

                                	<div class="profile-info-value">
                                	 <div class="col-md-5" id="prices">
                                    <select name="seladdress"  id="insure_req_doc_retrun" data-placeholder="Choose a State...">
                                      <?php
                                        $arr_doc_return = array(
                                          "0" => "เลือก",
                                          "1" => "ตามที่อยู่",
                                          "2" => "ผ่านตัวแทน",
                                          "3" => "อื่นๆ",
                                        );
                                        echo $db->select_options($arr_doc_return,$row_request['insure_req_doc_retrun']);
                                       ?>
                                    </select>

                                	</div>
                                   </div>
                                	</div>

                                  <div class="profile-info-row"  id="div_other">
                                		<div class="profile-info-name">ระบุ</div>
                                			<div class="profile-info-value">
                                			 <div class="col-md-9" >
                                         <textarea class="form-control limited" id="insure_req_doc_retrun_other" maxlength="250"><?echo $row_request['insure_req_doc_retrun_other'];?></textarea>
                                			  </div>
                                		  </div>
                                	</div>

                                  <div class="profile-info-row" >
                                	 <div class="profile-info-name">หมายเหตุ</div>
                                		<div class="profile-info-value">
                                			<div class="col-md-9" >
                                         <textarea class="form-control limited" id="insure_req_remark" maxlength="250"><?echo $row_request['insure_req_remark'];?></textarea>
                                			</div>
                                		</div>
                                	</div>
                                </div>
                                </div>

                                <div class="profile-info-row col-sm-12">
                                  <div class="profile-info-name"> </div>
                                    <div class="profile-info-value col-sm-12">
                                		    <div class="col-sm-12 center">
                                		       <button class="btn btn-success" type="button" id="btnsave">
                                			           <i class="ace-icon glyphicon glyphicon-floppy-disk bigger-110"></i>บันทึกเอกสาร
                                           </button>

                                				   <button class="btn" type="reset">
                                					      <i class="ace-icon fa fa-undo bigger-110"></i>ล้างค่า
                                           </button>
                                					</div>
                                				</div>
                                			</div>
                                	</div>
                                </div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.row116 -->
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Hornbill Insurance</span>
							Application &copy; 2016						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i></a></span>					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>			</a>

								</div>

								</div>

		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->
<script src="assets/js/chosen.jquery.js"></script>
<script src="assets/js/fuelux/fuelux.tree.js"></script>
		<!--[if lte IE 8]>
		  <script src="../assets/js/excanvas.js"></script>
		<![endif]
		<script src="js/jquery-1.12.1.min.js"></script>-->
		<script src="assets/js/jquery-ui.custom.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.js"></script>
		<script src="assets/js/jquery.easypiechart.js"></script>
		<script src="assets/js/jquery.sparkline.js"></script>
		<script src="assets/js/flot/jquery.flot.js"></script>
		<script src="assets/js/flot/jquery.flot.pie.js"></script>
		<script src="assets/js/flot/jquery.flot.resize.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace/elements.scroller.js"></script>
		<script src="assets/js/ace/elements.colorpicker.js"></script>
		<script src="assets/js/ace/elements.fileinput.js"></script>
		<script src="assets/js/ace/elements.typeahead.js"></script>
		<script src="assets/js/ace/elements.wysiwyg.js"></script>
		<script src="assets/js/ace/elements.spinner.js"></script>
		<script src="assets/js/ace/elements.treeview.js"></script>
		<script src="assets/js/ace/elements.wizard.js"></script>
		<script src="assets/js/ace/elements.aside.js"></script>
		<script src="assets/js/ace/ace.js"></script>
		<script src="assets/js/ace/ace.ajax-content.js"></script>
		<script src="assets/js/ace/ace.touch-drag.js"></script>
		<script src="assets/js/ace/ace.sidebar.js"></script>
		<script src="assets/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="assets/js/ace/ace.submenu-hover.js"></script>
		<script src="assets/js/ace/ace.widget-box.js"></script>
		<script src="assets/js/ace/ace.settings.js"></script>
		<script src="assets/js/ace/ace.settings-rtl.js"></script>
		<script src="assets/js/ace/ace.settings-skin.js"></script>
		<script src="assets/js/ace/ace.widget-on-reload.js"></script>
		<script src="assets/js/ace/ace.searchbox-autocomplete.js"></script>
		<script src="assets/js/ace-extra.js"></script>
		<script src="assets/js/date-time/bootstrap-datepicker.js"></script>
		<script src="assets/js/date-time/bootstrap-timepicker.js"></script>
		<script src="assets/js/date-time/moment.js"></script>
		<script src="assets/js/date-time/daterangepicker.js"></script>
		<script src="assets/js/date-time/bootstrap-datetimepicker.js"></script>
		<script src="assets/js/bootstrap-colorpicker.js"></script>
			<script src="assets/js/bootbox.js"></script>
		<script src="assets/js/jquery.autosize.js"></script>
		<script src="assets/js/jquery.inputlimiter.1.3.1.js"></script>
		<script src="assets/js/jquery.maskedinput.js"></script>
		<script src="assets/js/bootstrap-tag.js"></script>

       <script src="assets/js/jquery.knob.js"></script>
		<!-- ace scripts -->
		<script src="assets/js/ace/elements.scroller.js"></script>

		<script src="assets/js/ace/elements.fileinput.js"></script>

		<script src="assets/js/ace/elements.spinner.js"></script>
			<!-- inline scripts related to this page -->

		<script type="text/javascript">
    //Set checkbox ใน รายการแก้ไข
    $( document ).ready(function() {

    });

   //Check if select อื่นๆ.
   function getcheckbox(){
     $("input[name='chk_req_detail']:checked").each(function(){
          var n=$(this).val();
          if(n==12){
            $("#detail_remark_textbox").show();
          }
      });
    }//End.


			$(function($) {
				/* Get the checkboxes values based on the parent div id */
			$("#div_other").hide();
			$("#seladdress").change(function() {
			$("#div_other").hide();
				if($("#seladdress").val() ==3){
					$("#div_other").show();
				}
			});

      // $("input[name='chk_req_detail']:checked").each(function(){
      //     alert("this.checked");
      //     //$("#detail_remark").show();
      // });


				$("#btnsave").click(function() {
					var cus_id=<?=$_GET['cus_id'] ?>;
					var insure_req_deler=$("#insure_req_deler").val();
          var receipt_date=$("#receipt_date").val();
					var insure_req_code=$("#insure_req_code").val();
          var insure_req_emp_id=1111;


          var insure_req_detail=$("#chk_req_detail").val();
          var insure_req_detail = [];
          $("input[name='chk_req_detail']:checked").each(function(){
               insure_req_detail.push($(this).val());
           });
          var edit_detail_remark=$("#edit_detail_remark").val();

          var insure_req_detail_org=$("#insure_req_detail_org").val();
          var insure_req_detail_new=$("#insure_req_detail_new").val();
					var insure_req_exchange_rate_type=$("#insure_req_exchange_rate_type").val();
					var insure_req_exchange_rate=$("#insure_req_exchange_rate").val();
          var insure_req_doc_retrun=$("#insure_req_doc_retrun").val();
          var insure_req_doc_retrun_other=$("#insure_req_doc_retrun_other").val();
					var insure_req_remark =$("#insure_req_remark").val();
					var insure_req_status=0
          var action=1;

					if($('#chk2').is(':checked')){
						delivery_type=2;
				    }

						$.ajax({
							url: "",
							type: "post",
							data: {
                receipt_date:receipt_date,
                insure_req_deler:insure_req_deler,
                insure_req_code:insure_req_code,
                cus_id:cus_id,
                insure_req_emp_id:insure_req_emp_id,
                insure_req_detail:insure_req_detail,
                edit_detail_remark:edit_detail_remark,
                insure_req_detail_org:insure_req_detail_org,
                insure_req_detail_new:insure_req_detail_new,
                insure_req_exchange_rate_type:insure_req_exchange_rate_type,
                insure_req_exchange_rate:insure_req_exchange_rate,
                insure_req_doc_retrun:insure_req_doc_retrun,
                insure_req_doc_retrun_other:insure_req_doc_retrun_other,
                insure_req_remark:insure_req_remark,
                insure_req_status:insure_req_status,
                delivery_close:0,
                action:1} ,
							success: function (response) {

														   bootbox.dialog({
																		message: "ระบบบันทึกข้อมูลเรียบร้อย! " + response  ,
																		buttons: {
																			"success" : {
																				"label" : "OK",
																				"className" : "btn-sm btn-primary",
																				"callback": function() {
																		//window.location.assign("listwaitdelivery_insure.php");
																}
														}
												}
										});

							},
							error: function(jqXHR, textStatus, errorThrown) {
							   console.log(textStatus, errorThrown);
							}


						});/**/

				});

				// $("#save_delivery").click(function() {
				// 	var cus_id=<?//=$_GET['cus_id'] ?>;
				// 	var ve_id=<?//y=$_GET['vehicle_id'] ?>;
				// 	var insure_num=$("#txtnumber").val();
				// 	var receipt_date=$("#receipt_date").val();
				// 	var delivery_date=$("#delivery_date").val();
				// 	var address=$("#address").val();
				// 	var receipt_by=$("#txtreceiptby").val();
				// 	var remark =$("#remark").val();
				// 	var insure_act=$("#txtact").val();
				// 	var delivery_type=1;
				// 	if($('#chk2').is(':checked')){
				// 		delivery_type=2;
				//     }
        //
        //
				// 				$.ajax({
				// 			url: "savedelivery.php",
				// 			type: "post",
				// 			data: {cus_id:cus_id,ve_id:ve_id,receipt_date:receipt_date,delivery_date:delivery_date,insure_num:insure_num,address:address,receipt_by:receipt_by,remark:remark,insure_act:insure_act,delivery_type:delivery_type,delivery_close:1,action:2} ,
				// 			success: function (response) {
        //
				// 										   bootbox.dialog({
				// 														message: "ระบบบันทึกข้อมูลเรียบร้อย!",
				// 														buttons: {
				// 															"success" : {
				// 																"label" : "OK",
				// 																"className" : "btn-sm btn-primary",
				// 																"callback": function() {
        //
				// 														window.location.assign("listwaitdelivery_insure.php");
				// 												}
				// 										}
				// 								}
				// 						});
        //
				// 			},
				// 			error: function(jqXHR, textStatus, errorThrown) {
				// 			   console.log(textStatus, errorThrown);
				// 			}
        //
        //
				// 		});/**/
        //
				// });

				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});


				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true});
					//resize the chosen on window resize

					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});


					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}


				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});

				$('textarea[class*=autosize]').autosize({append: "\n"});
				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});

				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-number-bank').mask('999-9-99999-9');
				$('.input-mask-number-credit').mask('9999-99999-9999-9999');
				//$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});



				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).val('.'+sizing[val]);
					}
				});

				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});



				//"jQuery UI Slider"
				//range slider tooltip example
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1] + "";

						if( !ui.handle.firstChild ) {
							$("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
							.prependTo(ui.handle);
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('span.ui-slider-handle').on('blur', function(){
					$(this.firstChild).hide();
				});


				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});

				$( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true

					});
				});

				$("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item


				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])


				$('#id-input-file-3').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}

				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});


				//$('#id-input-file-3')
				//.ace_file_input('show_file_list', [
					//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
					//{type: 'file', name: 'hello.txt'}
				//]);




				//dynamically change allowed formats by changing allowExt && allowMime function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var whitelist_ext, whitelist_mime;
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "ace-icon fa fa-picture-o";

						whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
						whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "ace-icon fa fa-cloud-upload";

						whitelist_ext = null;//all extensions are acceptable
						whitelist_mime = null;//all mimes are acceptable
					}
					var file_input = $('#id-input-file-3');
					file_input
					.ace_file_input('update_settings',
					{
						'btn_choose': btn_choose,
						'no_icon': no_icon,
						'allowExt': whitelist_ext,
						'allowMime': whitelist_mime
					})
					file_input.ace_file_input('reset_input');

					file_input
					.off('file.error.ace')
					.on('file.error.ace', function(e, info) {
						//console.log(info.file_count);//number of selected files
						//console.log(info.invalid_count);//number of invalid files
						//console.log(info.error_list);//a list of errors in the following format

						//info.error_count['ext']
						//info.error_count['mime']
						//info.error_count['size']

						//info.error_list['ext']  = [list of file names with invalid extension]
						//info.error_list['mime'] = [list of file names with invalid mimetype]
						//info.error_list['size'] = [list of file names with invalid size]


						/**
						if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
						*/


						//if files have been selected (not dropped), you can choose to reset input
						//because browser keeps all selected files anyway and this cannot be changed
						//we can only reset file field to become empty again
						//on any case you still should check files with your server side script
						//because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
					});

				});

				$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.closest('.ace-spinner')
				.on('changed.fu.spinbox', function(){
					//alert($('#spinner1').val())
				});
				$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
				$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
				$('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});

				//$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
				//or
				//$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
				//$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0


				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});

				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});


				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});


				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});

				$('#date-timepicker1').datetimepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});


				$('#colorpicker1').colorpicker();

				$('#simple-colorpicker-1').ace_colorpicker();
				//$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
				//$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
				//var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
				//picker.pick('red', true);//insert the color if it doesn't exist


				$(".knob").knob();


				var tag_input = $('#form-field-tags');
				try{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
						/**
						//or fetch data from database, fetch those that match "query"
						source: function(query, process) {
						  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
						  .done(function(result_items){
							process(result_items);
						  });
						}
						*/
					  }
					)

					//programmatically add a new
					var $tag_obj = $('#form-field-tags').data('tag');
					$tag_obj.add('Programmatically Added');
				}
				catch(e) {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//$('#form-field-tags').autosize({append: "\n"});
				}

				/////////
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})

				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					if(!ace.vars['touch']) {
						$(this).find('.chosen-container').each(function(){
							$(this).find('a:first-child').css('width' , '210px');
							$(this).find('.chosen-drop').css('width' , '210px');
							$(this).find('.chosen-search input').css('width' , '200px');
						});
					}
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/



				$(document).one('ajaxloadstart.page', function(e) {
					$('textarea[class*=autosize]').trigger('autosize.destroy');
					$('.limiterBox,.autosizejs').remove();
					$('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
				});

			});

///
 // Specify a function to execute when the DOM is fully loaded.
		</script>



	</body>
    		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="assets/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="docs/assets/js/themes/sunburst.css" />


		<script src="assets/js/ace/elements.onpage-help.js"></script>
		<script src="assets/js/ace/ace.onpage-help.js"></script>
		<script src="docs/assets/js/rainbow.js"></script>
		<script src="docs/assets/js/language/generic.js"></script>
		<script src="docs/assets/js/language/html.js"></script>
		<script src="docs/assets/js/language/css.js"></script>
		<script src="docs/assets/js/language/javascript.js"></script>
</html>
