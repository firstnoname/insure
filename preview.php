<?php
require_once 'init_inc.php';
require_once 'connDB.php';
$db=new DB;

  $cusno = $_GET['data'];
  $type_letter = $_GET['type'];

  $cus_name = array();
  $cus_lastname = array();
  $cus_address = array();
  $cover_enddate = array();
  $campaign_name = array();
  $start_fund = array();
  $end_fund = array();
  $net_price = array();
  $net_act = array();
  $net_tax = array();
  $cus_regis = array();
  $emp_name = array();
  $emp_surname = array();
  $emp_position = "ตำแหน่ง";
  $monthNames= array("","มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
  $date = date("Y/m/d");
  $cd = date('d',strtotime($date));
  $cm = $monthNames[date('m',strtotime($date))];
  $cy = date('Y',strtotime($date))+543;
  $date = $cd.' '.$cm.' '.$cy;

  $subString = explode(" ",$cusno);

  // foreach ($subString as $key => $value) {
  //   echo "Key:".$key."Values:".$value."<br>";
  //   echo $subString[$key];
  // }

  //Select type of letter.
  $queryType = "SELECT *
                FROM insurance_letter
                WHERE insurance_letter.letter_id =".$type_letter;
  $queryLetter = mysql_query($queryType) or die (mysql_error());
  $resultDetailLetter=mysql_fetch_array($queryLetter);

  //End get letter detail.

  //Select only where cusno.
  $queryCus = "SELECT
                insurance_relationship_view.cusno,
                insurance_relationship_view.cus_name,
                insurance_relationship_view.cus_surename,
                insurance_relationship_view.address_full_name,
                insurance_relationship_view.vehicle_regis,
                insurance_sale.insure_enddate,
                insurance_sale.net_price,
                insurance_sale.net_act,
                insurance_sale.insurance_tax,
                insurance_sale.campaign_id,
                insurance_sale.cus_id,
                insurance_sale.emp_id,
                insurance_campaign_detail.campaign_description,
                insurance_campaign_detail.insurance_startfund,
                insurance_campaign_detail.insurance_endfund,
                insurance_campaign_detail.campaign_id,
                insurance_emp_view.emp_name,
                insurance_emp_view.empsurname
          FROM insurance_sale
          RIGHT OUTER JOIN insurance_relationship_view ON insurance_relationship_view.cusno = insurance_sale.cus_id
          LEFT JOIN insurance_campaign_detail ON insurance_campaign_detail.campaign_id = insurance_sale.campaign_id
          LEFT JOIN insurance_emp_view ON insurance_emp_view.id_card = insurance_sale.emp_id ";

  foreach ($subString as $key => $value) {
    $arrCusNo[]="insurance_relationship_view.cusno=".$value;
    //echo $value.$arrCusNo[$key]."<br>";
  }
  $queryCus .= "WHERE ".implode(" or ", $arrCusNo);
  //echo $queryCus;


  $queryCusInfo=mysql_query($queryCus) or die (mysql_error());
  while ($resultCusInfo = mysql_fetch_array($queryCusInfo)) {
    // echo "<br>Name : " . $cus_name[] = $resultCusInfo['cus_name'];
    // echo "<br>Lastname : ".$cus_lastname[] = $resultCusInfo['cus_surename'];
    // echo "<br>Address : ".$cus_address[] = $resultCusInfo['address_full_name'];
    // echo "<br>End date : ".$cover_enddate[] = $resultCusInfo['insure_enddate'];
    // echo "<br>Campaign name : ".$campaign_name[] = $resultCusInfo['campaign_description'];
    // echo "<br>Start fund : ".$start_fund[] = $resultCusInfo['insurance_startfund'];
    // echo "<br>End fund : ".$end_fund[] = $resultCusInfo['insurance_endfund'];
    // echo "<br>Net price : ".$net_price[] = $resultCusInfo['net_price'];
    // echo "<br>Net act : ".$net_act[] = $resultCusInfo['net_act'];
    // echo "<br>Net tax : ".$net_tax[] = $resultCusInfo['insurance_tax'];
    // echo "<br>Regis : ".$cus_regis[] = $resultCusInfo['vehicle_regis'];
    // echo "<br>Emp name : ".$emp_name[] = $resultCusInfo['emp_name'];

    $cus_name[] = $resultCusInfo['cus_name'];
    $cus_lastname[] = $resultCusInfo['cus_surename'];
    $cus_address[] = $resultCusInfo['address_full_name'];
    //Convert date.
    //echo $monthNames[date('m',strtotime($resultCusInfo['insure_enddate']))];

    $d = date('d',strtotime($resultCusInfo['insure_enddate']));
    $m = $monthNames[number_format(date('m',strtotime($resultCusInfo['insure_enddate'])))];
    $y = date('Y',strtotime($resultCusInfo['insure_enddate']))+543;
    //End convert date.
    $cover_enddate[] = $d.' '. $m.' '. $y;
    $campaign_name[] = $resultCusInfo['campaign_description'];
    $start_fund[] = $resultCusInfo['insurance_startfund'];
    $end_fund[] = $resultCusInfo['insurance_endfund'];
    $net_price[] = $resultCusInfo['net_price'];
    $net_act[] = $resultCusInfo['net_act'];
    $net_tax[] = $resultCusInfo['insurance_tax'];
    $cus_regis[] = $resultCusInfo['vehicle_regis'];
    $emp_name[] = $resultCusInfo['emp_name'];
    $emp_surname[] = $resultCusInfo['empsurname'];
    //$emp_position

  }

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
  <style type="text/css" media="print">
   @page {
       size: auto;   /* auto is the initial value */
       margin: 0;  /* this affects the margin in the printer settings */
 }
 </style>
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
            <div class="space-8"></div>
            <tr>
            <!-- <div align="right">
              <button class="btn btn-info" id="btnPrint" name="btnPrint">
                  <i class="ace-icon fa bigger-110"></i>พิมพ์จดหมาย</button> -->
              <!-- <button class="btn btn-info" id="btnCancel" name="btnCancel">
                      <i class="ace-icon fa bigger-110"></i>ยกเลิก</button> -->
            </tr>
          </div>
            <div class="space-8"></div>
						<!-- /section:basics/content.searchbox -->
					</div>
 					<div class="page-content">
  					<?php
                //$replace = array("{ชื่อลูกค้า}","{ทะเบียนรถ}");
                //  function replaceName($data){
                //    $arr_name = array("FUCKKKK","1");
                //    $originName = array("{ชื่อลูกค้า}","5");
                //    $replace = str_ireplace($originName,$arr_name,$data);
                //    return $data;
                //  }

                //  foreach ($cus_info as $key => $value) {
                //    echo "Key: ".$key."Info: ".$cus_info[$key]." Regis: ".$cus_regis[$key]."<br>";
                 //
                //  }
                //$content_letter = $resultDetailLetter['letter_detail'];

                foreach ($cus_name as $key => $value) {
                  $arr_replace = array($cus_name[$key],$cus_lastname[$key],
                                       $cus_address[$key],$cover_enddate[$key],
                                       $campaign_name[$key],$start_fund[$key],
                                       $end_fund[$key],$net_price[$key],
                                       $net_act[$key],$cus_regis[$key],
                                       $emp_name[$key],$emp_surname[$key],
                                       $date,$emp_position);
                  $originName = array("{ชื่อลูกค้า}","{นามสกุลลูกค้า}","{ที่อยู่ลูกค้า}","{วันที่สิ้นสุดประกัน}",
                  "{ชื่อแคมเปญ}","{ทุนประกัน}","{เบี้ยรวมสุทธิ}","{เบี้ยพรบ}","{เบี้ยภาษี}",
                  "{ทะเบียนรถ}","{เจ้าหน้าที่}","{นามสกุลเจ้าหน้าที่}","{วันที่}","{ตำแหน่ง}");
                  $content_letter = $resultDetailLetter['letter_detail'];
                  //$replacedName = replaceName($content_letter);
                  $content_letter = str_ireplace($originName,$arr_replace,$content_letter);
                  echo $content_letter;
                }

                 //include('letter_content.php');
                 //echo $resultDetailLetter['letter_detail'];
            ?>


 					</div><!-- PAGE CONTENT ENDS -->
 				</div><!-- /.col -->
 			</div><!-- /.row -->
 		</div><!-- /.page-content -->
 	</div>
 </div><!-- /.main-content -->


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
    <script>
      //Click cancel.
      $(document).ready(function(){

        var jscusno = <?php echo json_encode($subString); ?>


        $('#btnCancel').click(function(){
          window.location.href = 'list_customer_activity_send.php';
        });//End click cancle.

        //Click print.
        $('#btnPrint').click(function(){
          alert("Print letter complete.");
          window.location.href = 'list_customer_activity_send.php';
        });//End click print.
      });
    </script>
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


 		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
 		<link rel="stylesheet" href="assets/css/ace.onpage-help.css" />
 		<link rel="stylesheet" href="docs/assets/js/themes/sunburst.css" />





 		 <!-- /for search -->
 	</body>
 </html>
