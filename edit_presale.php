<?php
require_once 'init_inc.php';
$jqLib = 'https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js';
$db=new DB;
include_once "connDB.php";
  $cus_id=$_GET['cus_id'];
 $ve_id =$_GET['vehicle_id'];
 $id=$_GET['id'];
 $sql="SELECT
insurance_presale.cus_id,
insurance_presale.vehicle_id,
insurance_presale.sale_status,
insurance_presale.net_price,
insurance_presale.service_charge,
insurance_presale.net_premium,
insurance_presale.net_fund,
insurance_presale.attend_net_act,
insurance_presale.discount_insure,
insurance_presale.discount_act,
insurance_presale.service_charge,
insurance_presale.discount_tax,
insurance_campaign_detail.campaign_description,
insurance_campaign_detail.insurance_endfund,
insurance_type.insurance_type,
insurance_presale.vehicle_code_id,
insurance_presale.vehicle_model_id
FROM
insurance_presale
INNER JOIN insurance_campaign_detail ON insurance_presale.attend_campaign = insurance_campaign_detail.campaign_id
INNER JOIN insurance_type ON insurance_type.id = insurance_presale.attend_insurance_type WHERE insurance_presale.cus_id=$cus_id  and insurance_presale.vehicle_id=$ve_id";
 
						$rs_pay=mysql_query($sql);
						$rw=mysql_fetch_array($rs_pay);
						
						$price_total=($rw['net_price']+$rw['attend_net_act']);
						$discount= ($rw['service_charge']+$rw['discount_tax']+$rw['discount_act']+$rw['discount_insure']);
					$net_total= $price_total-$discount;
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
							<li class="active">Close sale</li>
						</ul><!-- /.breadcrumb -->

					 

						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
					 
						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Close sale
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									ปิดการขาย 						</h1>
						</div><!-- /.page-header -->

							 <div class="row">
							                               

											<div class="col-xs-12">
											 	 <?php  include('customer_notrack_info.php'); ?>
												<div class="widget-box1">
													<div class="widget-header widget-header-flat">
														<h4 class="smaller">
															<i class="ace-icon fa fa-code"></i>
															สรุปรายการขายประกัน														</h4>
													</div>

													<div class="widget-body">
													
														<div class="widget-main">
															 <div class="modal-body" style="overflow-y: auto; overflow-x: hidden; max-height: 650px;"><div class="onpage-help-content">
														

															 <div class="col-sm-12" >
															 
