<?php
require_once 'init_inc.php';
    $db = new DB;
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
                                    <a href="Show_Campaign.php">แคมเปญ (ผลิตภัณฑ์)</a>
                                </small>
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                    <a href="Create_Campaign.php">เพิ่มแคมเปญ (ผลิตภัณฑ์)</a>
                                </small>
							</h1>
						</div>
						<!-- #section:settings.box -->
					     	<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
<?php

    if (isset($_POST['SAVE'])) {
        $arr_data = array(
            'campaign_description' => $_POST['campaign_description'],
            'campaign_discount' => $_POST['campaign_discount'],
            'campaign_car_age' => $_POST['campaign_car_age'],
            'campaign_income' => $_POST['campaign_income'],
            'insurance_startfund' => $_POST['insurance_startfund'],
            'insurance_endfund' => $_POST['insurance_endfund'],
            'insurance_price_repair_center' => $_POST['insurance_price_center'],
            'insurance_price_repair_garage' => $_POST['insurance_price_garage'],
            'insurance_tax' => $_POST['insurance_tax'],
 		    'Promo_sale' => $_POST['insurance_promo'], //ค่าส่งเสริมการขาย
			'act_price' => $_POST['act_price'],
            'campaign_detail_file' => $_POST['campaign_detail_file'],
            'company_id' => $_POST['company_id'],
			'campaign_act' => $_POST['campaign_act'],
			'act_com_promo' => $_POST['act_com_promo'],
			'insure_act_type' => $_POST['select_com_act'],
			'insure_commit_type' => $_POST['select_com_promo'],
			'campaign_income_type' => $_POST['select_income_insure'],
			'campaign_act_type' => $_POST['select_income_act'],
			'campaign_start' => $_POST['startDate'],
			'campaign_end' => $_POST['endDate'],
			'vehicle_code_id' =>$_POST['selvehicle_code'],
            'insurance_type' => $_POST['insurance_type_id']

        );
        
        $db->insert('insurance_campaign_detail',$arr_data);
        
      echo "<script>alert('ระบบทำการบันทึกข้อมูลเรียบร้อย'); javascript:location='Show_Campaign.php';</script>";
    }

