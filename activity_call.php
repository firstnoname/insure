<?php
session_start();
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
							<li class="active">Call</li>
						</ul><!-- /.breadcrumb -->

					 

						<!-- /section:basics/content.searchbox -->
					</div>
<?php
//acitivity_id=1&cus_id=5356936&vehicle_id=149
$activity_id=$_GET['activity_id'];
$cus_id=$_GET['cus_id'];
$vehicle_id=$_GET['vehicle_id'];


$arr_ac=array(
	'id' => $activity_id
);
$arr_ve=array(
	'vehicle_id' => $vehicle_id
);
$rs_cus_calls=$db->select_where('insurance_activity',$arr_ac);
$i=0;

$act_id='';
$activity_name='';
$activity_type='';
$activity_month='';
foreach($rs_cus_calls as $rs_cus_call):
$act_id=$rs_cus_call['id'];
$activity_name=$rs_cus_call['activity_name'];
$activity_type=$rs_cus_call['activity_type'];
$activity_month=$rs_cus_call['activity_month'];
//$_SESSION['AC_ID'][$i]=$activity_tmp_id;
endforeach;
?>
					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<div class="page-header">
							<h1>
								<?=$activity_type?>
								<small><i class="ace-icon fa fa-angle-double-right"></i>
									<?=$activity_name?>
								</small>
							</h1>
						</div><!-- /.page-header -->
	<?php 
//foreach($_SESSION['AC_ID'] as $k){
	//echo $k ."<br>";//	
//}

//echo $_GET['activity_id'];

$sql_sub_ac="SELECT insurance_customer.* FROM insurance_customer_info";
$sql_sub_ac.=" INNER JOIN insurance_customer ON insurance_customer_info.cus_id=insurance_customer.cus_id ";
$sql_sub_ac.=" WHERE insurance_customer_info.vehicle_id='$vehicle_id' AND ";
$sql_sub_ac.="  insurance_customer_info.cus_id='$cus_id' ";
$rs_sub_ac=mysqli_query($db->con,$sql_sub_ac);
$rw_sub_ac=mysqli_fetch_array($rs_sub_ac);

