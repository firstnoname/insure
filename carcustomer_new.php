<?php
require_once 'init_inc.php';

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
						
					  <div id="user-profile-2" class="user-profile">
						   <div class="tabbable">
											<ul class="nav nav-tabs padding-18">
												<li class="active">
													<a data-toggle="tab" href="#home" aria-expanded="true">
														<i class="green ace-icon fa fa-user bigger-120"></i>
														ข้อมูลลูกค้า
													</a>
												</li>

												 

												 
											</ul>

						                    <div class="tab-content no-border padding-24">
                                              <div id="home" class="tab-pane active">
                                                <div class="row">
                                                  <div class="col-xs-12 col-sm-3 center"> <span class="profile-picture"> <img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="assets/avatars/profile-pic.jpg"> </span>
                                                      <div class="space space-4"></div>
                                                  </div>
                                                  <!-- /.col -->
                                                  <div class="col-xs-12 col-sm-9">
                                                    <h4 class="blue"> <span class="middle">คุณ xxxxx xxxxxxxxxxx</span> <span class="label label-purple arrowed-in-right"> <i class="ace-icon fa fa-circle smaller-80 align-middle"></i> เจ้าของรถ</span> </h4>
                                                    <div class="profile-user-info">
                                                      <div class="profile-info-row">
                                                        <div class="profile-info-name"> หมายเลขติดต่อ </div>
                                                        <div class="profile-info-value"> <span>080-09990-0xxx</span> </div>
                                                      </div>
                                                      <div class="profile-info-row">
                                                        <div class="profile-info-name"> ที่อยู่ </div>
                                                        <div class="profile-info-value"> <i class="fa fa-map-marker light-orange bigger-110"></i> <span>Netherlands</span> <span>Amsterdam</span> </div>
                                                      </div>
                                                      <div class="profile-info-row">
                                                        <div class="profile-info-name"> ข้อมูลรถยนต์ </div>
                                                        <div class="profile-info-value"> <span>ยี่ห้อ ISUZU รุ่น MU-X สีดำ</span> </div>
                                                      </div>
                                                      <div class="profile-info-row">
                                                        <div class="profile-info-name">หมายเลขเครื่อง </div>
                                                        <div class="profile-info-value"> <span>2010ER8895994</span> </div>
                                                      </div>
                                                      <div class="profile-info-row">
                                                        <div class="profile-info-name"> ปีรถ</div>
                                                        <div class="profile-info-value"> <span>2016</span> </div>
                                                      </div>
                                                    </div>
                                                    <div class="hr hr-8 dotted"></div>
                                                  </div>
                                                  <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                              </div>
						                      <!-- /#home -->
                                              <div id="feed" class="tab-pane">
                                                <div class="profile-feed row">
                                                  <div class="col-sm-6">
                                                    <div class="profile-activity clearfix">
                                                      <div><i class="pull-left thumbicon fa fa-check btn-success no-hover"></i><a class="user" href="#"> คุณ xxxxxx xxxxxx [เจ้าของรถ]</a> ทะเบียนรถ กม 4556  สถานะโทรติดตามลูกค้าล่าสุด <span class="label label-success arrowed-in arrowed-in-right">ปิดการขาย</span> 
                                                          <div class="time"><i class="ace-icon fa fa-clock-o bigger-110"></i> 17/04/2559 </div>
                                                      </div>
                                                      <div class="tools action-buttons"></div>
                                                    </div>
                                                    <div class="profile-activity clearfix">
                                                   <div><i class="pull-left thumbicon fa fa-check btn-success no-hover"></i><a class="user" href="#"> คุณ xxxxxx xxxxxx [เจ้าของรถ]</a> ทะเบียนรถ กม 4556  สถานะโทรติดตามลูกค้าล่าสุด <span class="label label-info arrowed-right arrowed-in">สนใจ</span> 
                                                          <div class="time"> <i class="ace-icon fa fa-clock-o bigger-110"></i> 13/04/2559 </div>
                                                      </div>
                                                      <div class="tools action-buttons">   </div>
                                                    </div>
                                                    <div class="profile-activity clearfix">
                                                      <div><i class="pull-left thumbicon fa fa-check btn-success no-hover"></i><a class="user" href="#"> คุณ xxxxxx xxxxxx [เจ้าของรถ]</a> ทะเบียนรถ กม 4556  สถานะโทรติดตามลูกค้าล่าสุด <span class="label label-warning arrowed arrowed-right">รับทราบ</span> 
                                                          <div class="time"> <i class="ace-icon fa fa-clock-o bigger-110"></i> 09/04/2559 </div>
                                                      </div>
                                                      <div class="tools action-buttons">  </div>
                                                    </div>
                                               
                                                    
                                                  </div>
                                                  <!-- /.col -->
                                                  <div class="col-sm-6">
                                                    <div class="profile-activity clearfix">
                                                      <div><i class="pull-left thumbicon fa fa-check btn-success no-hover"></i><a class="user" href="#"> คุณ xxxxxx xxxxxx [เจ้าของรถ]</a> ทะเบียนรถ กม 4556  สถานะโทรติดตามลูกค้าล่าสุด <span class="label label-warning arrowed arrowed-right">โทรซ้ำ</span> 
                                                          <div class="time"> <i class="ace-icon fa fa-clock-o bigger-110"></i> 05/04/2559 </div>
                                                      </div>
                                                      <div class="tools action-buttons">  </div>
                                                    </div>
                                                    <div class="profile-activity clearfix">
                                                     <div><i class="pull-left thumbicon fa fa-check btn-success no-hover"></i><a class="user" href="#"> คุณ xxxxxx xxxxxx [เจ้าของรถ]</a> ทะเบียนรถ กม 4556  สถานะโทรติดตามลูกค้าล่าสุด <span class="label label-warning arrowed arrowed-right">ติดต่อไม่ได้</span> 
                                                          <div class="time"> <i class="ace-icon fa fa-clock-o bigger-110"></i> 01/04/2559 </div>
                                                      </div>
                                                      <div class="tools action-buttons"> </div>
													 </div>
                                                       
                                                   
                                                  </div>
                                                  <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                                <div class="space-12"></div>
                                                
                                              </div>
						                      <!-- /#feed -->
                                              <div id="friends" class="tab-pane">
