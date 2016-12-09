<?php
require_once 'init_inc.php';
$jqLib = 'https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js';
$db=new DB;

include_once "connDB.php";
 
?>
<!DOCTYPE html>
 <html ng-app="Insurance" ng-app lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Activity- Hornbill Insurance </title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

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
		    <?php include("navbar.php") ; ?>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
		 

				<?php include("slidebar.php"); ?>
				<!-- /section:basics/sidebar.layout.minimize -->
			 

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
							<li class="active">Documents </li>
						</ul><!-- /.breadcrumb -->

				 

						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
					 
						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Documents
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									 ใบคำขอใบประกัน 
								</small>
							</h1>
						</div><!-- /.page-header -->

						 
						<div class="col-xs-12">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="smaller">
													ค้นหาข้อมูลลูกค้า
													 
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													 
											   	<div ng-controller="activityCustomerCrtl">
																<div class="container">
																		<div class="col-md-2">จำนวนเรคคอร์ดต่อหน้า
																			<select ng-model="entryLimit" class="form-control">
																				<option>5</option>
																				<option>10</option>
																				<option>20</option>
																				<option>50</option>
																				<option>100</option>
																			</select>
																		</div>
																		<div class="col-md-3">ค้นหา
																			<input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
																		</div>
																		  
															 
																	</div>
																	<br/>
																	<div class="row">
																		<div class="col-md-12" ng-show="filteredItems > 0">
																		 
																		  <table id="simple-table" class="table table-striped table-bordered table-hover">
																			<thead>
																				<tr>
																					<th >
																					     รหัส
																					</th>
																					<th>ชื่อลูกค้า</th>
																					<th class="hidden-480">ยี่ห้อ</th>
																				    <th >รุ่น</th>
																					<th >หมายเลขคัสซี</th>
																					<th >ประเภทลูกค้า</th>
																				 	<th >ปริ้นใบคำขอ</th>
																				</tr>
																			</thead>
								 
										 
													 
						 
											  <tbody>
										
											 
																				<tr id="data1"  ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
																				 
																					<td>
																						 {{data.cusno}} 
																					</td>
																					<td>{{data.customer}} </td>
																					<td>{{data.vehicle_brand}}</td>
																		 
																					<td>
																						{{data.vehicle_series}}  
																					</td>
																				 <td>
																						{{data.vehicle_full_chassis}}  
																					</td>
																				 
																					 <td>
																				      {{data.Customer_type}}  
																					</td>
																					<td>
																														 <div class="btn-group">
											<button class="btn btn-sm btn-info">แบบพิมพ์</button>

											<button data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle">
												<i class="ace-icon fa fa-angle-down icon-only"></i>
											</button>

											<ul class="dropdown-menu dropdown-info">
												<li>
													<a href="main-print.php?id={{data.id}}">ใบคำขอประกัน</a>
												</li>

												<li>
													<a href="print_form_bank.php?id={{data.id}}">พรบ.</a>
												</li>
												 
												 
											</ul>
																				
																					</td>
																						
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

													<!-- /section:elements.tooltip -->
												</div>
											</div>
										</div>
										
				 
										 
									</div>
									 
					<div class="hr hr32 hr-dotted"></div>

							 

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
							Application &copy; 2016
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

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
 


		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.js'>"+"<"+"/script>");
 

	 
		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="assets/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="docs/assets/js/themes/sunburst.css" />
       <!-- for search -->
 
		<script src="assets/js/angular.min.js"></script>
        <script src="assets/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
        <script src="app/app.js"></script>        
		<script>
		    
		      getSearch('activityCustomerCrtl','getsale.php',20);
		       	 
			 
		</script>
 
	</body>
</html>
