<?php
 require_once 'init_inc.php';
$db=new DB;

?>
<!DOCTYPE html>
 <html ng-app="Insurance" ng-app lang="en">
 
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Insurance</title>

		<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/css/font-awesome.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.css" />
		<link rel="stylesheet" href="assets/css/jquery.gritter.css" />

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

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		
           <?php include("navbar.php"); ?>

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

							<li>
								<a href="#">Dashboard</a>
							</li>
 
						</ul><!-- /.breadcrumb -->

						<!-- #section:basics/content.searchbox -->
					 
						<!-- /section:basics/content.searchbox -->
					</div>
					<div class="page-header">
							<h1>
								Activity 
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
										กิจกรรมใหม่ &amp; ลูกค้า Walk in								</small>							</h1>
					</div><!-- /.page-header -->
					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
				   
			   	 <div id="user-profile-2" class="user-profile">
						   <div class="tabbable">
											<ul class="nav nav-tabs padding-18">
												<li class="active">
													<a data-toggle="tab" href="#home" aria-expanded="true">
														<i class="green ace-icon fa fa-user bigger-120"></i>
														ข้อมูลลูกค้า
													</a>
												</li>

												<li class="">
												 <a data-toggle="tab" href="#feed" aria-expanded="true">
														<i class="green ace-icon fa fa-user bigger-120"></i>
														ข้อมูลรถยนต์
													</a>
												
												</li>
												<li class=""></li>

												 
											</ul>

						                    <div class="tab-content no-border padding-24">
                                              <div id="home" class="tab-pane active">
                                                <div class="row">
                                                  <!-- /.col -->
