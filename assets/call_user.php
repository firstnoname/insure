<?php
session_start();
require_once 'init_inc.php';
$jqLib = 'https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js';
$db=new DB;
//$rs=$db->select_alert('view_vehicle_customer',3);
//echo "<pre>";
//print_r($rs);

//foreach($rs as $rw){
	//echo $rw['customer_name'] . "-" . $rw['vehicle_deliver'] . "<br>";
//}
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
		<script src="assets/js/ace-extra.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../assets/js/html5shiv.js"></script>
		<script src="../assets/js/respond.js"></script>
		<![endif]-->
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
<select name="select" class="chosen-select form-control" id="ans_pb_re" data-placeholder="Choose a State...">
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
					.red5{   }
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
<input class="form-control date-picker" id="id-date-picker-1" type="date" data-date-format="dd-mm-yyyy" />
<span class="input-group-addon">
<i class="fa fa-calendar bigger-110"></i>																	</span>																</div>
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
                     <td width="29%">ประกันที่ทำกับที่อื่น (ดึงข้อมูลประกัน) </td>
                     <td width="71%">
                     <select name="select2" class="chosen-select form-control" id="ans_pb_insur" data-placeholder="Choose a State...">
                       <option value=""> </option>

                       <option value="AL">Option 1</option>

                     </select></td>
                   </tr>
                   <tr>
                     <td>ราคาประกันที่ทำกับที่อื่น </td>
                     <td>
	<input class="input-medium input-mask-eyescript" id="form-field-mask-4" type="text">								  </td>
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
                     <td width="29%">ประกันที่เสนอจากบริษัทอื่น (ดึงฐานข้อมูล)</td>
                     <td width="71%">
 <select name="select" class="chosen-select form-control" id="ans_pb_insur_2" data-placeholder="Choose a State...">
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
          <select name="select" class="chosen-select form-control" id="ans_pb_insur_3" data-placeholder="Choose a State...">
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
                     <td><input class="input-medium input-mask-eyescript" id="form-field-mask-49" type="text"></td>
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
			 <label>
														 <label>
	<input name="form-field-radio9" class="ace input-lg" type="radio" value="red130" id="ch_love_1">
	<span class="lbl bigger-120"> สนใจ </span>							</label>
														 <label>
	<input name="form-field-radio9" class="ace input-lg" type="radio" value="red130" id="ch_love_2">
	<span class="lbl bigger-120"> ไม่สนใจ </span>							</label>
														 <label>
	<input name="form-field-radio9" class="ace input-lg" type="radio" value="red130" id="ch_love_3">
	<span class="lbl bigger-120"> รับทราบ </span>							</label>
	<!--  Select_Campaing_call.php+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++   -->										 