//insurance_vehicle
//select_where
$vehicle_regis='';
$vehicle_regis_date='';
$vehicle_day_out='';
$rs_ve_calls=$db->select_where('insurance_vehicle',$arr_ve);
foreach($rs_ve_calls as $rs_ve_call){
$vehicle_regis=$rs_ve_call['vehicle_regis'];
$vehicle_regis_date=$rs_ve_call['vehicle_regis_date'];
$vehicle_day_out=$rs_ve_call['vehicle_day_out'];	
}
$arr_dout=explode('-',$vehicle_regis_date);
$yy=$arr_dout[0] + 543;
$mm=$arr_dout[1];
$dd=$arr_dout[2];
$new_day=$dd.'/'.$mm.'/'.$yy;
?>
					<!-- /section:settings.box -->
							 <div id="user-profile-2" class="user-profile">
						   <div class="tabbable">
											<ul class="nav nav-tabs padding-18">
												<li class="active">
													<a data-toggle="tab" href="#home" aria-expanded="true">
														<i class="green ace-icon fa fa-user bigger-120"></i>
														ข้อมูลลูกค้า
													</a>
												</li>

												<li class="">
													<a data-toggle="tab" href="#feed" aria-expanded="false">
														<i class="orange ace-icon fa fa-rss bigger-120"></i>
														ประวัติการติดตาม
													</a>
												</li>
												<li class="">
													<a data-toggle="tab" href="#friends" aria-expanded="true">
														<i class="blue fa fa-info-circle bigger-120"></i>
														ประวัติการรับบริการ
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
    <h4 class="blue"> <span class="middle">คุณ <?=$rw_sub_ac['cus_name']?></span> <span class="label label-purple arrowed-in-right"> <i class="ace-icon fa fa-circle smaller-80 align-middle"></i> เจ้าของรถ,คนใช้,คนขับ </span> </h4>
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
                                                        <div class="profile-info-name"> ทะเบียนรถ </div>
  <div class="profile-info-value"> <span><?=$vehicle_regis?></span> </div>
                                                      </div>
                                                      <div class="profile-info-row">
                                                        <div class="profile-info-name">สิ้นสุดคุ้มครอง </div>
   <div class="profile-info-value"> <span><?=$new_day?></span> </div>
                                                      </div>
                                                      <div class="profile-info-row">
                                                        <div class="profile-info-name"> </div>
                                                        <div class="profile-info-value"> <span>3 hours ago</span> </div>
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
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="../assets/images/gallery/thumb-1.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="../assets/images/gallery/thumb-2.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="../assets/images/gallery/thumb-3.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="../assets/images/gallery/thumb-4.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="../assets/images/gallery/thumb-5.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="../assets/images/gallery/thumb-6.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="../assets/images/gallery/thumb-1.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="../assets/images/gallery/thumb-2.jpg">
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
											<div class="col-xs-12">
												<div class="widget-box1">
													<div class="widget-header widget-header-flat">
														<h4 class="smaller">
															<i class="ace-icon fa fa-code"></i>
															แบบฟอร์มคำถาม
														</h4>
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
														<input name="form-field-radio" class="ace input-lg" type="radio">
														<span class="lbl bigger-120"> ติดต่อได้</span>
							</label>
				 <label>
														<input name="form-field-radio" class="ace input-lg" type="radio" value="red">
														<span class="lbl bigger-120"> ติดต่อไม่ได้</span>
							</label>
  							<div class="red box">
						 
															

															<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td>
																<label  >ระบุเหตุผล</label><br />
																<select name="select" class="chosen-select form-control" id="select" data-placeholder="Choose a State...">
                                                              <option value=""> </option>
                                                              <option value="AL">Option 1</option>
                                                              <option value="AK">Option 2</option>
                                                              <option value="AZ">Option 3</option>
                                                              <option value="AR">Option 4</option>
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
														<input name="form-field-radio1" class="ace input-lg" type="radio">
														<span class="lbl bigger-120"> สะดวกคุย </span>
							</label>
				 <label>
														<input name="form-field-radio1" class="ace input-lg" type="radio" value="red1">
														<span class="lbl bigger-120"> ไม่สะดวกคุย</span>
							</label>
  							<div class="red1 box">
						 
															

															<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td>
																 <label class="block">
														<input name="form-field-checkbox" class="ace input-lg" type="checkbox">
														<span class="lbl bigger-120"> ให้โทรซ้ำ </span>
													</label></td>
																	<td > <label for="id-date-picker-1">วันที่</label>

														<div class="row">
															<div class="col-xs-8 col-sm-11">
																<!-- #section:plugins/date-time.datepicker -->
																<div class="input-group">
																	<input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" />
																	<span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
																</div>
															</div>
														</div>
															</td>    
														 <td>
																<label for="timepicker1">เวลา</label>

														<!-- #section:plugins/date-time.timepicker -->
														<div class="input-group bootstrap-timepicker">
															<input id="timepicker1" type="text" class="form-control" />
															<span class="input-group-addon">
																<i class="fa fa-clock-o bigger-110"></i>
															</span>
														</div></td>                              
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
														<input name="form-field-radio2" class="ace input-lg" type="radio" value="red20">
														<span class="lbl bigger-120"> ต่อแล้ว </span>							</label>
				 <label>
														<input name="form-field-radio2" class="ace input-lg" type="radio" value="red21">
														<span class="lbl bigger-120"> ยังไม่ได้ต่อ</span>							</label>
				<div class="red2 box">											
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                   <tr>
                     <td width="29%">ประกันที่ทำกับที่อื่น (ดึงข้อมูลประกัน) </td>
                     <td width="71%"><select name="select2" class="chosen-select form-control" id="select2" data-placeholder="Choose a State...">
                       <option value=""> </option>
                       <option value="AL">Option 1</option>
                       <option value="AK">Option 2</option>
                       <option value="AZ">Option 3</option>
                       <option value="AR">Option 4</option>
                     </select></td>
                   </tr>
                   <tr>
                     <td>ราคาประกันที่ทำกับที่อื่น </td>
                     <td>
																<input class="input-medium input-mask-eyescript" id="form-field-mask-4" type="text">
								  </td>
                   </tr>
                   <tr>
                     <td>เงื่อนไขที่ทำกับที่อื่น </td>
                     <td><label>
														<input name="form-field-radio4" class="ace" type="radio">
														<span class="lbl"> เงินสด</span>
													</label><label>
														<input name="form-field-radio4" class="ace" type="radio">
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
														<input name="form-field-radio7" class="ace input-lg" type="radio" value="red30">
														<span class="lbl bigger-120"> มี </span>							</label>
				 <label>
														<input name="form-field-radio7" class="ace input-lg" type="radio" value="red31">
														<span class="lbl bigger-120"> ไม่มี</span>							</label>
        
			<div class="red4 box">											
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                   <tr>
                     <td width="29%">ประกันที่เสนอจากบริษัทอื่น (ดึงฐานข้อมูล)</td>
                     <td width="71%"><select name="select" class="chosen-select form-control" id="select" data-placeholder="Choose a State...">
                                                              <option value=""> </option>
                                                              <option value="AL">Option 1</option>
                                                              <option value="AK">Option 2</option>
                                                              <option value="AZ">Option 3</option>
                                                              <option value="AR">Option 4</option>
                                                      </select></td>
                   </tr>
                   <tr>
                     <td>ประเภทของประกันที่เสนอจากบริษัทอื่น</td>
                     <td><select name="select" class="chosen-select form-control" id="select" data-placeholder="Choose a State...">
                                                              <option value=""> </option>
                                                              <option value="AL">ป 1</option>
                                                              <option value="AK">ป 2+</option>
															   <option value="AK">ป 2</option>
                                                              <option value="AZ">ป 3</option>
                                                              <option value="AR">ป 3+</option>
                                    </select></td>
                   </tr>
                   <tr>
                     <td>เบี้ยประกันที่เสนอจากบริษัทอื่น </td>
                     <td><input class="input-medium input-mask-eyescript" id="form-field-mask-4" type="text"></td>
                   </tr>
                   <tr>
                     <td>เงื่อนไขที่เสนอจากบริษัทอื่น</td>
                     <td><label>
														<input name="form-field-radio4" class="ace" type="radio">
														<span class="lbl"> เงินสด</span>
													</label><label>
														<input name="form-field-radio4" class="ace" type="radio">
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
														<input name="form-field-radio9" class="ace input-lg" type="radio" value="red130">
														<span class="lbl bigger-120"> สนใจ </span>							</label>
														 <label>
														<input name="form-field-radio9" class="ace input-lg" type="radio" value="red130">
														<span class="lbl bigger-120"> ไม่สนใจ </span>							</label>
														 <label>
														<input name="form-field-radio9" class="ace input-lg" type="radio" value="red130">
														<span class="lbl bigger-120"> รับทราบ </span>							</label>
														
														<div class="row">
									<div class="col-sm-5">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">รายละเอียด</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
												 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                             <tr>
                                                               <td width="43%" height="25"  >ประกันที่เสนอจากบริษัทอื่น (ดึงฐานข้อมูล)</td>
                                                               <td width="35%"  ><select name="select3" class="chosen-select form-control" id="select3" data-placeholder="Choose a State...">
                                                                   <option value=""> </option>
                                                                   <option value="AL">Option 1</option>
                                                                   <option value="AK">Option 2</option>
                                                                   <option value="AZ">Option 3</option>
                                                                   <option value="AR">Option 4</option>
                                                               </select></td>
                                                             </tr>
                                                             <tr>
                                                               <td>ประเภทของประกันที่เสนอจากบริษัทอื่น</td>
                                                               <td><select name="select3" class="chosen-select form-control" id="select3" data-placeholder="Choose a State...">
                                                                   <option value=""> </option>
                                                                   <option value="AL">ป 1</option>
                                                                   <option value="AK">ป 2+</option>
                                                                   <option value="AK">ป 2</option>
                                                                   <option value="AZ">ป 3</option>
                                                                   <option value="AR">ป 3+</option>
                                                               </select></td>
                                                             </tr>
                                                             <tr>
                                                               <td>เคมเปญ </td>
                                                               <td><select name="select3" class="chosen-select form-control" id="select3" data-placeholder="Choose a State...">
                                                                   <option value=""> </option>
                                                                   <option value="AL">Option 1</option>
                                                                   <option value="AK">Option 2</option>
                                                                   <option value="AZ">Option 3</option>
                                                                   <option value="AR">Option 4</option>
                                                               </select></td>
                                                             </tr>
                                                             <tr>
                                                               <td>ราคาของประกันตามประเภท (ระบบแสดง) </td>
                                                               <td><input name="text" type="text" class="input-medium input-mask-eyescript" id="text">
                                                                 บาท </td>
                                                             </tr>
                                                             <tr>
                                                               <td>ส่วนลดเบี้ยประกัน </td>
                                                               <td><input name="text2" type="text" class="input-medium input-mask-eyescript" id="text2">
                                                                 บาท </td>
                                                             </tr>
                                                             <tr>
                                                               <td>เบี้ย พรบ. </td>
                                                               <td><input name="text3" type="text" class="input-medium input-mask-eyescript" id="text3">
                                                                 บาท </td>
                                                             </tr>
                                                             <tr>
                                                               <td>เบี้ย ภาษี.</td>
                                                               <td><input name="text4" type="text" class="input-medium input-mask-eyescript" id="text4">
                                                                 บาท </td>
                                                             </tr>
                                                             <tr>
                                                               <td>ค่าบริการ</td>
                                                               <td><label>
                                                                 <input name="text5" type="text" class="input-medium input-mask-eyescript" id="text5">
                                                                 บาท </label>
                                                                   <label></label></td>
                                                             </tr>
                                                           </table>
												</div>
											</div>
										</div>
									</div>

									<div class="col-sm-7">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="widget-title">ค่าใช้จ่ายรวม</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													   <h1>XX,XXX.00</h1>
												</div>
											</div>
										</div>

										<div class="space-6"></div>

										 
									</div>
								</div>
														
			                               
                                                           
                           
			</li>
	</ul>
	</div>  
		</div></div>
		
														</div>
														<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="button">
												<i class="ace-icon fa fa-check bigger-110"></i>
												บันทึกกิจกรรม
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												ล้างค่า
											</button>
										</div>
									</div>
													</div>
												</div>
											</div>
										</div>

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

		<!-- basic scripts -->

		<?php include("scriptfooter.php"); ?>
	</body>
</html>
