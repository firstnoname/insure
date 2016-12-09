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
					     						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								CALL
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									โทรติดตามลูกค้าล่วงหน้า <i class="ace-icon fa fa-angle-double-right"></i>1 เดือน
								</small>
							</h1>
						</div><!-- /.page-header -->
						<!-- /section:settings.box -->
					<div class="col-xs-12">
						<div class="widget-box " style="height: 240px">
						    <div class="widget-header">
						        <h4 class="smaller">
						            ค้นหาข้อมูล
						        </h4>
						    </div>

						    <div class="widget-body">
						        <div class="widget-main">
						            <form class="form-horizontal">
						                <!-- <div class="table-responsive">  </div>-->
						                <table class="col-sm-12">
						                    <tr>
						                        <td>
						                            <div class="form-group">
						                                <label for="InputTitle" class="col-sm-7 control-label">คำนำหน้า</label>
						                                <div class="col-sm-5">
						                                    <input type="text" class="form-control" id="InputTitle" name="InputTitle">
						                                </div>
						                            </div>
						                        </td>
						                        <td>
						                            <div class="form-group">
						                                <label for="InputName" class="col-sm-7 control-label">ชื่อ</label>
						                                <div class="col-sm-5">
						                                    <input type="text" class="form-control" id="InputName" name="InputName">
						                                </div>
						                            </div> 
						                        </td>
						                        <td>     
						                            <div class="form-group">
						                                <label for="InputLastName" class="col-sm-7 control-label">ชื่อสกุล</label>
						                                <div class="col-sm-5">
						                                    <input type="text" class="form-control" id="InputLastName" name="InputLastName">
						                                </div>
						                            </div>
						                        <td>   
						           <div class="form-group">
						          <label for="InputName" class="col-sm-7 control-label">โทรศัพท์</label>
						          <div class="col-sm-5">
						          <input type="text" class="form-control" id="InputName" >
						          </div>
						        </div>
						        </td>
						            <td>   
						           <div class="form-group">
						          <label for="InputName" class="col-sm-7 control-label">วันที่หมดกรรมธรรม์</label>
						          <div class="col-sm-5">
						          <input type="text" class="form-control" id="InputName" >
						          </div>
						        </div>
						        </td>
						                    </tr>
						                    <tr>
						                        <td>
						             <div class="form-group">
						          <label for="InputName" class="col-sm-7 control-label">ทะเบียนรถ</label>
						           <div class="col-sm-5">
						          <input type="text" class="form-control" id="InputName" >
						</div>
						        </div> 
						        </td>
						                        <td>  
						                            <div class="form-group">
						                                <label for="InputFixcenter" class="col-sm-7 control-label">เลขเครื่อง</label>
						                                <div class="col-sm-5">
						                                    <input type="text" class="form-control" id="InputFixcenter" name="InputFixcenter">
						                                </div>
						                            </div>
						                        </td>
						                        <td>  
						                            <div class="form-group">
						                                <label for="InputFixother" class="col-sm-7 control-label">เลขแซสซี</label>
						                                <div class="col-sm-5">
						                                    <input type="text" class="form-control" id="InputFixother" name="InputFixother">
						                                </div>
						                            </div>
						                        </td>
						                        <td>  
						                            <div class="form-group">
						                                <label for="InputPremium" class="col-sm-7 control-label">ประเภทผู้ใช้รถ</label>
						                                <div class="col-sm-5">
						                                    <input type="text" class="form-control" id="InputPremium" name="InputPremium">
						                                </div>
						                            </div>
						                        </td>
						                        <td>  
						                            <div class="form-group">
						                                <label for="InputPremium" class="col-sm-7 control-label">ประเภทการติดตาม</label>
						                                <div class="col-sm-5">
						                                    <input type="text" class="form-control" id="InputPremium" name="InputPremium">
						                                </div>
						                            </div>
						                        </td>
						                    </tr>      
						                </table>
						                <div class="text-center" >
						                    <a href="searchactivity.php?"role="button" class="btn btn-primary" ><i class="fa fa-search-plus" aria-hidden="true"></i> ค้นหา</a>                                     

						                </div>
						            </form>

						            <!-- /section:elements.tooltip -->
						        </div>
						    </div>
						</div>
									<button class="btn btn-primary" onClick="javascript:location='newactivity.html' " >
												<i class="ace-icon fa  fa-pencil-square-o"></i>
												<a href="create_activity.php" style="color:#fff;"> เปิดกิจกรรมใหม่</a>
											<div></div></button>
										<table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th class="center">
														
																<i class="ace-icon fa fa-eye "></i>
															
													</th>
													<th>ชื่อ นามสกุลลูกค้า</th>
													<th>ทะเบียนรถ</th>
													<th class="hidden-480">เบอร์โทร</th>

													<th>
														<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
														อัพเดตล่าสุด
													</th>
													<th class="hidden-480">สถานะ</th>

													<th>วันที่ครบรอบกิจกรรม</th>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td class="center">
														<button class="btn btn-xs btn-info">
																<i class="ace-icon fa fa-eye "></i>
															</button>
													</td>

													<td>
														<a href="activity.html">คุณ xxxxx  xxxxxx</a>
													</td>
													<td>กม xxxx</td>
													<td class="hidden-480">080-0000-0XXX</td>
													<td>01/09/2559</td>

													<td class="hidden-480">
														<span class="label label-sm label-success">สนใจ</span>
													</td>

													<td>
													  31/10/2559
																	 
													</td>
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

		<?php include("scriptfooter.php"); ?>
	</body>
</html>