<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>รายละเอียดการเข้ารับบริการ
																</th>
<th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>วันที่เข้ารับบริการ
																</th>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>ทะเบียนรถ
																</th>

																<th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>เจ้าหน้าที่รับบริการ
																</th>
																
															</tr>
														</thead>

														<tbody>
															<tr>
																<td> 
											 เปลี่ยนน้ำมันเครื่องยนต์ ตามระยะ</br><span style="font-size:10px">คุณ xxxxx  xxxxxx  [เจ้าของรถ]</span></td>
<td>
																	<b class="blue">11/06/2559</b>
																</td>
																<td>
																	<b class="blue">กศ 3456</b>
																</td>

																<td class="hidden-480">
																	 นาย xxxxx xxxxxxx 
																</td>
															</tr>

															<tr>
																<td> เปลี่ยนน้ำมันเครื่องยนต์ ตามระยะ</br><span style="font-size:10px">คุณ xxxxx  xxxxxx  [เจ้าของรถ]</span></td>
<td>
																	<b class="blue">21/07/2558</b>
																</td>
																<td>
																<b class="blue">ศม 6655</b>
																</td>

																<td class="hidden-480">
																	 นาย xxx  xxxxxx 
																</td>
															</tr>

															<tr>
																<td> ทำสีและซ่อมตัวถัง</br><span style="font-size:10px">คุณ xxxxx  xxxxxx  [เจ้าของรถ]</span></td>
<td>
																	<b class="blue">21/06/2558</b>
																</td>
																<td>
																	<b class="blue">ศม 4444</b>
																</td>

																<td class="hidden-480">
																	นาย xxx xxxxxxx
																</td>
															</tr>

															<tr>
																<td>เปลี่ยนน้ำมันเครื่องยนต์ ตามระยะ</br><span style="font-size:10px">คุณ xxxxx  xxxxxx  [เจ้าของรถ]</span></td>
