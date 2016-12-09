<?php
require_once 'init_inc.php';
$jqLib = 'https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js';
$db=new DB;

include_once "connDB.php";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>CALL - Hornbill Insurance </title>

		<meta name="description" content="overview &amp; stats" />
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
							<li class="active">Activity</li>
						</ul><!-- /.breadcrumb -->

					 

						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
					 
						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Activity
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									กิจกรรมใหม่<i class="ace-icon fa fa-angle-double-right"></i>รถป้ายแดง
								</small>
							</h1>
						</div><!-- /.page-header -->
                               <?php require_once('customer_notrack_info.php') ?>
							   
							 <div class="row">
								 
										         <?php require_once('Select_Campaing.php') ?>
												 
	<div class="col-sm-6">	
												 <div class="profile-user-info profile-user-info-striped col-sm-12">	
														<div class="profile-info-row">
															<div class="profile-info-value" style="background-color:#94c1e1"> </div>
		
															<div class="profile-info-value" style="background-color:#94c1e1">
																<span class="editable editable-click" id="login">เงื่อนไขประกัน</span>
															</div>
														</div>
	                                        	<div class="profile-info-row">
													<div class="profile-info-name"> แถม</div>

													<div class="profile-info-value">
												<input id="selact_free_price1" name="selact_free_price1" placeholder="0.00" class="input-medium" type="text">
													</div>
												</div>
												 <div class="profile-info-row">
													<div class="profile-info-name"> จ่าย</div>

													<div class="profile-info-value">
												    <input id="selact_pay_price1" name="selact_pay_price1" placeholder="0.00" class="input-medium" type="text">
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name">จ่ายบางส่วน(แถม)</div>

												 <div class="profile-info-value">
												    <input id="selact_other_free_price1" name="selact_other_free_price1" placeholder="0.00"class="input-medium" type="text">จ่าย    <input id="selact_other_pay_price1" name="selact_other_pay_price1" placeholder="0.00"class="input-medium" type="text">
													 
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> จ่ายประกัน</div>

													<div class="profile-info-value">
												 <input id="selact_pay1" name="selact_pay1" placeholder="0.00" class="input-medium" type="text" style="display:none">
												 <input id="select_payment_name" name="select_payment_name" value="บริษัทอีซูซุเชียงราย(2002)จำกัด 