<div class="col-xs-12">
                                                    
                                                    <div class="profile-user-info col-xs-12">
                                                      <div class="profile-info-row">
                                                        <div class="profile-info-name"> ชื่อลูกค้า </div>
                                                        <div class="profile-info-value">  <div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->
											<span class="input-icon">
												<input id="form-field-icon-1" type="text">
												 
											</span>

											<span class="input-icon input-icon-right">
												<input id="form-field-icon-2" type="text">
												 
											</span>

											<!-- /section:elements.form.input-icon -->
										</div> </div>
                                                      </div>
                                                      <div class="profile-info-row">
                                                        <div class="profile-info-name"> ที่อยู่ </div>
                                                        <div class="profile-info-value"><div class="col-sm-9"> <textarea id="form-field-comment" style="width: 387px; height: 60px;"></textarea></div></div>
                                                      </div>
                                                      <div class="profile-info-row">
                                                        <div class="profile-info-name"> ทะเบียนรถ </div>
                                                        <div class="profile-info-value"> <div class="col-sm-9"><input class="input-small" id="form-field-first" placeholder="" value="" type="text"> </div></div>
                                                      </div>
                                                      <div class="profile-info-row">
                                                        <div class="profile-info-name">เบอร์ติดต่อ </div>
                                                        <div class="profile-info-value"> <div class="col-sm-9"><span class="input-icon input-icon-right">
																		<input class="input-medium input-mask-phone" id="form-field-phone" type="text">
																		<i class="ace-icon fa fa-phone fa-flip-horizontal"></i>
																	</span></div></div>
                                                      </div>
                                                      <div class="profile-info-row">
                                                        <div class="profile-info-name"> </div>
                                                        <div class="profile-info-value"><button class="btn btn-primary">บันทึก</button></div>
                                                      </div>
                                                    </div>
                                                    <div class="hr hr-8 dotted"></div>
                                                  </div>
                                                  <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                              </div>
						                      <!-- /#home -->
                                              <div id="feed" class="tab-pane">
                                                <div class="profile-feed row">
                                                  <div class="col-sm-6">
                                                    <div class="profile-activity clearfix">
                                                      <div><i class="pull-left thumbicon fa fa-check btn-success no-hover"></i><a class="user" href="#"> คุณ xxxxxx xxxxxx [เจ้าของรถ]</a> ทะเบียนรถ กม 4556  สถานะโทรติดตามลูกค้าล่าสุด <span class="label label-success arrowed-in arrowed-in-right">ปิดการขาย</span> 
                                                          <div class="time"><i class="ace-icon fa fa-clock-o bigger-110"></i> 17/04/2559 </div>
                                                      </div>
                                                      <div class="tools action-buttons"></div>
                                                    </div>
                                                    <div class="profile-activity clearfix">
                                                   <div><i class="pull-left thumbicon fa fa-check btn-success no-hover"></i><a class="user" href="#"> คุณ xxxxxx xxxxxx [เจ้าของรถ]</a> ทะเบียนรถ กม 4556  สถานะโทรติดตามลูกค้าล่าสุด <span class="label label-info arrowed-right arrowed-in">สนใจ</span> 
                                                          <div class="time"> <i class="ace-icon fa fa-clock-o bigger-110"></i> 13/04/2559 </div>
                                                      </div>
                                                      <div class="tools action-buttons">   </div>
                                                    </div>
                                                    <div class="profile-activity clearfix">
                                                      <div><i class="pull-left thumbicon fa fa-check btn-success no-hover"></i><a class="user" href="#"> คุณ xxxxxx xxxxxx [เจ้าของรถ]</a> ทะเบียนรถ กม 4556  สถานะโทรติดตามลูกค้าล่าสุด <span class="label label-warning arrowed arrowed-right">รับทราบ</span> 
                                                          <div class="time"> <i class="ace-icon fa fa-clock-o bigger-110"></i> 09/04/2559 </div>
                                                      </div>
                                                      <div class="tools action-buttons">  </div>
                                                    </div>
                                               
                                                    
                                                  </div>
                                                  <!-- /.col -->
                                                  <div class="col-sm-6">
                                                    <div class="profile-activity clearfix">
                                                      <div><i class="pull-left thumbicon fa fa-check btn-success no-hover"></i><a class="user" href="#"> คุณ xxxxxx xxxxxx [เจ้าของรถ]</a> ทะเบียนรถ กม 4556  สถานะโทรติดตามลูกค้าล่าสุด <span class="label label-warning arrowed arrowed-right">โทรซ้ำ</span> 
                                                          <div class="time"> <i class="ace-icon fa fa-clock-o bigger-110"></i> 05/04/2559 </div>
                                                      </div>
                                                      <div class="tools action-buttons">  </div>
                                                    </div>
                                                    <div class="profile-activity clearfix">
                                                     <div><i class="pull-left thumbicon fa fa-check btn-success no-hover"></i><a class="user" href="#"> คุณ xxxxxx xxxxxx [เจ้าของรถ]</a> ทะเบียนรถ กม 4556  สถานะโทรติดตามลูกค้าล่าสุด <span class="label label-warning arrowed arrowed-right">ติดต่อไม่ได้</span> 
                                                          <div class="time"> <i class="ace-icon fa fa-clock-o bigger-110"></i> 01/04/2559 </div>
                                                      </div>
                                                      <div class="tools action-buttons"> </div>
													 </div>
                                                       
                                                   
                                                  </div>
                                                  <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                                <div class="space-12"></div>
                                                
                                              </div>
						                      <!-- /#feed -->
                                              <div id="friends" class="tab-pane">
<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>รายละเอียดการเข้ารับบริการ
																</th>
<th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>วันที่เข้ารับบริการ
																</th>
																<th>
																	<i class="ace-icon fa fa-caret-right blue"></i>ทะเบียนรถ
																</th>

																<th class="hidden-480">
																	<i class="ace-icon fa fa-caret-right blue"></i>เจ้าหน้าที่รับบริการ
																</th>
																
															</tr>
														</thead>

														<tbody>
															<tr>
																<td> 
											 เปลี่ยนน้ำมันเครื่องยนต์ ตามระยะ</br><span style="font-size:10px">คุณ xxxxx  xxxxxx  [เจ้าของรถ]</span></td>
<td>
																	<b class="blue">11/06/2559</b>
																</td>
																<td>
																	<b class="blue">กศ 3456</b>
																</td>

																<td class="hidden-480">
																	 นาย xxxxx xxxxxxx 
																</td>
															</tr>

															<tr>
																<td> เปลี่ยนน้ำมันเครื่องยนต์ ตามระยะ</br><span style="font-size:10px">คุณ xxxxx  xxxxxx  [เจ้าของรถ]</span></td>
<td>
																	<b class="blue">21/07/2558</b>
																</td>
																<td>
																<b class="blue">ศม 6655</b>
																</td>

																<td class="hidden-480">
																	 นาย xxx  xxxxxx 
																</td>
															</tr>

															<tr>
																<td> ทำสีและซ่อมตัวถัง</br><span style="font-size:10px">คุณ xxxxx  xxxxxx  [เจ้าของรถ]</span></td>
