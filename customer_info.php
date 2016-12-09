 
<?php
 include_once "connDB.php";
 
    $activity_id=  (isset($_GET['activity_id']) ? $_GET['activity_id'] : null);
	$cus_id=$_GET['cus_id'];
	$vehicle_id=$_GET['vehicle_id'];
	
	//$activity_id=$_GET['activity_id'];
	//$cus_id=$_GET['cus_id'];
	//$vehicle_id=$_GET['vehicle_id'];
	$sql_sub_ac="SELECT * FROM insurance_relationship_view ";
						$sql_sub_ac.=" WHERE vehicle_id='$vehicle_id' AND ";
						$sql_sub_ac.=" cusno='$cus_id' ";
						$rs_sub_ac=mysql_query($sql_sub_ac);
						$rw_sub_ac=mysql_fetch_array($rs_sub_ac);
						
						//insurance_vehicle
						//select_where
						$vehicle_regis='';
						$vehicle_regis_date='';
						$vehicle_day_out='';
						 
						$vehicle_regis=$rw_sub_ac['vehicle_regis'];
						$vehicle_regis_date=$rw_sub_ac['regis_date'];
						$vehicle_day_out=$rw_sub_ac['date_deliver'];	
						
						$arr_dout=explode('-',$vehicle_regis_date);
						$yy=$arr_dout[0] + 543;
						$mm=$arr_dout[1];
						$dd=$arr_dout[2];
						$new_day=$dd.'/'.$mm.'/'.$yy;
 
