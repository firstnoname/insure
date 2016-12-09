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
								Dashboard
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									overview &amp; stats								</small>							</h1>
					</div><!-- /.page-header -->
					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
					
					 <div class="row">
									<div class="space-6"></div>

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
												<span class="sparkline" data-values="196,128,202,177,154,94,100,170,224"><canvas style="display: inline-block; width: 44px; height: 33px; vertical-align: top;" width="44" height="33"></canvas></span>
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
												</div><!-- /.widget-main -->
												
											</div><!-- /.widget-body -->
											<div class="widget-body">
												<div class="widget-main">
													<!-- #section:plugins/charts.flotchart -->
													<div id="piechart-placeholder"></div>

													<!-- /section:plugins/charts.flotchart -->
												 

												 

														<!-- /section:custom/extra.grid -->
													</div>
												</div><!-- /.widget-main -->
										</div><!-- /.widget-box -->
									</div><!-- /.col -->
								</div>
								
								
			   <!--//////////////////////////////////////////////////////////////////////////////// -->
	        	<div class="col-sm-12">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title lighter">
													<i class="ace-icon fa fa-star orange"></i>
													รายการติดตามล่าสุด 20 รายการ											</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>													</a>																		                                                </div>
										   </div>

											<div class="widget-body">
												<div class="widget-main no-padding">
														<div ng-controller="customersCrtl">
																<div class="container">
																		<div class="col-md-2">จำนวนเรคคอร์ดต่อหน้า:
																			<select ng-model="entryLimit" class="form-control">
																				<option>5</option>
																				<option>10</option>
																				<option>20</option>
																				<option>50</option>
																				<option>100</option>
																			</select>
																		</div>
																		<div class="col-md-3">ค้นหา:
																			<input type="text" ng-model="search" ng-change="filter()" placeholder="Filter" class="form-control" />
																		</div>
																		 
																	</div>
																	<br/>
																	<div class="row">
																		<div class="col-md-12" ng-show="filteredItems > 0">
																		  <table class="table table-striped table-bordered table-hover">
																						<thead class="thin-border-bottom">
																						 
																						<th><i class="ace-icon fa fa-caret-right blue"></i>ชื่อลูกค้า&nbsp;<a ng-click="sort_by('customer');"><i class="glyphicon glyphicon-sort"></i></a></th>
																						<th><i class="ace-icon fa fa-caret-right blue"></i>วันที่ติดตาม&nbsp;<a ng-click="sort_by('activity_Date');"><i class="glyphicon glyphicon-sort"></i></a></th>
																						<th><i class="ace-icon fa fa-caret-right blue"></i>ทะเบียนรถ&nbsp;<a ng-click="sort_by('vehicle_regis');"><i class="glyphicon glyphicon-sort"></i></a></th>
																						<th><i class="ace-icon fa fa-caret-right blue"></i>กิจกรรม&nbsp;<a ng-click="sort_by('activity_name');"><i class="glyphicon glyphicon-sort"></i></a></th>
																						<th><i class="ace-icon fa fa-caret-right blue"></i>ผู้รับผิดชอบ&nbsp;<a ng-click="sort_by('emp_user');"><i class="glyphicon glyphicon-sort"></i></a></th>
																						<th><i class="ace-icon fa fa-caret-right blue"></i>สถานะ&nbsp;<a ng-click="sort_by('track_last_status');"><i class="glyphicon glyphicon-sort"></i></a></th>
																						
																						</thead>
																						<tbody>
																							<tr ng-repeat="data in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
																								 
																								<td><a href="call_user.php?activity_id={{data.activity_id}} &cus_id={{data.cusno}}&vehicle_id={{data.vehicle_id}}">{{data.customer}}</a></td>
																								<td>{{data.activity_Date}}</td>
																								<td>{{data.activity_name}}</td>
																								<td>{{data.vehicle_regis}}</td>
																								<td>{{data.emp_user}}</td>
																								<td> <span class="label label-info arrowed-right arrowed-in"> {{data.track_last_status}}</span></td>
																								
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
			
			var i = 0;   
		 var endloop=5;
			function myLoop() {  
              
			   setTimeout(function () {
			 
				alertshow();  
				  i++;                     
				  if (i < endloop) {  
					 myLoop();             
				  }          
			   }, 1000)
			}
							
			function alertshow(){
 
				   	$.gritter.add({
						title: 'This is a regular notice!',
						text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" class="blue">magnis dis parturient</a> montes, nascetur ridiculus mus.',
						 
						sticky: false,
						time: '',
						class_name: 'gritter-Dark' 
					});
				}  
  
		</script>

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="assets/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="docs/assets/js/themes/sunburst.css" />

	 

							
<script src="assets/js/angular.min.js"></script>
        <script src="assets/js/ui-bootstrap-tpls-0.10.0.min.js"></script>
        <script src="app/app.js"></script>        
		<script>
$(function(){
 		// Perform an asynchronous HTTP (Ajax) request.
		$.ajax({
			// A string containing the URL to which the request is sent.
			url: "getexpirecampaing.php",
	 
			dataType: "json",
			// beforeSend is called before the request is sent
			success: function(json){
	           var time = 500;
				$.each(json, function(index, value) {
					//title=value.company_name;
					//alert(1);
					// delay(function(){
					// arrtext.push(value.campaign_description+":"+value.campaign_end+":"+value.company_name);
					setTimeout( function(){
						$.gritter.add({
						title: value.company_name,
						text: value.campaign_description+' ใกล้หมดระยะของแคมเปญในวันที่ '+ value.campaign_end +' นี้ คลิกเพื่อตรวจสอบ<a href="edit_campaings.php?id='+ value.campaign_id +'" class="blue"> คลิกที่นี่ </a> ',
						 
						sticky: false,
						time: '8000',
						class_name: 'gritter-Dark' 
					});
						 //alertshow(); 
						 
						 }, time)
                    time += 1500;
					//alertshow();
			      //  }, 1000);
				 })
				 
				  
			}
			});
		});	
		 
		      getSearch('customersCrtl','getCustomers.php',20);
		</script>		 
	 
		 <!-- /for search -->
	</body>
</html>
