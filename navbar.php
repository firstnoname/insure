<?php  
session_start();
$_SESSION['empid']='3540700259623';
 $sql_emp='SELECT * FROM insurance_emp_view WHERE id_card='.$_SESSION['empid'];
						   $rs_emp=mysql_query($sql_emp);
						   $rw_emp=mysql_fetch_array($rs_emp);
?>
<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="index.php" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Hornbill Insurance   
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						 
<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
								<i class="ace-icon fa fa-comment  icon-animated-hand-pointer"></i>
								<span class="badge badge-grey">4</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close" style="">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									4 Send SMS
								</li>

								<li class="dropdown-content ace-scroll" style="position: relative;"><div class="scroll-track" style="display: none;"><div class="scroll-bar"></div></div><div class="scroll-content" style="">
									<ul class="dropdown-menu dropdown-navbar">
										 	<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														 <i class="ace-icon fa fa-comments"></i>
															ส่งข้อความลูกค้ากลุ่ม 1 เดือน 
													</span>
													<span class="pull-right badge badge-info">12</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														  <i class="ace-icon fa fa-comments"></i>
														ส่งข้อความลูกค้ากลุ่ม 2 เดือน 
													</span>
													<span class="pull-right badge badge-success">88</span>
												</div>
											</a>
										</li>
                                        
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
													  <i class="ace-icon fa fa-comments"></i>
														ส่งข้อความลูกค้ากลุ่ม 4 เดือน 
													</span>
													<span class="pull-right badge badge-info">+11</span>
												</div>
											</a>
										</li>
										
											 
									</ul>
								</div></li>

								 
							</ul>
						</li>
							 
						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">8</span>
							</a>
				<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									 แจ้งเตือนลูกค้าโทรล่วงหน้า
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
							<?php
								$rs_menu_calls=$db->select('insurance_activity');
								$i=0;
								foreach($rs_menu_calls as $rs_menu_call):
								$activity_tmp_id=$rs_menu_call['id'];
								$activity_name=$rs_menu_call['activity_name'];
								$activity_type=$rs_menu_call['activity_type'];
								$activity_month=$rs_menu_call['activity_month'];
								 
								$i++;
								 
								?>									 

										 	<li>
<a href="list_customer_activity.php?activity_id=<?=$activity_tmp_id?>&activity_name=<?=$activity_name?>&activity_type=<?=$activity_type?>&activity_month=<?=$activity_month?>">
												<div class="clearfix">
													<span class="pull-left">
														 <i class="ace-icon fa fa-bullhorn"></i>
															<?=$rs_menu_call['activity_name']?> 
													</span>
													<span class="pull-right badge badge-info">12</span>
												</div>
											</a>

										</li>
	<?php
endforeach;
	?>	
							
									</ul>
								</li>

								 
							</ul>
						</li>
		 	<?php
							  
										 
										$sql_cus="SELECT 
										insurance_customer_activity.vehicle_id,
										insurance_customer_activity.cusno,
										insurance_customer_activity.activity_id,
										insurance_customer_activity.emp_id_card,
										insurance_activity_track_call.call_repeat,
										insurance_activity_track_call.date_appointment,
										insurance_customer_activity.track_last_status,
										insurance_main_cus_ginfo.Be,
										insurance_main_cus_ginfo.BeType,
										insurance_main_cus_ginfo.Cus_Name,
										insurance_main_cus_ginfo.Cus_Surename
										FROM
										insurance_customer_activity
										INNER JOIN insurance_activity_track_call ON insurance_activity_track_call.customer_activity_id = insurance_customer_activity.customer_activity_id
										INNER JOIN insurance_main_cus_ginfo ON insurance_main_cus_ginfo.CusNo = insurance_customer_activity.cusno
										where insurance_customer_activity.track_last_status='ไม่สะดวกคุย' and call_repeat=1 and insurance_customer_activity.activity_IsClose=0  LIMIT 5 ";
										
										$rs_cus=mysql_query($sql_cus);
									    $rc_cus=mysql_num_rows($rs_cus);
 ?>
						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success"><?php echo $rc_cus ; ?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									<?php echo $rc_cus ; ?> แจ้งเตือนการโทรซ้ำ
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
							 	<?php
											while($rw_cus=mysql_fetch_array($rs_cus)){
											 $img="avatar2.png";
											 if($rw_cus['Be']=='นาย'){$img="avatar4.png";}
											 if($rw_cus['Be']=='นาง'){$img="avatar1.png";}
											 if($rw_cus['Be']=='นางสาว'){$img="avatar3.png";}
											 
									?>
										<li>
											<a href="call_user.php?activity_id=<?=$rw_cus['activity_id'] ?>&cus_id=<?=$rw_cus['cusno'] ?> &vehicle_id=<?=$rw_cus['vehicle_id'] ?>" class="clearfix">
												<img src="assets/avatars/<?php echo  $img; ?>" class="msg-photo" alt="<?php echo $rw_cus['Be'].$rw_cus['Cus_Name'].' '.$rw_cus['Cus_Surename']; ?>" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue"><?php echo $rw_cus['Be'].$rw_cus['Cus_Name'].' '.$rw_cus['Cus_Surename']; ?></span>
														นัดหมายโทรติดตามลูกค้า อีกครั้ง
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>วันที่<?php echo $rw_cus['date_appointment']; ?></span>
													</span>
												</span>
											</a>
										</li>

							       <?php } ?>

								 
									</ul>
								</li>

							 
							</ul>
						</li>

						<!-- #section:basics/navbar.user_menu -->
						
					 
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
								<?=	$rw_emp['emp_name']; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="#">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->