<div class="profile-user-info profile-user-info-striped col-sm-12">

												<div class="profile-info-row">
													<div class="profile-info-name">ประเภทประกัน</div>

													<div class="profile-info-value">
													 <div >
													  <?=$rw['insurance_type']; ?>
														 
													</div>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> แคมเปญ <span id="waitcampaign"></span></div>

													<div class="profile-info-value">
														<div>
													<?=$rw['campaign_description']; ?>
													</div>
													</div>
												</div>

												 
												<div class="profile-info-row">
													<div class="profile-info-name"> ทุนประกัน <span id="waitcompany"></span></div>

													<div class="profile-info-value" id="selfund1" ><?= number_format($rw['insurance_endfund'],2); ?> บาท
														 
													</div>
												</div>
										 
												<div class="profile-info-row" >
													<div class="profile-info-name"> เบี้ยรวมภาษี </div>

													<div class="profile-info-value" id="selinsurance_price_total"><?=number_format($rw['net_price'],2); ?> บาท
														 
													</div>
												</div>
											 
											<div class="profile-info-row">
													<div class="profile-info-name"> เบี้ย พรบ</div>

													<div class="profile-info-value" >
											          <?=number_format($rw['attend_net_act'],2).' บาท'; ?>
													</div>
												</div>
											 
								        	<div class="profile-info-row">
													<div class="profile-info-name">หมายเลข พรบ.</div>

													<div class="profile-info-value" >
											            <input id="form-field-icon-1"  type="text" value="">
													</div>
												</div>
										 <div class="profile-info-row" >
										 		 
													<div class="profile-info-name"> รวมเบี้ย พรบ</div>

													<div class="profile-info-value" id="net_price">
														 <?php
														        echo number_format($rw['net_price']+$rw['attend_net_act'],2).' บาท';
														  ?>
													</div>
 												</div>
									<div class="profile-info-row">
													<div class="profile-info-name"> ส่วนลดเบี้ยประกัน</div>



													<div class="profile-info-value col-sm-6" >
														 <input  id="seldiscount" name="seldiscount" type="text" value="<?=$rw['discount_insure'] ?>" class="input-medium" onChange="CalPayment()" >
													</div>
													 
											 </div>
							 <div class="profile-info-row">
													<div class="profile-info-name"> ส่วนลดเบี้ย พรบ</div>



													<div class="profile-info-value col-sm-6" >
														 <input  id="seldiscount_act" name="seldiscount_act" type="text" value="<?=$rw['discount_act'] ?>" class="input-medium" onChange="CalPayment()">
													</div>
													 
											 </div>
											  <div class="profile-info-row">
													<div class="profile-info-name"> ส่วนลดเบี้ย ภาษี</div>



													<div class="profile-info-value col-sm-6" >
														 <input  id="seldiscount_tax" name="seldiscount_tax" type="text" value="<?=$rw['discount_tax'] ?>" class="input-medium" onChange="CalPayment()">
													</div>
													 
											 </div>
											<div class="profile-info-row">
													<div class="profile-info-name"> ค่าบริการ</div>

													<div class="profile-info-value col-sm-6">
											          <input  id="selservice" name="selservice" type="text" value="<?=$rw['service_charge'] ?>" class="input-medium" onChange="CalPayment()" >  <input  id="selact" name="sumtotal" type="text" value="<?=$net_total?>" class="input-medium" style="display:none">
													</div>
														 
											 </div>
		
							</div>
							 
							<div class="profile-user-info profile-user-info-striped col-sm-12">
										   	<div class="profile-info-row">
													 
												</div>
												 <div class="profile-info-row">
												  <div class="profile-info-name">รูปแบบการชำระ</div>

													<div class="profile-info-value col-sm-12">
													  
												    
										<div class="col-sm-12">
										
										<form class="form-horizontal">
                                        
												<div class="tabbable">
													<ul class="nav nav-tabs padding-16" id="navpays">
														<li class="active">
															<a data-toggle="tab" href="#edit-cash">
													 
																เงินสด															</a>														</li>

														<li>
															<a data-toggle="tab" href="#edit-trans">
														     
																เงินโอน															</a>														</li>

														<li>
															<a data-toggle="tab" href="#edit-cheque">
														 
																เช็ค															</a>														</li>
														<li>
															<a data-toggle="tab" href="#edit-credit">
															 
																บัตรเครดิต															</a>														</li>
														<li>
															<a data-toggle="tab" href="#edit-pay">
													 
																ผ่อนชำระ															</a>														</li>
													</ul>

													<div class="tab-content profile-edit-tab-content">
														<div id="edit-cash" class="tab-pane in active">
															 	<div class="space-10"></div>
												<div class="form-group">
														<label class="col-sm-3 control-label no-padding-right">ยอดเงิน</label>
																<div class="col-sm-9">
															 
																		<input value="<?=$net_total?>" id="txt_cash" type="text"> บาท
																</div>
															</div>
												</div>

														<div id="edit-trans" class="tab-pane">
															<div class="space-10"></div>
 	                                                         <div class="form-group">
															        <label class="col-sm-3 control-label no-padding-right">ยอดเงินโอน</label>
																	<div class="col-sm-9">
																 
																			<input value="<?=$net_total?>" id="txtamount_trans" type="text"> บาท
																	</div>
															</div>
															<div class="form-group">
															        <label class="col-sm-3 control-label no-padding-right">วันที่โอน</label>
																	<div class="col-sm-4">
																 
																			<input value="" id="txt_date_trans" class="form-control date-picker"  data-date-format="dd-mm-yyyy" type="text"  > 
																	</div>
															</div>
															<div class="form-group">
															        <label class="col-sm-3 control-label no-padding-right">ชื่อผู้โอน</label>
																	<div class="col-sm-9">
																 
																			<input value="" id="txt_name_trans" type="text"> 
																	</div>
																</div>
															<div class="form-group">
															        <label class="col-sm-3 control-label no-padding-right">เลขที่ บช</label>
																	<div class="col-sm-9">
																 
																			<input value="" id="txt_no_trans" type="text"  class="input-medium input-mask-number-bank" > 
																	</div>
															</div>
															<div class="form-group">
															        <label class="col-sm-3 control-label no-padding-right">ธนาคาร</label>
																	<div class="col-sm-9">
																  <select id="sel_bank_trans"  data-placeholder="Choose a State..." >
																<option value=""> ------- เลือก ------ </option>
																<?php
																	$sql_tyle = "
																		SELECT
																			financial_id,
																			financial_name
																		FROM 
																			financial	 
																	";
																	$rs_type1=mysql_query($sql_tyle);
																	while($row_type=mysql_fetch_array($rs_type1)){
																		echo '<option value="', $row_type['financial_id'], '">', $row_type['financial_name'],'</option>';
																	}
																?>
															</select>
																	</div>
																</div>
																<div class="form-group">
															        <label class="col-sm-3 control-label no-padding-right">สาขา</label>
																	<div class="col-sm-9">
																 
																			<input value="" id="txt_branch_trans" type="text"> 
																	</div>
																</div>
														</div>
														

														<div id="edit-cheque" class="tab-pane">
															<div class="space-10"></div>
												  <div class="form-group">
															        <label class="col-sm-3 control-label no-padding-right">ยอดเช็ค</label>
																	<div class="col-sm-9">
																 
																			<input value="<?=$net_total?>" id="txtamount_che" type="text"> บาท
																	</div>
															</div>
															<div class="form-group">
															        <label class="col-sm-3 control-label no-padding-right">สั่งจ่าย</label>
																	<div class="col-sm-9">
																 
																			<input value="" id="txt_name_che" type="text"> 
																	</div>
																</div>
																<div class="form-group">
															        <label class="col-sm-3 control-label no-padding-right">ลงวันที่</label>
																	<div class="col-sm-4">
																 
																			<input value="" id="txt_date_che" class="form-control date-picker"  data-date-format="dd-mm-yyyy" type="text"  > 
																	</div>
															</div>
															<div class="form-group">
															        <label class="col-sm-3 control-label no-padding-right">เลขที่ เช็ค</label>
																	<div class="col-sm-9">
																 
																			<input value="" id="txt_no_che" type="text" maxlength="7"> 
																	</div>
															</div>
															<div class="form-group">
															        <label class="col-sm-3 control-label no-padding-right">ธนาคาร</label>
																	<div class="col-sm-9">
																  <select id="sel_bank_che"  data-placeholder="Choose a State..." >
																<option value=""> ------- เลือก ------ </option>
																<?php
																	$sql_tyle = "
																		SELECT
																			financial_id,
																			financial_name
																		FROM 
																			financial	 
																	";
																	$rs_type1=mysql_query($sql_tyle);
																	while($row_type=mysql_fetch_array($rs_type1)){
																		echo '<option value="', $row_type['financial_id'], '">', $row_type['financial_name'],'</option>';
																	}
																?>
															</select>
																	</div>
																</div>
																<div class="form-group">
															        <label class="col-sm-3 control-label no-padding-right">สาขา</label>
																	<div class="col-sm-9">
																 
																			<input value="" id="txt_branch_che" type="text"> 
																	</div>
																</div>
												
														</div>
														
														<div id="edit-credit" class="tab-pane">
															<div class="space-10"></div>