" class="input-medium" type="text">
                                                    <div class="checkbox col-md-3">
                                                    <label>
                                                     <input name="form-field-checkbok" id="chkcompany" class="ace ace-checkbox-2" type="checkbox">
                                                     <span class="lbl">บริษัทเป็นผู้จ่าย  </span>
                                                    </label>
                                                    </div>
													</div>
												</div>
											  </div>
											  
										</div>
										
										<div class="col-sm-6">	
												 <div class="profile-user-info profile-user-info-striped col-sm-12">	
														<div class="profile-info-row">
															<div class="profile-info-value" style="background-color:#94c1e1"> </div>
		
															<div class="profile-info-value" style="background-color:#94c1e1">
																<span class="editable editable-click" id="login">เงื่อนไข พรบ</span>
															</div>
														</div>
	                                        	<div class="profile-info-row">
													<div class="profile-info-name"> แถม</div>

													<div class="profile-info-value">
												<input id="selact_free_price2" name="selact_free_price2" placeholder="0.00" class="input-medium" type="text">
													</div>
												</div>
												 <div class="profile-info-row">
													<div class="profile-info-name"> จ่าย</div>

													<div class="profile-info-value">
												    <input id="selact_pay_price2" name="selact_pay_price2" placeholder="0.00" class="input-medium" type="text">
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name">จ่ายบางส่วน(แถม)</div> 
									 
											 <div class="profile-info-value">
												    <input id="selact_other_free_price2" name="selact_other_free_price2"  placeholder="0.00" class="input-medium" type="text">จ่าย    <input id="selact_other_pay_price2" name="selact_other_pay_price2" placeholder="0.00" class="input-medium" type="text">
													 
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> หมายเลข พรบ</div>

													<div class="profile-info-value">
												 <input id="form-field-icon-1"  type="text" value="">
													</div>
												</div>
											  </div>
											  
										</div>
										
						</div><br>
						<div class="center">
						  
								<button class="btn btn-lg btn-success" id="btnsave">
												<i class="ace-icon fa fa-check"></i>
												บันทึก
								</button>	 
								<button class="btn btn-lg btn-info" id="btnsave_print">
												<i class="ace-icon fa fa-print "></i>
												บันทึกและพิมพ์ใบคำขอ
								</button>	 
					 
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Hornbill Insurance</span>
							Application &copy; 2016
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
			
					
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.js'>"+"<"+"/script>");
		</script>

		<!-- basic scripts -->

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->
<script src="assets/js/chosen.jquery.js"></script>
		<!--[if lte IE 8]>
		  <script src="../assets/js/excanvas.js"></script>
		<![endif]
		<script src="js/jquery-1.12.1.min.js"></script>-->
		<script src="assets/js/jquery-ui.custom.js"></script>
			<script src="assets/js/bootbox.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.js"></script>
		<script src="assets/js/jquery.easypiechart.js"></script>
		<script src="assets/js/jquery.sparkline.js"></script>
		<script src="assets/js/flot/jquery.flot.js"></script>
		<script src="assets/js/flot/jquery.flot.pie.js"></script>
		<script src="assets/js/flot/jquery.flot.resize.js"></script>

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
		<script src="assets/js/ace-extra.js"></script>
		<script src="assets/js/date-time/bootstrap-datepicker.js"></script>
		<script src="assets/js/date-time/bootstrap-timepicker.js"></script>
		<script src="assets/js/date-time/moment.js"></script>
		<script src="assets/js/date-time/daterangepicker.js"></script>
		<script src="assets/js/date-time/bootstrap-datetimepicker.js"></script>
		<script src="assets/js/bootstrap-colorpicker.js"></script>
		
		<script src="assets/js/jquery.autosize.js"></script>
		<script src="assets/js/jquery.inputlimiter.1.3.1.js"></script>
		<script src="assets/js/jquery.maskedinput.js"></script>
		<script src="assets/js/bootstrap-tag.js"></script>

       <script src="assets/js/jquery.knob.js"></script>
		<!-- ace scripts -->
		<script src="assets/js/ace/elements.scroller.js"></script>
 
		<script src="assets/js/ace/elements.fileinput.js"></script>
 
		<script src="assets/js/ace/elements.spinner.js"></script>
		
		
		<!-- ace scripts -->
  
	 
		<script src="assets/js/ace/elements.typeahead.js"></script>
		<script src="assets/js/ace/elements.wysiwyg.js"></script>
		<script src="assets/js/ace/elements.spinner.js"></script>
		<script src="assets/js/ace/elements.treeview.js"></script>
		<script src="assets/js/ace/elements.wizard.js"></script>
		<script src="assets/js/ace/elements.aside.js"></script>
	  
		 
		
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$('.modal.aside').ace_aside();
				
				$('#aside-inside-modal').addClass('aside').ace_aside({container: '#my-modal > .modal-dialog'});
				
				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove before leaving page
					$('.modal.aside').remove();
					$(window).off('.aside')
				});
			})
		</script>
		
<script type="text/javascript">
$( document ).ready(function() {
    CheckNumber("selact_price");
	CheckNumber("seldiscount");
	CheckNumber("selservice");
	CheckNumber("selact_free_price1");
	CheckNumber("selact_pay_price1");
	CheckNumber("selact_pay1");
	CheckNumber("selact_free_price2");
	CheckNumber("selact_free_price2");
	CheckNumber("selact_other_pay_price1");
	CheckNumber("selact_other_pay_price2");
	CheckNumber("selact_other_free_price1");
	CheckNumber("seltax");
	CheckNumber("seldiscount_act");
	CheckNumber("seldiscount_tax");
	//CheckNumber("selact_other_free_price2");
	//CheckNumber("selact_other_free_price2");
	
	 
});

