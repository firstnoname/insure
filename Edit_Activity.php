<?php
require_once 'init_inc.php';

$db=new DB;
//$rs=$db->select_alert('view_vehicle_customer',3);
//echo "<pre>";
//print_r($rs);

//foreach($rs as $rw){
	//echo $rw['customer_name'] . "-" . $rw['vehicle_deliver'] . "<br>";
//}
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
						
					 <div class="row">

                            <div class="col-xs-12">
                           
                                <!-- PAGE CONTENT BEGINS -->
<?php
    $db = new DB;
    if (isset($_POST['SAVE'])) {
        $arr_data = array(
            'activity_name' => $_POST['activity_name'],
            'activity_type' => $_POST['activity_type'],
            'activity_month' => $_POST['activity_month']
            
        );
        $arr_con = array(
            'id' => $_GET['id']
        );
        
        echo $db->update('insurance_activity',$arr_data,$arr_con);
          echo " <script> alert('ระบบทำการบันทึกข้อมูลเรียบร้อย');javascript:location='Show_Activity.php';</script>";
    }

?>
<?php
    if(isset($_GET['id'])){
    $arr_data=array(
    'id'=>$_GET['id']
    );
    $data = $db->select_where('insurance_activity',$arr_data);

    foreach ($data as $dd ) {



?>
                                <form class="form-horizontal" role="form"  method="POST">
                                   
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ชื่อกิจกรรม</label>

                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-1"  class="col-xs-10 col-sm-5"  name="activity_name" value="<?=$dd['activity_name'] ?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> ประเภทการแจ้งเตือน</label>

                                        <div class="col-sm-9">
                                            <select name="activity_type" class="chosen-select form-control" id="activity_type" data-placeholder="Choose a State...">
                       <option value=""> </option>
                       <option value="CALL">โทรติดตาม</option>
                      
                     
                     </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-3"> แจ้งเตือนล่วงหน้า</label>

                                        <div class="col-sm-9">
                                         <select name="activity_month" class="chosen-select form-control" id="activity_month" data-placeholder="Choose a State...">
									   <option value=""> </option>
									   <option value="30">1 เดือน</option>
									   <option value="60">2 เดือน</option>
									   <option value="90">3 เดือน</option>
									   <option value="120">4 เดือน</option>
									   <option value="150">5 เดือน</option>
									   <option value="180">6 เดือน</option>
									   <option value="210">7 เดือน</option>
									   <option value="240">8 เดือน</option>
									   <option value="270">9 เดือน</option>
									   <option value="300">10 เดือน</option>
									   <option value="330">11 เดือน</option>
									   <option value="365">12 เดือน</option>
									 
									 </select>
                                        </div>
                                    </div>
                                    
                                     
                                    <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-success " value="บันทึก" name="SAVE">
                                        <i class="ace-icon fa fa-check bigger-110"></i>บันทึก
                                    </button>
                                    <button class="btn" type="reset">
                                        <i class="ace-icon fa fa-undo bigger-110"></i>
                                        ล้างค่า
                                    </button>
                                </div>
                                </form>
<?php
}}
?>
                            </div>
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