<div class="form-group">
															        <label class="col-sm-3 control-label no-padding-right">ยอดเงิน</label>
																	<div class="col-sm-9">
																 
																			<input value="<?=$net_total?>" id="txtamount_credit" type="text"> บาท
																	</div>
															</div>
															<div class="form-group">
															        <label class="col-sm-3 control-label no-padding-right">ชื่อผู้ถือบัตร</label>
																	<div class="col-sm-9">
																 
																			<input value="" id="txt_name_credit" type="text"> 
																	</div>
																</div>
															<div class="form-group">
															        <label class="col-sm-3 control-label no-padding-right">เลขที่บัตร</label>
																	<div class="col-sm-9">
																 
																			<input value="" id="txt_no_credit" type="text" class="input-medium input-mask-number-credit" > 
																	</div>
															</div>
															<div class="form-group">
															        <label class="col-sm-3 control-label no-padding-right">ธนาคาร</label>
																	<div class="col-sm-9">
																  <select id="sel_bank_credit"  data-placeholder="Choose a State..." >
																<option value=""> ------- เลือก ------ </option>
																<?php
																	$sql_tyle = "
																		SELECT
																			financial_id,
																			financial_name
																		FROM 
																			financial	 
																	";
																	$rs_type1=mysql_query($sql_tyle);
																	while($row_type=mysql_fetch_array($rs_type1)){
																		echo '<option value="', $row_type['financial_id'], '">', $row_type['financial_name'],'</option>';
																	}
																?>
															</select>
																	</div>
																</div>
																 
															 
														</div>
														
														<div id="edit-pay" class="tab-pane">
															<div class="space-10"></div>
																<div class="form-group">
															        <label class="col-sm-3 control-label no-padding-right">ชำระเงินงวดแรกวันที่</label>
																	<div class="col-sm-4">
																  <input  id="tabvalue" name="tabvalue" type="text"  class="input-medium" style="display:none" >
																			<input value="<?=date('d-m-Y') ?>" id="txt_date_pay" class="form-control date-picker"  data-date-format="dd-mm-yyyy" type="text"  > 
																	</div>
															</div>
																<div class="form-group">
															        <label class="col-sm-3 control-label no-padding-right">จำนวนงวดที่ต้องการผ่อน</label>
																	<div class="col-sm-4">
																 
																			<div class="my-form">
																 
																		<p class="text-box1">
																		 
																			<input type="text"  value="1" id="txtamount_pay" maxlength="2" class="input-mini" />
																			 <button class="btn btn-warning btn-xs" id="btn_add">
												<i class="ace-icon fa fa-plus  bigger-110 icon-only"></i>
											</button>  
																		</p>
																		<p class="text-box">
																		</p>
																		<p> </p>
																 
																</div>
																	</div>
															</div>
																
															 
														</div>
													</div>
												</div>

												 
											</form>
													 
                                            <div class="col-xm-8">
								 
											  </div>
										</div>	 
													</div>
											
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> </div>

													<div class="profile-info-value">
													 <div class="col-sm-9">
									  <button class="btn btn-success" type="button" id="save_payment">
												<i class="ace-icon fa fa-check bigger-110"></i>
												บันทึกการชำระเงิน											</button>

											     <button class="btn btn-primary" type="button" id="save_print">
												<i class="ace-icon fa fa-print bigger-110"></i>
												บันทึกและออกใบรับฝาก											</button>
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												ล้างค่า											</button>
														 
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
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>							</a>						</span>					</div>

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
		function CheckNumber(stext) {
    $(stext).keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
  	
	
	
};

			jQuery(function($) {
			      //CheckNumber('#txtper_month');
			      //CheckNumber('#txtbath_month');
				  CheckNumber('#txt_cash');
				  CheckNumber('#txtamount_trans');
				  CheckNumber('#txtamount_che');
				  CheckNumber('#txtamount_credit');
				  CheckNumber('#txt_no_credit');
				  CheckNumber('#txt_no_trans');
				  CheckNumber('#txt_no_che');
				  CheckNumber('#txtamount_pay');
				  //CheckNumber("boxes[]']");
				$('.modal.aside').ace_aside();
				
				$('#aside-inside-modal').addClass('aside').ace_aside({container: '#my-modal > .modal-dialog'});
				
				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove before leaving page
					$('.modal.aside').remove();
					$(window).off('.aside')
				});
			})
		</script>
