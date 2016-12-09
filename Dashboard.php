 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <div class="page-header">
							<h1>
								Dashboard
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									overview &amp; stats
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								 
								<div class="row">
									<div class="col-sm-7 infobox-container">
										<!-- #section:pages/dashboard.infobox -->
										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-phone"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">32</span>
												<div class="infobox-content">โทรติดตามลูกค้า เพิ่มขึ้น </div>
											</div>

											<!-- #section:pages/dashboard.infobox.stat -->
											<div class="stat stat-success">8%</div>

											<!-- /section:pages/dashboard.infobox.stat -->
										</div>

										<div class="infobox infobox-blue">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-comments"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">11</span>
												<div class="infobox-content">ส่ง SMS แจ้งลูกค้า เพิ่มขึ้น</div>
											</div>

											<div class="badge badge-success">
												+32%
												<i class="ace-icon fa fa-arrow-up"></i>
											</div>
										</div>

										<div class="infobox infobox-pink">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-envelope-o"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">8</span>
												<div class="infobox-content">ส่งจดหมายให้ลูกค้า ลดลง</div>
											</div>
											<div class="stat stat-important">4%</div>
										</div>
 

										<div class="infobox infobox-orange2">
											<!-- #section:pages/dashboard.infobox.sparkline -->
											<div class="infobox-chart">
												<span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"></span>
											</div>

											<!-- /section:pages/dashboard.infobox.sparkline -->
											<div class="infobox-data">
												<span class="infobox-data-number">6,251</span>
												<div class="infobox-content">สรุปยอด เดือนนี้</div>
											</div>

											<div class="badge badge-success">
												7.2%
												<i class="ace-icon fa fa-arrow-up"></i>
											</div>
										</div>
 

										<!-- /section:pages/dashboard.infobox -->
									 

										<!-- #section:pages/dashboard.infobox.dark -->
										 
 
										<!-- /section:pages/dashboard.infobox.dark -->
									</div>

									<div class="vspace-12-sm"></div>

									<div class="col-sm-5">
										<div class="widget-box">
											<div class="widget-header widget-header-flat widget-header-small">
												<h5 class="widget-title">
													<i class="ace-icon fa fa-signal"></i>
													แสดงปริมาณกิจกรรมโทร
												</h5>

												<div class="widget-toolbar no-border">
													<div class="inline dropdown-hover">
														<button class="btn btn-minier btn-primary">
															This Week
															<i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
														</button>

														<ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
															<li class="active">
																<a href="#" class="blue">
																	<i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
																	This Week
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	Last Week
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	This Month
																</a>
															</li>

															<li>
																<a href="#">
																	<i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
																	Last Month
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<!-- #section:plugins/charts.flotchart -->
													<div id="piechart-placeholder"></div>

													<!-- /section:plugins/charts.flotchart -->
												 

												 

														<!-- /section:custom/extra.grid -->
													</div>
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div><!-- /.row -->

								<!-- #section:custom/extra.hr -->
								<div class="hr hr32 hr-dotted"></div>

								<!-- /section:custom/extra.hr -->
								<div class="row">
									<div class="col-sm-8">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													รายชื่อลูกค้าติดตาม ล่าสุด 20 ลำดับ
												</h4>

												 
											</div>
											 
											<div class="widget-body">
												<div class="widget-main no-padding">
													   
        <div class="col-md-2">PageSize:
            <select ng-model="entryLimit" class="form-control">
                <option>5</option>
                <option>10</option>
                <option>20</option>
                <option>50</option>
                <option>100</option>
            </select>
        </div>
        <div class="col-md-3">Filter:
            <input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
        </div>
        <div class="col-md-4">
            <h5>Filtered {{ filtered.length }} of {{ totalItems}} total customers</h5>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12" ng-show="filteredItems > 0">
		 <table class="table table-striped table-bordered">
            <thead>
			<th></th>
            <th>ชื่อลูกค้า&nbsp;<a ng-click="sort_by('customer');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>วันที่ติดตาม&nbsp;<a ng-click="sort_by('activity_Date');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>ทะเบียนรถ&nbsp;<a ng-click="sort_by('vehicle_regis');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>กิจกรรม&nbsp;<a ng-click="sort_by('activity_name');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>ผู้รับผิดชอบ&nbsp;<a ng-click="sort_by('emp_user');"><i class="glyphicon glyphicon-sort"></i></a></th>
            <th>สถานะ&nbsp;<a ng-click="sort_by('track_last_status');"><i class="glyphicon glyphicon-sort"></i></a></th>
            
            </thead>
            <tbody>
                <tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                    <td><button class="btn btn-warning btn-xs" onclick="javascript:location='call_user.php?activity_id=1&amp;cus_id=5358815&amp;vehicle_id=161584' ">
												<i class="ace-icon fa fa-pencil-square-o   bigger-110 icon-only"></i>
											</button></td>
					<td>{{data.customer}}</td>
                    <td>{{data.activity_Date}}</td>
                    <td>{{data.activity_name}}</td>
                    <td>{{data.vehicle_regis}}</td>
                    <td>{{data.emp_user}}</td>
                    <td>{{data.track_last_status}}</td>
                    
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
					
													 
												</div><!-- /.widget-main -->
											</div><!-- /.widget-body -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->

									 
								<div class="hr hr32 hr-dotted"></div>

							 

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
						
