<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Payment - Hornbill Insurance </title>

	 
	</head>
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.css" />
		<link rel="stylesheet" href="../assets/css/font-awesome.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="../assets/css/jquery-ui.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="../assets/js/ace-extra.js"></script>

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
							<li class="active">Payment</li>
						</ul><!-- /.breadcrumb -->

					 

						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<div class="page-header">
							<h1>
								Payment
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									รายการชำระเงินจากลูกค้า
								</small>
							</h1>
						</div>
					     						<div class="col-xs-12">
										<div class="widget-box">
											<div class="widget-header">
												<h4 class="smaller">
													ค้นหาข้อมูลลูกค้า
													 
												</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<p class="muted">
													     เลือกจังหวัด, เลือกอำเภอ ,
														 ชื่อลูกค้า ,นามสกุล ,ทะเบียนรถ,เบอร์โทร,วันที่...ถึง.... ,สถานะ [สนใจ]<button class="btn btn-info" >
											 
												ค้นหา
											 </button>  
													</p>
													<hr>

													<!-- /section:elements.tooltip -->
												</div>
											</div>
										</div>
										
								 <div class="tabbable">
											<ul class="nav nav-tabs" id="myTab">
												<li class="active">
													<a data-toggle="tab" href="#home">
															<span class="badge badge-warning">20</span>
														รายการลูกค้าสนใจ 
													</a>
												</li>

												<li>
													<a data-toggle="tab" href="#messages">
														ลูกค้าค้างชำระ 
														<span class="badge badge-danger">5</span>
													</a>
												</li>

											<li>
													<a data-toggle="tab" href="#dropdown1">
														รายการชำระเงิน 
														<span class="badge badge-success">4</span>
													</a>
												</li>

											</ul>
									
											<div class="tab-content">
												<div id="home" class="tab-pane fade in active">
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
													<th class="hidden-480">ประเภทประกัย</th>

													<th>ยอดชำระทั้งสิ้น</th>
													<th>ประเภทลูกค้า</th>
													<th>
														<i class="ace-icon 	fa fa-users  hidden-480"></i>
														ผู้รับผิดชอบ
														
													</th>
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
														<a href="#" id="id-btn-dialog2">คุณ xxxxx  xxxxxx</a>
													</td>
													<td>กม xxxx</td>
													<td class="hidden-480">080-0000-0XXX</td>
													<td>01/09/2559 </td>

													<td class="hidden-480">
														ประกันภัยชั้น 1
													</td>

													<td>
													  18,900.00
																	 
													</td>
													<td>ลูกค้าการโทร</td>
													<td>นาวสาว  xxxx  xxxxxx </td>
												</tr>

												<tr>
													<td class="center">
														<button class="btn btn-xs btn-info">
																<i class="ace-icon fa fa-eye "></i>
															</button>
													</td>

													<td>
														<a href="#" id="id-btn-dialog2">คุณ xxxxx  xxxxxx</a>
													</td>
													<td>กม xxxx</td>
													<td class="hidden-480">080-0000-0XXX</td>
													<td> </td>

													<td class="hidden-480">
													ประกันภัยชั้น 2
													</td>

													<td>
													  15,900.00
																	 
																	 
													</td>
													   <td>ลูกค้าป้ายแดง</td>
														<td>นาวสาว  xxxx  xxxxxx </td>
												<tr>
													<td class="center">
														<button class="btn btn-xs btn-info">
																<i class="ace-icon fa fa-eye "></i>
															</button>
													</td>

													<td>
														<a href="#" id="id-btn-dialog2">คุณ xxxxx  xxxxxx</a>
													</td>
													<td>กม xxxx</td>
													<td class="hidden-480">080-0000-0XXX</td>
													<td>03/09/2559 </td>

													<td class="hidden-480">
														ประกันภัยชั้น 3
													</td>

													<td>
													  8,970.00
																	 
													</td>
													<td>ลูกค้าWalk in</td>
													<td>นาวสาว  xxxx  xxxxxx </td>
												<tr>
											  </tr>
											</tbody>
											
										</table>												
									  <div id="dialog-confirm" class="hide">
											 <div class="profile-user-info profile-user-info-striped">
												<div class="profile-info-row">
													<div class="profile-info-name"> บริษัทประกัน </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="username">alexdoe</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> ประเภทประกัน </div>

													<div class="profile-info-value">
														<i class="fa fa-map-marker light-orange bigger-110"></i>
														<span class="editable editable-click" id="country">Netherlands</span>
														<span class="editable editable-click" id="city">Amsterdam</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> แคมเปญ(ผลิตภัณฑ์) </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="age">38</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> เบี้ยรวม </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="signup">2010/06/20</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name">พรบ.</div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="login">3 hours ago</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name">ภาษี </div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="about">Editable as WYSIWYG</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name">ค่าบริการ</div>

													<div class="profile-info-value">
														<span class="editable editable-click" id="about">Editable as WYSIWYG</span>
													</div>
												</div>
											</div>
											 
										</div><!-- #dialog-confirm -->
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

												<div id="messages" class="tab-pane fade">
													<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
												</div>

												<div id="dropdown1" class="tab-pane fade">
													<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.</p>
												</div>

												<div id="dropdown2" class="tab-pane fade">
													<p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin.</p>
												</div>
											</div>
										</div>
										 
									</div>
									 
					<div class="hr hr32 hr-dotted"></div>

							 

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
                      
						<!-- /section:settings.box -->
					 
					</div><!-- /.page-content -->
				</div>
			</div>
			<!-- /.main-content -->
               <?php include("footer.php"); ?>      
			<!-- /.main-container -->

	<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='../assets/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="../assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->
		<script src="../assets/js/jquery-ui.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace/elements.scroller.js"></script>
		<script src="../assets/js/ace/elements.colorpicker.js"></script>
		<script src="../assets/js/ace/elements.fileinput.js"></script>
		<script src="../assets/js/ace/elements.typeahead.js"></script>
		<script src="../assets/js/ace/elements.wysiwyg.js"></script>
		<script src="../assets/js/ace/elements.spinner.js"></script>
		<script src="../assets/js/ace/elements.treeview.js"></script>
		<script src="../assets/js/ace/elements.wizard.js"></script>
		<script src="../assets/js/ace/elements.aside.js"></script>
		<script src="../assets/js/ace/ace.js"></script>
		<script src="../assets/js/ace/ace.ajax-content.js"></script>
		<script src="../assets/js/ace/ace.touch-drag.js"></script>
		<script src="../assets/js/ace/ace.sidebar.js"></script>
		<script src="../assets/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="../assets/js/ace/ace.submenu-hover.js"></script>
		<script src="../assets/js/ace/ace.widget-box.js"></script>
		<script src="../assets/js/ace/ace.settings.js"></script>
		<script src="../assets/js/ace/ace.settings-rtl.js"></script>
		<script src="../assets/js/ace/ace.settings-skin.js"></script>
		<script src="../assets/js/ace/ace.widget-on-reload.js"></script>
		<script src="../assets/js/ace/ace.searchbox-autocomplete.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			
				$( "#datepicker" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,
			
					
					/*
					changeMonth: true,
					changeYear: true,
					
					showButtonPanel: true,
					beforeShow: function() {
						//change button colors
						var datepicker = $(this).datepicker( "widget" );
						setTimeout(function(){
							var buttons = datepicker.find('.ui-datepicker-buttonpane')
							.find('button');
							buttons.eq(0).addClass('btn btn-xs');
							buttons.eq(1).addClass('btn btn-xs btn-success');
							buttons.wrapInner('<span class="bigger-110" />');
						}, 0);
					}
			*/
				});
			
			
				//override dialog's title function to allow for HTML titles
				$.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
					_title: function(title) {
						var $title = this.options.title || '&nbsp;'
						if( ("title_html" in this.options) && this.options.title_html == true )
							title.html($title);
						else title.text($title);
					}
				}));
			
				$("#id-btn-dialog1").on('click', function(e) {
				 
					e.preventDefault();
			
					var dialog = $("#dialog-message").removeClass('hide').dialog({
						modal: true,
						title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-check'></i> jQuery UI Dialog</h4></div>",
						title_html: true,
						buttons: [ 
							{
								text: "Cancel",
								"class" : "btn btn-minier",
								click: function() {
									$( this ).dialog( "close" ); 
								} 
							},
							{
								text: "OK",
								"class" : "btn btn-primary btn-minier",
								click: function() {
									$( this ).dialog( "close" ); 
								} 
							}
						]
					});
			
					/**
					dialog.data( "uiDialog" )._title = function(title) {
						title.html( this.options.title );
					};
					**/
				});
			
			
				$( "#id-btn-dialog2" ).on('click', function(e) {
					e.preventDefault();
				
					$( "#dialog-confirm" ).removeClass('hide').dialog({
						resizable: false,
						width: '800',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon  fa fa-money'></i> ข้อมูลการชำระเงิน คุณ xxxxx xxxxxx</h4></div>",
						title_html: true,
						buttons: [
							{
								html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Delete all items",
								"class" : "btn btn-danger btn-minier",
								click: function() {
									$( this ).dialog( "close" );
								}
							}
							,
							{
								html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancel",
								"class" : "btn btn-minier",
								click: function() {
									$( this ).dialog( "close" );
								}
							}
						]
					});
				});
			
			
				
				//autocomplete
				 var availableTags = [
					"ActionScript",
					"AppleScript",
					"Asp",
					"BASIC",
					"C",
					"C++",
					"Clojure",
					"COBOL",
					"ColdFusion",
					"Erlang",
					"Fortran",
					"Groovy",
					"Haskell",
					"Java",
					"JavaScript",
					"Lisp",
					"Perl",
					"PHP",
					"Python",
					"Ruby",
					"Scala",
					"Scheme"
				];
				$( "#tags" ).autocomplete({
					source: availableTags
				});
			
				//custom autocomplete (category selection)
				$.widget( "custom.catcomplete", $.ui.autocomplete, {
					_create: function() {
						this._super();
						this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
					},
					_renderMenu: function( ul, items ) {
						var that = this,
						currentCategory = "";
						$.each( items, function( index, item ) {
							var li;
							if ( item.category != currentCategory ) {
								ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
								currentCategory = item.category;
							}
							li = that._renderItemData( ul, item );
								if ( item.category ) {
								li.attr( "aria-label", item.category + " : " + item.label );
							}
						});
					}
				});
				
				 var data = [
					{ label: "anders", category: "" },
					{ label: "andreas", category: "" },
					{ label: "antal", category: "" },
					{ label: "annhhx10", category: "Products" },
					{ label: "annk K12", category: "Products" },
					{ label: "annttop C13", category: "Products" },
					{ label: "anders andersson", category: "People" },
					{ label: "andreas andersson", category: "People" },
					{ label: "andreas johnson", category: "People" }
				];
				$( "#search" ).catcomplete({
					delay: 0,
					source: data
				});
				
				
				//tooltips
				$( "#show-option" ).tooltip({
					show: {
						effect: "slideDown",
						delay: 250
					}
				});
			
				$( "#hide-option" ).tooltip({
					hide: {
						effect: "explode",
						delay: 250
					}
				});
			
				$( "#open-event" ).tooltip({
					show: null,
					position: {
						my: "left top",
						at: "left bottom"
					},
					open: function( event, ui ) {
						ui.tooltip.animate({ top: ui.tooltip.position().top + 10 }, "fast" );
					}
				});
			
			
				//Menu
				$( "#menu" ).menu();
			
			
				//spinner
				var spinner = $( "#spinner" ).spinner({
					create: function( event, ui ) {
						//add custom classes and icons
						$(this)
						.next().addClass('btn btn-success').html('<i class="ace-icon fa fa-plus"></i>')
						.next().addClass('btn btn-danger').html('<i class="ace-icon fa fa-minus"></i>')
						
						//larger buttons on touch devices
						if('touchstart' in document.documentElement) 
							$(this).closest('.ui-spinner').addClass('ui-spinner-touch');
					}
				});
			
				//slider example
				$( "#slider" ).slider({
					range: true,
					min: 0,
					max: 500,
					values: [ 75, 300 ]
				});
			
			
			
				//jquery accordion
				$( "#accordion" ).accordion({
					collapsible: true ,
					heightStyle: "content",
					animate: 250,
					header: ".accordion-header"
				}).sortable({
					axis: "y",
					handle: ".accordion-header",
					stop: function( event, ui ) {
						// IE doesn't register the blur when sorting
						// so trigger focusout handlers to remove .ui-state-focus
						ui.item.children( ".accordion-header" ).triggerHandler( "focusout" );
					}
				});
				//jquery tabs
				$( "#tabs" ).tabs();
				
				
				//progressbar
				$( "#progressbar" ).progressbar({
					value: 37,
					create: function( event, ui ) {
						$(this).addClass('progress progress-striped active')
							   .children(0).addClass('progress-bar progress-bar-success');
					}
				});
			
				
				//selectmenu
				 $( "#number" ).css('width', '200px')
				.selectmenu({ position: { my : "left bottom", at: "left top" } })
					
			});
		</script>

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="../assets/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="../docs/assets/js/themes/sunburst.css" />

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="../assets/js/ace/elements.onpage-help.js"></script>
		<script src="../assets/js/ace/ace.onpage-help.js"></script>
		<script src="../docs/assets/js/rainbow.js"></script>
		<script src="../docs/assets/js/language/generic.js"></script>
		<script src="../docs/assets/js/language/html.js"></script>
		<script src="../docs/assets/js/language/css.js"></script>
		<script src="../docs/assets/js/language/javascript.js"></script>
	</body>
</html>
