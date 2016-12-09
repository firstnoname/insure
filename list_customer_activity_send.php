<?php
require_once 'init_inc.php';
$db=new DB;
require_once 'connDB.php';

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
    <form method="post" action="#" id="list_customer">
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
								SMS และ จดหมาย
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
												<div class="widget-box-main">
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
                                      <div class="space-4"></div>
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
                        <div class="space-8"></div>
                        <tr>
                          <div align="right">
                            <button class="btn btn-info" id="btnSMS" name="btnSMS">
                          			<i class="ace-icon fa bigger-110"></i>ส่ง SMS</button>
                            <button class="btn btn-info" id="btnLetter" name="btnLetter">
                              	<i class="ace-icon fa bigger-110"></i>ส่งจดหมาย</button>
                              <select class="" id="selectAuto">
                                <option value="">เลือกอัตโนมัติ</option>
                                <option value="selectAutoLetter">เลือกส่งจดหมาย</option>
                                <option value="selectAutoSMS">เลือกส่ง SMS</option>
                              </select>
                          </div>
                        </tr>

                        <div class="space-6"></div>
												<tr>
													<th class="center" style="width:40px;">
																<!--<i class="ace-icon fa fa-eye "></i>-->
                                <div>
                                  <label><input type="checkbox" id="check_all" name="check_all" > </label>
                                </div>
													</th>
													<th>ชื่อ นามสกุลลูกค้า</th>
													<th>ทะเบียนรถ</th>
													<th class="hidden-480">เบอร์โทร</th>
                          <th class="hidden-480">ที่อยู่</th>
                          <th class="hidden-480">วันที่หมดกรมธรรม์</th>
                          <th class="hidden-480">สถานะการส่ง</th>

													<th>
														<i class="ace-icon 	fa fa-users  hidden-480"></i>
														ผู้ส่ง

													</th>
												</tr>
											</thead>

											<tbody>

												<tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
													<td >
														<!--<button class="btn btn-xs btn-info" >
																<i class="ace-icon fa fa-eye "></i>-->
                                <div class="center">
                                  <label><input class="checkbox" type="checkbox" value="{{data.cusno}}" id="checkBoxID" name="checkBox[]"></label>
                                </div>
															<!--</button>-->
															</a>
													</td>

													<td>
 														{{data.Customer}}
													</td>
													<td>{{data.vehicle_regis}}<br>{{data.vehicle_series}}>>{{data.vehicle_brand}}</td>
													<td class="dataTel">{{data.cus_tel}}</td>
                          <td >{{data.address_full_name}}</td>
                          <td >{{data.insure_enddate}}</td>
													<td class="hidden-480">
  													<span class="label label-info arrowed-right arrowed-in">{{data.send_sms_status}} :: {{data.send_letter_status}}</span>
													</td>

													<td> {{data.empUser}}</td>
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

            <!-- for search -->
		<script src="assets/js/angular.min.js"></script>
    <script src="assets/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
    <script src="app/app.js"></script>
    <script src="assets/js/jquery-3.1.1.min.js"></script>
	  <script>
		      getSearch('activityCrtl','getListActivitySend.php',20);
		</script>
    <script>
      $(document).ready(function(){
        //Check auto select.

        $("#selectAuto").change(function(){

          //Get text from td.
          // var check = $(".dataTel").text();
          // if(check){
          //
          // }else{
          //
          // }

          //Get value from select option.
          var selAuto = $('select[id=selectAuto]').val();
          //alert($('select[id=selectAuto]').val());
          alert(selAuto);
          window.locatoin
          $.ajax({
            url: "send_sms.php",
            data: ({ selAuto: selAuto })
            });
        });

        //Check Empty checkbox.
        var checkClick =0;
        $("#check_all").click(function(){
          if(this.checked){
              $('.checkbox').each(function(){
                this.checked = true;
                checkClick=1;
              });
          }else{
            $('.checkbox').each(function(){
              this.checked = false;
              checkClick=0;
            });
          }
        });

        $("#btnSMS").click(function(){
          var chkBox = $('input[type="checkbox"]:checked');
          if(chkBox.length>0){
            $("#list_customer").attr("action","send_sms.php");
            $("#list_customer").submit();
          }else{
            alert("กรุณาเลือกลูกค้า เพื่อส่ง SMS!");
          }
        });

        $("#btnLetter").click(function(){
          var chkBox = $('input[type="checkbox"]:checked');
          if(chkBox.length>0){
            $("#list_customer").attr("action","send_letter.php");
            $("#list_customer").submit();
          }else{
            alert("กรุณาเลือกลูกค้า เพื่อส่งจดหมาย!");
          }
        });

        //Click Image.
        $("images").click(function(){
          alert("Test Click Image.");
        });

    });
    </script>


	</body>
</html>
