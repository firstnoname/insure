<?php
require_once 'init_inc.php';
$db=new DB;
require_once 'connDB.php';
?>

<!DOCTYPE html>
 <html ng-app="Insurance" lang="en">
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
						<!-- #section:settings.box -->
					     						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Activity
								<small><i class="ace-icon fa fa-angle-double-right"></i>
								แสดงรายการติดตามลูกค้า 
								</small>
							</h1>
						</div>
						
<div class="col-xs-12" ng-controller="activityCrtl">
	                             <div class="widget-box">
											<div class="widget-header">
												<h4 class="smaller">
													ค้นหา
													 
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
												<div >
																<div class="container">
																		<div class="col-md-2">จำนวนเรคคอร์ดต่อหน้า:
																			<select ng-model="entryLimit" class="form-control">
																				<option>5</option>
																				<option>10</option>
																				<option>20</option>
																				<option>50</option>
																				<option>100</option>
																			</select>
																		</div>
																		<div class="col-md-3">ค้นหา:
                                                                         
												<input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
 
																		</div>
																		 <div class="col-md-3">สถานะ:
                                                                         
											 

											 
												<select name="select_com_act" ng-model="data.main_status"  style="width:270px" class="form-control" >
                                                
                                                <option value="รอโทร">รอโทร</option>
                                                <option value="กำลังติดตาม">กำลังติดตาม</option>
                                                <option value="ติดตามแล้ว">ติดตามแล้ว</option>
                                                <option value="ยุติการติดตาม">ยุติการติดตาม</option>
                                                <option value="สนใจ">สนใจ</option>
                                                <option value="รับทราบ">รับทราบ</option>
                                                </select>

										 				
																		</div>
																	</div>
														</div>
														</div>
														</div>
															</div>
											  
																	<div class="row">
								<div class="col-md-12" ng-show="filteredItems > 0"> 
									<table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="center">
														
																<i class="ace-icon fa fa-eye "></i>
															
													</th>
													<th width="150px">ชื่อ นามสกุลลูกค้า</th>
													<th>ทะเบียนรถ</th>
													<th class="hidden-480">หมายเลขเครื่อง<a ng-click="sort_by('vehicle_full_chassis');"><i class="glyphicon glyphicon-sort"></i></a></th>

													<th>
														<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
														อัพเดตล่าสุด
														
													</th>
													<th class="hidden-480">สถานะ</th>

													<th width="100px">วันออกรถ<a ng-click="sort_by('regis_date');"><i class="glyphicon glyphicon-sort"></i></a></th>
													<th width="130px">วันจดทะเบียน<a ng-click="sort_by('date_deliver');"><i class="glyphicon glyphicon-sort"></i></a></th>
													<th>
														<i class="ace-icon 	fa fa-users  hidden-480"></i>
														ผู้รับผิดชอบ
														
													</th>
                                                    <th>
														<i class="ace-icon 	fa fa-phone hidden-480"></i>
														
													</th>
												</tr>
											</thead>

											<tbody>									
 										
												<tr ng-repeat="data in filtered = (list | filter:data | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
													<td class="center"><a href="call_user.php?activity_id=<?=$_GET['activity_id'] ?>&cus_id={{data.cusno}}&vehicle_id={{data.vehicle_id}}&cus_type=2&last_status={{data.track_last_status}}&close={{data.activity_IsClose}}">
														<button class="btn btn-xs btn-info" >
																<i class="ace-icon fa fa-eye "></i>
															</button>
															</a>
													</td>

													<td>
 														{{data.Customer}}
													</td>
													 
													<td>{{data.vehicle_regis}}<br>{{data.vehicle_series}}>>{{data.vehicle_brand}}</td>
													<td >{{data.vehicle_full_chassis}}</td>
													<td>{{data.activity_Date}}</td>
												
													<td class="hidden-480">
													<span class="label label-{{data.info}} arrowed-right arrowed-in"> {{data.main_status}} {{data.track_last_status}}</span>
													</td>
													<td>{{data.regis_date}}</td>
													<td>{{data.date_deliver}}</td>
													 
													<td> {{data.empUser}}</td>
                                                    <td> {{data.call_count}}</td>
												</tr>					
 
											</tbody>
											
										</table>
											</div>
												<div class="col-md-12" ng-show="filteredItems == 0">
													<div class="col-md-12">
														<h4>No customers found</h4>
													</div>
												</div>
												<div class="col-md-12" ng-show="filteredItems > 0">    
													<div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
													
													
												</div>
											</div>
										</div>
									</div>
									 
					<div class="hr hr32 hr-dotted"></div>

							 

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
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.js"></script>
		<script src="assets/js/ace/ace.js"></script>
		<script src="assets/js/ace/ace.ajax-content.js"></script>
		<script src="assets/js/ace/ace.sidebar.js"></script>
		<script src="assets/js/ace/ace.sidebar-scroll-1.js"></script>
 

            <!-- for search -->
		<script src="assets/js/angular.min.js"></script>
        <script src="assets/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
        <script src="app/app.js"></script>        
		<script>
		<?php
		   $url="getListActivity.php?id=".$_GET['activity_id'];
		?>
		      getSearch('activityCrtl','<?php echo $url ?>',20);
		</script>
	</body>
</html>
