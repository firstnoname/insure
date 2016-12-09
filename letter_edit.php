<?php
require_once 'connDB.php';

require_once 'init_inc.php';
$id=$_GET['id'];
$db=new DB;
$sql="select * from insurance_letter Where letter_id=$id";
//echo $sql;
$rs=mysql_query($sql);
$rw=mysql_fetch_array($rs);
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
        <!-- bootstrap & fontawesome -->
		
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.css" />
		<!-- page specific plugin styles -->
        <script src="ckeditor/ckeditor.js"></script>
	   <script src="ckeditor/samples/js/sample.js"></script>
	
	    <link rel="stylesheet" href="ckeditor/toolbarconfigurator/lib/codemirror/neo.css">
		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.css" />
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
						
					  <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                         
                               
                                    
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> ชื่อแบบฟอร์ม</label>

                                        <div class="col-sm-10">
                                            <input type="text" id="letter_name" placeholder="ชื่อ"  value="<?=$rw['letter_title'] ?>" class="col-xs-10 col-sm-5" name="letter_name"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-sm-2">
										<div class="widget-box transparent">
											<div class="widget-header">
												<h4>รูปแบบใช้งาน</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<div id="external-events">
														<div class="external-event label-grey" data-class="label-grey">
															
															{ชื่อลูกค้า}
														</div>

														<div class="external-event label-grey" data-class="label-grey">
														
															{นามสกลุลูกค้า}
														</div>

														<div class="external-event label-grey" data-class="label-grey">
															
															{ที่อยู่ลูกค้า}
														</div>
														<div class="external-event label-grey" data-class="label-grey">
															
															{วันที่สิ้นสุดประกัน}
														</div>
														<div class="external-event label-grey" data-class="label-grey">
															
															{ชื่อแคมเปญ}
														</div>

														<div class="external-event label-grey" data-class="label-grey">
															
															{ทุนประกัน}
														</div>

														<div class="external-event label-grey" data-class="label-grey">
															
															{เบี้ยรวมสุทธิ}
														</div>

														<div class="external-event label-grey" data-class="label-grey">
															
															{เบี้ยพรบ}
														</div>
                                                        <div class="external-event label-grey" data-class="label-grey">
															
															{เบี้ยภาษี}
														</div>
														<div class="external-event label-grey" data-class="label-grey">
															
															{ทะเบียนรถ}
														</div>
														<div class="external-event label-grey" data-class="label-grey">
															
															{เจ้าหน้าที่}
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

                                        <div class="col-sm-10">
                                        
                                            <div id="editor">
                                                <?=$rw['letter_detail'] ?>
                                            </div>
                                        
                                        </div>
                                    </div>
                               
                                    <div class="col-md-offset-4 col-md-9">
                                    
                                        
                                   <button class="btn btn-success" type="button" id="btnSave">
												<i class="ace-icon fa fa-check bigger-110"></i>
												บันทึก											</button>
                                 <button class="btn btn-danger" type="button" id="btndelete">
												<i class="ace-icon fa fa-times bigger-110"></i>
												ลบข้อมูล											</button>
                                    <button class="btn" type="reset">
                                        <i class="ace-icon fa fa-undo bigger-110"></i>
                                        ล้างค่า
                                    </button>
                                </div>
                                
                               
                            </div>
						<!-- /section:settings.box -->
					 
					</div><!-- /.page-content -->
				</div>
			</div>
            <script>
				initSample();
				
			</script>
            
			<!-- /.main-content -->
               <?php include("footer.php"); ?>      
			<!-- /.main-container -->

		<!-- basic scripts -->

		
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
		<script src="assets/js/jquery-ui.custom.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.js"></script>
		<script src="assets/js/date-time/moment.js"></script>
		<script src="assets/js/fullcalendar.js"></script>
		<script src="assets/js/bootbox.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace/elements.scroller.js"></script>
		<script src="assets/js/ace/elements.colorpicker.js"></script>
		<script src="assets/js/ace/elements.fileinput.js"></script>
		<script src="assets/js/ace/elements.typeahead.js"></script>
		<script src="assets/js/ace/elements.wysiwyg.js"></script>
		<script src="assets/js/ace/elements.spinner.js"></script>
		<script src="assets/js/ace/elements.treeview.js"></script>
		<script src="assets/js/ace/elements.wizard.js"></script>
		<script src="assets/js/ace/elements.aside.js"></script>
		<script src="assets/js/ace/ace.js"></script>
		<script src="assets/js/ace/ace.ajax-content.js"></script>
		<script src="assets/js/ace/ace.touch-drag.js"></script>
		<script src="assets/js/ace/ace.sidebar.js"></script>
		<script src="assets/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="assets/js/ace/ace.submenu-hover.js"></script>
		<script src="assets/js/ace/ace.widget-box.js"></script>
		<script src="assets/js/ace/ace.settings.js"></script>
		<script src="assets/js/ace/ace.settings-rtl.js"></script>
		<script src="assets/js/ace/ace.settings-skin.js"></script>
		<script src="assets/js/ace/ace.widget-on-reload.js"></script>
		<script src="assets/js/ace/ace.searchbox-autocomplete.js"></script>

		<script>
				
				$(function($) {
					
					$('#btnSave').click(function() {
						///alert(1);
									var name=$('#letter_name').val();
									//var detail=$('#cke_1_contents').html();
									var value = CKEDITOR.instances['editor'].getData();
									//alert(value);
									var id=<?=$_GET['id']?>;
								 $.ajax({
									url: "saveletter.php",
									type: "post",
									data: {name:name,id:id,detail:value,action:1} ,
									success: function (response) {
										//alert(response); 
														       bootbox.dialog({
													message: "ระบบบันทึกข้อมูลเรียบร้อย!", 
													buttons: {
														"success" : {
															"label" : "OK",
															"className" : "btn-sm btn-primary",
															"callback": function() {
																
                                                    window.location.assign("showletter.php");
											}
									}
							}
					});
										//window.location="showletter.php";
																  
									},
									error: function(jqXHR, textStatus, errorThrown) {
									   console.log(textStatus, errorThrown);
									}
							
							
								});/**/
					
					});
					
					$('#btndelete').click(function() {
						///alert(1);
									 
									var id=<?=$_GET['id']?>;
								 $.ajax({
									url: "deleteletter.php",
									type: "post",
									data: {id:id} ,
									success: function (response) {
										//alert(response); 
														       bootbox.dialog({
													message: "ระบบบันทึกข้อมูลเรียบร้อย!", 
													buttons: {
														"success" : {
															"label" : "OK",
															"className" : "btn-sm btn-primary",
															"callback": function() {
																
                                                    window.location.assign("showletter.php");
											}
									}
							}
					});
										//window.location="showletter.php";
																  
									},
									error: function(jqXHR, textStatus, errorThrown) {
									   console.log(textStatus, errorThrown);
									}
							
							
								});/**/
					
					});
					
				});
			</script>

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="assets/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="docs/assets/js/themes/sunburst.css" />

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="assets/js/ace/elements.onpage-help.js"></script>
		<script src="assets/js/ace/ace.onpage-help.js"></script>
		<script src="docs/assets/js/rainbow.js"></script>
		<script src="docs/assets/js/language/generic.js"></script>
		<script src="docs/assets/js/language/html.js"></script>
		<script src="docs/assets/js/language/css.js"></script>
		<script src="docs/assets/js/language/javascript.js"></script>
	</body>
</html>
