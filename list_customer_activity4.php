<?php
require_once 'init_inc.php';

$db=new DB;
//$rs=$db->select_alert('insurance_vehicle',2);
//echo "<pre>";
//print_r($rs);
?>
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
								<?=$_GET['activity_type']?>
								<small><i class="ace-icon fa fa-angle-double-right"></i>
									<?=$_GET['activity_name']?>
								</small>
							</h1>
						</div><!-- /.page-header -->
						<!-- /section:settings.box -->
<div class="col-xs-12">
								
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="smaller">
													ค้นหา
													 
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<p class="muted">
													     เลือกจังหวัด, เลือกอำเภอ ,
														 ชื่อลูกค้า ,นามสกุล ,ทะเบียนรถ,เบอร์โทร,วันที่...ถึง.... ,สถานะ
													</p>

													<hr>
<?php
echo date('Y');
$call_type=isset($_GET['activity_month'])? $_GET['activity_month'] : '1';
echo $call_type;
$rs=$db->select_alert('insurance_vehicle',2);
//foreach($rs as $rw){
	//echo $rw['vehicle_id'] . "-" . $rw['vehicle_regis'] . "->    " . $rw['vehicle_regis_date']. "<br>";
//}


?>
												 

													<!-- /section:elements.tooltip -->
												</div>
											</div>
										</div>
									<button class="btn btn-primary" onClick="javascript:location='create_activity.php' " >
												<i class="ace-icon fa  fa-pencil-square-o"></i>เปิดกิจกรรมใหม่
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
	<?php 
	foreach($rs as $row):
		$vehicle_id=$row['vehicle_id'];
$sql="SELECT insurance_customer.* FROM insurance_customer_info";
$sql.=" INNER JOIN insurance_customer ON insurance_customer_info.cus_id=insurance_customer.cus_id ";
$sql.=" WHERE insurance_customer_info.vehicle_id='$vehicle_id'";

$rs=mysqli_query($db->con,$sql);
$rw=mysqli_fetch_array($rs);

//echo mysqli_num_rows($rs);
//vehicle_id
	?>										
												<tr>
													<td class="center">
														<button class="btn btn-xs btn-info">
																<i class="ace-icon fa fa-eye "></i>
															</button>
													</td>

													<td>
					<a href="activity_call.php<?=$url_call?>">คุณ <?=$rw['cus_name'] ?></a>
													</td>
													<td><?=$row['vehicle_regis'] ?></td>
													<td class="hidden-480">080-0000-0XXX</td>
													<td>01/09/2559</td>

													<td class="hidden-480">
														<span class="label label-sm label-success">สนใจ</span>
													</td>

													<td>
													  <?=$row['vehicle_regis_date'] ?>
																	 
													</td>
												</tr>					
	<?php 
	endforeach;
	?>	
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