?>

									<div id="user-profile-2" class="user-profile">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-18">
												<li class="active">
													<a data-toggle="tab" href="#home">
														<i class="green ace-icon fa fa-user bigger-120"></i>
														ข้อมูลลูกค้า	/ ข้อมูลรถยนต์												</a>												</li>

												<li>
													<a data-toggle="tab" href="#feed">
														<i class="orange ace-icon fa fa-rss bigger-120"></i>
														ประวัติการติดตาม											</a>												</li>

												<li>
													<a data-toggle="tab" href="#friends">
														<i class="blue ace-icon fa fa-users bigger-120"></i>
														ประวัติการเข้ารับบริการ													</a>												</li>

											 
											</ul>

											<div class="tab-content no-border padding-24">
												<div id="home" class="tab-pane in active">
													<div class="row">
														<div class="col-xs-12 col-sm-3 center">
															<span class="profile-picture">
																<img class="editable img-responsive" alt="<?=$rw_sub_ac['be'].''.$rw_sub_ac['cus_name'] .' '.$rw_sub_ac['cus_surename'] ;?>" id="avatar2" src="<?php if($rw_sub_ac['be'] =='นาย') { echo "assets/avatars/men2.png";}else{ echo "assets/avatars/woman1.png"; } ?>"  />															</span>

															<div class="space space-4"></div>

														 </div><!-- /.col -->

														<div class="col-xs-12 col-sm-6">
															<h4 class="blue">
																<span class="middle"><?=$rw_sub_ac['be'].''.$rw_sub_ac['cus_name'] .' '.$rw_sub_ac['cus_surename'] ;?></span>

																<span class="label label-purple arrowed-in-right">
																	<i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
																	<?=$rw_sub_ac['relates_type'] ?>																</span>															</h4>

															<div class="profile-user-info">
																<div class="profile-info-row">
																	<div class="profile-info-name"> หมายเลขติดต่อ </div>

																	<div class="profile-info-value">
																		<span><?=$rw_sub_ac['cus_tel'] ?></span>																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> ที่อยู่ </div>

																	<div class="profile-info-value">
																		<i class="fa fa-map-marker light-orange bigger-110"></i>
																		<span><?=$rw_sub_ac['address_full_name'] ?></span>
																		 											</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> ทะเบียนรถ </div>

																	<div class="profile-info-value">
																		<span><?=$rw_sub_ac['vehicle_regis'] ?></span>																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> ข้อมูลรถยนต์ </div>

																	<div class="profile-info-value">
																		<span>ยี่ห้อ:<?=$rw_sub_ac['vehicle_brand'].' รุ่น:'. $rw_sub_ac['vehicle_series'].' หมายเลข chassis:'. $rw_sub_ac['vehicle_full_chassis'] ?></span>																	</div>
																</div>
																<div class="profile-info-row">
																	<div class="profile-info-name">วันที่สิ้นสุดกรมธรรม์ </div>

																	<div class="profile-info-value">
																		<span><?=$rw_sub_ac['regis_date'] ?></span>																	</div>
																</div>
																<div class="profile-info-row">
																	<div class="profile-info-name">วันที่ออกรถ </div>

																	<div class="profile-info-value">
																		<span><?=$rw_sub_ac['regis_date'] ?></span>																	</div>
																</div>
																<div class="profile-info-row">
																	<div class="profile-info-name">วันที่จดทะเบียน </div>

																	<div class="profile-info-value">
																		<span><?=$rw_sub_ac['date_deliver'] ?></span>																	</div>
																</div>
															</div>

															<div class="hr hr-8 dotted"></div>

															<div class="profile-user-info">
																 

											 

																 
															</div>
														</div><!-- /.col -->
													</div><!-- /.row -->

													<div class="space-20"></div>

													 

														 
												</div><!-- /#home -->

												<div id="feed" class="tab-pane">
													<div class="profile-feed row">
														<div class="col-sm-9">
													<?php
																															$sql1="SELECT
																		insurance_customer_activity.customer_activity_id,
																		insurance_customer_activity.vehicle_id,
																		insurance_customer_activity.date_appointment,
																		insurance_relationship_view.cus_name,
																		insurance_relationship_view.cus_surename,
																		insurance_relationship_view.be,
																		insurance_relationship_view.relates_type,
																		insurance_relationship_view.vehicle_regis,
																		insurance_relationship_view.cusno,
																		insurance_activity_track_call.track_last_status,
																		insurance_customer_activity.activity_id,
																		insurance_activity.activity_name,
																		insurance_activity_track_call.date_create
																		FROM
																		insurance_customer_activity
																		INNER JOIN insurance_relationship_view ON insurance_customer_activity.vehicle_id = insurance_relationship_view.vehicle_id
																		INNER JOIN insurance_activity_track_call ON insurance_activity_track_call.customer_activity_id = insurance_customer_activity.customer_activity_id
																		INNER JOIN insurance_activity ON insurance_activity.id = insurance_customer_activity.activity_id
																		 WHERE insurance_customer_activity.activity_id='$activity_id' and insurance_relationship_view.cusno='$cus_id'  AND insurance_customer_activity.vehicle_id='$vehicle_id' Order by  insurance_activity_track_call.activity_track_call_id desc ";
	 						  
			 											$rs_tracks1=mysql_query($sql1);
														while($rs_track1=mysql_fetch_array($rs_tracks1)){
																		
																							?>	 
																		<div class="profile-activity clearfix">
																		 <div><i class="pull-left thumbicon fa fa-check btn-success no-hover"></i><a class="user" href="#myModal" data-toggle="modal" id="<?='cus_id='.$rs_track1['cusno'].'&ac_type='.$rs_track1['activity_id'] ?>" data-target="#edit-modal">  <?=$rs_track1['be'].''.$rs_track1['cus_name'].' '.$rs_track1['cus_name'] ; ?> [<?=$rs_track1['relates_type'] ?>]</a> ทะเบียนรถ <?=$rs_track1['vehicle_regis'] ?> สถานะโทรติดตามลูกค้าล่าสุด <span class="label label-info arrowed-in arrowed-in-right"><?=$rs_track1['track_last_status'] ?> </span> 
														<div class="time"><i class="ace-icon fa fa-clock-o bigger-110"></i> <?=$rs_track1['date_create'] ?> </div>
																															  </div>
																															  <div class="tools action-buttons"></div>
																															</div>
																													  <?php } ?>
											          </div><!-- /.col -->

													</div><!-- /.row -->

													<div class="space-12"></div>

													 
												</div><!-- /#feed -->

												<div id="friends" class="tab-pane">
													  <table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													 
													<th>รายละเอียดการเข้ารับบริการ</th>
													<th>ยี่ห้อรถยนต์</th>
													<th>รุ่นรถยนต์</th>
													<th class="hidden-480">หมายเลขคัสซี</th>

													<th>
														<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
														วันที่รถออก
													</th>
													<th class="hidden-480">หมายเลขเลขทะเบียน</th>
													<th class="hidden-480">สาขา</th>
													 
												</tr>
											</thead>

											<tbody>
											  <?php
												    $sql3="SELECT * FROM insurance_repair_service_view WHERE vehicle_id=$vehicle_id ";
													$rs3=mysql_query($sql3);
												  	while($rs_ve_call1=mysql_fetch_array($rs3)){

												?>	 
												<tr>
												
													<td>
													    <div>
																	<i class="pull-left thumbicon fa fa-check btn-success no-hover"></i>
																	 
																	<?=$rs_ve_call1['yparts_pw_name'].' '.$rs_ve_call1['ylist_pw_name']  ?>
																	<a href="#"><?=$rs_ve_call1['vehicle_regis'] ?></a>

																	<div class="time">
																		<i class="ace-icon fa fa-clock-o bigger-110"></i>
																	<?=$rs_ve_call1['cvhc_send_time'] ?>																</div>
																</div>

													   
													</td>
													<td><?=$rs_ve_call1['vehicle_brand'] ?></td>
													<td class="hidden-480"><?=$rs_ve_call1['vehicle_series'] ?></td>
													<td><?=$rs_ve_call1['vehicle_chassis'] ?></td>

													<td class="hidden-480">
														<?=$rs_ve_call1['cvhc_time_out'] ?>
													</td>
													<td>
													<?=$rs_ve_call1['vehicle_regis'] ?>
													</td>
													<td>
														 <?=$rs_ve_call1['brach_id'] ?>
													</td>
												</tr>
											<?php  
											   }
											?>	
										 
											</tbody>
										</table>
													</div>

													<!-- /section:pages/profile.friends -->
												 

													 
												</div><!-- /#friends -->

											 
											</div>
										</div>
							
					 
 