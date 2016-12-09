<?php
 require_once 'init_inc.php';
$db=new DB;
//$jqLib = 'https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js';
 

include_once "connDB.php";
?>
<!DOCTYPE html>
 <html ng-app="Insurance" ng-app lang="en">
 
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Insurance</title>

		<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/css/font-awesome.css" />

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

		<link rel="stylesheet" href="assets/css/jquery.gritter.css" />
	<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/select2.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/ace-fonts.css" />
 
 
		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		
           <?php include("navbar.php"); ?>

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
								<a href="#">Home</a>
							</li>

							<li>
								<a href="#">Dashboard</a>
							</li>
 
						</ul><!-- /.breadcrumb -->

						<!-- #section:basics/content.searchbox -->
					 
						<!-- /section:basics/content.searchbox -->
					</div>
					<div class="page-header">
							<h1>
								Activity 
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
										กิจกรรมใหม่ &amp; ลูกค้า Walk in								</small>							</h1>
					</div><!-- /.page-header -->
					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
			 		<div class="widget-box">
									<div class="widget-header widget-header-blue widget-header-flat">
										<h4 class="widget-title lighter">แบบฟอร์มลูกค้า</h4>

										 
									</div>

									<div class="widget-body">
										<div class="widget-main">
											<!-- #section:plugins/fuelux.wizard -->
											<div id="fuelux-wizard-container">
												<div>
													<!-- #section:plugins/fuelux.wizard.steps -->
													<ul class="steps">
														<li data-step="1" class="active">
															<span class="step">1</span>
															<span class="title">กรอกข้อมูลลูกค้า</span>
														</li>

														<li data-step="2">
															<span class="step">2</span>
															<span class="title">เลือกข้อมูลรถยนต์</span>
														</li>

														<li data-step="3">
															<span class="step">3</span>
															<span class="title">เลือกรูปแบบประกัน</span>
														</li>

														<li data-step="4">
															<span class="step">4</span>
															<span class="title">สรุป</span>
														</li>
													</ul>

													<!-- /section:plugins/fuelux.wizard.steps -->
												</div>

												<hr />

												<!-- #section:plugins/fuelux.wizard.container -->
												<div class="step-content pos-rel">
													<div class="step-pane active" data-step="1">
														<h3 class="lighter block green">กรอกข้อมูลลูกค้าด้านล่าง</h3>

										

														<form class="form-horizontal" id="validation-form" method="get">
														 
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="cus_name">คำนำหน้า:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																			<select class="input-medium" id="selectprefix" name="selectprefix">
																			<option value="">------เลือก-----</option>
																			<option value="นาย">นาย</option>
																			<option value="นาง">นาง</option>
																			<option value="นางสาว">นางสาว</option>
																			<option value="2">ชมรม / สมาคม / นิติบุคล</option>
																		 
																		</select>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="cus_code"  >เลขที่บัตรประชาชน:</label>

																<div class="col-xs-12 col-sm-6">
																	<div class="clearfix">
																		<input type="text" id="cus_code" name="cus_code" class="col-xs-12 col-sm-5" maxlength="13" />
																	</div>
																</div>
															</div>
                                                            <div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="cus_name">ชื่อลูกค้า:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		<input type="text" id="cus_name" name="cus_name" class="col-xs-12 col-sm-5" />
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="cus_surname">นามสกุลลูกค้า:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																   <input type="text" id="cus_surname" name="cus_surname" class="col-xs-12 col-sm-5" />
																	</div>
																</div>
															</div>

															<div class="space-2"></div>

															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">เลขที่:</label>

																<div class="col-xs-12 col-sm-6">
																	<div class="clearfix">
																     <input type="text" id="ADDR_ROOM_NO" name="ADDR_ROOM_NO" class="col-xs-12 col-sm-5" />
																	</div>
																</div>
															</div>

															<div class="space-2"></div>
 
	<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">ชื่ออาคาร/หมู่บ้าน:</label>

																<div class="col-xs-12 col-sm-6">
																	<div class="clearfix">
																   <input type="text" id="ADDR_VILLAGE" name="ADDR_VILLAGE" class="col-xs-12 col-sm-5" />
																	</div>
																</div>
															</div>

															<div class="space-2"></div>
 
<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">หมู่ที่ :</label>

																<div class="col-xs-12 col-sm-6">
																	<div class="clearfix">
																 <input type="text" id="ADDR_GROUP_NO" name="ADDR_GROUP_NO" class="col-xs-12 col-sm-5" />
																	</div>
																</div>
															</div>

															<div class="space-2"></div>
 <div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">ตรอก/ซอย :</label>

																<div class="col-xs-12 col-sm-6">
																	<div class="clearfix">
																    <input type="text" id="ADDR_LANE" name="ADDR_LANE" class="col-xs-12 col-sm-5" />
																	</div>
																</div>
															</div>

															<div class="space-2"></div>
 <div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">ถนน :</label>

																<div class="col-xs-12 col-sm-6">
																	<div class="clearfix">
																<input type="text" id="ADDR_ROAD" name="ADDR_ROAD" class="col-xs-12 col-sm-5" />
																	</div>
																</div>
															</div>

															<div class="space-2"></div>