?>
<?php
	if(isset($_GET['id'])){
		$arr_data=array(
			'campaign_id'=>$_GET['id']
		);
		$data = $db->select_where('insurance_campaign_detail',$arr_data);

		foreach ($data as $dd ) {

?>
								<form class="form-horizontal" role="form" method="POST">
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> เลือกบริษัทประกัน</label>

										<div class="col-sm-4" >
											
											<select name="company_id"  id="select" data-placeholder="Choose a State...">
                                                
                                                <?php
													$coms = $db->select('insurance_company'); 
													foreach ($coms as $com):
														echo $db->select_options(array($com['id']=>$com['company_name']),$dd['company_id']); 
												?>
                                        
                                                <?php
			                                        endforeach
			                                    ?>
                                            </select>
                                            
										</div>
										
									</div>
									
							
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ประเภทประกัน</label>

										<div class="col-sm-4">
											<select name="insurance_type_id"  id="select" data-placeholder="Choose a State...">
                                                <?php
													$coms = $db->select('insurance_type'); 
													foreach ($coms as $com):
													echo $db->select_options(array($com['id']=>$com['insurance_type']),$dd['insurance_type']); 
												?>
                                                 
                                                <?php
			                                        endforeach
			                                    ?>
                                            </select>
										</div>
									</div>
									<div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> แคมเปญ (ผลิตภัณฑ์)</label>

                                        <div class="col-sm-6">
                                            <input type="text" id="form-field-2" placeholder="แคมเปญ (ผลิตภัณฑ์)" class="col-xs-10 col-sm-5" name="campaign_description" value="<?=$dd['campaign_description']?>" />
                                        </div>
                                    </div>
                            
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> รหัสรถ</label>

										<div class="col-sm-4">
											<select name="selvehicle_code" id="selvehicle_code" data-placeholder="Choose a State..." style="width:80px">
                                                 <?php
													$coms = $db->select('insurance_vehicle_code'); 
													foreach ($coms as $com):
													echo $db->select_options(array($com['vehicle_code_id']=>$com['vehicle_code_id']),$dd['vehicle_code_id']); 
												?>
                                                 
                                                <?php
			                                        endforeach
			                                    ?>
                                            </select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">อายุรถไม่เกิน</label>
										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->
											 
											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" name="campaign_car_age" value="<?=$dd['campaign_car_age']?>" >
												 
											</span>
                                          &nbspปี
											<!-- /section:elements.form.input-icon -->
										</div>
									</div>
									
								 
								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">ทุนประกัน</label>

										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->
											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" name="insurance_startfund" value="<?=$dd['insurance_startfund']?>">
												 
											</span>
                                          -
											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" name="insurance_endfund" value="<?=$dd['insurance_endfund']?>" >
												 
											</span>

											<!-- /section:elements.form.input-icon -->
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">เบี้ยสุทธิ ซ่อมศูนย์</label>

										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->
											 
											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" name="insurance_price_center" value="<?=$dd['insurance_price_repair_center']?>">
												 
											</span>

											<!-- /section:elements.form.input-icon -->
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">เบี้ยสุทธิ ซ่อมอู่</label>

										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->
											 
											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" name="insurance_price_garage" value="<?=$dd['insurance_price_repair_garage']?>">
												 
											</span>

											<!-- /section:elements.form.input-icon -->
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">ค่าส่งเสริมการขาย(ประกัน)</label>

										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->

											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" value="<?=$dd['Promo_sale'] ?>" name="insurance_promo">

											</span>
											<span class="input-icon input-icon-right">
												<select name="select_com_promo">
                                                <?php
												  if($dd['insure_commit_type']==0){
													  echo "<option value='0' selected='selected'>บาท</option>";
												  }else{
													  echo "<option value='1' selected='selected'>%</option>";
												  }
												
												?>
                                                
                                                </select>

											</span>
											<!-- /section:elements.form.input-icon -->
										</div>
									</div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">ค่าส่งเสริมการขาย(พรบ)</label>

										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->

											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" name="act_com_promo" value="<?=$dd['act_com_promo']?>">

											</span>
											<span class="input-icon input-icon-right">
												<select name="select_com_act">
                                                <?php
									
												  if($dd['insure_act_type']==0){
													  echo "<option value='0' selected='selected'>บาท</option>";
												  }else{
													  echo "<option value='1' selected='selected'>%</option>";
												  }
												
												?>
												 
                                                </select>

											</span>
											<!-- /section:elements.form.input-icon -->
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">พรบ.</label>

										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->
											 
											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" name="act_price" value="<?=$dd['act_price']?>">
												 
											</span>

											<!-- /section:elements.form.input-icon -->
										</div>
									</div>
										<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">อากร</label>

										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->
											 
											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" name="insurance_tax" value="<?=$dd['insurance_tax']?>">
												 
											</span>

											<!-- /section:elements.form.input-icon -->
										</div>
									</div>
									<div class="form-group" style="display:none">
										<label class="col-sm-3 control-label no-padding-right">ส่วนลด</label>

										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->
											 
											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" name="campaign_discount" value="<?=$dd['campaign_discount']?>">
												 
											</span>

											<!-- /section:elements.form.input-icon -->
										</div>
									</div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">รายได้ (ประกัน)</label>

										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->

											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" name="campaign_income"  value="<?=$dd['campaign_income']?>">

											</span>
											<span class="input-icon input-icon-right">
												<select name="select_income_insure">
                                                <?php
									
												  if($dd['campaign_income_type']==0){
													  echo "<option value='0' selected='selected'>บาท</option>";
												  }else{
													  echo "<option value='1' selected='selected'>%</option>";
												  }
												
												?>
                                        
                                                </select>

											</span>
											<!-- /section:elements.form.input-icon -->
										</div>
									</div>
                                    <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">รายได้ (พรบ)</label>

										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->

											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" name="campaign_act" value="<?=$dd['campaign_act']?>">

											</span>
											<span class="input-icon input-icon-right">
												<select name="select_income_act">
                                                <?php
									
												  if($dd['campaign_act_type']==0){
													  echo "<option value='0' selected='selected'>บาท</option>";
												  }else{
													  echo "<option value='1' selected='selected'>%</option>";
												  }
												
												?>
                                                </select>

											</span>
											<!-- /section:elements.form.input-icon -->
										</div>
									</div>
									 
                                      <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">ระยะแคมเปญ</label>

										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->

											<span class="input-icon input-icon-right">
												 	<div class="input-daterange input-group">
																	<input type="text" class="input-sm form-control" id="startDate" name="startDate"  data-date-format="dd-mm-yyyy" value="<?=$dd['campaign_start']?>" />  
																	<span class="input-group-addon">
																		<i class="fa fa-exchange"></i>
																	</span>

																	<input type="text" class="input-sm form-control" id="endDate" name="endDate" data-date-format="dd-mm-yyyy"  value="<?=$dd['campaign_end']?>"  />
																</div>


											</span>
											 
											<!-- /section:elements.form.input-icon -->
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">รายละเอียดความคุ้มครอง</label>

										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->
											 
										 <div class="form-group">
															<div class="col-sm-5">
																<!-- #section:custom/file-input -->
																<label class="ace-file-input"><input type="file" id="id-input-file-2" name="campaign_detail_file" value="<?=$dd['campaign_detail_file']?>"><span class="ace-file-container" data-title="Choose"><span class="ace-file-name" data-title="No File ..."><i class=" ace-icon fa fa-upload"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
															</div>
														</div>

											<!-- /section:elements.form.input-icon -->
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

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.js'>"+"<"+"/script>");
		</script>

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
			<script src="assets/js/bootbox.js"></script>
		<script src="assets/js/jquery.autosize.js"></script>
		<script src="assets/js/jquery.inputlimiter.1.3.1.js"></script>
		<script src="assets/js/jquery.maskedinput.js"></script>
		<script src="assets/js/bootstrap-tag.js"></script>

       <script src="assets/js/jquery.knob.js"></script>
		<!-- ace scripts -->
		<script src="assets/js/ace/elements.scroller.js"></script>
 
		<script src="assets/js/ace/elements.fileinput.js"></script>
 
		<script src="assets/js/ace/elements.spinner.js"></script>
				<!-- inline scripts related to this page -->
		<script type="text/javascript">
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
				$('.input-mask-number-bank').mask('999-9-99999-9');
				$('.input-mask-number-credit').mask('9999-99999-9999-9999');
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
			
				
				
				$(document).one('ajaxloadstart.page', function(e) {
					$('textarea[class*=autosize]').trigger('autosize.destroy');
					$('.limiterBox,.autosizejs').remove();
					$('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
				});
			
			});

///
 // Specify a function to execute when the DOM is fully loaded.
		</script>
	
	</body>
	</body>
</html>
