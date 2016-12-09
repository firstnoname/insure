
			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>						</button>


						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>						</button>


					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>					</div>
				</div>

					<ul class="nav nav-list">
					<li class="active">
						<a href="index.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> DashBoard </span>						</a>

						<b class="arrow"></b>					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">

							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								กิจกรรมประจำวัน							</span>

							<b class="arrow fa fa-angle-down"></b>						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="javascript:location='listactivitytrack.php"  onClick="javascript:location='listactivitytrack.php' "  class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
									กิจกรรมลูกค้าใหม่								</a>
									</li>




							<?php
								$sql_activity='SELECT * FROM insurance_activity WHERE id not in(100,101)';
								$rs_at=mysql_query($sql_activity);

								while($rs_menu_call=mysql_fetch_array($rs_at)){
								$activity_id=$rs_menu_call['id'];
								$activity_name=$rs_menu_call['activity_name'];


								$i++;

								?>

							<li class="">
								<a href="#" onClick="javascript:location='list_customer_activity.php?activity_id=<?=$activity_id;?>' " class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
									<?=$activity_name;?>					</a>							</li>

						       <?php
							     }
								?>
									<li class="">
								<a href="list_customer_activity_send.php"  onClick="javascript:location='list_customer_activity_send.php'  class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
									กิจกรรมส่ง sms/จดหมาย 								</a>							</li>

						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-check-square-o"></i>
							<span class="menu-text"> ติดตามกิจกรรมลูกค้า </span>

							<b class="arrow fa fa-angle-down"></b>						</a>

						<b class="arrow"></b>

						<ul class="submenu">



									<li class="">
									<a href="list_customer_iner.php?activity_id=101">
										<i class="menu-icon fa fa-caret-right"></i>
									ติดตามกิจกรรมลูกค้าสนใจ								</a>

								<b class="arrow"></b>							</li>
								<li class="">
						 		<a href="list_customer_activity.php?activity_id=100">
									<i class="menu-icon fa fa-caret-right"></i>
									ติดตามกิจกรรมลูกค้าเก่า								</a>

								<b class="arrow"></b>							</li>

								<li class="">
						 		<a href="list_customer_activity_reject.php?activity_id=110">
									<i class="menu-icon fa fa-caret-right"></i>
									ลูกค้ายุติการติดตาม								</a>

								<b class="arrow"></b>							</li>
						</ul>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-file-text-o"></i>
							<span class="menu-text">เอกสาร </span>

							<b class="arrow fa fa-angle-down"></b>						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="Listwaitactivity.php">
									<i class="menu-icon fa fa-caret-right"></i>
									ใบคำขอประกัน								</a>
							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									แจ้งสลักหลังกรมธรรม์								</a>

								<b class="arrow"></b>							</li>
								 <li class="">
								<a href="listact_request.php">
									<i class="menu-icon fa fa-caret-right"></i>
									แจ้งสลักหลัง พรบ.								</a>

								<b class="arrow"></b>							</li>
						</ul>
					</li>




					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> ชำระเงิน </span>

							<b class="arrow fa fa-angle-down"></b>						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="listcustomerpayment.php">
									<i class="menu-icon fa fa-caret-right"></i>
									รายการชำระเงิน								</a>

								<b class="arrow"></b>							</li>

							<li class="">
								<a href="listaccount_insure.php">
									<i class="menu-icon fa fa-caret-right"></i>
									สรุปยอดเงินส่งบัญชีตั้งเบิก								</a>

								<b class="arrow"></b>							</li>
                                <li class="">
								<a href="listinsure_pay.php">
									<i class="menu-icon fa fa-caret-right"></i>
									สรุปยอดเงินจ่ายบริษัทประกัน								</a>

								<b class="arrow"></b>							</li>

						</ul>
					</li>
               <li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text">ส่งมอบกรมธรรม์/พรบ </span>

							<b class="arrow fa fa-angle-down"></b>						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="listwaitdelivery_insure.php">
									<i class="menu-icon fa fa-caret-right"></i>
									รายการรอส่งมอบกรมธรรม์								</a>

								<b class="arrow"></b>							</li>





						</ul>
					</li>


			 <li class="">
						<a href="#">
							<i class="menu-icon fa fa-bar-chart"></i>
							<span class="menu-text"> รายงานสรุป </span>						</a>

						<b class="arrow"></b>					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tag"></i>
							<span class="menu-text"> ข้อมูลพื้นฐาน </span>

							<b class="arrow fa fa-angle-down"></b>						</a>

						<b class="arrow"></b>

						<ul class="submenu">
						  <li class="">
								<a href="Show_Activity.php">
									<i class="menu-icon fa fa-caret-right"></i>
									ข้อมูลกิจกรรม								</a>

								<b class="arrow"></b>							</li>
							<li class="">
								<a href="Show_Customer.php">
									<i class="menu-icon fa fa-caret-right"></i>
									ข้อมูลลูกค้า								</a>

								<b class="arrow"></b>							</li>

							<li class="">
								<a href="Show_Company.php">
									<i class="menu-icon fa fa-caret-right"></i>
									ข้อมูลบริษัทประกัน								</a>

								<b class="arrow"></b>							</li>

							<li class="">
								<a href="Show_Campaign.php">
									<i class="menu-icon fa fa-caret-right"></i>
									กำหนดแคมเปญ								</a>

								<b class="arrow"></b>							</li>
                                <li class="">
								<a href="Show_Act.php">
									<i class="menu-icon fa fa-caret-right"></i>
									กำหนดค่าพรบ.								</a>

								<b class="arrow"></b>							</li>
							<li class="">
								<a href="Show_SMS.php">
									<i class="menu-icon fa fa-caret-right"></i>
									กำหนดรูปแบบข้อความ(SMS)								</a>

								<b class="arrow"></b>							</li>
							<li class="">
								<a href="showletter.php">
									<i class="menu-icon fa fa-caret-right"></i>
									กำหนดรูปแบบจดหมาย								</a>

								<b class="arrow"></b>							</li>
							<li class="">
								<a href="Show_Vehicle.php">
									<i class="menu-icon fa fa-caret-right"></i>
									รถยนต์รถยนต์								</a>

								<b class="arrow"></b>							</li>

							 <li class="">
								<a href="Show_task.php">
									<i class="menu-icon fa fa-caret-right"></i>
									กำหนดภาระงาน								</a>

								<b class="arrow"></b>							</li>
						</ul>
					</li>
				</ul>

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>				</div>

<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){ }
				</script>

			</div>