<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">จังหวัด :</label>

																<div class="col-xs-12 col-sm-6">
																	<div class="clearfix">
																<select id="selProvince" class="col-xs-12 col-sm-6">
																	<option value=""> ------- เลือก ------ </option>
																	<?php
																		$result = mysql_query("
																			SELECT
																				PROVINCE_ID,
																				PROVINCE_NAME
																			FROM 
																				province
																			ORDER BY CONVERT(PROVINCE_NAME USING TIS620) ASC;
																		");
																		
																		while($row = mysql_fetch_assoc($result)){
																			echo '<option value="', $row['PROVINCE_ID'], '">', $row['PROVINCE_NAME'],'</option>';
																		}
																	?>
																</select>
																	</div>
																</div>
															</div>

															<div class="space-2"></div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">อำเภอ :</label>

																<div class="col-xs-12 col-sm-6">
																	<div class="clearfix">
																  <select id="selAmphur" class="col-xs-12 col-sm-6">
																	<option value=""> ------- เลือก ------ </option>
																</select><span id="waitAmphur"></span>
																	</div>
																</div>
															</div>

															<div class="space-2"></div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">ตำบล:</label>

																<div class="col-xs-12 col-sm-6">
																	<div class="clearfix">
																<select id="selTumbon" class="col-xs-12 col-sm-6">
																	<option value=""> ------- เลือก ------ </option>
																</select><span id="waitTumbon"></span>
																	</div>
																</div>
															</div>

															<div class="space-2"></div>
															
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">รหัสไปรษณีย์ :</label>

																<div class="col-xs-12 col-sm-3">
																	<div class="clearfix">
																<input type="text" id="ADDR_ZIPCODE" name="ADDR_ZIPCODE" class="col-xs-12 col-sm-5" />
																	</div>
																</div>
															</div>

															<div class="space-2"></div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="phone">เบอร์ติดต่อ:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="input-group">
																		 

																		<input type="tel" id="phone" name="phone" />
																	</div>
																</div>
															</div>

															<div class="space-2"></div>

														</form>
													</div>

													<div class="step-pane" data-step="2">
														 	<h3 class="lighter block green">กรอกรายละเอียดรถยนต์ด้านล่าง</h3>

										

														<form class="form-horizontal" id="validation-form" method="get">
														 
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="cus_name">ยี่ห้อรถ:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																			<select id="selcarmark" class="col-xs-12 col-sm-6">
																	<option value=""> ------- เลือก ------ </option>
																	<?php
																		$result = mysql_query("
																			SELECT
																				carmake_id,
																				carmake_name
																			FROM 
																				insurance_carmake 
																		");
																		
																		while($row = mysql_fetch_assoc($result)){
																			echo '<option value="', $row['carmake_id'], '">', $row['carmake_name'],'</option>';
																		}
																	?>
																</select>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="cus_name">รุ่นรถยนต์:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																		    <select id="selModel">
																					<option value=""> ------- เลือก ------ </option>
																				</select><span id="waitmodel"></span>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="cus_surname">วันที่จดทะเบียน:</label>

																<div class="col-xs-12 col-sm-3">
																	<div class="clearfix">
																   		<span class="input-icon">
											<div class="input-group">
																	<input  id="regis_date"    type="date" value="<?= date('d-m-Y') ?>">
																</div>
											</span>
																	</div>
																</div>
															</div>

															<div class="space-2"></div>
	<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="cus_name">หมายเลขเครื่อง:</label>

																<div class="col-xs-12 col-sm-6">
																	<div class="clearfix">
																		 <input type="text" id="mac_name" name="mac_name" class="col-xs-12 col-sm-5" />
																	</div>
																</div>
															</div>
<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="cus_name">หมายเลขคัสซี:</label>

																<div class="col-xs-12 col-sm-6">
																	<div class="clearfix">
																		 <input type="text" id="chassis" name="chassis" class="col-xs-12 col-sm-5" />
																	</div>
																</div>
															</div>
																<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="cus_name">ทะเบียนรถ:</label>

																<div class="col-xs-12 col-sm-6">
																	<div class="clearfix">
																		 <input type="text" id="regis_no" name="regis_no" class="col-xs-12 col-sm-5" />
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">แบบรถ:</label>

																<div class="col-xs-12 col-sm-9">
																	<div class="clearfix">
																	<select id="select_vehicle_model" name="select_vehicle_model">
																			 <?php
																		$result = mysql_query("
																			SELECT DISTINCT
																				vehicle_model_id,
																				vehicle_model_type
																			FROM 
																				insurance_vehicle_model 
																		");
																		
																		while($row = mysql_fetch_assoc($result)){
																			echo '<option value="', $row['vehicle_model_id'], '">', $row['vehicle_model_type'],'</option>';
																		}
																	?>
																		</select>
																	</div>
																</div>
															</div>

															<div class="space-2"></div>
 

															 
 

														</form>
													</div>

													<div class="step-pane" data-step="3">
					 <form class="form-horizontal" id="validation-form" method="get">
															 <div class="col-sm-12" >
															 <h3 class="lighter block green">กรอกรายละเอียดประกันด้านล่าง</h3>
<div class="profile-user-info profile-user-info-striped col-sm-12">
										   	<div class="profile-info-row">
													 
												</div>
											

												<div class="profile-info-row">
													<div class="profile-info-name">ประเภทประกัน</div>

													<div class="profile-info-value">
													 <div class="col-sm-2">
													 <select id="seltype"  data-placeholder="Choose a State..." style="width:350px">
																<option value=""> ------- เลือก ------ </option>
																<?php
												                   

																	$sql_tyle = "
																		SELECT
																			id,
																			insurance_type
																		FROM 
																			insurance_type	 
																	";
																	$rs_type1=mysql_query($sql_tyle);
																	while($row_type1=mysql_fetch_array($rs_type1)){
																		echo '<option value="', $row_type1['id'], '">', $row_type1['insurance_type'],'</option>';
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
														<select name="selcampaign" id="selcampaign" data-placeholder="Choose a State...">
                                                                   <option value="" style="width:550px"> </option>
                                                                   
                                                               </select> 
													</div>
													</div>
												</div>

												 	 <div class="profile-info-row">
												  <div class="profile-info-name">รหัสรถ</div>

													<div class="profile-info-value">
													 <div class="col-sm-2">
													 <select id="selcartype"  data-placeholder="Choose a State..." style="width:350px">
																<option value=""> ------- เลือกรหัส ------ </option>
																<?php
																	$sql_tyle2 = "
																		SELECT
																			vehicle_code_id,
																				vehicle_type
																		FROM 
																			insurance_vehicle_code	 
																	";
																	$rs_type2=mysql_query($sql_tyle2);
																	while($row_type2=mysql_fetch_array($rs_type2)){
																		echo '<option value="', $row_type2['vehicle_code_id'], '">', $row_type2['vehicle_code_id'],'</option>';
																	}
																?>
															</select>
														 
													</div>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> ทุนประกัน <span id="waitcompany"></span></div>

													<div class="profile-info-value" id="selfund1" >0.00 บาท
														 
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> เบี้ยสุทธิ </div>

													<div class="profile-info-value" id="selinsurance_price">0.00 บาท
														 
													</div>
												</div>
												<div class="profile-info-row" >
													<div class="profile-info-name"> เบี้ยรวมภาษี </div>

													<div class="profile-info-value" id="selinsurance_price_total" >0.00 บาท
													
													</div>
												</div>
													 <div class="profile-info-row" >
										 		 
													<div class="profile-info-name">  เบี้ยรวม พรบ  </div>

													<div class="profile-info-value" id="net_price" >0.00 บาท
														 
													</div>
 												</div>
                                                <div class="profile-info-row">
													<div class="profile-info-name"> เบี้ย พรบ</div>

													<div class="profile-info-value" id="selact_price" >0.00 บาท
													
													</div>
												</div>
 												<div class="profile-info-row">
													<div class="profile-info-name"> เบี้ยภาษี</div>

													<div class="profile-info-value col-sm-6" id="seltax_price" >
													<input  id="seltax" name="seltax" type="text" placeholder="0.00" class="input-medium" ><input  id="selact" name="selact" type="text" value="0.00" class="input-medium" style="display:none">
													</div>
																									</div>
												 <div class="profile-info-row">
													<div class="profile-info-name"> วันที่คุ้มครอง</div>

													<div class="profile-info-value col-sm-6">
											            
																<div class="input-daterange input-group">
																	<input type="text" class="input-sm form-control" id="startDate" name="start"  data-date-format="dd-mm-yyyy" value="<?= date('d-m-Y'); ?>" />  
																	<span class="input-group-addon">
																		<i class="fa fa-exchange"></i>
																	</span>

																	<input type="text" class="input-sm form-control" id="endDate" name="end" data-date-format="dd-mm-yyyy" value="<?= date('d-m-Y',strtotime('+1 years')); ?>" />
																</div>

																<!-- /section:plugins/date-time.datepicker -->
														 
													</div>
											 </div>
																						<div class="profile-info-row">
													<div class="profile-info-name"> ส่วนลดเบี้ยประกัน</div>



													<div class="profile-info-value" >
														 <input  id="seldiscount" name="seldiscount" type="text" placeholder="0.00" class="input-medium" >
													</div>
											 </div>
							 <div class="profile-info-row">
													<div class="profile-info-name"> ส่วนลดเบี้ย พรบ</div>
													<div class="profile-info-value col-sm-6" >
														 <input  id="seldiscount_act" name="seldiscount_act" type="text"  placeholder="0.00" class="input-medium" >
													</div>
																								 </div>
											  <div class="profile-info-row">
													<div class="profile-info-name"> ส่วนลดเบี้ย ภาษี</div>



													<div class="profile-info-value col-sm-6" >
														 <input  id="seldiscount_tax" name="seldiscount_tax" type="text" placeholder="0.00" class="input-medium" >
													</div>
													
											 </div>
											<div class="profile-info-row">
													<div class="profile-info-name"> ค่าบริการ</div>

													<div class="profile-info-value">
											          <input  id="selservice" name="selservice" type="text" placeholder="0.00" class="input-medium" onChange="Calinsure()"> <input  id="seltotal" name="seltotal" type="text"  class="input-medium" style="display:none">
													</div>
										   </div>
								        
										 
							</div>
                            
	 </div>	<div class="space-2"></div></form>
												
													</div>

													<div class="step-pane" data-step="4">
														<div class="center">
															<h3 class="green">สรุปละเอียดประกัน</h3>
														</div>	    
										<div class="col-sm-12" >
<div class="profile-user-info profile-user-info-striped col-sm-12">
										   	<div class="profile-info-row">
													<div class="profile-info-value" style="background-color:#94c1e1"> </div>

													<div class="profile-info-value" style="background-color:#94c1e1">
														<span class="editable editable-click" id="login">ข้อมูลลูกค้า</span>
													</div>
												</div>
								 
								        
										 <div class="profile-info-row" >
										 		 
													<div class="profile-info-name"> ชื่อ นามสกุล </div>

													<div class="profile-info-value" id="txtname">
														 
													</div>
 										</div>
									    <div class="profile-info-row" >
										 		 
													<div class="profile-info-name"> ที่อยู่ </div>

													<div class="profile-info-value" id="txtaddress">
														 
													</div>
 										</div>
									 <div class="profile-info-row" >
										 		 
													<div class="profile-info-name"> เบอร์ติดต่อ </div>

													<div class="profile-info-value" id="txttel">
														 
													</div>
 										</div>
							</div>
							
	 </div>
	 
	 										<div class="col-sm-12" >
<div class="profile-user-info profile-user-info-striped col-sm-12">
										   	<div class="profile-info-row">
													<div class="profile-info-value" style="background-color:#94c1e1"> </div>

													<div class="profile-info-value" style="background-color:#94c1e1">
														<span class="editable editable-click" id="login">ข้อมูลรถยนต์</span>
													</div>
												</div>
								 
								        
										 <div class="profile-info-row" >
										 		 
													<div class="profile-info-name"> ยี่ห้อรถ </div>

													<div class="profile-info-value" id="txtbrand">
														 
													</div>
 										</div>
									    <div class="profile-info-row" >
										 		 
													<div class="profile-info-name"> รุ่นรถ </div>

													<div class="profile-info-value" id="txtmodel">
														 
													</div>
 										</div>
									 <div class="profile-info-row" >
										 		 
													<div class="profile-info-name"> วันที่จดทะเบียน </div>

													<div class="profile-info-value" id="txtregis_date">
														 
													</div>
 										</div>
											<div class="profile-info-row" >
										 		 
													<div class="profile-info-name"> หมายเลขเครื่อง </div>

													<div class="profile-info-value" id="txtmacname">
														 
													</div>
 										</div>
												<div class="profile-info-row" >
										 		 
													<div class="profile-info-name"> ทะเบียนรถ </div>

													<div class="profile-info-value" id="txtregis_no">
														 
													</div>
 										</div>
										<div class="profile-info-row" >
										 		 
													<div class="profile-info-name"> ประเภทรถ </div>

													<div class="profile-info-value" id="txtcartype">
														 
													</div>
 										</div>
							</div>
							
	 </div>
	 
	  										<div class="col-sm-12" >
<div class="profile-user-info profile-user-info-striped col-sm-12">
										   	<div class="profile-info-row">
													<div class="profile-info-value" style="background-color:#94c1e1"> </div>

													<div class="profile-info-value" style="background-color:#94c1e1">
														<span class="editable editable-click" id="login">รายละเอียดประกันรถยนต์</span>
													</div>
												</div>
								 
								        
										 <div class="profile-info-row" >
										 		 
													<div class="profile-info-name"> รหัสรถ </div>

													<div class="profile-info-value" id="txttype">
														 
													</div>
 										</div>
									    <div class="profile-info-row" >
										 		 
													<div class="profile-info-name">ประเภทประกัน </div>

													<div class="profile-info-value" id="txttypeinsure">
														 
													</div>
 										</div>
									 <div class="profile-info-row" >
										 		 
													<div class="profile-info-name"> แคมเปญ </div>

													<div class="profile-info-value" id="txtcam">
														 
													</div>
 										</div>
										<div class="profile-info-row" >
										 		 
													<div class="profile-info-name"> ทุนประกัน </div>

													<div class="profile-info-value" id="txtfund">
														 
													</div>
 										</div>
										
											<div class="profile-info-row" >
										 		 
													<div class="profile-info-name"> เบี้ย พรบ </div>

													<div class="profile-info-value" id="txtact">
														 
													</div>
 										</div>
										
											<div class="profile-info-row" >
										 		 
													<div class="profile-info-name"> เบี้ยประกันสุทธิ </div>

													<div class="profile-info-value" id="txttotal">
														 
													</div>
 										</div>
											<div class="profile-info-row" >
										 		 
													<div class="profile-info-name"> วันที่คุ้มครอง </div>

													<div class="profile-info-value" id="txtdate">
														 
													</div>
 										</div>
                                        
							</div>
							
	 </div>
	 
													</div>
												</div>

												<!-- /section:plugins/fuelux.wizard.container -->
											</div>

											<hr />
											<div class="wizard-actions">
												<!-- #section:plugins/fuelux.wizard.buttons -->
                                              <div class="col-sm-5">
												<button class="btn btn-prev">
													<i class="ace-icon fa fa-arrow-left"></i>
													ย้อนกลับ
												</button>
                                              </div>
                                       <div class="col-sm-3">
                                                <p>
											<button class="btn btn-info" id="btnnext_track" >
													<i class="ace-icon fa fa-thumb-tack"></i>
													ติดตามต่อ
												</button>
                                               </p>
                                        </div>
                                        <div class="col-sm-offset-1">
												<button class="btn btn-success btn-next" data-last="บันทึกและปิดการขาย">
													ขั้นตอนต่อไป
													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>
											</div>	
												<!-- /section:plugins/fuelux.wizard.buttons -->
											</div>

											<!-- /section:plugins/fuelux.wizard -->
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div>

								<div id="modal-wizard" class="modal">
									<div class="modal-dialog">
										<div class="modal-content">
											<div id="modal-wizard-container">
												<div class="modal-header">
													<ul class="steps">
														<li data-step="1" class="active">
															<span class="step">1</span>
															<span class="title">Validation states</span>
														</li>

														<li data-step="2">
															<span class="step">2</span>
															<span class="title">Alerts</span>
														</li>

														<li data-step="3">
															<span class="step">3</span>
															<span class="title">Payment Info</span>
														</li>

														<li data-step="4">
															<span class="step">4</span>
															<span class="title">Other Info</span>
														</li>
													</ul>
												</div>

												<div class="modal-body step-content">
													<div class="step-pane active" data-step="1">
														<div class="center">
															<h4 class="blue">Step 1</h4>
														</div>
													</div>

													<div class="step-pane" data-step="2">
														<div class="center">
															<h4 class="blue">Step 2</h4>
														</div>
													</div>

													<div class="step-pane" data-step="3">
														<div class="center">
															<h4 class="blue">Step 3</h4>
														</div>
													</div>

													<div class="step-pane" data-step="4">
														<div class="center">
															<h4 class="blue">Step 4</h4>
														</div>
													</div>
												</div>
											</div>

											<div class="modal-footer wizard-actions">
												<button class="btn btn-sm btn-prev">
													<i class="ace-icon fa fa-arrow-left"></i>
													Prev
												</button>

												<button class="btn btn-success btn-sm btn-next" data-last="Finish">
													Next
													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>

												<button class="btn btn-danger btn-sm pull-left" data-dismiss="modal">
													<i class="ace-icon fa fa-times"></i>
													Cancel
												</button>
											</div>
										</div>
									</div>
									 
				      
					</div><!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
	    <?php include_once('footer.php') ?>

		
		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
			<script src="assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->
		 
		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.js"></script>
		<![endif]
		<script src="js/jquery-1.12.1.min.js"></script>-->
		<script src="assets/js/jquery-ui.custom.js"></script>
			<script src="assets/js/bootbox.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.js"></script>
		<script src="assets/js/jquery.easypiechart.js"></script>
		<script src="assets/js/jquery.sparkline.js"></script>
		<script src="assets/js/flot/jquery.flot.js"></script>
		<script src="assets/js/flot/jquery.flot.pie.js"></script>
		<script src="assets/js/flot/jquery.flot.resize.js"></script>

		 
	 
		 
		
		<script src="assets/js/jquery.gritter.js"></script>
		<script src="assets/js/spin.js"></script>
		<!-- page specific plugin scripts -->
		<script src="assets/js/fuelux/fuelux.wizard.js"></script>
		<script src="assets/js/jquery.validate.js"></script>
		<script src="assets/js/additional-methods.js"></script>
	 <script src="assets/js/jquery.knob.js"></script>
		<script src="assets/js/jquery.autosize.js"></script>
		<script src="assets/js/jquery.inputlimiter.1.3.1.js"></script>
		<script src="assets/js/jquery.maskedinput.js"></script>
		<script src="assets/js/bootstrap-tag.js"></script>
		<script src="assets/js/jquery.maskedinput.js"></script>
		<script src="assets/js/select2.js"></script>
 
 
		<script src="assets/js/chosen.jquery.js"></script>
		<script src="assets/js/fuelux/fuelux.spinner.js"></script>
		<script src="assets/js/date-time/bootstrap-datepicker.js"></script>
		<script src="assets/js/date-time/bootstrap-timepicker.js"></script>
		<script src="assets/js/date-time/moment.js"></script>
		<script src="assets/js/date-time/daterangepicker.js"></script>
		<script src="assets/js/date-time/bootstrap-datetimepicker.js"></script>
		<script src="assets/js/bootstrap-colorpicker.js"></script>
		<script src="assets/js/jquery.knob.js"></script>
		<script src="assets/js/jquery.autosize.js"></script>
		<script src="assets/js/jquery.inputlimiter.1.3.1.js"></script>
		<script src="assets/js/jquery.maskedinput.js"></script>
		<script src="assets/js/bootstrap-tag.js"></script>
		
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
	 
<script type="text/javascript">
function findAndReplace(string, target, replacement) {
 
 var i = 0, length = string.length;
 
 for (i; i < length; i++) {
 
   string = string.replace(target, replacement);
 
 }
 
 return string;
 
}
			jQuery(function($) {
			  $("p").hide();
				$('[data-rel=tooltip]').tooltip();
			
				$(".select2").css('width','200px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				}); 
			
			
				var $validation = false;
				$('#fuelux-wizard-container')
				.ace_wizard({
					
					//step: 2 //optional argument. wizard will jump to step "2" at first
					//buttons: '.wizard-actions:eq(0)'
				})
				.on('actionclicked.fu.wizard' , function(e, info){
					
	               if(info.step == 1 ){
				         if($('#selectprefix').val()==''){ alert('กรุณาเลือกคำนำหน้าชื่อ'); return false; }
					     if($('#selProvince').val()==''){ alert('กรุณาเลือกจังหวัด'); return false; }
					     if($('#selAmphur').val()==''){ alert('กรุณาเลือกอำเภอ'); return false; }
				          
					     var cusname= $('#selectprefix').val()+$('#cus_name').val()+' '+$('#cus_surname').val();
						 $("#txtname").html(cusname);
						 
						 var address= 'เลขที่ '+$('#ADDR_ROOM_NO').val()+' ชื่ออาคาร/หมู่บ้าน '+ $('#ADDR_VILLAGE').val()+' หมู่ที่ '+ $('#ADDR_GROUP_NO').val()+' ตรอก/ซอย '+ $('#ADDR_LANE').val()+' ถนน '+ $('#ADDR_ROAD').val()+'จังหวัด  '+ $('#selProvince option:selected').html()+' อำเภอ  '+ $('#selAmphur option:selected').html() +' ตำบล   '+ $('#selTumbon option:selected').html()+' รหัสไปรษณีย์   '+ $('#ADDR_ZIPCODE').val();
						 $("#txtaddress").html(address);
					
						 $("#txttel").html( $('#phone').val());
					}
					    if(info.step == 2 ){
						     if($('#selcarmark').val()==''){ alert('กรุณาเลือกยี่ห้อ'); return false; }
						     if($('#selModel').val()==''){ alert('กรุณาเลือกรุ่น'); return false; }
							 if($('#select_vehicle_model').val()==''){ alert('กรุณาเลือกประเภท'); return false; }
							 $("#txtmacname").html($('#mac_name').val());
							 $("#txtregis_no").html($('#regis_no').val());
						     $("#txtbrand").html($('#selcarmark option:selected').html());
							 $("#txtmodel").html($('#selModel option:selected').html());
							 $("#txtyear").html($('#select_car_year option:selected').html());
						     $("#txtcartype").html($('#select_vehicle_model option:selected').html());
							 
						}
					  if(info.step == 3){
					      if($('#selcartype').val()==''){ alert('กรุณาเลือกรหัส'); return false; }
						  if($('#seltype').val()==''){ alert('กรุณาเลือกประกัน'); return false; }
						   if($('#selcampaign').val()==''){ alert('กรุณาเลือกแคมเปญ'); return false; }
					     $("#txttype").html($('#selcartype option:selected').html());
						 $("#txttypeinsure").html($('#seltype option:selected').html());
						 $("#txtcam").html($('#selcampaign option:selected').html());
						 $("#txtfund").html($('#selfund1').html());
						 $("#txtact").html($('#selact_price').html());
						 $("#txttotal").html($('#net_price').html());
						 $("#txtdate").html($('#startDate').val()+' สิ้นสุด '+$('#endDate').val());
						 $("p").show();
						 
					  }
				      
				})
				.on('finished.fu.wizard', function(e) {
                        
					//========== AJAX
					   var be=$('#selectprefix').val();
					   var cus_name =$('#cus_name').val(); 
					   var cus_surname= $('#cus_surname').val();
					   var cus_phone= $('#phone').val();
					   var no=$('#ADDR_ROOM_NO').val();
					   var vi=$('#ADDR_VILLAGE').val();
					   var group_no=$('#ADDR_GROUP_NO').val();
					   var lane= $('#ADDR_LANE').val();
					   var road=$('#ADDR_ROAD').val();
					   var province= $('#selProvince').val();
					   var amphur =$('#selAmphur').val();
					   var tumbon=$('#selAmphur').val();
					   var zipcode=$('#ADDR_ZIPCODE').val();
					 	

					   var carmark=$('#selcarmark').val();
					   var model=$('#selModel').val();
					   var vehicle=$('#select_vehicle_model').val();
					   var macname=$('#mac_name').val();
					   var regis_date=$('#regis_date').val();
					   var cartype=$('#selcartype').val();
					   var type=$('#seltype').val(); 
					   var regis_no=$('#regis_no').val(); 
					   var chassis =$('#chassis').val();
					   var selcampaign=$('#selcampaign option:selected').val();
						
					   var s_date=$('#startDate').val();
					   var e_date=$('#endDate').val();
					   var act_price=$('#selact_price').val();
					   var discount=$('#seldiscount').val();
					   var service=$('#selservice').val();
					   var discount_act=$('#seldiscount_act').val();
					   var discount_tax=$('#seldiscount_tax').val();
					   var seltax =$('#seltax').val();
					   
					
					 
					var selnet_total=findAndReplace(findAndReplace($('#net_price').text(),"บาท",""),",","");
					 $.ajax({
										url: 'save_data_walkin.php',
										type: "post",
										data: {be:be,cus_name:cus_name,cus_surname:cus_surname,no:no,vi:vi,group_no:group_no,lane:lane,road:road,province:province,amphur:amphur,tumbon:tumbon,zipcode:zipcode,carmark:carmark,model:model,vehicle:vehicle,macname:macname,regis_date:regis_date,cartype:cartype,selcampaign:selcampaign,s_date:s_date,e_date:e_date,act_price:act_price,discount:discount,service:service,selnet_total:selnet_total,regis_no:regis_no,cus_phone:cus_phone,chassis:chassis,discount_act:discount_act,discount_tax:discount_tax,seltax:seltax} ,
										success: function (response) {
										       
									 	  bootbox.dialog({
													message: "ระบบบันทึกข้อมูลเรียบร้อย!", 
													buttons: {
														"success" : {
															"label" : "OK",
															"className" : "btn-sm btn-primary",
															"callback": function() {
																window.location.assign("printf.php");
															}
														}
													}
												});
					
					
							 
										},
										error: function(jqXHR, textStatus, errorThrown) {
										   console.log(textStatus, errorThrown);
										}
								
								
									});
		
				

					//==============
					
				}).on('stepclick.fu.wizard', function(e){
				
					//e.preventDefault();//this will prevent clicking and selecting steps
				});
			
			
				//jump to a step
				/**
				var wizard = $('#fuelux-wizard-container').data('fu.wizard')
				wizard.currentStep = 3;
				wizard.setState();
				*/
			
				//determine selected step
				//wizard.selectedItem().step
			  $('#btnnext_track').click(function(){
				  //========== AJAX
					   var be=$('#selectprefix').val();
					   var cus_name =$('#cus_name').val(); 
					   var cus_surname= $('#cus_surname').val();
					   var cus_phone= $('#phone').val();
					   var no=$('#ADDR_ROOM_NO').val();
					   var vi=$('#ADDR_VILLAGE').val();
					   var group_no=$('#ADDR_GROUP_NO').val();
					   var lane= $('#ADDR_LANE').val();
					   var road=$('#ADDR_ROAD').val();
					   var province= $('#selProvince').val();
					   var amphur =$('#selAmphur').val();
					   var tumbon=$('#selAmphur').val();
					   var zipcode=$('#ADDR_ZIPCODE').val();
					 	

					   var carmark=$('#selcarmark').val();
					   var model=$('#selModel').val();
					   var vehicle=$('#select_vehicle_model').val();
					   var macname=$('#mac_name').val();
					   var regis_date=$('#regis_date').val();
					   var cartype=$('#selcartype').val();
					   var type=$('#seltype').val(); 
					   var regis_no=$('#regis_no').val(); 
					   var chassis =$('#chassis').val();
					   var selcampaign=$('#selcampaign option:selected').val();
						
					   var s_date=$('#startDate').val();
					   var e_date=$('#endDate').val();
					   var act_price=$('#selact_price').val();
					   var discount=$('#seldiscount').val();
					   var service=$('#selservice').val();
					   var discount_act=$('#seldiscount_act').val();
					   var discount_tax=$('#seldiscount_tax').val();
					   var seltax =$('#seltax').val();
					   
					
					 
					var selnet_total=findAndReplace(findAndReplace($('#net_price').text(),"บาท",""),",","");
				  $.ajax({
										url: 'save_data_walkin.php',
										type: "post",
										data: {be:be,cus_name:cus_name,cus_surname:cus_surname,no:no,vi:vi,group_no:group_no,lane:lane,road:road,province:province,amphur:amphur,tumbon:tumbon,zipcode:zipcode,carmark:carmark,model:model,vehicle:vehicle,macname:macname,regis_date:regis_date,cartype:cartype,selcampaign:selcampaign,s_date:s_date,e_date:e_date,act_price:act_price,discount:discount,service:service,selnet_total:selnet_total,regis_no:regis_no,cus_phone:cus_phone,chassis:chassis,discount_act:discount_act,discount_tax:discount_tax,seltax:seltax} ,
										success: function (response) {
										       
									 	  bootbox.dialog({
													message: "ระบบบันทึกข้อมูลเรียบร้อย!", 
													buttons: {
														"success" : {
															"label" : "OK",
															"className" : "btn-sm btn-primary",
															"callback": function() {
																//window.location.assign("printf.php");
															}
														}
													}
												});
					
					
							 
										},
										error: function(jqXHR, textStatus, errorThrown) {
										   console.log(textStatus, errorThrown);
										}
								
								
									});
		
			  });
			
			
				//hide or show the other form which requires validation
				//this is for demo only, you usullay want just one form in your application
				 
				 
			
			
				//documentation : http://docs.jquery.com/Plugins/Validation/validate
			
			
				$.mask.definitions['~']='[+-]';
				 
			 
				$('#ADDR_ZIPCODE').mask('99999');
				$('#cus_code').mask('9-9999-99999-99-9');
			
			 			
				$('#modal-wizard-container').ace_wizard();
				$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
				
				
				/**
				$('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
					$(this).closest('form').validate().element($(this));
				});
				
				$('#mychosen').chosen().on('change', function(ev) {
					$(this).closest('form').validate().element($(this));
				});
				*/
				
				
				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove remaining elements before leaving page
					$('[class*=select2]').remove();
				});
			})
		</script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>

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
   total=parseFloat($('#seltotal').val()) - parseFloat($('#selact').val()) ;
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
											'">' + value.campaign_description +' ทุนประกัน [' + addCommas(value.insurance_startfund)  +'-'+ addCommas(value.insurance_endfund)+'] ...'+ value.company_name +'</option>');
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
			$("#waitcompany").html("");$("#selfund").html("");
			$("#selfund1").html("");
			$("#selact_price").html("");
			$("#selinsurance_price").html("");
		    $("#selinsurance_price_total").html("");
			$("#net_price").html("");
			$("#free_1").html("");
			$("#free_2").html("");
			$("#free_3").html("");
			$("#net_price").html("");
			$("#selact").html("");
				$.each(json, function(index, value) {
				
				   
  					 //============
					 $("#selfund").append("<span class='bigger-175 blue' >"+ addCommas(value.insurance_startfund) +"-"+ addCommas(value.insurance_endfund)+" บาท</span>");
					 //============
					  $("#selfund1").append("<span class='bigger-175 blue' >"+ addCommas(value.insurance_startfund)+"-"+ addCommas(value.insurance_endfund)+" บาท</span>");
					  
					  $("#selact_price").append("<span class='bigger-175 blue' >"+ addCommas(parseFloat(value.act_price).toFixed(2))+" บาท</span>");
					    //$('#selact_price').val(addCommas(value.act_price));
						 $('#selact').val(addCommas(value.act_price));
					  //============
					    $('#selcartype').val(value.vehicle_code_id);
					  
					 var $price=0;
				      
					  if(parseFloat(value.insurance_price_repair_garage) >0){
					     $price=parseFloat(value.insurance_price_repair_garage);
					  }else{
					      $price=parseFloat(value.insurance_price_repair_center);
					  }
					    
					   $("#selinsurance_price").append("<span class='bigger-175 blue' >"+ addCommas(parseFloat($price).toFixed(2))+" </span><span id='free_1' class='bigger-175 blue' >บาท</span>");
					   
					   //============
					   $price_tax=(parseFloat($price)+ parseFloat(value.insurance_tax))*0.07;
		 
					   
					   $price_total=parseFloat((parseFloat($price)+ parseFloat(value.insurance_tax))+parseFloat($price_tax));
 
					    $price_total_all=($price_total+parseFloat(value.act_price));
					  // $("#selinsurance_price_total").val(parseFloat($price_total).toFixed(2));
					 $("#selinsurance_price_total").append("<span class='bigger-175 blue' >"+ addCommas(parseFloat($price_total).toFixed(2))+" </span><span id='free_2' class='bigger-175 blue' >บาท</span>");
					    //============
					  // $('#seldiscount').val(addCommas($price_total));
					  $("#net_price").append("<span class='bigger-175 blue' >"+ addCommas(parseFloat($price_total_all).toFixed(2))+" </span><span id='free_2' class='bigger-175 blue' >บาท</span>");
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
				output += "." +parts[1];
			}
			return output;
		}
</script>

<script type="text/javascript">
 // Specify a function to execute when the DOM is fully loaded.
$(function(){
	var defaultOption = '<option value=""> ------- เลือก ------ </option>';
	var loadingImage  = '<img src="images/loading4.gif" alt="loading" />';
	// Bind an event handler to the "change" JavaScript event, or trigger that event on an element.
	$('#selProvince').change(function() {
		$("#selAmphur").html(defaultOption);
		$("#selTumbon").html(defaultOption);
		// Perform an asynchronous HTTP (Ajax) request.
		$.ajax({
			// A string containing the URL to which the request is sent.
			url: "jsonaction.php",
			  type: "post",
			data: ({ nextList : 'amphur', provinceID: $('#selProvince').val() }),
			// The type of data that you're expecting back from the server.
			dataType: "json",
			// beforeSend is called before the request is sent
			beforeSend: function() {
				$("#waitAmphur").html(loadingImage);
			},
			// success is called if the request succeeds.
			success: function(json){
				$("#waitAmphur").html("");
				// Iterate over a jQuery object, executing a function for each matched element.
				$.each(json, function(index, value) {
					// Insert content, specified by the parameter, to the end of each element
					// in the set of matched elements.
					 $("#selAmphur").append('<option value="' + value.AMPHUR_ID + 
											'">' + value.AMPHUR_NAME + '</option>');
				});
			}
		});
	});
	
	$('#selAmphur').change(function() {
		$("#selTumbon").html(defaultOption);
		$.ajax({
			url: "jsonaction.php",
			 type: "post",
			data: ({ nextList : 'tumbon', amphurID: $('#selAmphur').val() }),
			
			dataType: "json",
			beforeSend: function() {
				$("#waitTumbon").html(loadingImage);
			},
			success: function(json){
				$("#waitTumbon").html("");
				$.each(json, function(index, value) {
					 $("#selTumbon").append('<option value="' + value.DISTRICT_ID + 
											'">' + value.DISTRICT_NAME + '</option>');
				});
			}
		});
	});
	

});


</script>
<script>
	$(function(){
	var defaultOption = '<option value=""> ------- เลือก ------ </option>';
	var loadingImage  = '<img src="images/loading4.gif" alt="loading" />';
	// Bind an event handler to the "change" JavaScript event, or trigger that event on an element.
	$('#selcarmark').change(function() {
		$("#selModel").html(defaultOption);
		 
		// Perform an asynchronous HTTP (Ajax) request.
		$.ajax({
			// A string containing the URL to which the request is sent.
			url: "jsonmodel.php",
		   type: "post",
			data: ({carmark_id: $('#selcarmark').val() }),
			// The type of data that you're expecting back from the server.
			dataType: "json",
			// beforeSend is called before the request is sent
			beforeSend: function() {
				$("#waitmodel").html(loadingImage);
			},
			// success is called if the request succeeds.
			success: function(json){
				$("#waitmodel").html("");
				// Iterate over a jQuery object, executing a function for each matched element.
				$.each(json, function(index, value) {
					// Insert content, specified by the parameter, to the end of each element
					// in the set of matched elements.
					 $("#selModel").append('<option value="' + value.model_id + 
											'">' + value.model_name + '</option>');
				});
			}
		});
	});
});

</script>
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
		
		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="assets/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="docs/assets/js/themes/sunburst.css" />

		 <!-- /for search -->
	</body>
</html>