<?php
//require_once 'Select_Campaing_call.php'; ไม่สนใจ รับทราบ
?>
<div class="row">
								   <div class="profile-user-info profile-user-info-striped">
										   
										   	<div class="profile-info-row">
													<div class="profile-info-value" style="background-color:#94c1e1"> </div>

													<div class="profile-info-value" style="background-color:#94c1e1">
														<span class="editable editable-click" id="login">รายละเอียดประกัน</span>
													</div>
												</div>
												 
												<div class="profile-info-row">
													<div class="profile-info-name">ประเภทประกัน</div>

													<div class="profile-info-value">
													 <div class="col-sm-2">
													 <select id="seltype" class="chosen-select form-control" data-placeholder="Choose a State...">
																<option value=""> ------- เลือก ------ </option>
																<?php
																	$result = "
																		SELECT
																			id,
																			insurance_type
																		FROM 
																			insurance_type	 
																	";
																	$rs=mysqli_query($db->con,$result);
																	foreach($rs as $row){
																		echo '<option value="', $row['id'], '">', $row['insurance_type'],'</option>';
																	}
																?>
															</select>
														 
													</div>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> แคมเปญ <span id="waitcampaign"></span></div>

													<div class="profile-info-value">
														<div class="col-sm-5">
														<select name="selcampaign" class="chosen-select form-control" id="selcampaign" data-placeholder="Choose a State...">
                                                                   <option value=""> </option>
                                                                   
                                                               </select> 
													</div>
													</div>
												</div>
											 
												<div class="profile-info-row">
													<div class="profile-info-name"> วันที่คุ้มครอง </div>
														<div class="col-sm-3">
														<div class="col-xs-3 col-sm-11 profile-info-value">
																<!-- #section:plugins/date-time.datepicker -->
																 <div class="input-group">
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>

			<input class="form-control" name="date-range-picker" id="input-daterang" type="date">
																</div>
															</div>
													</div>
												</div>
												
												<div class="profile-info-row">
													<div class="profile-info-name"> ทุนประกันเดิม </div>

													<div class="profile-info-value" id="selfund">
										 
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> ทุนประกัน <span id="waitcompany"></span></div>

													<div class="profile-info-value" id="selfund1" >
														 
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> เบี้ยสุทธิ </div>

								<div class="profile-info-value" id="selinsurance_price">
														 
													</div>
												</div>
												<div class="profile-info-row" >
													<div class="profile-info-name"> เบี้ยรวมภาษี </div>

						<div class="profile-info-value" id="selinsurance_price_total">
														 
													</div>
												</div>
												
											<div class="profile-info-row">
													<div class="profile-info-name"> เบี้ย พรบ</div>

													<div class="profile-info-value" >
													<input  id="selact_price" name="selact_price" type="text"  value="0.00" class="input-medium">
													</div>
												</div>
											<div class="profile-info-row">
													<div class="profile-info-name"> ส่วนลดเบี้ยประกัน</div>

													<div class="profile-info-value" >
														 <input  id="seldiscount" name="seldiscount" type="text" value="0.00" class="input-medium">
													</div>
											 </div>
							 
											<div class="profile-info-row">
													<div class="profile-info-name"> ค่าบริการ</div>

													<div class="profile-info-value">
											          <input  id="selservice" name="selservice" type="text" value="0.00" class="input-medium">
													</div>
											 </div>
										 
									 
		</div></div>
		<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
														</div>
														<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
	<button class="btn btn-info" type="button" id="save_track">
												<i class="ace-icon fa fa-check bigger-110"></i>
												บันทึกกิจกรรม											</button>

											     
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												ล้างค่า											</button>
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
				</div>
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
								<a href="#my-modal" role="button" class="bigger-125 bg-primary white" data-toggle="modal">
									&nbsp; Content Slider inside Modal Box&nbsp;								</a>

								<div id="my-modal" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h3 class="smaller lighter blue no-margin">A modal with a slider in it!</h3>
											</div>

											<div class="modal-body">
												Some content
												<br />
												<br />
												<br />
												<br />
												<br />
												1
												<br />
												<br />
												<br />
												<br />
												<br />
												2											</div>

											<div class="modal-footer">
												<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Close												</button>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>

								<div id="aside-inside-modal" class="modal" data-placement="bottom" data-background="true" data-backdrop="false" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-body">
												<div class="row">
													<div class="col-xs-12 white">
														<h3 class="lighter no-margin">Inside another modal</h3>

														<br />
														<br />
													</div>
												</div>
											</div>
										</div><!-- /.modal-content -->

										<button class="btn btn-default btn-app btn-xs ace-settings-btn aside-trigger" data-target="#aside-inside-modal" data-toggle="modal" type="button">
											<i data-icon2="fa-arrow-down" data-icon1="fa-arrow-up" class="ace-icon fa fa-arrow-up bigger-110 icon-only"></i>										</button>
									</div><!-- /.modal-dialog -->
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

		<!--[if lte IE 8]>
		  <script src="../assets/js/excanvas.js"></script>
		<![endif]-->
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

