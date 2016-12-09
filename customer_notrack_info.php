 <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<?php
 include_once "connDB.php";
  //  $activity_id=$_GET['activity_id'];
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
														ข้อมูลลูกค้า	/ ข้อมูลรถยนต์</a></li>
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
																	<?=$rw_sub_ac['relates_type'] ?></span></h4>

															<div class="profile-user-info">
																<div class="profile-info-row">
																	<div class="profile-info-name"> หมายเลขติดต่อ </div>

																	<div class="profile-info-value">
																		<span><?=$rw_sub_ac['cus_tel'] ?></span></div>
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
																		<span><?=$rw_sub_ac['vehicle_regis'] ?></span></div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> ข้อมูลรถยนต์ </div>

																	<div class="profile-info-value">
																		<span>ยี่ห้อ:<?=$rw_sub_ac['vehicle_brand'].' รุ่น:'. $rw_sub_ac['vehicle_series'].' หมายเลข chassis:'. $rw_sub_ac['vehicle_full_chassis'] ?></span>																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name">วันที่ออกรถ </div>

																	<div class="profile-info-value">
																		<span><?=$rw_sub_ac['regis_date'] ?></span></div>
																</div>
																<div class="profile-info-row">
																	<div class="profile-info-name">วันที่จดทะเบียน </div>

																	<div class="profile-info-value">
																		<span><?=$rw_sub_ac['date_deliver'] ?></span></div>
																</div>
															</div>

															<div class="hr hr-8 dotted"></div>

															<div class="profile-user-info">

															</div>
														</div><!-- /.col -->
													</div><!-- /.row -->

												</div><!-- /#home -->

											 </div>
											</div>
										</div>
