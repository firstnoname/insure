<?php
require_once 'init_inc.php';
$jqLib = 'https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js';
$db=new DB;

include_once "connDB.php";
$active='';
$active_save='-info';
$active_wait='-danger';
$approve_reject=' disabled';
if($_GET['last_status']=='ปิดการขาย'){
$active_save="-info disabled";
$active_wait='-danger disabled';
$active=' disabled';

}
if($_GET['last_status']=='รออนุมัติยุติการติดตาม'){
	$active_save=" disabled";
	$active_wait=' disabled';
	$active=' disabled';
	$approve_reject='-warning';
}
if($_GET['close']==1){
	$active_save=" disabled";
	$active_wait=' disabled';
	$active=' disabled';
	$approve_reject=' disabled';
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8">
		<title>CALL - Hornbill Insurance </title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

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
							<li class="active">Call</li>
						</ul><!-- /.breadcrumb -->

					 

						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
					 
						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								CALL
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									โทรติดตามลูกค้าล่วงหน้า <i class="ace-icon fa fa-angle-double-right"></i>1 เดือน								</small>							</h1>
						</div><!-- /.page-header -->


 <?php include("customer_info.php") ; ?>
										

							 <div class="row">
											<div class="col-xs-12">
												<div class="widget-box1">
													<div class="widget-header widget-header-flat">
														<h4 class="smaller">
															<i class="ace-icon fa fa-code"></i>
															แบบฟอร์มคำถาม														</h4>
													</div>

													<div class="widget-body">
														<div class="widget-main">
															 <div class="modal-body" style="overflow-y: auto; overflow-x: hidden; max-height: 650px;"><div class="onpage-help-content">
															 
		<div class="info-section">
		 <ul class="info-list list-unstyled">
			<li>
			<h4>	1. ติดต่อลูกค้าได้หรือไม่?</h4>
			</li>
			
			<li>
				 <label>
				<input name="form-field-radio" class="ace input-lg" id="ch_phone_con"  type="radio">
				<span class="lbl bigger-120"> ติดต่อได้</span></label>
				 <label>
<input name="form-field-radio" class="ace input-lg" id="ch_phone_dis" type="radio" value="red">
				<span class="lbl bigger-120"> ติดต่อไม่ได้</span></label>
  				<div class="red box" id="ans_box_o">
						 
														
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td>
																<label  >ระบุเหตุผล</label><br />
<select name="select"  id="ans_pb_re" data-placeholder="Choose a State...">
                                                              <option value=""> </option>

															<?php
															$insur_remarks=$db->select('insurance_remark');
															foreach($insur_remarks as $insur_remark):
															?>
																<option value="<?=$insur_remark['remark_name']?>"><?=$insur_remark['remark_name']?></option>
															<?php
															endforeach;
															?> 

                                                            </select></td>
                                                                <td width="50%">  ให้โทรซ้ำ <br/><label class="block">
														<input name="form-field-checkbox" class="ace input-lg" type="checkbox">
														<span class="lbl bigger-120"> </span>
													</label></td>
                                                              </tr>
                                                            </table>
							</div>
			</li>
			<style type="text/css">
				.box{
						padding: 10px;
						display: none;
						margin-top: 10px;
						border: 1px solid #9b9ba5;
					}
					.red{ background: #ffffff; }
					.red1{ background: #ffffff; }
					.red2{ background: #ffffff; }
					.red3{ background: #ffffff; }
					.red4{ background: #ffffff; }
					.box1{
						 
						display: none;
						 
						 
					}
				 
					.red3{   }
					.red4{   }
					 
				</style>
 		  </ul>
		   <ul class="info-list list-unstyled">
			<li>
			<h4>	2. ลูกค้าสะดวกคุยหรือไม่?</h4>
			</li>
			
			<li>
				 <label>
				<input name="form-field-radio1" class="ace input-lg" type="radio" id="ch_phone_21">
				<span class="lbl bigger-120"> สะดวกคุย </span></label>
				 <label>
				<input name="form-field-radio1" class="ace input-lg" type="radio" value="red1"  id="ch_phone_22">
				<span class="lbl bigger-120"> ไม่สะดวกคุย</span></label>
  							 
						<div class="red1 box" id="ans_box_2"> 
														
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td>
																 <label class="block">
														<input name="form-field-checkbox" class="ace input-lg" type="checkbox">
														<span class="lbl bigger-120"> ให้โทรซ้ำ </span>													</label></td>
																	<td> <label for="id-date-picker-1">วันที่</label>

														<div class="row">
															<div class="col-xs-8 col-sm-10">
																<!-- #section:plugins/date-time.datepicker -->
<div class="input-group">
<input class="form-control date-picker" id="id-date-picker-1" type="text"  value="<?php echo date("d-m-Y"); ?>" data-date-format="dd-mm-yyyy" />
<span class="input-group-addon">
<i class="fa fa-calendar bigger-110"></i>																	</span>																 
															</div>
														</div>															</td>    
														 <td>
	<label for="timepicker1">เวลา</label>

														<!-- #section:plugins/date-time.timepicker -->
	<div class="input-group bootstrap-timepicker">
	<input id="timepicker1" type="text" class="form-control" />
	<span class="input-group-addon">
	<i class="fa fa-clock-o bigger-110"></i>															</span>	</div></td>                              
                                                              </tr>
                                      </table>
							</div>
			</li>
 		  </ul>
		    <ul class="info-list list-unstyled">
			<li>
			<h4>	3. ลูกค้าทำประกันภัยไปหรือยัง?</h4>
			</li>
			
			<li>
				 <label>
		<input name="form-field-radio2" class="ace input-lg" type="radio" value="red20" id="ch_phone_31">
		<span class="lbl bigger-120"> ต่อแล้ว </span></label>
				 <label>
<input name="form-field-radio2" class="ace input-lg" type="radio" value="red21"  id="ch_phone_32">
<span class="lbl bigger-120"> ยังไม่ได้ต่อ</span></label>
				<div class="red2 box" id="ans_box_3">											
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                   <tr>
                     <td width="29%">ประกันที่ทำกับที่อื่น </td>
                     <td width="71%">
                     <select name="select2"   id="ans_pb_insur" data-placeholder="Choose a State...">
                       <option value=""> </option>

  <?php
$insur_companys=$db->select('insurance_company');
foreach($insur_companys as $insur_company):
?>                 		
		<option value="<?=$insur_company['company_name']?>"><?=$insur_company['company_name']?></option>
<?php
endforeach;
?> 

                     </select></td>
                   </tr>
                   <tr>
                     <td>ราคาประกันที่ทำกับที่อื่น </td>
                     <td>
	<input id="form-field-mask-4" type="text">								  </td>
                   </tr>
                   <tr>
                     <td>เงื่อนไขที่ทำกับที่อื่น </td>
                     <td><label>
<input name="form-field-radio4" class="ace" type="radio" id="pay_st_1"  value="เงินสด">
<span class="lbl"> เงินสด</span>
</label><label>
<input name="form-field-radio4" class="ace" type="radio" id="pay_st_2" value="เงินผ่อน">
<span class="lbl">เงินผ่อน</span>
			</label></td>
                   </tr>
                 </table>
		</div>
			</li>
		    </ul>
<div class="red3 box1">		
	<ul class="info-list list-unstyled">
			<li>
			<h4>	3.1. บริษัทประกันอื่นๆ ติดต่อมา หรือไม่?</h4>
			</li>
			<li>
				 <label>
				<input name="form-field-radio7" id="ch_phone_in_31" class="ace input-lg" type="radio" value="red30">
				<span class="lbl bigger-120"> มี </span></label>
				 <label>
				<input name="form-field-radio7" id="ch_phone_in_32" class="ace input-lg" type="radio" value="red31">
				<span class="lbl bigger-120"> ไม่มี</span></label>
        
			<div class="red4 box">											
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                   <tr>
                     <td >ประกันที่เสนอจากบริษัทอื่น </td>
                     <td >
 <select name="select"  id="ans_pb_insur_2"   data-placeholder="Choose a State...">
 <option value=""> </option>
  <?php
$insur_companys=$db->select('insurance_company');
foreach($insur_companys as $insur_company):
?>                 		
		<option value="<?=$insur_company['company_name']?>"><?=$insur_company['company_name']?></option>
<?php
endforeach;
?> 
					</select>
					</td>
                   </tr>
                   <tr>
                     <td>ประเภทของประกันที่เสนอจากบริษัทอื่น</td>
                     <td>
          <select name="select"   id="ans_pb_insur_3"  class="chosen-single chosen-default" data-placeholder="Choose a State...">
                           <option value=""> </option>
<?php
$type_insurs=$db->select('insurance_type');
foreach($type_insurs as $type_insur):
?>
	<option value="<?=$type_insur['insurance_type']?>"><?=$type_insur['insurance_type']?></option>
<?php
endforeach;
?>                           

                           </select></td>
                   </tr>
                   <tr>
                     <td>เบี้ยประกันที่เสนอจากบริษัทอื่น </td>
                     <td><input  id="form-field-mask-49" type="text"></td>
                   </tr>
                   <tr>
                     <td>เงื่อนไขที่เสนอจากบริษัทอื่น</td>
                     <td><label>
					<input name="form-field-radio4" class="ace" id="pay_stb_1" type="radio"   value="เงินสด">
					<span class="lbl"> เงินสด</span>
					</label><label>
					<input name="form-field-radio4" class="ace" id="pay_stb_2" type="radio"  value="เงินผ่อน">
					<span class="lbl">เงินผ่อน</span>
									</label></td>
                   </tr>
                 </table>
                  
		</div>
		 </li>
	</ul>
	</div>	  
 <div class="red5 box1">		
	<ul class="info-list list-unstyled">
			<li>
			<h4>	4. นำเสนอประกันให้ลูกค้า</h4>
			</li>
			<li>
	 
			 	<!--  Select_Campaing_call.php+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   -->	
										 
<?php
 require_once 'Select_Campaing_u.php'; //ไม่สนใจ รับทราบ
?>

	<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
	<br>
	<center>
														 <label>
	<input name="form-field-radio9" class="ace input-lg" type="radio" value="red130" id="ch_love_1" checked="checked">
	<span class="lbl bigger-120"> สนใจ </span>							</label>
														 <label>
	<input name="form-field-radio9" class="ace input-lg" type="radio" value="red130" id="ch_love_2">
	<span class="lbl bigger-120"> ไม่สนใจ </span>							</label>
														 <label>
	<input name="form-field-radio9" class="ace input-lg" type="radio" value="red130" id="ch_love_3">
	<span class="lbl bigger-120"> รับทราบ </span>							</label>
</center>
</li>	
													 
										</div>
                                        
														<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
	                                  <button class="btn btn<?=$active_save?>" type="button" id="save_track">
												<i class="ace-icon fa fa-check bigger-110"></i>
												บันทึกกิจกรรม											</button>

											     
											<button class="btn <?=$active?>" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												ล้างค่า											</button>
												
												 <button class="btn btn<?=$active_wait?>" type="button" id="cancel_track">
												<i class="ace-icon fa fa-bolt  bigger-110"></i>
												ยุติการติดตาม											</button>
                                                <button class="btn btn<?=$approve_reject?>" type="button" id="save_approve">
												<i class="ace-icon fa fa-flag bigger-110"></i>
												อนุมัติยุติการติดตาม											</button>
										</div>
										     
										  
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
			
					<div id="top-menu" class="modal aside" data-fixed="true" data-placement="top" data-background="true" data-backdrop="invisible" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-body container">
												<div class="row">
													<div class="col-sm-5-1 col-sm-offset-1 white">
														<h3 class="lighter">สวัสดีครับ/คะ ผม/ดิฉันชื่อ...(ผู้โทร).......โทรมาจากบริษัทอีซูซุเชียงราย แยกศรีทรายมูล </h3>
														 ขอรบกวนเวลาประมาณ 5 นาที
ไม่ทราบว่าคุณ...(ชื่อลูกค้า).....สะดวกคุยหรือไม่ คะ/ครับ""
สวัสดีครับ/คะ ขออนุญาตเรียนสายคุณ...(ชื่อลูกค้า).... ผม/ดิฉันชื่อ...(ผู้โทร).......โทรมาจากบริษัทอีซูซุเชียงราย แยกศรีทรายมูล ขอรบกวนเวลาประมาณ 5 นาที เพื่อโทรแจ้งรายละเอียดประภัยของรถลูกค้า ไม่ทราบว่าคุณ คุณ...(ชื่อลูกค้า).... สะดวก (ไปข้อ 2 ) ไม่สะดวก (ไปข้อ 1.2 )"													</div>
												</div>
											</div>
										</div><!-- /.modal-content -->

										<button class="btn btn-inverse btn-app btn-xs ace-settings-btn aside-trigger" data-target="#top-menu" data-toggle="modal" type="button">ใช้สคริป
											<i data-icon1="fa-chevron-down" data-icon2="fa-chevron-up" class="ace-icon fa fa-chevron-down bigger-110 icon-only"></i>										</button>
									</div><!-- /.modal-dialog -->
								</div>

								<div id="bottom-menu" class="modal aside" data-fixed="true" data-placement="bottom" data-background="true" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-body container">
												<div class="row">
													<div class="col-sm-5 col-sm-offset-1 white">
														<h3 class="lighter">Bootstrap Grid &amp; Elements</h3>
														With dark modal backdrop													</div>
												</div>
											</div>
										</div><!-- /.modal-content -->
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
			jQuery(function($) {
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
	    CheckNumber("selact_price");
		CheckNumber("seldiscount");
		CheckNumber("selservice");
		CheckNumber("seldiscount_tax");
		CheckNumber("seldiscount_act");
		CheckNumber("net_price");
	   CheckNumber("seltax");

var ac_id=<?=$activity_id?>;
var cu_id=<?=$cus_id?>;
var ve_id=<?=$vehicle_id?>;

var url_link='save_track.php';





   $('#ch_phone_con').change(function() {
       //alert('ole');
       //$('#tb_phone').hide();red box vehicle_id
       $('#ans_box_o').hide();
    });

      $('#ch_phone_21').change(function() {
       //alert('ole');
       //$('#tb_phone').hide();red box vehicle_id
       $('#ans_box_2').hide();
    });
	
$('#cancel_track').click(function(){

	bootbox.confirm("คุณต้องการยุติการติดตามลูกค้ารายนี้ ?", function(result) {
						 
		 if(result) {
 
			$.ajax({
				url: url_link,
				type: "post",
				data: {data_save:'รออนุมัติยุติการติดตาม',ac_tion:'99',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id,status:'ยุติการติดตาม'} ,
				success: function (response) {
						window.location.assign("list_customer_activity.php?activity_id="+ ac_id +"&cus_id="+ cu_id +"&vehicle_id="+ ve_id +"");

				},
				error: function(jqXHR, textStatus, errorThrown) {
				   console.log(textStatus, errorThrown);
				}
		
		
			});/**/
		  }
		
	  });/**/ 
});/**/
	
$('#cancel_track').click(function(){

	bootbox.confirm("คุณต้องการยุติการติดตามลูกค้ารายนี้ ?", function(result) {
						 
		 if(result) {
 
			$.ajax({
				url: url_link,
				type: "post",
				data: {data_save:'ยุติการติดตาม',ac_tion:'100',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id,status:'ยุติการติดตาม'} ,
				success: function (response) {
						window.location.assign("list_customer_activity.php?activity_id="+ ac_id +"&cus_id="+ cu_id +"&vehicle_id="+ ve_id +"");

				},
				error: function(jqXHR, textStatus, errorThrown) {
				   console.log(textStatus, errorThrown);
				}
		
		
			});/**/
		  }
		
	  });/**/ 
});/**/	
$('#save_track').click(function(){
//ch_phone_con,ch_phone_dis,ans_pb_re
//var ch_phone_con=$('#ch_phone_con');
//var ch_phone_dis=$('#ch_phone_dis');
//ch_phone_31,ch_phone_32,ans_box_3,ans_pb_insur,form-field-mask-4(price),ace(เงินสด,เงินผ่อน)
//ch_phone_in_31,ch_phone_in_32,ans_pb_insur_2(compyny),ans_pb_insur_3(type),form-field-mask-4(price),pay_stb_1,pay_stb_2



///
if($('#ch_phone_31').is(':checked')) { 
//alert("it's checked 31"); 
var data_in = $('#ans_pb_insur').val();//ans_pb_insur
var price = $('#form-field-mask-4').val();
var pay_type='';
//var pay_type_1 = $('#pay_st_1').val();
//var pay_type_2 = $('#pay_st_2').val();
 if($('#pay_st_1').is(':checked')){
	pay_type=$('#pay_st_1').val();
 }else if($('#pay_st_2').is(':checked')){
 	pay_type=$('#pay_st_2').val();
 }
 $.ajax({
        url: url_link,
        type: "post",
        data: {data_save:'ต่อแล้ว',ac_tion:'3',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id,data_in:data_in,price:price,pay_type:pay_type,status:'ยุติการติดตาม'} ,
        success: function (response) {
								       bootbox.dialog({
													message: "ระบบบันทึกข้อมูลเรียบร้อย!", 
													buttons: {
														"success" : {
															"label" : "OK",
															"className" : "btn-sm btn-primary",
															"callback": function() {
																
window.location.assign("list_customer_activity.php?activity_id="+ ac_id +"&cus_id="+ cu_id +"&vehicle_id="+ ve_id +"");
															}
														}
													}
												});
					
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });/**/
//alert(data_in + ' ' + price + ' ' + pay_type);

}

if($('#ch_phone_32').is(':checked')) { 
//alert("it's checked 32+++++"); 
//ch_phone_in_31,ch_phone_in_32,ans_pb_insur_2(compyny),ans_pb_insur_3(type),form-field-mask-4(price),pay_stb_1,pay_stb_2
if($('#ch_phone_in_31').is(':checked')) { 
	var data_in = $('#ans_pb_insur_2').val();//ans_pb_insur_2
	var insur_type = $('#ans_pb_insur_3').val();//ans_pb_insur_2
	var price = $('#form-field-mask-49').val();
	var pay_type='';
	//var pay_type_1 = $('#pay_st_1').val();
	//var pay_type_2 = $('#pay_st_2').val();


	 if($('#pay_stb_1').is(':checked')){
		pay_type=$('#pay_stb_1').val();
	 }else if($('#pay_stb_2').is(':checked')){
	 	pay_type=$('#pay_stb_2').val();
 	 }

 $.ajax({
        url: url_link,
        type: "post",
        data: {data_save:'บริษัทอื่นเสนอ',ac_tion:'4',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id,data_in:data_in,price:price,pay_type:pay_type,insur_type:insur_type,status:'รับทราบ'} ,
        success: function (response) {
								       bootbox.dialog({
													message: "ระบบบันทึกข้อมูลเรียบร้อย!", 
													buttons: {
														"success" : {
															"label" : "OK",
															"className" : "btn-sm btn-primary",
															"callback": function() {
																
window.location.assign("list_customer_activity.php?activity_id="+ ac_id +"&cus_id="+ cu_id +"&vehicle_id="+ ve_id +"");
															}
														}
													}
												});
					
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });/**/

	//alert(data_in + ' '+ insur_type + ' ' + price + ' ' + pay_type);
}

if($('#ch_phone_in_32').is(':checked')) { 
///ch_phone_in_32
//final
//alert("it's checked final");
//seltype,selcampaign,selfund,selinsurance_price,selinsurance_price_total,selact_price,seldiscount,selservice


//var send_data=

//ch_love_1
if($('#ch_love_1').is(':checked')) { 
	//alert("ch_love_1 it's checked final");
var seltype=$('#seltype option:selected').val();
var selcampaign=$('#selcampaign').val();
 

if(seltype==''){
    alert('กรุณาเลือกประเภทประกัน');
	return false;
}
if(selcampaign==''){
    alert('กรุณาเลือกแคมเปญ');
	return false;
}

 var selinsurance_price_total=findAndReplace($('#selinsurance_price_total').text(),",","");
 var selact_price=$('#selact_price').text();
// alert(selact_price);
 var selnet_total=findAndReplace($('#net_price').text(),",","");
 var seldiscount=$('#seldiscount').val();
 var selservice=$('#selservice').val();
 var start_date='';
 var end_date='';
 
 var seldiscount_act=$('#seldiscount_act').val();
 var seldiscount_tax=$('#seldiscount_tax').val();
 var seltax =$('#seltax').val();	
 var car_type=$('#selcartype option:selected').val();
  var vehicle_model=$('#select_vehicle_model option:selected').val();

 $.ajax({
        url: url_link,
        type: "post",
        data: {data_save:'สนใจ',ac_tion:'5',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id,seltype:seltype,selcampaign:selcampaign,selinsurance_price_total:selinsurance_price_total,selact_price:selact_price,seldiscount:seldiscount,selservice:selservice,selnet_total:selnet_total,start_date:start_date,end_date:end_date,car_type:car_type,vehicle_model:vehicle_model,seldiscount_act:seldiscount_act,seldiscount_tax:seldiscount_tax,seltax:seltax,status:'สนใจ'} ,
        success: function (response) {
								       bootbox.dialog({
													message: "ระบบบันทึกข้อมูลเรียบร้อย!", 
													buttons: {
														"success" : {
															"label" : "OK",
															"className" : "btn-sm btn-primary",
															"callback": function() {
																
window.location.assign("list_customer_activity.php?activity_id="+ ac_id +"&cus_id="+ cu_id +"&vehicle_id="+ ve_id +"");
															}
														}
													}
												});
					
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });
//ไม่สนใจ รับทราบ
/* $.ajax({
        url: url_link,
        type: "post",
        data: {data_save:'ไม่สนใจ',ac_tion:'6',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id} ,
        success: function (response) {
                 
           //alert(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });*/

}
else if($('#ch_love_2').is(':checked')) { 
var seltype=$('#seltype option:selected').val();
var selcampaign=$('#selcampaign').val();
 

if(seltype==''){
    alert('กรุณาเลือกประเภทประกัน');
	return false;
}
if(selcampaign==''){
    alert('กรุณาเลือกแคมเปญ');
	return false;
}

 var selinsurance_price_total=findAndReplace($('#selinsurance_price_total').text(),",","");
 var selact_price=$('#selact_price').text();
 //alert(selact_price);
 var selnet_total=findAndReplace($('#net_price').text(),",","");
 var seldiscount=$('#seldiscount').val();
 var selservice=$('#selservice').val();
 
 $.ajax({
        url: url_link,
        type: "post",
      
		data: {data_save:'ไม่สนใจ',ac_tion:'6',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id,seltype:seltype,selcampaign:selcampaign,selinsurance_price_total:selinsurance_price_total,selact_price:selact_price,seldiscount:seldiscount,selservice:selservice,selnet_total:selnet_total,status:'ยุติการติดตาม'},
        success: function (response) {
								       bootbox.dialog({
													message: "ระบบบันทึกข้อมูลเรียบร้อย!", 
													buttons: {
														"success" : {
															"label" : "OK",
															"className" : "btn-sm btn-primary",
															"callback": function() {
																
window.location.assign("list_customer_activity.php?activity_id="+ ac_id +"&cus_id="+ cu_id +"&vehicle_id="+ ve_id +"");
															}
														}
													}
												});
					
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });/**/

}
else if($('#ch_love_3').is(':checked')) { 

var seltype=$('#seltype option:selected').val();
var selcampaign=$('#selcampaign').val();
 

if(seltype==''){
    alert('กรุณาเลือกประเภทประกัน');
	return false;
}
if(selcampaign==''){
    alert('กรุณาเลือกแคมเปญ');
	return false;
}

 var selinsurance_price_total=findAndReplace($('#selinsurance_price_total').text(),",","");
 var selact_price=$('#selact_price').text();
 var selnet_total=findAndReplace($('#net_price').text(),",","");
 var seldiscount=$('#seldiscount').val();
 var selservice=$('#selservice').val();

 $.ajax({
        url: url_link,
        type: "post",
        data: {data_save:'รับทราบ',ac_tion:'7',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id,seltype:seltype,selcampaign:selcampaign,selinsurance_price_total:selinsurance_price_total,selact_price:selact_price,seldiscount:seldiscount,selservice:selservice,selnet_total:selnet_total,status:'ติดตามแล้ว'} ,
        success: function (response) {
								       bootbox.dialog({
													message: "ระบบบันทึกข้อมูลเรียบร้อย!", 
													buttons: {
														"success" : {
															"label" : "OK",
															"className" : "btn-sm btn-primary",
															"callback": function() {
																
window.location.assign("list_customer_activity.php?activity_id="+ ac_id +"&cus_id="+ cu_id +"&vehicle_id="+ ve_id +"");
															}
														}
													}
												});
					
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });/**/

}//end if


////
}//endif




///ch_phone_in_32
}
if($('#ch_phone_dis').is(':checked')) { 
	//alert("it's checked"); 
//var ans_pb_re=$('#ans_pb_re');
 //var values = $(this).serialize();
var value = $('#ans_pb_re').val();
//alert(value +'='+ac_id + '-'+ ve_id +'-' + cu_id);
 $.ajax({
        url: url_link,
        type: "post",
        data: {data_save:value,ac_tion:'1',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id,status:'กำลังติดตาม'} ,
        success: function (response) {
									 
									       bootbox.dialog({
													message: "ระบบบันทึกข้อมูลเรียบร้อย!", 
													buttons: {
														"success" : {
															"label" : "OK",
															"className" : "btn-sm btn-primary",
															"callback": function() {
																window.location.assign("list_customer_activity.php?activity_id="+ ac_id +"&cus_id="+ cu_id +"&vehicle_id="+ ve_id +"");
															}
														}
													}
												});
					


        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });/**/
////
}//if



if($('#ch_phone_22').is(':checked')) { 
		//alert("it's checked 2"); 
		//ch_phone_21,ch_phone_22,id-date-picker-1,timepicker1	
	var dd = $('#id-date-picker-1').val();
 
	var tt = $('#timepicker1').val();

 $.ajax({
        url: url_link,
        type: "post",
        data: {data_save:'ไม่สะดวกคุย',ac_tion:'2',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id,dd:dd,tt:tt,status:'กำลังติดตาม'} ,
        success: function (response) {
								       bootbox.dialog({
													message: "ระบบบันทึกข้อมูลเรียบร้อย!", 
													buttons: {
														"success" : {
															"label" : "OK",
															"className" : "btn-sm btn-primary",
															"callback": function() {
																
window.location.assign("list_customer_activity.php?activity_id="+ ac_id +"&cus_id="+ cu_id +"&vehicle_id="+ ve_id +"");
															}
														}
													}
												});
					


        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });/**/
	
	
}//if



/*
$.ajax({name:value, name:value, ... })
<select id="myselect">
    <option value="1">Mr</option>
    <option value="2">Mrs</option>
    <option value="3">Ms</option>
    <option value="4">Dr</option>
    <option value="5">Prof</option>
</select>
$( "#myselect option:selected" ).text();
$( "#myselect" ).val();


$( "#x" ).prop( "checked", true );
 
// Uncheck #x
$( "#x" ).prop( "checked", false );
$("input[name='radio']:checked").val()
if($('#radio_button').is(':checked')) { alert("it's checked"); }


*/
		//alert('Hello......................');
});

					$('input[type="radio"]').click(function(){
					  
					 
					   
						if($(this).attr("value")=="red"){
							$(".red").show();
						}
						 if($(this).attr("value")=="red1"){
							$(".red1").show();
						}
						 if($(this).attr("value")=="red20"){
							$(".red2").show();
							 $(".red3").hide();
						}
						 if($(this).attr("value")=="red21"){
							$(".red3").show();
							$(".red2").hide();
						}
						if($(this).attr("value")=="red31"){
							$(".red4").hide();
						 	$(".red5").show();
						}
						if($(this).attr("value")=="red30"){
							$(".red4").show();
						 	$(".red5").show();
						}
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
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
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

<script type="text/javascript">
function CheckNumber(stext) {
    $("#"+stext).keydown(function (e) {
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
function Calinsure_act()
{
var total=0;
	$("#net_price").html("");
 
if(parseFloat($('#selact_price').val()) <=0){
   total=(parseFloat($('#seltotal').val()) - parseFloat($('#selact').val()) );
}else{
  total=parseFloat($('#seltotal').val()) + parseFloat($('#selact').val()) ;
}
 
 $("#net_price").append("<span class='bigger-175 blue' >"+ addCommas(total) +" บาท</span>");
 }
 
 
function Calinsure()
{
 
var caldis=0;
var total=0;
  $("#net_price").html("");
 
 
	   total =(parseFloat($('#seltotal').val()) -parseFloat($('#seldiscount').val()))+parseFloat($('#selservice').val());

	
     $("#net_price").append("<span class='bigger-175 blue' >"+ addCommas(total) +" บาท</span>");
  
}
 // Specify a function to execute when the DOM is fully loaded.
$(function(){
	var defaultOption = '<option value=""> ------- เลือก ------ </option>';
	var loadingImage  = '<img src="images/loading4.gif" alt="loading" />';
	// Bind an event handler to the "change" JavaScript event, or trigger that event on an element.
	$('#seltype').change(function() {
		$("#selcampaign").html(defaultOption);
		 
		// Perform an asynchronous HTTP (Ajax) request.
		$.ajax({
			// A string containing the URL to which the request is sent.
			url: "actioncampaing.php",
			//type: "GET",
			// Data to be sent to the server.
			data: ({ nextList : 'campaign', type_id: $('#seltype').val() }),
			// The type of data that you're expecting back from the server.
			dataType: "json",
			// beforeSend is called before the request is sent
			beforeSend: function() {
				$("#waitcampaign").html(loadingImage);
			},
			// success is called if the request succeeds.
			success: function(json){
				//alert('zzzzzz');
				$("#waitcampaign").html("");
				// Iterate over a jQuery object, executing a function for each matched element.
				$.each(json, function(index, value) {
					// Insert content, specified by the parameter, to the end of each element
					// in the set of matched elements.
					 
					 $("#selcampaign").append('<option value="' + value.campaign_id + 
											'"><span>' + value.campaign_description +' [' + addCommas(value.insurance_startfund)  +'-'+ addCommas(value.insurance_endfund)+'] <p>'+ value.company_name +'</p></span></option>');
				});
			}
		});
	});
	
	$('#selcampaign').change(function() {
	    

		$.ajax({
			url: "actioncampaing.php",
			data: ({ nextList : 'company', campaignID: $('#selcampaign').val() }),
			dataType: "json",
			beforeSend: function() {
				$("#waitcompany").html(loadingImage);
			},
			success: function(json){
			$("#waitcompany").html(""); 
			$("#selfund1").html("");
			$("#selact_price").html("");
			$("#selinsurance_price").html("");
			$("#selinsurance_price_total").html("");
		    $ ('#selact_price').html("");
			$("#net_price").html("");
			$("#free_1").html("");
			$("#free_2").html("");
			$("#free_3").html("");
		    $("#selact").html("");
			
				$.each(json, function(index, value) {
				
				   
  					 //============
					 
					 //============
					  $("#selfund1").append("<span class='bigger-175 blue' >"+ addCommas(value.insurance_startfund)+"-"+ addCommas(value.insurance_endfund)+" บาท</span>");
					  
					   // $('#selact_price').val(addCommas(value.act_price));
						$('#selact').val(value.act_price);
						 $("#selact_price").append("<span class='bigger-175 blue' id='selact_price' >"+ addCommas(parseFloat(value.act_price).toFixed(2))+" </span><span id='free_1' class='bigger-175 blue' >บาท</span>");
					  //============
					  $('#selcartype').val(value.vehicle_code_id);
					  
					 var $price=0;
				      
					  if(parseFloat(value.insurance_price_repair_garage) >0){
					     $price=parseFloat(value.insurance_price_repair_garage);
					  }else{
					      $price=parseFloat(value.insurance_price_repair_center);
					  }
					    
					   $("#selinsurance_price").append("<span class='bigger-175 blue' id='selinsurance_price' >"+ addCommas(parseFloat($price).toFixed(2))+" </span><span id='free_1' class='bigger-175 blue' >บาท</span>");
					   
					   //============
					    $price_tax=(parseFloat($price)+ parseFloat(value.insurance_tax))*0.07;
					    $price_total=(parseFloat($price)+ parseFloat(value.insurance_tax))+parseFloat($price_tax);
					    $price_total_all=$price_total+parseFloat(value.act_price);
					   //$("#selinsurance_price_total").val(parseFloat($price_total));
					   	   $("#selinsurance_price_total").append("<span class='bigger-175 blue' id='selinsurance_price_total' >"+ addCommas(parseFloat($price_total).toFixed(2))+" </span><span id='free_1' class='bigger-175 blue' >บาท</span>");
					 
					  
					   
					    //============
					  // $('#seldiscount').val(addCommas($price_total));
					  $("#net_price").append("<span class='bigger-175 blue' id='net_price'>"+ addCommas(parseFloat($price_total_all).toFixed(2))+" </span><span id='free_1' class='bigger-175 blue' >บาท</span>");
					  //$("#net_price").val(parseFloat($price_total_all).toFixed(2));
					 //  $('#net_price').val(addCommas(value.price_total));
					   $('#seltotal').val($price_total_all);
						 
 
					  
				});
			}
		});
	});
});
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
