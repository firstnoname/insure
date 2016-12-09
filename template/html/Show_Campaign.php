<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard - Hornbill Insurance </title>

	 
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
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->

					 

						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->

						<div class="col-xs-12">		
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="smaller">
													ค้นหาข้อมูล
													 
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<p class="muted">
													    เลือกบริษัทประกัน,ประเภทประกัน<button class="btn btn-info" >
											 
												ค้นหา
											 </button>  <button class="btn btn-yellow" onclick="javascript:location='Create_Campaign.php' " >
											 
												เพิ่มแคมเปญ
											 </button>
													</p>
                                                   
													<hr>

												 

													<!-- /section:elements.tooltip -->
												</div>
											</div>
										</div>
								 <table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="center">
														
																ประเภท
															
													</th>
													<th>ชื่อ  แคมเปญ (ผลิตภัณฑ์) </th>
													<th>ทุนประกัน</th>
													<th class="hidden-480">เบี้ยประกัน ซ่อมศูนย์</th>

													<th>
										 
														เบี้ยประกัน ซ่อมอู่
														
													</th>
													<th class="hidden-480">เบี้ย พรบ</th>

													<th>ส่วนลด%</th>
													<th>
														 
													
														
													</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td class="center">
														ประกันชั้น 1
													</td>

													<td>
														<a href="Create_Campaign.php">แคมเปญรหัส 902 (ประเภท1)</a>
													</td>
													<td>200,000-300,000</td>
													<td class="hidden-480">-</td>
													<td>18,500.30</td>

													<td class="hidden-480">
														987.0
													</td>

													<td>
													 10%
																	 
													</td>
													<td>
													<div class="hidden-sm hidden-xs btn-group">
													<button class="btn btn-xs btn-info" title="รายละเอียดคุ้มครอง">
																<i class="ace-icon fa fa-eye "></i>
															</button> <button class="btn btn-xs btn-success" title="ก๊อปปี้ข้อมูลเพื่อสร้างใหม่" onClick="javascript:location='Create_Campaign.php'">
																<i class="ace-icon 	fa fa-plus-circle"></i>
															</button>
													</div>		
															</td>
												</tr>

												<tr>
													<td class="center">
																ประกันชั้น 1
													</td>

													<td>
														<a href="Create_Campaign.php">แคมเปญรหัส 902 (ประเภท1)</a>
													</td>
													<td>310,000-400,000</td>
													<td class="hidden-480">19,000.30</td>
													<td> -</td>

													<td class="hidden-480">
															987.0
													</td>

													<td>
													  10%
																	 
													</td>
													<td><div class="hidden-sm hidden-xs btn-group">
													<button class="btn btn-xs btn-info" title="รายละเอียดคุ้มครอง">
																<i class="ace-icon fa fa-eye "></i>
															</button> <button class="btn btn-xs btn-success" title="ก๊อปปี้ข้อมูลเพื่อสร้างใหม่" onClick="javascript:location='Create_Campaign.php' ">
																<i class="ace-icon 	fa fa-plus-circle"></i>
															</button>
													</div></td>
												<tr>
													<td class="center">
														ประกันชั้น 2
													</td>

													<td>
														<a href="Create_Campaign.php">แคมเปญรหัส 903 (ประเภท2)</a>
													</td>
													<td>200,000-300,000</td>
													<td class="hidden-480">10,000.30</td>
													<td>- </td>

													<td class="hidden-480">
														 987.0
													</td>

													<td>
													 5%
																	 
													</td>
													<td><div class="hidden-sm hidden-xs btn-group">
													<button class="btn btn-xs btn-info" title="รายละเอียดคุ้มครอง">
																<i class="ace-icon fa fa-eye "></i>
															</button> <button class="btn btn-xs btn-success" title="ก๊อปปี้ข้อมูลเพื่อสร้างใหม่" onClick="javascript:location='Create_Campaign.php'">
																<i class="ace-icon 	fa fa-plus-circle"></i>
															</button>
													</div></td>
											 
													 
												</tr>
											</tbody>
											
										</table>
										<ul class="pagination">
												<li class="disabled">
													<a href="#">
														<i class="ace-icon fa fa-angle-double-left"></i>
													</a>
												</li>

												<li class="active">
													<a href="#">1</a>
												</li>

												<li>
													<a href="#">2</a>
												</li>

												<li>
													<a href="#">3</a>
												</li>

												<li>
													<a href="#">4</a>
												</li>

												<li>
													<a href="#">5</a>
												</li>

												<li>
													<a href="#">
														<i class="ace-icon fa fa-angle-double-right"></i>
													</a>
												</li>
											</ul>
									</div>
										 
									</div>
									 
					<div class="hr hr32 hr-dotted"></div>

							 

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
						<!-- /section:settings.box -->
					 
					</div><!-- /.page-content -->
				</div>
			</div>
			<!-- /.main-content -->
               <?php include("footer.php"); ?>      
			<!-- /.main-container -->

		<!-- basic scripts -->

		<?php include("scriptfooter.php"); ?>
	</body>
</html>