function findAndReplace(string, target, replacement) {
 
 var i = 0, length = string.length;
 
 for (i; i < length; i++) {
 
   string = string.replace(target, replacement);
 
 }
 
 return string;
 
}
 
				<!-- inline scripts related to this page -->

			$(function($) {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});
			
			
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
			
			
				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});
				
				$('textarea[class*=autosize]').autosize({append: "\n"});
				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});
			
				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
			
			
			
				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).val('.'+sizing[val]);
					}
				});
			
				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});
			
			
				
				//"jQuery UI Slider"
				//range slider tooltip example
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1] + "";
			
						if( !ui.handle.firstChild ) {
							$("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
							.prependTo(ui.handle);
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('span.ui-slider-handle').on('blur', function(){
					$(this.firstChild).hide();
				});
				
				
				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});
				
				$( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true
						
					});
				});
				
				$("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item
			
				
				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
			
			
				$('#id-input-file-3').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
				
				
				//$('#id-input-file-3')
				//.ace_file_input('show_file_list', [
					//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
					//{type: 'file', name: 'hello.txt'}
				//]);
			
				
				
			
				//dynamically change allowed formats by changing allowExt && allowMime function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var whitelist_ext, whitelist_mime;
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "ace-icon fa fa-picture-o";
			
						whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
						whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "ace-icon fa fa-cloud-upload";
						
						whitelist_ext = null;//all extensions are acceptable
						whitelist_mime = null;//all mimes are acceptable
					}
					var file_input = $('#id-input-file-3');
					file_input
					.ace_file_input('update_settings',
					{
						'btn_choose': btn_choose,
						'no_icon': no_icon,
						'allowExt': whitelist_ext,
						'allowMime': whitelist_mime
					})
					file_input.ace_file_input('reset_input');
					
					file_input
					.off('file.error.ace')
					.on('file.error.ace', function(e, info) {
						//console.log(info.file_count);//number of selected files
						//console.log(info.invalid_count);//number of invalid files
						//console.log(info.error_list);//a list of errors in the following format
						
						//info.error_count['ext']
						//info.error_count['mime']
						//info.error_count['size']
						
						//info.error_list['ext']  = [list of file names with invalid extension]
						//info.error_list['mime'] = [list of file names with invalid mimetype]
						//info.error_list['size'] = [list of file names with invalid size]
						
						
						/**
						if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
						*/
						
						
						//if files have been selected (not dropped), you can choose to reset input
						//because browser keeps all selected files anyway and this cannot be changed
						//we can only reset file field to become empty again
						//on any case you still should check files with your server side script
						//because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
					});
				
				});
			
				$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.closest('.ace-spinner')
				.on('changed.fu.spinbox', function(){
					//alert($('#spinner1').val())
				}); 
				$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
				$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
				$('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});
			
				//$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
				//or
				//$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
				//$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0
			
			
				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			
				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});
			
			
				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
			
			
				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				$('#date-timepicker1').datetimepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
			
				$('#colorpicker1').colorpicker();
			
				$('#simple-colorpicker-1').ace_colorpicker();
				//$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
				//$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
				//var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
				//picker.pick('red', true);//insert the color if it doesn't exist
			
			
				$(".knob").knob();
				
				
				var tag_input = $('#form-field-tags');
				try{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
						/**
						//or fetch data from database, fetch those that match "query"
						source: function(query, process) {
						  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
						  .done(function(result_items){
							process(result_items);
						  });
						}
						*/
					  }
					)
			
					//programmatically add a new
					var $tag_obj = $('#form-field-tags').data('tag');
					$tag_obj.add('Programmatically Added');
				}
				catch(e) {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//$('#form-field-tags').autosize({append: "\n"});
				}
				
				
				/////////
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})
				
				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					if(!ace.vars['touch']) {
						$(this).find('.chosen-container').each(function(){
							$(this).find('a:first-child').css('width' , '210px');
							$(this).find('.chosen-drop').css('width' , '210px');
							$(this).find('.chosen-search input').css('width' , '200px');
						});
					}
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/
			
					$.mask.definitions['~']='[+-]';
				 
			 
				$('#form-field-icon-1').mask('99-9-9999999-99999');
				
				$(document).one('ajaxloadstart.page', function(e) {
					$('textarea[class*=autosize]').trigger('autosize.destroy');
					$('.limiterBox,.autosizejs').remove();
					$('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
				});
			
			});