<script type="text/javascript">
function findAndReplace(string, target, replacement) {
 
 var i = 0, length = string.length;
 
 for (i; i < length; i++) {
 
   string = string.replace(target, replacement);
 
 }
 
 return string;
 
}
$(document).ready(function(){
			

var cu_id=<?=$_GET['cus_id'] ?>;
var ve_id=<?= $_GET['vehicle_id'] ?>;
var id=<?=$_GET['id']?>;
var id=<?=$_GET['id']?>;
var vehicle_code_id =<?=$rw['vehicle_code_id']?>;
var vehicle_model_id=<?=$rw['vehicle_model_id']?>;
var url_link='save_presale.php';

$('#save_payment').click(function(){

var pay_type='';
var pay_amount=0;
var pay_baht=0;
var pay_date;
var pay_number='';
var pay_bank;
var pay_branch_name='';
//var pay_number_credit='';
//var pay_number_che='';
var pay_by='';
var ac_number =$('#form-field-icon-1').val();
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!

var yyyy = today.getFullYear();

pay_date=yyyy+'/'+mm+'/'+dd;
 
var tab_action =$('#tabvalue').val();

if(tab_action==0){
	pay_type="เงินสด";
	pay_baht=parseFloat($('#txt_cash').val());
	if(pay_baht<parseFloat($('#selact').val())){
		alert('กรุณาตรวจสอบยอดเงินในการชำระอีกครั้ง เนื่องจากยอดชำระ ต่ำกว่ายอดที่ต้องชำระทั้งหมด');
		return false;
	}
}else if(tab_action==1){
	pay_type="เงินโอน";
	pay_baht=parseFloat($('#txtamount_trans').val());
	if(pay_baht<parseFloat($('#selact').val())){
		alert('กรุณาตรวจสอบยอดเงินในการชำระอีกครั้ง เนื่องจากยอดชำระ ต่ำกว่ายอดที่ต้องชำระทั้งหมด');
		return false;
	}
	pay_date=$('#txt_date_trans').val().substr(6,4)+'/'+$('#txt_date_trans').val().substr(3,2)+'/'+$('#txt_date_trans').val().substr(0,2);
	pay_by=$('#txt_name_trans').val();
	pay_number=$('#txt_no_trans').val();
	pay_bank =$('#sel_bank_trans option:selected').val();
	pay_branch_name =$('#txt_branch_trans').val();

}else if(tab_action==2){
	pay_type="เช็ค";
	
	pay_baht=parseFloat($('#txtamount_che').val());
	if(pay_baht<parseFloat($('#selact').val())){
		alert('กรุณาตรวจสอบยอดเงินในการชำระอีกครั้ง เนื่องจากยอดชำระ ต่ำกว่ายอดที่ต้องชำระทั้งหมด');
		return false;
	}
	pay_date=$('#txt_date_che').val().substr(6,4)+'/'+$('#txt_date_che').val().substr(3,2)+'/'+$('#txt_date_che').val().substr(0,2) ;
	pay_by=$('#txt_name_che').val();
	pay_number=$('#txt_no_che').val();
	pay_bank =$('#sel_bank_che option:selected').val();
	pay_branch_name =$('#txt_branch_che').val();
}else if(tab_action==3){
	pay_type="บัตรเครติด";
	pay_baht=parseFloat($('#txtamount_credit').val());
	if(pay_baht<parseFloat($('#selact').val())){
		alert('กรุณาตรวจสอบยอดเงินในการชำระอีกครั้ง เนื่องจากยอดชำระ ต่ำกว่ายอดที่ต้องชำระทั้งหมด');
		return false;
	}
	//pay_date=$('#txt_date_credit').val().substr(6,4)+'/'+$('#txt_date_credit').val().substr(3,2)+'/'+$('#txt_date_credit').val().substr(0,2) ;
	pay_by=$('#txt_name_credit').val();
	pay_number=$('#txt_no_credit').val();
	pay_bank =$('#sel_bank_credit option:selected').val();
	//pay_branch_name =$('#txt_branch_trans').val();
}else{
	var arrNumber = new Array();
	var cal_price=0;
	var nettotal=0;
    $("input[name$='boxes[]']").each(function(){
		 cal_price =parseFloat($(this).val());
         //alert(cal_price);
		 nettotal=nettotal+cal_price;
		 //alert(nettotal);
	    arrNumber.push($(this).val());
    });
	
	if(cal_price<parseFloat($('#selact').val())){
		alert('กรุณาตรวจสอบยอดในการผ่อนชำระอีกครั้ง เนื่องจากยอดผ่อนชำระรวม ต่ำกว่ายอดที่ต้องชำระทั้งหมด');
		return false;
	}
	pay_type="ผ่อนชำระ";
	pay_date=$('#txt_date_pay').val().substr(6,4)+'/'+$('#txt_date_pay').val().substr(3,2)+'/'+$('#txt_date_pay').val().substr(0,2);
	pay_baht= parseFloat($('#box1').val());
	pay_amount=$('#txtamount_pay').val();
}
 

 $.ajax({
        url: url_link,
        type: "post",
        data: {cu_id:cu_id,ve_id:ve_id,pay_type:pay_type,pay_amount:pay_amount,pay_baht:pay_baht,ac_number:ac_number,id:id,vehicle_code_id:vehicle_code_id,vehicle_model_id:vehicle_model_id,pay_date:pay_date,pay_by:pay_by,pay_number:pay_number,pay_bank:pay_bank,pay_branch_name:pay_branch_name} ,
        success: function (response) {
		    
								       bootbox.dialog({
													message: "ระบบบันทึกข้อมูลเรียบร้อย!", 
													buttons: {
														"success" : {
															"label" : "OK",
															"className" : "btn-sm btn-primary",
															"callback": function() {
																
                                                    window.location.assign("list_customer_iner.php?activity_id=101");
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

});
</script>
				<!-- inline scripts related to this page -->
		<script type="text/javascript">
			$(function($) {
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
				$('.input-mask-number-credit').mask('9999-9999-9999-9999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
			
			
			
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
		

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../assets/js/html5shiv.js"></script>
		<script src="../assets/js/respond.js"></script>
		<![endif]-->
<script type="text/javascript" src="<?php echo $jqLib; ?>"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($){

$("#navpays").on("click", "li", function() {
    $("#tabvalue").val($(this).index());
});
	$('.my-form .btn.btn-warning.btn-xs').click(function(){
        $(this).removeClass( 'btn btn-warning btn-xs' );
		$(this).addClass( 'btn disabled  btn-xs' );
		var n = $('#txtamount_pay').val() ;
		var per_mont=0;
	 
		 	 per_month=($('#selact').val()/n).toFixed(2);
			 var i=1;
		 	 var box_html="";
			
			 for(i=1;i<=n;i++){
			  box_html = $('<p class="text-box"><label for="box' + i + '">งวดที่ <span class="box-number">' + i + '</span></label> <input type="text" name="boxes[]" value="'+per_month+'" id="box' + i + '" /> <a href="#" class="remove-box">ลบ</a></p>');
	
			box_html.hide();
			$('.my-form p.text-box:last').after(box_html);
			box_html.fadeIn('slow');
			 }
	  
		return false;
	});
	
	
 
	$('.my-form').on('click', '.remove-box', function(){
		$(this).parent().css( 'background-color', '#FF6C6C' );
		$(this).parent().fadeOut("slow", function() {
			$(this).remove();
			 var n = $('#txtamount_pay').val() ;
			if(n==1){
                $('#btn_add').removeClass('btn disabled btn-xs');
		      	$('#btn_add').addClass( 'btn btn-warning btn-xs' );
			     //$('.btn.btn-warning.btn-xs.disabled').addClass('btn btn-warning btn-xs');
				  
				}
			$('.box-number').each(function(index){
			    var n = $('.text-box').length-1 ;

			    var per_month=($('#selact').val()/n).toFixed(2);
			 
					$('#box1').val(per_month);
			 
				$(this).text(index + 1);
		         $('#txtamount_pay').val(n);
                 $("input[name$='boxes[]']").val(per_month)
			});
		});
		return false;
	});
	
 
			
});

</script>
<script type="text/javascript">

 function CalPayment()
{

var discount=0;
var total_price=0;
var price_net=0;
 
	   total_price =<?=$rw['net_price']+$rw['attend_net_act'] ?>;
       discount=parseFloat($('#seldiscount_tax').val())+parseFloat($('#seldiscount_act').val())+parseFloat($('#seldiscount').val())+parseFloat($('#selservice').val());
 
	   price_net=(total_price-discount).toFixed(2);
	   $('#selact').val(price_net);
	   $('#txt_cash').val(price_net);
	   $('#txt_no_trans').val(price_net);
	   $('#txt_no_che').val(price_net);
	   $('#txt_no_credit').val(price_net);
		 
    //  $("#net_price").append("<span class='bigger-175 blue' >"+ addCommas(total) +" บาท</span>");
  
};
		function addCommas(str) {
			var parts = (str + "").split("."),
				main = parts[0],
				len = main.length,
				output = "",
				first = main.charAt(0),
				i;
		
			if (first === '-') {
				main = main.slice(1);
				len = main.length;    
			} else {
				first = "";
			}
			i = len - 1;
			while(i >= 0) {
				output = main.charAt(i) + output;
				if ((len - i) % 3 === 0 && i > 0) {
					output = "," + output;
				}
				--i;
			}
			// put sign back
			output = first + output;
			// put decimal part back
			if (parts.length > 1) {
				output += "." + parts[1];
			}
			return output;
		}
</script>
	<!-- inline scripts related to this page -->
		<script type="text/javascript">
	
			jQuery(function($) {
			  		CheckNumber("#seldiscount");
		            CheckNumber("#selservice");
		            CheckNumber("#seldiscount_tax");
		            CheckNumber("#seldiscount_act");
					//CheckNumber(".boxes");
				/**
				$('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				  //console.log(e.target.getAttribute("href"));
				})
					
				$('#accordion').on('shown.bs.collapse', function (e) {
					//console.log($(e.target).is('#collapseTwo'))
				});
				*/
				
				$('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
					//if($(e.target).attr('href') == "#home") doSomethingNow();
				})
			
				
				/**
					//go to next tab, without user clicking
					$('#myTab > .active').next().find('> a').trigger('click');
				*/
			
			
				$('#accordion-style').on('click', function(ev){
					var target = $('input', ev.target);
					var which = parseInt(target.val());
					if(which == 2) $('#accordion').addClass('accordion-style2');
					 else $('#accordion').removeClass('accordion-style2');
				});
				
				//$('[href="#collapseTwo"]').trigger('click');
			
			
				var oldie = /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase());
				$('.easy-pie-chart.percentage').each(function(){
					$(this).easyPieChart({
						barColor: $(this).data('color'),
						trackColor: '#EEEEEE',
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: 8,
						animate: oldie ? false : 1000,
						size:75
					}).css('color', $(this).data('color'));
				});
			
				$('[data-rel=tooltip]').tooltip();
				$('[data-rel=popover]').popover({html:true});
			
			
				$('#gritter-regular').on(ace.click_event, function(){
					$.gritter.add({
						title: 'This is a regular notice!',
						text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" class="blue">magnis dis parturient</a> montes, nascetur ridiculus mus.',
						image: 'assets/avatars/avatar1.png', //in Ace demo assets will be replaced by correct assets path
						sticky: false,
						time: '',
						class_name: 'gritter-Dark' 
					});
			
					return false;
				});
			
			 
				$("#gritter-remove").on(ace.click_event, function(){
					$.gritter.removeAll();
					return false;
				});
			
				///////
			
				$("#bootbox-regular").on(ace.click_event, function() {
					bootbox.prompt("What is your name?", function(result) {
						if (result === null) {
							
						} else {
							
						}
					});
				});
					
				$("#bootbox-confirm").on(ace.click_event, function() {
					bootbox.confirm("Are you sure?", function(result) {
						if(result) {
							//
						}
					});
				});
				 $('#edit-modal').on('show.bs.modal', function(e) {
							   alert( e.relatedTarget.id);
										var $modal = $(this),
										   esseyId = e.relatedTarget.id;
										   $.ajax({
										   type: 'POST',
										   url: 'backend.php?'+esseyId,
										   data: {esseyId},
											success: function(data) 
											{
									 
												$modal.find('.edit-content').html(data);
											}
									   });
							
						});
			
			 
				$("#bootbox-options").on(ace.click_event, function() {
					bootbox.dialog({
						message: "<span class='bigger-110'>I am a custom dialog with smaller buttons</span>",
						buttons: 			
						{
							"success" :
							 {
								"label" : "<i class='ace-icon fa fa-check'></i> Success!",
								"className" : "btn-sm btn-success",
								"callback": function() {
									//Example.show("great success");
								}
							},
							"danger" :
							{
								"label" : "Danger!",
								"className" : "btn-sm btn-danger",
								"callback": function() {
									//Example.show("uh oh, look out!");
								}
							}, 
							"click" :
							{
								"label" : "Click ME!",
								"className" : "btn-sm btn-primary",
								"callback": function() {
									//Example.show("Primary button");
								}
							}, 
							"button" :
							{
								"label" : "Just a button...",
								"className" : "btn-sm"
							}
						}
					});
				});
			
			
			
				$('#spinner-opts small').css({display:'inline-block', width:'60px'})
			
				var slide_styles = ['', 'green','red','purple','orange', 'dark'];
				var ii = 0;
				$("#spinner-opts input[type=text]").each(function() {
					var $this = $(this);
					$this.hide().after('<span />');
					$this.next().addClass('ui-slider-small').
					addClass("inline ui-slider-"+slide_styles[ii++ % slide_styles.length]).
					css('width','125px').slider({
						value:parseInt($this.val()),
						range: "min",
						animate:true,
						min: parseInt($this.attr('data-min')),
						max: parseInt($this.attr('data-max')),
						step: parseFloat($this.attr('data-step')) || 1,
						slide: function( event, ui ) {
							$this.val(ui.value);
							spinner_update();
						}
					});
				});
			
			
			
				//CSS3 spinner
				$.fn.spin = function(opts) {
					this.each(function() {
					  var $this = $(this),
						  data = $this.data();
			
					  if (data.spinner) {
						data.spinner.stop();
						delete data.spinner;
					  }
					  if (opts !== false) {
						data.spinner = new Spinner($.extend({color: $this.css('color')}, opts)).spin(this);
					  }
					});
					return this;
				};
			
				function spinner_update() {
					var opts = {};
					$('#spinner-opts input[type=text]').each(function() {
						opts[this.name] = parseFloat(this.value);
					});
					opts['left'] = 'auto';
					$('#spinner-preview').spin(opts);
				}
			
			
			
				$('#id-pills-stacked').removeAttr('checked').on('click', function(){
					$('.nav-pills').toggleClass('nav-stacked');
				});

				///////////
				$(document).one('ajaxloadstart.page', function(e) {
				
				
					$.gritter.removeAll();
					$('.modal').modal('hide');
				});
			
			});
			
			var i = 1;   
			function myLoop(nextMsgOptions) {  
       
			   setTimeout(function () {
			 
				alertshow();  
				  i++;                     
				  if (i < endloop) {  
					 myLoop();             
				  }          
			   }, 3000)
			}
							
			function alertshow(){
 
				   	$.gritter.add({
						title: 'This is a regular notice!',
						text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" class="blue">magnis dis parturient</a> montes, nascetur ridiculus mus.',
						image: 'assets/avatars/avatar1.png',  
						sticky: false,
						time: '',
						class_name: 'gritter-Dark' 
					});
				}  
  
		</script>
			<div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title" id="myModalLabel">รายละเอียด</h4>
								</div>
								<div class="modal-body edit-content">
									 
								</div>
							 
							</div>
						</div>
	</div>
 		<link rel="stylesheet" href="assets/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="docs/assets/js/themes/sunburst.css" />
	</body>
</html>
