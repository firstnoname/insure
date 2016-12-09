<?php
require_once 'init_inc.php';

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard - Hornbill Insurance </title>

<!-- page specific plugin styles -->
		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.css" />
		<link rel="stylesheet" href="../assets/css/chosen.css" />
		<link rel="stylesheet" href="../assets/css/datepicker.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="../assets/css/daterangepicker.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.css" />
		<link rel="stylesheet" href="../assets/css/colorpicker.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
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
    $db = new DB;
    if (isset($_POST['SAVE'])) {
        $arr_data = array(
            'campaign_description' => $_POST['campaign_description'],
            'campaign_discount' => $_POST['campaign_discount'],
            'campaign_car_age' => $_POST['campaign_car_age'],
            'campaign_income' => $_POST['campaign_income'],
            'insurance_startfund' => $_POST['insurance_startfund'],
            'insurance_endfund' => $_POST['insurance_endfund'],
            'insurance_price_center' => $_POST['insurance_price_center'],
            'insurance_price_garage' => $_POST['insurance_price_garage'],
            'insurance_tax' => $_POST['insurance_tax'],
            'act_price' => $_POST['act_price'],
            'campaign_detail_file' => $_POST['campaign_detail_file'],
            'company_id' => $_POST['company_id'],
            'insurance_type_id' => $_POST['insurance_type_id']

        );
        $arr_con = array(
            'campaign_id' => $_GET['id']
      );
        
        $db->update('insurance_campaign_detail',$arr_data,$arr_con);
        
        echo "save";
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
											
											<select name="company_id" class="chosen-select form-control" id="select" data-placeholder="Choose a State...">
                                                
                                                <?php
													$coms = $db->select('insurance_company'); 
													foreach ($coms as $com):
												?>
                                                <option value="<?=$com['id']?>"><?=$com['company_name']?></option>
                                                <?php
			                                        endforeach
			                                    ?>
                                            </select>
                                            
										</div>
										
									</div>
									
							
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ประเภทประกัน</label>

										<div class="col-sm-4">
											<select name="insurance_type_id" class="chosen-select form-control" id="select" data-placeholder="Choose a State...">
                                                <?php
													$coms = $db->select('insurance_type'); 
													foreach ($coms as $com):
												?>
                                                <option value="<?=$com['id']?>"><?=$com['insurance_type']?></option>
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
										<label class="col-sm-3 control-label no-padding-right">อายุรถไม่เกิน</label>
										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->
											 
											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" name="campaign_car_age" value="<?=$dd['campaign_car_age']?>">
												 
											</span>
                                          &nbspปี
											<!-- /section:elements.form.input-icon -->
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="food">เลือกยี่ห้อรถ</label>

										<div class="col-xs-12 col-sm-9">
											<!-- #section:plugins/input.multiselect -->
											<select name="carmake_id" id="food" class="multiselect" multiple="">
												 <?php
													$carmakes = $db->select('insurance_carmake'); 
													foreach ($carmakes as $carmake):
												?>
                                                <option value="<?=$carmake['carmake_id']?>"><?=$carmake['carmake_name']?></option>
                                                <?php
			                                        endforeach
			                                    ?>
											</select>เลือกรุ่นรถ
											<select name="model_id" id="food" class="multiselect" multiple="">
												<?php
													$models = $db->select('insurance_model');
													/*$models = $db->select_where('insurance_model',$carmake_id) ; */
													foreach ($models as $model):
												?>
                                                <option value="<?=$model['model_id']?>"><?=$model['model_name']?></option>
                                                <?php
			                                        endforeach
			                                    ?>
											</select>
											ยี่ห้อรถ สามารถเลือกได้มากกว่า 1 จากนั้นให้กรองรุ่นรถตามยี่ห้อ
											<!-- /section:plugins/input.multiselect -->
										</div>
									</div>
										 
								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">ทุนประกัน</label>

										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->
											<span class="input-icon">
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
										<label class="col-sm-3 control-label no-padding-right">เบี้ยประกัน ซ่อมศูนย์</label>

										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->
											 
											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" name="insurance_price_center" value="<?=$dd['insurance_price_center']?>">
												 
											</span>

											<!-- /section:elements.form.input-icon -->
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right">เบี้ยประกัน ซ่อมอู่</label>

										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->
											 
											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" name="insurance_price_garage" value="<?=$dd['insurance_price_garage']?>">
												 
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
										<label class="col-sm-3 control-label no-padding-right">ภาษีอากร</label>

										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->
											 
											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" name="insurance_tax" value="<?=$dd['insurance_tax']?>">
												 
											</span>

											<!-- /section:elements.form.input-icon -->
										</div>
									</div>
									<div class="form-group">
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
										<label class="col-sm-3 control-label no-padding-right">รายได้</label>

										<div class="col-sm-9">
											<!-- #section:elements.form.input-icon -->
											 
											<span class="input-icon input-icon-right">
												<input type="text" id="form-field-icon-2" name="campaign_income" value="<?=$dd['campaign_income']?>">
												 
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

		<!-- basic scripts -->

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
		<script src="../assets/js/jquery.bootstrap-duallistbox.js"></script>
		<script src="../assets/js/jquery.raty.js"></script>
		<script src="../assets/js/bootstrap-multiselect.js"></script>
		<script src="../assets/js/select2.js"></script>
		<script src="../assets/js/typeahead.jquery.js"></script>

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
			jQuery(function($){
			    var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox({infoTextFiltered: '<span class="label label-purple label-lg">Filtered</span>'});
				var container1 = demo1.bootstrapDualListbox('getContainer');
				container1.find('.btn').addClass('btn-white btn-info btn-bold');
			
				/**var setRatingColors = function() {
					$(this).find('.star-on-png,.star-half-png').addClass('orange2').removeClass('grey');
					$(this).find('.star-off-png').removeClass('orange2').addClass('grey');
				}*/
				$('.rating').raty({
					'cancel' : true,
					'half': true,
					'starType' : 'i'
					/**,
					
					'click': function() {
						setRatingColors.call(this);
					},
					'mouseover': function() {
						setRatingColors.call(this);
					},
					'mouseout': function() {
						setRatingColors.call(this);
					}*/
				})//.find('i:not(.star-raty)').addClass('grey');
				
				
				
				//////////////////
				//select2
				$('.select2').css('width','200px').select2({allowClear:true})
				$('#select2-multiple-style .btn').on('click', function(e){
					var target = $(this).find('input[type=radio]');
					var which = parseInt(target.val());
					if(which == 2) $('.select2').addClass('tag-input-style');
					 else $('.select2').removeClass('tag-input-style');
				});
				
				//////////////////
				$('.multiselect').multiselect({
				 enableFiltering: true,
				 buttonClass: 'btn btn-white btn-primary',
				 templates: {
					button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"></button>',
					ul: '<ul class="multiselect-container dropdown-menu"></ul>',
					filter: '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
					filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default btn-white btn-grey multiselect-clear-filter" type="button"><i class="fa fa-times-circle red2"></i></button></span>',
					li: '<li><a href="javascript:void(0);"><label></label></a></li>',
					divider: '<li class="multiselect-item divider"></li>',
					liGroup: '<li class="multiselect-item group"><label class="multiselect-group"></label></li>'
				 }
				});
				
				
				///////////////////
					
				//typeahead.js
				//example taken from plugin's page at: https://twitter.github.io/typeahead.js/examples/
				var substringMatcher = function(strs) {
					return function findMatches(q, cb) {
						var matches, substringRegex;
					 
						// an array that will be populated with substring matches
						matches = [];
					 
						// regex used to determine if a string contains the substring `q`
						substrRegex = new RegExp(q, 'i');
					 
						// iterate through the pool of strings and for any string that
						// contains the substring `q`, add it to the `matches` array
						$.each(strs, function(i, str) {
							if (substrRegex.test(str)) {
								// the typeahead jQuery plugin expects suggestions to a
								// JavaScript object, refer to typeahead docs for more info
								matches.push({ value: str });
							}
						});
			
						cb(matches);
					}
				 }
			
				 $('input.typeahead').typeahead({
					hint: true,
					highlight: true,
					minLength: 1
				 }, {
					name: 'states',
					displayKey: 'value',
					source: substringMatcher(ace.vars['US_STATES'])
				 });
					
					
				///////////////
				
				
				//in ajax mode, remove remaining elements before leaving page
				$(document).one('ajaxloadstart.page', function(e) {
					$('[class*=select2]').remove();
					$('select[name="duallistbox_demo1[]"]').bootstrapDualListbox('destroy');
					$('.rating').raty('destroy');
					$('.multiselect').multiselect('destroy');
				});
			
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