<td>
																	<b class="blue">11/01/2558</b>
																</td>
																<td>
																	<b class="blue">ศม 4444</b>
																</td>

																<td class="hidden-480">
																				นาย xxx xxxxxx
																</td>
															</tr>

															<tr>
																<td>เปลี่ยนน้ำมันเครื่อง</br><span style="font-size:10px">คุณ xxxxx  xxxxxx  [เจ้าของรถ]</span></td>
<td>
																	<b class="blue">01/06/2557</b>
																</td>
																<td>
																	<b class="blue">ศม 4444</b>
																</td>

																<td class="hidden-480">
																	นาย xxxx xxxxxx
																</td>
															</tr>
															 
															
														  
															
														</tbody>
														
													</table>
													<ul class="pager pull-right">
														<li class="previous disabled">
															<a href="#"> Prev</a>
														</li>

														<li class="next">
															<a href="#">Next </a>
														</li>
													</ul>
                                              </div>
						                      <!-- /#friends -->
                                              <div id="pictures" class="tab-pane">
                                                <ul class="ace-thumbnails">
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="assets/images/gallery/thumb-1.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="assets/images/gallery/thumb-2.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="assets/images/gallery/thumb-3.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="assets/images/gallery/thumb-4.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="assets/images/gallery/thumb-5.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="assets/images/gallery/thumb-6.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="assets/images/gallery/thumb-1.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="assets/images/gallery/thumb-2.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                </ul>
                                              </div>
						                      <!-- /#pictures -->
                                            </div>
						   </div>
						 </div>

							 <div class="row">
								 
										   <div class="profile-user-info profile-user-info-striped">
										   
										   	<div class="profile-info-row">
													<div class="profile-info-value" style="background-color:#94c1e1"> </div>

													<div class="profile-info-value" style="background-color:#94c1e1">
														<span class="editable editable-click" id="login">รายละเอียดประกัน</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> รหัส </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="username">
														<div class="col-sm-2">
														<select name="select3" class="chosen-select form-control" id="select3" data-placeholder="Choose a State...">
                                                                   <option value=""> </option>
                                                                   <option value="AL">Option 1</option>
                                                                   <option value="AK">Option 2</option>
                                                                   <option value="AZ">Option 3</option>
                                                                   <option value="AR">Option 4</option>
                                                               </select> 
													</div>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name">ประเภทประกัน</div>

													<div class="profile-info-value">
													 <div class="col-sm-2">
														<select name="select3" class="chosen-select form-control" id="select3" data-placeholder="Choose a State...">
                                                                   <option value=""> </option>
                                                                   <option value="AL">Option 1</option>
                                                                   <option value="AK">Option 2</option>
                                                                   <option value="AZ">Option 3</option>
                                                                   <option value="AR">Option 4</option>
                                                               </select> 
													</div>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> แคมเปญ </div>

													<div class="profile-info-value">
														<div class="col-sm-5">
														<select name="select3" class="chosen-select form-control" id="select3" data-placeholder="Choose a State...">
                                                                   <option value=""> </option>
                                                                   <option value="AL">Option 1</option>
                                                                   <option value="AK">Option 2</option>
                                                                   <option value="AZ">Option 3</option>
                                                                   <option value="AR">Option 4</option>
                                                               </select> 
													</div>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> แบบรถ </div>

													<div class="profile-info-value">
														<div class="col-sm-3">
														<select name="select3" class="chosen-select form-control" id="select3" data-placeholder="Choose a State...">
                                                                   <option value=""> </option>
                                                                   <option value="AL">Option 1</option>
                                                                   <option value="AK">Option 2</option>
                                                                   <option value="AZ">Option 3</option>
                                                                   <option value="AR">Option 4</option>
                                                               </select> 
													</div>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> วันที่คุ้มครอง </div>

													 
														<div class="col-sm-3">
														<div class="col-xs-3 col-sm-11">
																<!-- #section:plugins/date-time.datepicker -->
																<div class="input-group">
																	<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" />
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>																	</span>		
																		<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" />
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>																	</span>															</div>
															</div>
													</div>
												 
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> ทุนประกัน </div>

													<div class="profile-info-value">
														<span class="bigger-175 blue" id="signup">800,000.00 บาท</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> เบี้ยสุทธิ </div>

													<div class="profile-info-value">
														<span class="bigger-175 blue" id="signup">25,500.00 บาท</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> เบี้ยรวมภาษี </div>

													<div class="profile-info-value">
														<span class="bigger-175 blue" id="signup">29,500.00 บาท</span>
													</div>
												</div>
												
											
											
											</div>
										<div class="col-sm-6">	
												 <div class="profile-user-info profile-user-info-striped">	
														<div class="profile-info-row">
															<div class="profile-info-value" style="background-color:#94c1e1"> </div>
		
															<div class="profile-info-value" style="background-color:#94c1e1">
																<span class="editable editable-click" id="login">เงื่อนไขประกัน</span>
															</div>
														</div>
		
														<div class="profile-info-row">
															<div class="profile-info-name"> เงื่อนไข</div>
		
															<div class="profile-info-value">
																<div class="col-sm-5">
																  <label>
														<input name="form-field-radio4" class="ace" type="radio">
														<span class="lbl">แถม</span>
													</label><label>
														<input name="form-field-radio4" class="ace" type="radio">
														<span class="lbl">จ่าย</span>
													</label><label>
														<input name="form-field-radio4" class="ace" type="radio">
														<span class="lbl">จ่ายบางส่วน</span>
													</label><div class="col-sm-6">
											<!-- #section:elements.form.input-icon -->
										 
												<input id="form-field-icon-1"  type="text">
												 
											 
												<input id="form-field-icon-2"   type="text">
											 

											<!-- /section:elements.form.input-icon -->
										   </div>
										 
															   </div>
															</div>
														</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> เบี้ยสุทธิ </div>

													<div class="profile-info-value">
														<input id="form-field-icon-1"  type="text" value="29,500.00 ">บาท
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> จ่ายบริษัทประกัน</div>

													<div class="profile-info-value">
														<input id="form-field-icon-1"  type="text" value="14,000
 ">บาท
													</div>
												</div>
											  </div>
										</div>
										
										
										<div class="col-sm-6">	
												 <div class="profile-user-info profile-user-info-striped">	
														<div class="profile-info-row">
															<div class="profile-info-value" style="background-color:#94c1e1"> </div>
		
															<div class="profile-info-value" style="background-color:#94c1e1">
																<span class="editable editable-click" id="login">เงื่อนไขประกัน</span>
															</div>
														</div>
		
														<div class="profile-info-row">
															<div class="profile-info-name"> เงื่อนไข</div>
		
															<div class="profile-info-value">
																<div class="col-sm-5">
																  <label>
														<input name="form-field-radio4" class="ace" type="radio">
														<span class="lbl">แถม</span>
													</label><label>
														<input name="form-field-radio4" class="ace" type="radio">
														<span class="lbl">จ่าย</span>
													</label><label>
														<input name="form-field-radio4" class="ace" type="radio">
														<span class="lbl">จ่ายบางส่วน</span>
													</label><div class="col-sm-6">
											<!-- #section:elements.form.input-icon -->
										 
												<input id="form-field-icon-1"  type="text">
												 
											 
												<input id="form-field-icon-2"   type="text">
											 

											<!-- /section:elements.form.input-icon -->
										   </div>
										 
															   </div>
															</div>
														</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> เบี้ย พรบ</div>

													<div class="profile-info-value">
														<input id="form-field-icon-1"  type="text" value="980.00 ">บาท
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> หมายเลข พรบ</div>

													<div class="profile-info-value">
												 <input id="form-field-icon-1"  type="text" value="11583-59506-4396965">
													</div>
												</div>
											  </div>
											  
										</div>
										
						</div><br>
						<div class="center">
								<button class="btn btn-lg btn-success">
												<i class="ace-icon fa fa-check"></i>
												บันทึก
								</button>	 
								<button class="btn btn-lg btn-success">
												<i class="ace-icon fa fa-print "></i>
												บันทึกและพิมพ์ใบคำขอ
								</button>	
						</div><!-- /.row -->
						<!-- /section:settings.box -->
					 
					</div><!-- /.page-content -->
				</div>
			</div>
			<!-- /.main-content -->
               <?php include("footer.php"); ?>      
			<!-- /.main-container -->

		<!-- basic scripts -->

		<?php include("scriptfooter.php"); ?>
	</body>
</html>
