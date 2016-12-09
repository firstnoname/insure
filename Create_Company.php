<?php
require_once 'init_inc.php';

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
                            <li class="active">Dashboard</li>
                        </ul><!-- /.breadcrumb -->



                        <!-- /section:basics/content.searchbox -->
                    </div>

                    <!-- /section:basics/content.breadcrumbs -->
                    <div class="page-content">
                        <div class="page-header">
                            <h1>
                                Master Data
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                    <a href="Show_company.php">บริษัทประกัน</a>
                                </small>
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                    <a href="Create_company.php">เพิ่มบริษัทประกัน</a>
                                </small>
                            </h1>
                        </div>
                        <!-- #section:settings.box -->
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <?php
                                    
                                    $db = new DB;
                                    
                                    if (isset($_POST['SAVE'])) {
                                        $arr_data = array(
                                            'company_name' => $_POST['company_name'],
                                            'company_address' => $_POST['company_address'],
                                            'company_tel' => $_POST['company_tel'],
                                            'company_coordination' => $_POST['company_coordination'],
                                            'company_coordination_tel' => $_POST['company_coordination_tel']
 
                                        );
                                        
                                        $db->insert('insurance_company',$arr_data);
                                    
                                        echo "<script>alert('ระบบทำการบันทึกข้อมูลเรียบร้อย'); javascript:location='Show_company.php';</script>";
                                    }

                                ?>
                                <form class="form-horizontal" role="form" method="POST" >
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ชื่อบริษัทประกัน</label>

                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-1" placeholder="ชื่อบริษัทประกัน" class="col-xs-10 col-sm-5" name="company_name"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> เบอร์โทรสำนักงาน</label>

                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-2" placeholder="เบอร์โทรสำนักงาน" class="col-xs-10 col-sm-5" name="company_tel"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-3"> ผู้ประสานงาน</label>

                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-3" placeholder="ผู้ประสานงาน" class="col-xs-10 col-sm-5" name="company_coordination"/>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-4"> เบอร์ผู้ประสานงาน</label>

                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-4" placeholder="เบอร์ผู้ประสานงาน" class="col-xs-10 col-sm-5" name="company_coordination_tel"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-5"> ที่อยู่บริษัท</label>

                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-5" placeholder="ที่อยู่บริษัท" class="col-xs-10 col-sm-5" name="company_address"/>
                                        </div>
                                    </div>
                                    <div class="col-md-offset-3 col-md-9">
                                    
                                        
                                   <input type="submit" class="btn btn-success" name="SAVE">
                                
                                    <button class="btn" type="reset">
                                        <i class="ace-icon fa fa-undo bigger-110"></i>
                                        ล้างค่า
                                    </button>
                                </div>
                                </form>
                               
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
            <?php include("scriptfooter.php");?>
    </body>
</html>