<td>
																	<b class="blue">21/06/2558</b>
																</td>
																<td>
																	<b class="blue">ศม 4444</b>
																</td>

																<td class="hidden-480">
																	นาย xxx xxxxxxx
																</td>
															</tr>

															<tr>
																<td>เปลี่ยนน้ำมันเครื่องยนต์ ตามระยะ</br><span style="font-size:10px">คุณ xxxxx  xxxxxx  [เจ้าของรถ]</span></td>
<td>
																	<b class="blue">11/01/2558</b>
																</td>
																<td>
																	<b class="blue">ศม 4444</b>
																</td>

																<td class="hidden-480">
																				นาย xxx xxxxxx
																</td>
															</tr>

															<tr>
																<td>เปลี่ยนน้ำมันเครื่อง</br><span style="font-size:10px">คุณ xxxxx  xxxxxx  [เจ้าของรถ]</span></td>
<td>
																	<b class="blue">01/06/2557</b>
																</td>
																<td>
																	<b class="blue">ศม 4444</b>
																</td>

																<td class="hidden-480">
																	นาย xxxx xxxxxx
																</td>
															</tr>
															 
															
														  
															
														</tbody>
														
													</table>
													<ul class="pager pull-right">
														<li class="previous disabled">
															<a href="#"> Prev</a>
														</li>

														<li class="next">
															<a href="#">Next </a>
														</li>
													</ul>
                                              </div>
						                      <!-- /#friends -->
                                              <div id="pictures" class="tab-pane">
                                                <ul class="ace-thumbnails">
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="assets/images/gallery/thumb-1.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="assets/images/gallery/thumb-2.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="assets/images/gallery/thumb-3.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="assets/images/gallery/thumb-4.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="assets/images/gallery/thumb-5.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="assets/images/gallery/thumb-6.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="assets/images/gallery/thumb-1.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                  <li> <a href="#" data-rel="colorbox"> <img alt="150x150" src="assets/images/gallery/thumb-2.jpg">
                                                        <div class="text">
                                                          <div class="inner">Sample Caption on Hover</div>
                                                        </div>
                                                    </a>
                                                      <div class="tools tools-bottom"> <a href="#"> <i class="ace-icon fa fa-link"></i> </a> <a href="#"> <i class="ace-icon fa fa-paperclip"></i> </a> <a href="#"> <i class="ace-icon fa fa-pencil"></i> </a> <a href="#"> <i class="ace-icon fa fa-times red"></i> </a> </div>
                                                  </li>
                                                </ul>
                                              </div>
						                      <!-- /#pictures -->
                                            </div>
						   </div>
						 </div>
 

									 
				      
					</div><!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->
	    <?php include_once('footer.php') ?>

		
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

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.js"></script>
		<script src="assets/js/bootbox.js"></script>
		<script src="assets/js/jquery.easypiechart.js"></script>
		<script src="assets/js/jquery.gritter.js"></script>
		<script src="assets/js/spin.js"></script>

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

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				/**
				$('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				  //console.log(e.target.getAttribute("href"));
				})
					
				$('#accordion').on('shown.bs.collapse', function (e) {
					//console.log($(e.target).is('#collapseTwo'))
				});
				*/
				
				$('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
					//if($(e.target).attr('href') == "#home") doSomethingNow();
				})
			
				
				/**
					//go to next tab, without user clicking
					$('#myTab > .active').next().find('> a').trigger('click');
				*/
			
			
				$('#accordion-style').on('click', function(ev){
					var target = $('input', ev.target);
					var which = parseInt(target.val());
					if(which == 2) $('#accordion').addClass('accordion-style2');
					 else $('#accordion').removeClass('accordion-style2');
				});
				
				//$('[href="#collapseTwo"]').trigger('click');
			
			
				var oldie = /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase());
				$('.easy-pie-chart.percentage').each(function(){
					$(this).easyPieChart({
						barColor: $(this).data('color'),
						trackColor: '#EEEEEE',
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: 8,
						animate: oldie ? false : 1000,
						size:75
					}).css('color', $(this).data('color'));
				});
			
				$('[data-rel=tooltip]').tooltip();
				$('[data-rel=popover]').popover({html:true});
			
			
				$('#gritter-regular').on(ace.click_event, function(){
					$.gritter.add({
						title: 'This is a regular notice!',
						text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" class="blue">magnis dis parturient</a> montes, nascetur ridiculus mus.',
						image: 'assets/avatars/avatar1.png', //in Ace demo assets will be replaced by correct assets path
						sticky: false,
						time: '',
						class_name: 'gritter-Dark' 
					});
			
					return false;
				});
			
			 
				$("#gritter-remove").on(ace.click_event, function(){
					$.gritter.removeAll();
					return false;
				});
					
			
				///////
			
			
				$("#bootbox-regular").on(ace.click_event, function() {
					bootbox.prompt("What is your name?", function(result) {
						if (result === null) {
							
						} else {
							
						}
					});
				});
					
				$("#bootbox-confirm").on(ace.click_event, function() {
					bootbox.confirm("Are you sure?", function(result) {
						if(result) {
							//
						}
					});
				});
				
			 
				$("#bootbox-options").on(ace.click_event, function() {
					bootbox.dialog({
						message: "<span class='bigger-110'>I am a custom dialog with smaller buttons</span>",
						buttons: 			
						{
							"success" :
							 {
								"label" : "<i class='ace-icon fa fa-check'></i> Success!",
								"className" : "btn-sm btn-success",
								"callback": function() {
									//Example.show("great success");
								}
							},
							"danger" :
							{
								"label" : "Danger!",
								"className" : "btn-sm btn-danger",
								"callback": function() {
									//Example.show("uh oh, look out!");
								}
							}, 
							"click" :
							{
								"label" : "Click ME!",
								"className" : "btn-sm btn-primary",
								"callback": function() {
									//Example.show("Primary button");
								}
							}, 
							"button" :
							{
								"label" : "Just a button...",
								"className" : "btn-sm"
							}
						}
					});
				});
			
			
			
				$('#spinner-opts small').css({display:'inline-block', width:'60px'})
			
				var slide_styles = ['', 'green','red','purple','orange', 'dark'];
				var ii = 0;
				$("#spinner-opts input[type=text]").each(function() {
					var $this = $(this);
					$this.hide().after('<span />');
					$this.next().addClass('ui-slider-small').
					addClass("inline ui-slider-"+slide_styles[ii++ % slide_styles.length]).
					css('width','125px').slider({
						value:parseInt($this.val()),
						range: "min",
						animate:true,
						min: parseInt($this.attr('data-min')),
						max: parseInt($this.attr('data-max')),
						step: parseFloat($this.attr('data-step')) || 1,
						slide: function( event, ui ) {
							$this.val(ui.value);
							spinner_update();
						}
					});
				});
			
			
			
				//CSS3 spinner
				$.fn.spin = function(opts) {
					this.each(function() {
					  var $this = $(this),
						  data = $this.data();
			
					  if (data.spinner) {
						data.spinner.stop();
						delete data.spinner;
					  }
					  if (opts !== false) {
						data.spinner = new Spinner($.extend({color: $this.css('color')}, opts)).spin(this);
					  }
					});
					return this;
				};
			
				function spinner_update() {
					var opts = {};
					$('#spinner-opts input[type=text]').each(function() {
						opts[this.name] = parseFloat(this.value);
					});
					opts['left'] = 'auto';
					$('#spinner-preview').spin(opts);
				}
			
			
			
				$('#id-pills-stacked').removeAttr('checked').on('click', function(){
					$('.nav-pills').toggleClass('nav-stacked');
				});
			
				
				
				
				
				
				///////////
				$(document).one('ajaxloadstart.page', function(e) {
				
				
					$.gritter.removeAll();
					$('.modal').modal('hide');
				});
			
			});
			
			var i = 1;   
			function myLoop(nextMsgOptions) {  
       
			   setTimeout(function () {
			 
				alertshow();  
				  i++;                     
				  if (i < endloop) {  
					 myLoop();             
				  }          
			   }, 3000)
			}
							
			function alertshow(){
 
				   	$.gritter.add({
						title: 'This is a regular notice!',
						text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" class="blue">magnis dis parturient</a> montes, nascetur ridiculus mus.',
						image: 'assets/avatars/avatar1.png',  
						sticky: false,
						time: '',
						class_name: 'gritter-Dark' 
					});
				}  
  
		</script>

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="assets/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="docs/assets/js/themes/sunburst.css" />

 
		 

							
						 
	 
		 <!-- /for search -->
	</body>
</html>
