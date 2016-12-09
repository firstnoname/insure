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
								Payments
								<small><i class="ace-icon fa fa-angle-double-right"></i>
								แสดงรายการชำระเงินลูกค้าผ่อนชำระ
								</small>
							</h1>
						</div>
						
												<div class="tabbable">
													<ul class="nav nav-tabs padding-16">
														<li class="active">
															<a data-toggle="tab" href="#edit-payment">
													 
																รายการรอชำระเงิน															</a>														</li>

														<li>
															<a data-toggle="tab" href="#edit-compleate">
														     
																รายการชำระเงินเรียบร้อย															</a>														</li>

														
													</ul>

													<div class="tab-content profile-edit-tab-content">
														<div id="edit-payment" class="tab-pane in active" ng-controller="activityCrtl">
															 	<div class="space-10"></div>
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
																		 
																	</div>
														</div>
														</div>
														</div>
                                              <div >
								<div  ng-show="filteredItems > 0"> 
									<table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="center">
														
																Action
															
													</th>
													<th>วันที่ทำรายการ</th>
													<th>ชื่อ นามสกุลลูกค้า</th>
													<th class="hidden-480">เบี้ยรวมสุทธิ</th>
													<th>ส่วนลดรวม</th>
												    <th>ยอดชำระทั้งสิ้น</th>
                                                    <th>ยอดค้างชำระ</th>
													
													
													

													
													<th>
														<i class="ace-icon 	fa fa-users  hidden-480"></i>
														ผู้รับผิดชอบ
														
													</th>
												</tr>
											</thead>

											<tbody>									
 										
												<tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
													<td class="center">
												 
													<a class="{{data.info_class}}"  href="payment_desc.php?cus_id={{data.cus_id}}">
														<button class="btn btn-xs btn-yellow" >
																<i class="ace-icon fa fa-eye"></i>
															</button>
												    </a>
															
													</td>

													<td>
 														{{data.create_date}}
													</td>
													 
													<td>{{data.Customer}}</td>
													
													<td >{{data.net_price}}</td>
													<td>{{data.total_discount}}</td>
												    <td ><strong class="alert-success">{{data.total_price}}</strong></td>
													<td><strong class="alert-warning">{{data.total_remain}}</strong></td>
													 
													<td> {{data.EmpUser}}</td>
												</tr>					
 
											</tbody>
											
										</table>
                                        
                                        <div  ng-show="filteredItems == 0">
													<div class="col-md-12">
														<h4>No customers found</h4>
													</div>
												</div>
												<div  ng-show="filteredItems > 0">    
													<div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
													
													
												</div>
											</div>
											</div>
												
															</div>
												        </div>
                                                        <div id="edit-compleate" class="tab-pane" ng-controller="activityCrtl1">
															 	<div class="space-10"></div>
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
																			<input type="text" ng-model="search1" ng-change="filter()" placeholder="Filter" class="form-control" />
																		</div>
																		 
																	</div>
														</div>
														</div>
														</div>
                                              <div >
								<div  ng-show="filteredItems > 0"> 
									<table id="simple-table1" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="center">
														
																Action
															
													</th>
													<th>วันที่ทำรายการ</th>
													<th>ชื่อ นามสกุลลูกค้า</th>
													
												    <th>ทะเบียนรถ</th>
                                                    <th>ชำระแล้ว</th>
                                                    <th>หมายเหตุ</th>												
													<th>
														<i class="ace-icon 	fa fa-users  hidden-480"></i>
														ผู้รับผิดชอบ
														
													</th>
												</tr>
											</thead>

											<tbody>									
 										
												<tr ng-repeat="data in filtered = (list | filter:search1 | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
													<td class="center">
												 
													<a class="{{data.info_class}}"  href="payment_edit.php?id={{data.repay_id}}&cus_id={{data.cus_id}}">
														<button class="btn btn-xs btn-yellow" >
																<i class="ace-icon fa fa-eye"></i>
															</button>
												    </a>
															<a class="{{data.print_class}}"  href="print_deposit_pay.php?id={{data.repay_id}}&cus_id={{data.cus_id}}"  title="ออกใบรับฝาก">
														<button class="btn btn-xs btn-info" >
																<i class="ace-icon fa fa-print"></i>
															</button>
															</a>
													</td>

													<td>
 														{{data.repayment_date}}
													</td>
													 
													<td>{{data.Customer}}</td>
													
													<td >{{data.vehicle_regis}}</td>
													<td>{{data.repayment_amount}}</td>
												    <td>{{data.repayment_remark}}</td>
													 
													<td> {{data.employee}}</td>
												</tr>					
 
											</tbody>
											
										</table>
                                        
                                        <div  ng-show="filteredItems == 0">
													<div class="col-md-12">
														<h4>No customers found</h4>
													</div>
												</div>
												<div  ng-show="filteredItems > 0">    
													<div pagination="" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems1" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
													
													
												</div>
											</div>
											</div>
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
 

		<script src="assets/js/angular.min.js"></script>
        <script src="assets/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
        <script src="app/app.js"></script>        
		<script>
	 
		      getSearch('activityCrtl','getlistpayment.php',20);
			  getSearch('activityCrtl1','getpayment.php',20);
		</script>
	</body>
</html>
