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
							<li class="active">SMS</li>
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
													    ชื่อ SMS <button class="btn btn-info" >
											 
												ค้นหา
											 </button>  <button class="btn btn-yellow" onclick="javascript:location='Create_Campaign.php' " >
											 
												เพิ่มใหม่
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
														
																ชื่อ SMS
															
													</th>
													<th>ข้อความ</th>
													 <th></th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td class="center">
														รูปแบบที่ 1
													</td>

													<td>
														<a href="send_sms.php">เรียนลูกค้าคุณ {Customer}ทะเบียนรถ {Carno} ประกันภัยรถยนต์ของท่านจะสิ้นสุดใน {EndDate} </a>
													</td>
													 
													<td>
													<div class="hidden-sm hidden-xs btn-group">
													<button class="btn btn-xs btn-info" title="รายละเอียดคุ้มครอง">
																<i class="ace-icon fa fa-eye "></i>
															</button>  
													</div>		
															</td>
												</tr>

												<tr>
													<td class="center">
																		รูปแบบที่ 2
													</td>

													<td>
														<a href="send_sms.php">เรียนลูกค้าคุณ {Customer}ทะเบียนรถ {Carno} ประกันภัยรถยนต์ของท่านจะสิ้นสุดใน {EndDate} )</a>
													</td>
													 
													<td><div class="hidden-sm hidden-xs btn-group">
													<button class="btn btn-xs btn-info" title="รายละเอียดคุ้มครอง">
																<i class="ace-icon fa fa-eye "></i>
															</button>  
													</div></td>
												<tr>
													<td class="center">
																รูปแบบที่ 3
													</td>

													<td>
														<a href="send_sms.php">เรียนลูกค้าคุณ {Customer}ทะเบียนรถ {Carno} ประกันภัยรถยนต์ของท่านจะสิ้นสุดใน {EndDate} )</a>
													</td>
													 
													<td><div class="hidden-sm hidden-xs btn-group">
													<button class="btn btn-xs btn-info" title="รายละเอียดคุ้มครอง">
																<i class="ace-icon fa fa-eye "></i>
															</button>  
													</div></td>
											 
													 
												</tr>
											</tbody>
											
										</table>
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