$(document).ready(function(){
	
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

$('#save_track').click(function(){
//ch_phone_con,ch_phone_dis,ans_pb_re
//var ch_phone_con=$('#ch_phone_con');
//var ch_phone_dis=$('#ch_phone_dis');
//ch_phone_31,ch_phone_32,ans_box_3,ans_pb_insur,form-field-mask-4(price),ace(เงินสด,เงินผ่อน)
//ch_phone_in_31,ch_phone_in_32,ans_pb_insur_2(compyny),ans_pb_insur_3(type),form-field-mask-4(price),pay_stb_1,pay_stb_2



///
if($('#ch_phone_31').is(':checked')) { 
alert("it's checked 31"); 
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
        data: {data_save:'ต่อแล้ว',ac_tion:'3',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id,data_in:data_in,price:price,pay_type:pay_type} ,
        success: function (response) {
                 
           alert(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });/**/
//alert(data_in + ' ' + price + ' ' + pay_type);

}

if($('#ch_phone_32').is(':checked')) { 
alert("it's checked 32+++++"); 
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
        data: {data_save:'มีบริษัทประกันอื่นติดต่อมา',ac_tion:'4',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id,data_in:data_in,price:price,pay_type:pay_type,insur_type:insur_type} ,
        success: function (response) {
                 
           //alert(response);
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
alert("it's checked final");
//seltype,selcampaign,selfund,selinsurance_price,selinsurance_price_total,selact_price,seldiscount,selservice


//var send_data=

//ch_love_1
if($('#ch_love_1').is(':checked')) { 
	alert("ch_love_1 it's checked final");
var seltype=$('#seltype option:selected').text();
var selcampaign=$('#selcampaign').val();
/*var selfund=$('#selfund1').text();
var selinsurance_price=$('#selinsurance_price').text();
var selinsurance_price_total=$('#selinsurance_price').text();
var selact_price=$('#selact_price').text();
var seldiscount=$('#seldiscount').text();
var selservice=$('#selservice').text();*/
 $.ajax({
        url: url_link,
        type: "post",
        data: {data_save:'สนใจ',ac_tion:'5',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id,seltype:seltype,selcampaign:selcampaign} ,
        success: function (response) {
            //$('#seltype option:selected').text('');
			//$('#selcampaign option:selected').text('');
			$('#selfund').text('');
			$('#selfund1').text('');
			$('#selinsurance_price').text('');
			$('#selinsurance_price_total').text('');
			$('#selact_price').text('');
			$('#seldiscount').text('');
			$('#selservice').text('');  /**/    
            alert(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });/**/

/* $.ajax({
        url: url_link,
        type: "post",
        data: {data_save:'สนใจ',ac_tion:'5',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id,seltype:seltype,selcampaign:selcampaign,selfund:selfund,selinsurance_price:selinsurance_price,selinsurance_price_total:selinsurance_price_total,selact_price:selact_price,seldiscount:seldiscount,selservice:selservice} ,
        success: function (response) {
            $('#seltype:selected').text('');
			$('#selcampaign:selected').text('');
			$('#selfund1').text('');
			$('#selinsurance_price').text('');
			$('#selinsurance_price').text('');
			$('#selact_price').text('');
			$('#seldiscount').text('');
			$('#selservice').text('');     
           alert(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });*/
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
alert("ch_love_2 it's checked final");
 $.ajax({
        url: url_link,
        type: "post",
        data: {data_save:'ไม่สนใจ',ac_tion:'6',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id} ,
        success: function (response) {
                 
           alert(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });/**/

}
else if($('#ch_love_3').is(':checked')) { 
alert("ch_love_3 it's checked final");
 $.ajax({
        url: url_link,
        type: "post",
        data: {data_save:'รับทราบ',ac_tion:'7',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id} ,
        success: function (response) {
                 
           alert(response);
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
alert(value +'='+ac_id + '-'+ ve_id +'-' + cu_id);
 $.ajax({
        url: url_link,
        type: "post",
        data: {data_save:value,ac_tion:'1',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id} ,
        success: function (response) {
                 
           //alert(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });/**/
////
}//if


if($('#ch_phone_22').is(':checked')) { 
		alert("it's checked 2"); 
		//ch_phone_21,ch_phone_22,id-date-picker-1,timepicker1	
	var dd = $('#id-date-picker-1').val();
	var tt = $('#timepicker1').val();

 $.ajax({
        url: url_link,
        type: "post",
        data: {data_save:'ไม่สะดวกคุย',ac_tion:'2',ac_id:ac_id,cu_id:cu_id,ve_id:ve_id,dd:dd,tt:tt} ,
        success: function (response) {
                 
           //alert(response);
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
						 	$(".red5").hide();
						}
					});
				});
				</script>
				<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
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

 // Specify a function to execute when the DOM is fully loaded.
$(function(){
	var defaultOption = '<option value=""> ------- เลือก ------ </option>';
	var loadingImage  = '<img src="images/loading4.gif" alt="loading" />';
	// Bind an event handler to the "change" JavaScript event, or trigger that event on an element.
	$('#seltype').change(function() {
		$("#selcampaign").html(defaultOption);
 alert('response');
    CheckNumber("selact_price");
	CheckNumber("seldiscount");
	CheckNumber("selservice");
	
 
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
											'">' + value.campaign_description + '</option>');
				});
			}
		});
	});
	
	$('#selcampaign').change(function() {
	    $("#selfund").html("");
		$("#selfund1").html("");
		$("#selact_price").html("");
		$("#selinsurance_price").html("");
		$("#selinsurance_price_total").html("");

		
		$.ajax({
			url: "actioncampaing.php",
			data: ({ nextList : 'company', campaignID: $('#selcampaign').val() }),
			dataType: "json",
			beforeSend: function() {
				$("#waitcompany").html(loadingImage);
			},
			success: function(json){
				$("#waitcompany").html("");
				$.each(json, function(index, value) {
				
				   
  					 //============
					 $("#selfund").append("<span class='bigger-175 blue' >"+ addCommas(value.insurance_startfund) +"-"+ addCommas(value.insurance_endfund)+" บาท</span>");
					 //============
					  $("#selfund1").append("<span class='bigger-175 blue' >"+ addCommas(value.insurance_startfund)+"-"+ addCommas(value.insurance_endfund)+" บาท</span>");
					  
					    $('#selact_price').val(addCommas(value.act_price));
					  //============
					  
					  
					  $price=0;
				 
					  if(value.insurance_price_repair_center==0){
					     $price=value.einsurance_price_repair_garage;
					  }else{
					      $price=parseFloat(value.insurance_price_repair_center);
					  }
					    
					   $("#selinsurance_price").append("<span class='bigger-175 blue' >"+ addCommas($price)+" บาท</span>");
					   
					   //============
					   $price_total=parseFloat($price)+ parseFloat(value.insurance_tax);
					   $("#selinsurance_price_total").append("<span class='bigger-175 blue' >"+ addCommas($price_total) +" บาท</span>");
					 
					    //============
					   $('#seldiscount').val(addCommas($price_total));
					 
 
					  
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
		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="assets/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="docs/assets/js/themes/sunburst.css" />

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="assets/js/ace/elements.onpage-help.js"></script>
		<script src="assets/js/ace/ace.onpage-help.js"></script>
		<script src="docs/assets/js/rainbow.js"></script>
		<script src="docs/assets/js/language/generic.js"></script>
		<script src="docs/assets/js/language/html.js"></script>
		<script src="docs/assets/js/language/css.js"></script>
		<script src="docs/assets/js/language/javascript.js"></script>
	</body>
</html>
