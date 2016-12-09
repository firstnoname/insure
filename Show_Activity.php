<?php
require_once 'init_inc.php';

$db=new DB;

?>

<!DOCTYPE html>
<html lang="en">
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
						
					    <a href="Create_activity.php"role="button" class="btn btn-yellow" ><i class="fa fa-circle-plus" aria-hidden="true"></i> เพิ่มบริษัทประกัน</a>
                       <table id="simple-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    
                                    <th>ชื่อกิจกรรม</th>
                                    <th class="hidden-480">ประเภท</th>
                                    <th>ระยะเวลา </th>
                                     
                                    <th class="center">แก้ไข</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $coms = $db->select('insurance_activity');
                                    foreach ($coms as $com):
                                ?>
                                    <tr>
                                        
                                        <td>
                                            <a href="Show_Campaign.php"><?=$com['activity_name']?></a>
                                        </td>
                                        <td><?=$com['activity_type']?></td>
                                        <td><?=$com['activity_month']/30 ?></td>
                                         
                                   
                                        <td class="text-center">
                                            <a href="Edit_Activity.php?id=<?=$com['id']?>" class="btn btn-xs btn-yellow">
                                                <i class="ace-icon fa fa-pencil "></i>
                                            </a><!--docs upload-->
                                        </td>
                                    </tr>
                                    <?php
                                        endforeach
                                    ?>
                        </table>    

                    </div>
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