///
 // Specify a function to execute when the DOM is fully loaded.
		</script>

 

<script type="text/javascript">
function CheckNumber(stext) {
    $("#"+stext).keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
  	
	
	
};
function Calinsure_act()
{
var total=0;
	$("#net_price").html("");
 
if(parseFloat($('#selact_price').val()) <=0){
   total=(parseFloat($('#seltotal').val()) - parseFloat($('#selact').val()) );
}else{
  total=parseFloat($('#seltotal').val()) + parseFloat($('#selact').val()) ;
}
 
 $("#net_price").append("<span class='bigger-175 blue' >"+ addCommas(total) +" บาท</span>");
 }
 
function Calinsure()
{
 
var caldis=0;
var total=0;
  $("#net_price").html("");
 
 
	   total =(parseFloat($('#seltotal').val()) -parseFloat($('#seldiscount').val()))+parseFloat($('#selservice').val());

	
     $("#net_price").append("<span class='bigger-175 blue' >"+ addCommas(total) +" บาท</span>");
  
}
 // Specify a function to execute when the DOM is fully loaded.
$(function(){
	var defaultOption = '<option value=""> ------- เลือก ------ </option>';
	var loadingImage  = '<img src="images/loading4.gif" alt="loading" />';
	// Bind an event handler to the "change" JavaScript event, or trigger that event on an element.
	$('#seltype').change(function() {
		$("#selcampaign").html(defaultOption);
 
	
 
		// Perform an asynchronous HTTP (Ajax) request.
		$.ajax({
			// A string containing the URL to which the request is sent.
			url: "actioncampaing.php",
			//type: "GET",
			// Data to be sent to the server.
			data: ({ nextList : 'campaign', type_id: $('#seltype').val() }),
			// The type of data that you're expecting back from the server.
			dataType: "json",
			// beforeSend is called before the request is sent
			beforeSend: function() {
				$("#waitcampaign").html(loadingImage);
			},
			// success is called if the request succeeds.
			success: function(json){
				//alert('zzzzzz');
				$("#waitcampaign").html("");
				// Iterate over a jQuery object, executing a function for each matched element.
				$.each(json, function(index, value) {
					// Insert content, specified by the parameter, to the end of each element
					// in the set of matched elements.
					 
					 $("#selcampaign").append('<option value="' + value.campaign_id + 
											'">' + value.campaign_description +' ทุนประกัน [' + addCommas(value.insurance_startfund)  +'-'+ addCommas(value.insurance_endfund)+'] ...'+ value.company_name +'</option>');
				});
			}
		});
	});
	
	$('#selcampaign').change(function() {
	    

		$.ajax({
			url: "actioncampaing.php",
			data: ({ nextList : 'company', campaignID: $('#selcampaign').val() }),
			dataType: "json",
			beforeSend: function() {
				$("#waitcompany").html(loadingImage);
			},
			success: function(json){
			$("#waitcompany").html("");$("#selfund").html("");
			$("#selfund1").html("");
			$("#selact_price").html("");
			$("#selinsurance_price").html("");
			$("#selinsurance_price_total").html("");
			$("#net_price").html("");
			$("#free_1").html("");
			$("#free_2").html("");
			$("#free_3").html("");
			$("#selact").val(0);
			
				$.each(json, function(index, value) {
				
				   
  					 //============
					 $("#selfund").append("<span class='bigger-175 blue' >"+ addCommas(value.insurance_startfund) +"-"+ addCommas(value.insurance_endfund)+" บาท</span>");
					 //============
					  $("#selfund1").append("<span class='bigger-175 blue' >"+ addCommas(value.insurance_startfund)+"-"+ addCommas(value.insurance_endfund)+" บาท</span>");
					  
					  //  $('#selact_price').val(addCommas(value.act_price));
						$("#selact_price").append("<span class='bigger-175 blue' >"+ addCommas(parseFloat(value.act_price).toFixed(2))+" </span><span  class='bigger-175 blue' >บาท</span>");
	
					//	$('#selact').val(addCommas(value.act_price));
					  //============
					    $('#selcartype').val(value.vehicle_code_id);
					  
					 var $price=0;
				      
					  if(parseFloat(value.insurance_price_repair_garage) >0){
					     $price=parseFloat(value.insurance_price_repair_garage);
					  }else{
					      $price=parseFloat(value.insurance_price_repair_center);
					  }
					    
					   $("#selinsurance_price").append("<span class='bigger-175 blue' >"+ addCommas(parseFloat($price).toFixed(2))+" </span><span id='free_1' class='bigger-175 blue' >บาท</span>");
					   
					   //============
					   $price_tax=(parseFloat($price)+ parseFloat(value.insurance_tax))*0.07;
					   $price_total=(parseFloat($price)+ parseFloat(value.insurance_tax))+parseFloat($price_tax);
					   $price_total_all=$price_total+parseFloat(value.act_price);
					   //$("#selinsurance_price_total").val($price_total);
					   $("#selinsurance_price_total").append("<span class='bigger-175 blue' >"+ addCommas(parseFloat($price_total).toFixed(2))+" </span><span id='free_1' class='bigger-175 blue' >บาท</span>");
					    //============
				    $("#net_price").append("<span class='bigger-175 blue' >"+ addCommas(parseFloat($price_total_all).toFixed(2))+" </span><span id='free_1' class='bigger-175 blue' >บาท</span>");
					  //$("#net_price").val(parseFloat($price_total_all).toFixed(2));
					 //  $('#net_price').val(addCommas(value.price_total));
					   $('#seltotal').val($price_total_all);
					 
						
 
					  
				});
			}
		});
	});
});
		function addCommas(str) {
			var parts = (str + "").split("."),
				main = parts[0],
				len = main.length,
				output = "",
				first = main.charAt(0),
				i;
		
			if (first === '-') {
				main = main.slice(1);
				len = main.length;    
			} else {
				first = "";
			}
			i = len - 1;
			while(i >= 0) {
				output = main.charAt(i) + output;
				if ((len - i) % 3 === 0 && i > 0) {
					output = "," + output;
				}
				--i;
			}
			// put sign back
			output = first + output;
			// put decimal part back
			if (parts.length > 1) {
				output += "." + parts[1];
			}
			return output;
		}

 

