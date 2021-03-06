<?php
 require_once 'init_inc.php';

$db=new DB;
?>
<!DOCTYPE html>
 <html ng-app="Insurance" ng-app lang="en">
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
        <?php include("navbar.php"); ?>
        <!-- /section:basics/navbar.layout -->
        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try {
                    ace.settings.check('main-container', 'fixed')
                } catch (e) {
                }
            </script>

            <!-- #section:basics/sidebar -->
            <?php include("slidebar.php"); ?>
            <!-- /section:basics/sidebar -->
            <div class="main-content">
                <div class="main-content-inner">
                    <!-- #section:basics/content.breadcrumbs -->
                    <div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                            try {
                                ace.settings.check('breadcrumbs', 'fixed')
                            } catch (e) {
                            }
                        </script>

                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Home</a>
                            </li>
                            <li class="active">กำหนด พ.ร.บ.</li>
                        </ul><!-- /.breadcrumb -->



                        <!-- /section:basics/content.searchbox -->
                    </div>

                    <!-- /section:basics/content.breadcrumbs -->

                    <div class="page-content">


								  	<div ng-controller="vehicleCrtl">
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
																	<br/>
																	<div class="row">
																		<div class="col-md-12" ng-show="filteredItems > 0">
																		<a href="Create_Act.php"role="button" class="btn btn-xs btn btn-info" ><i class="fa fa-circle-plus" aria-hidden="true"></i> เพิ่ม พ.ร.บ.</a>
																		  <table id="simple-table" class="table table-striped table-bordered table-hover">
																			<thead>
																				<tr>
																					<th >
																					     รหัส
																					</th>
																					<th>ประเภท</th>
																					<th >ขนาดรถยนต์</th>
																					<th> การใช้งาน</th>
																					<th >เบี้ยประกัน</th>
																					<th >อากร</th>
																					<th >ภาษี 7%</th>
																					<th >เบี้ยรวม</th>
																					<th class="center">แก้ไข</th>
																				</tr>
																			</thead>

																			<tbody>

																					<tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
<!--
																						<td>
																							<a href="#">{{data.act_id}}</a>
																						</td> -->
                                            <td>{{data.act_code}}</td>
																						<td>{{data.act_name}} </td>
																						<td>{{data.act_type_name}}</td>
																						<td> {{data.use_type_name}} </td>
																						<td>{{data.act_insure_rate}}</td>
																						<td >{{data.act_tax}}</td>
																						<td >{{data.act_vat}}</td>
																						<td >{{data.act_net_price}}</td>
																						<td class="text-center">
																							<a href="Edit_Acts.php?id={{data.act_id}}" class="btn btn-xs btn-yellow">
																								<i class="ace-icon fa fa-pencil "></i>
																							</a><!--docs upload-->
                                              <button class="btn btn-xs btn-danger" onclick="delete_act()">
                      											   <i class="ace-icon fa fa-trash-o"></i>
                        											</button>
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
                    <!-- /.page-content -->
                </div>
            </div>
		</div>

            <!-- /.main-content -->
            <?php include("footer.php"); ?>
            <!-- /.main-container -->
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
		      getSearch('vehicleCrtl','getAct.php',10);
		</script>

    <script>
      function delete_act(value){
        alert(value);


        // var chk_click = confirm("ต้องการลบ พ.ร.บ.​ ?");
        // if(chk_click==true){
        //   window.location = 'Delete_Act.php?id='+act_id;
        // }else{
        //
        // }
      }
    </script>

    </body>
</html>