</script>
		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="assets/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="docs/assets/js/themes/sunburst.css" />

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
						class_name: (!$('#gritter-light').get(0).checked ? 'gritter-light' : '')
					});
			
					return false;
				});
			
				$('#gritter-sticky').on(ace.click_event, function(){
					var unique_id = $.gritter.add({
						title: 'This is a sticky notice!',
						text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" class="red">magnis dis parturient</a> montes, nascetur ridiculus mus.',
						image: 'assets/avatars/avatar.png',
						sticky: true,
						time: '',
						class_name: 'gritter-info' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
					});
			
					return false;
				});
			
			
				$('#gritter-without-image').on(ace.click_event, function(){
					$.gritter.add({
						// (string | mandatory) the heading of the notification
						title: 'This is a notice without an image!',
						// (string | mandatory) the text inside the notification
						text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" class="orange">magnis dis parturient</a> montes, nascetur ridiculus mus.',
						class_name: 'gritter-success' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
					});
			
					return false;
				});
			
			
				$('#gritter-max3').on(ace.click_event, function(){
					$.gritter.add({
						title: 'This is a notice with a max of 3 on screen at one time!',
						text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" class="green">magnis dis parturient</a> montes, nascetur ridiculus mus.',
						image: 'assets/avatars/avatar3.png', //in Ace demo assets will be replaced by correct assets path
						sticky: false,
						before_open: function(){
							if($('.gritter-item-wrapper').length >= 3)
							{
								return false;
							}
						},
						class_name: 'gritter-warning' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
					});
			
					return false;
				});
			
			
				$('#gritter-center').on(ace.click_event, function(){
					$.gritter.add({
						title: 'This is a centered notification',
						text: 'Just add a "gritter-center" class_name to your $.gritter.add or globally to $.gritter.options.class_name',
						class_name: 'gritter-info gritter-center' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
					});
			
					return false;
				});
				
				$('#gritter-error').on(ace.click_event, function(){
					$.gritter.add({
						title: 'This is a warning notification',
						text: 'Just add a "gritter-light" class_name to your $.gritter.add or globally to $.gritter.options.class_name',
						class_name: 'gritter-error' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
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
				
			/**
				$("#bootbox-confirm").on(ace.click_event, function() {
					bootbox.confirm({
						message: "Are you sure?",
						buttons: {
						  confirm: {
							 label: "OK",
							 className: "btn-primary btn-sm",
						  },
						  cancel: {
							 label: "Cancel",
							 className: "btn-sm",
						  }
						},
						callback: function(result) {
							if(result) alert(1)
						}
					  }
					);
				});
			**/
					
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
		    

		    $('#btnsave').on(ace.click_event, function() {
			    var seltype=$('#selcartype option:selected').val();
				var selcampaign=$('#selcampaign option:selected').val();
				var car_type=$('#select_vehicle_model  option:selected').val();
					  if(seltype==0){
						alert('กรุณาเลือกรหัส');
						return false;
					}
					if(seltype==0){
						alert('กรุณาเลือกประเภทประกัน');
						return false;
					}
					if(selcampaign==0){
						alert('กรุณาเลือกแคมเปญ');
						return false;
					}
				bootbox.confirm("<h3>คุณต้องการบันทึกรายการนี้ ? </h3>", function(result) {
			  if(result) {
			
			  	
						var cu_id=<?=$_GET['cus_id']; ?>;
						var ve_id=<?=$_GET['vehicle_id']; ?>;
		 
					 
					 
						var s_date=$('#startDate').val();
						var e_date=$('#endDate').val();
						var act_price=$('#selact_price').val();
						var discount=$('#seldiscount').val();
						var service=$('#selservice').val();
					    var discount_tax=$('#seldiscount_tax').val();
						var discount_act=$('#seldiscount_act').val();
						
						var selinsurance_price_total=findAndReplace(findAndReplace($('#selinsurance_price_total').text(),"บาท",""),",","");
						var selact_price=$('#selact_price').val();
						var selnet_total=findAndReplace(findAndReplace($('#net_price').text(),"บาท",""),",","");
						 
						 //  Box1 ประกัน
						 var free_price1=$('#selact_free_price1').val();
						 var pay_price1=$('#selact_pay_price1').val();
						 var other_free_price1=$('#selact_other_free_price1').val();
						 var other_pay_price1=$('#selact_other_pay_price1').val();
						 var act_pay1=$('#selact_pay1').val();  
						 var payment_name=$('#select_payment_name').val();  
						  //  Box2 พรบ
						 var free_price2=$('#selact_free_price2').val();
						 var pay_price2=$('#selact_pay_price2').val();
						 var other_free_price2=$('#selact_other_free_price2').val();
						 var other_pay_price2=$('#selact_other_pay_price2').val();
						 var act_number=$('#form-field-icon-1').val();  
						 var seltax=$('#seltax').val();  
		 
						
						var url_link='save_newcar.php';
						 $.ajax({
								url: url_link,
								type: "post",
								data: {cu_id:cu_id,ve_id:ve_id,seltype:seltype,selcampaign:selcampaign,seltype:seltype,car_type:car_type,s_date:s_date,e_date:e_date,act_price:act_price,discount:discount,service:service,selinsurance_price_total:selinsurance_price_total,selact_price:selact_price,selnet_total:selnet_total,free_price1:free_price1,pay_price1:pay_price1,other_free_price1:other_free_price1,other_pay_price1:other_pay_price1,act_pay1:act_pay1,payment_name:payment_name,free_price2:free_price2,pay_price2:pay_price2,other_free_price2:other_free_price2,other_pay_price2:other_pay_price2,act_number:act_number,discount_tax:discount_tax,discount_act:discount_act,seltax:seltax},
								//success: function (response) {
								success: function(response) { 
								//error: function(ts) { alert(ts.responseText) }
								 
						         window.location='listactivitytrack.php';
								},
								error: function(jqXHR, textStatus, errorThrown) {
							 
								 console.log(textStatus, errorThrown);
								}
						
						
							});/**/
                     }
					 });
			 });
 	  $('#btnsave_print').on(ace.click_event, function() {
			    var seltype=$('#selcartype option:selected').val();
				var selcampaign=$('#selcampaign option:selected').val();
				var car_type=$('#select_vehicle_model  option:selected').val();
					  if(seltype==0){
						alert('กรุณาเลือกรหัส');
						return false;
					}
					if(seltype==0){
						alert('กรุณาเลือกประเภทประกัน');
						return false;
					}
					if(selcampaign==0){
						alert('กรุณาเลือกแคมเปญ');
						return false;
					}
				bootbox.confirm("<h3>คุณต้องการบันทึกรายการนี้ ? </h3>", function(result) {
			  if(result) {
			
			  	
						var cu_id=<?=$_GET['cus_id']; ?>;
						var ve_id=<?=$_GET['vehicle_id']; ?>;
		 
					 
					 
						var s_date=$('#startDate').val();
						var e_date=$('#endDate').val();
						var act_price=$('#selact_price').val();
						var discount=$('#seldiscount').val();
						var service=$('#selservice').val();
					 
						
						var selinsurance_price_total=findAndReplace(findAndReplace($('#selinsurance_price_total').text(),"บาท",""),",","");
						var selact_price=$('#selact_price').val();
						var selnet_total=findAndReplace(findAndReplace($('#net_price').text(),"บาท",""),",","");
						 
						 //  Box1 ประกัน
						 var free_price1=$('#selact_free_price1').val();
						 var pay_price1=$('#selact_pay_price1').val();
						 var other_free_price1=$('#selact_other_free_price1').val();
						 var other_pay_price1=$('#selact_other_pay_price1').val();
						 var act_pay1=$('#selact_pay1').val();  
						 var payment_name=$('#select_payment_name').val();  
						  //  Box2 พรบ
						 var free_price2=$('#selact_free_price2').val();
						 var pay_price2=$('#selact_pay_price2').val();
						 var other_free_price2=$('#selact_other_free_price2').val();
						 var other_pay_price2=$('#selact_other_pay_price2').val();
						 var act_number=$('#form-field-icon-1').val();  
						 //var payment_name=$('#select_payment_name').val();  
		 
						
						var url_link='save_newcar.php';
						 $.ajax({
								url: url_link,
								type: "post",
								data: {cu_id:cu_id,ve_id:ve_id,seltype:seltype,selcampaign:selcampaign,seltype:seltype,car_type:car_type,s_date:s_date,e_date:e_date,act_price:act_price,discount:discount,service:service,selinsurance_price_total:selinsurance_price_total,selact_price:selact_price,selnet_total:selnet_total,free_price1:free_price1,pay_price1:pay_price1,other_free_price1:other_free_price1,other_pay_price1:other_pay_price1,act_pay1:act_pay1,payment_name:payment_name,free_price2:free_price2,pay_price2:pay_price2,other_free_price2:other_free_price2,other_pay_price2:other_pay_price2,act_number:act_number,},
								//success: function (response) {
								success: function(response) { alert("succsess") ;
								//error: function(ts) { alert(ts.responseText) }
								 
						         window.location='main-print.php?cus_id=cu_id&ve_id=ve_id';
								},
								error: function(jqXHR, textStatus, errorThrown) {
							 
								 console.log(textStatus, errorThrown);
								}
						
						
							});/**/
                     }
					 });
					 
					 });
					 	 
 	 
		</script>

	</body>
</html>
