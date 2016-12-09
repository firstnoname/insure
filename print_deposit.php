<!DOCTYPE html>
 <html ng-app="Insurance" ng-app lang="en"><head>
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

<?php

require_once 'init_inc.php';

$db=new DB;

include_once "connDB.php";
$cus_id=$_GET['cus_id'];
$ve_id=$_GET['vehicle_id'];

$sql_sub="SELECT insurance_sale.id,
insurance_relationship_view.be,
insurance_relationship_view.cus_name,
insurance_relationship_view.cus_surename,
insurance_relationship_view.relates_type,
insurance_relationship_view.address_full_name,
insurance_sale.create_date,
insurance_sale.company_name,
insurance_sale.net_act,
insurance_sale.net_price,
insurance_sale.pay_name,
insurance_sale.act_number,
insurance_sale.discount_act,
insurance_sale.discount_tax,
insurance_sale.insurance_tax,
insurance_sale.service_charge,
insurance_sale.discount_insure,
insurance_sale.insure_startdate,
insurance_sale.insure_enddate,
insurance_relationship_view.vehicle_series,
insurance_relationship_view.vehicle_brand,
insurance_relationship_view.vehicle_chassis,
insurance_relationship_view.vehicle_full_chassis,
insurance_sale.customer_type,
insurance_sale.pay_type,
insurance_sale.act_pay,
insurance_sale.insure_pay,
insurance_sale.vehicle_id,
insurance_sale.cus_id,
main_address.ADDR_VILLAGE,
main_address.ADDR_ROOM_NO,
main_address.ADDR_FLOOR_NO,
main_address.ADDR_GROUP_NO,
main_address.ADDR_LANE,
main_address.ADDR_ROAD,
main_address.ADDR_POSTCODE,
district.DISTRICT_NAME,
amphur.AMPHUR_NAME,
province.PROVINCE_NAME,
insurance_sale.car_type,
insurance_vehicle_model.vehicle_model_type,
insurance_relationship_view.vehicle_regis,
insurance_relationship_view.regis_car_type,
insurance_campaign_detail.insurance_endfund,
main_cus_ginfo.Cus_IDNo,
insurance_sale.emp_id,
insurance_emp_view.emp_be,
insurance_emp_view.emp_name,
insurance_emp_view.empsurname
FROM
insurance_sale
INNER JOIN insurance_relationship_view ON insurance_sale.cus_id = insurance_relationship_view.cusno AND insurance_sale.vehicle_id = insurance_relationship_view.vehicle_id
INNER JOIN main_cus_ginfo ON main_cus_ginfo.CusNo = insurance_sale.cus_id
INNER JOIN main_address ON main_address.ADDR_CUS_NO = insurance_sale.cus_id
INNER JOIN district ON district.DISTRICT_ID = main_address.ADDR_DISTRICT
INNER JOIN amphur ON amphur.AMPHUR_ID = main_address.ADDR_SUB_DISTRICT
INNER JOIN province ON main_address.ADDR_PROVINCE = province.PROVINCE_ID
INNER JOIN insurance_vehicle_model ON insurance_vehicle_model.vehicle_model_id = insurance_sale.car_type
INNER JOIN insurance_campaign_detail ON insurance_sale.campaign_id = insurance_campaign_detail.campaign_id
INNER JOIN insurance_emp_view ON insurance_sale.emp_id = insurance_emp_view.id_card
WHERE insurance_sale.cus_id=$cus_id and insurance_sale.vehicle_id =$ve_id";
					$rs_sub_ac=mysql_query($sql_sub);
					$rw=mysql_fetch_array($rs_sub_ac);


					$total=$rw['net_price']-$rw['discount_insure'];
					if($total <0){$total=0;}
					$total_act=$rw['net_act']-$rw['discount_act'];
					if($total_act <0){$total_act=0;}
					$total_tax=$rw['insurance_tax']-$rw['discount_tax'];
					if($total_tax <0){$total_tax=0;}
					$total_price=$total+$total_tax+$total_tax+$rw['service_charge'];
					if($total_price <0){$total_price=0;}

?>
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


					<div class="page-content">
<table width="100%" border="1" cellspacing="1" cellpadding="1">
  <tr>
    <td height="150" colspan="4" valign="top">
      <center><h4>ใบรับฝาก</h4></center>
      <center><h5>บริษัท อีซูซุเชียงราย (2002) จำกัด</h5></center>
      <center><h5>145 หมู่ 17 ถนนซุปเปอร์ไฮเวย์  ตำบลรอบเวียง</h5></center>
      <center><h5>อำเภอเมือง จังหวัดเชียงราย  57000 (053-711605)</h5></center>
      <center><h5>เลขที่บัตรประจำตัวผู้เสียภาษี 0575546000053</h5></center>
      <center><h5>สาขาที่ออก สำนักงานใหญ่</h5></center>
    </td>
  </tr>

  <tr >
    <td width="1%">&nbsp;</td>
    <td width="30%" valign="top">&nbsp;</td>
    <td valign="top">  <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h5></td>
    <td width="2%">&nbsp;</td>
  </tr>
  <tr>
    <?php
		$monthNames= ["","มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"]
	?>
    <td>&nbsp;</td>
    <td colspan="2" rowspan="16" valign="top"><table width="100%" border="5" cellspacing="1" cellpadding="1">
      <tr>
        <td width="10%">&nbsp;</td>
        <td width="25%">&nbsp;</td>
        <td width="27%">&nbsp;</td>
        <td width="17%">&nbsp;</td>
        <td width="21%">วันที่<?= date('d',strtotime($rw['create_date'])) ?> เดือน <?= $monthNames[date('m',strtotime($rw['create_date']))] ?> พ.ศ. <?= date('Y',strtotime($rw['create_date']))+543 ?></td>
      </tr>
      <tr>
        <td height="28"></td>
        <td colspan="3">นาม  <strong><?php echo  $rw['be'].''.$rw['cus_name'].' '.$rw['cus_surename'] ;?></strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="27">&nbsp;</td>
        <td colspan="3">ที่อยู่ <strong><?=$rw['ADDR_VILLAGE'].' '.$rw['ADDR_ROOM_NO'].' หมู่ '.$rw['ADDR_GROUP_NO'].' ตำบล '.$rw['DISTRICT_NAME'].' อำเภอ '.$rw['AMPHUR_NAME'].' จังหวัด '.$rw['PROVINCE_NAME']  ?></strong></td>
        <td> </td>
      </tr>
      <tr>
        <td height="27">&nbsp;</td>
        <td colspan="3">เลขประจำตัว <strong><?=$rw['Cus_IDNo'] ?></strong></td>
        <td></td>
      </tr>
      <tr>
        <td height="28">&nbsp;</td>
        <td colspan="3" align="center">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="31">&nbsp;</td>
        <td colspan="4"><table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td width="9%" height="50" align="center">ลำดับ</td>
              <td width="46%" align="center">รายการ</td>
              <td width="12%" align="center">จำนวน</td>
              <td width="17%" align="center">ราคาต่อหน่วย</td>
              <td width="16%" align="center">รวม</td>
            </tr>
            <tr>
              <td height="31" align="center">1</td>
              <td>เงินฝาก-ต่อประกันภัย</td>
              <td align="center">1</td>
              <td align="right"><?=number_format($rw['net_price']-$rw['discount_insure'],2) ?></td>
              <td align="right"><?=number_format($rw['net_price']-$rw['discount_insure'],2) ?></td>
            </tr>
            <tr>
              <td height="30" align="center">2</td>
              <td>เงินฝาก-พรบ</td>
              <td align="center">1</td>
              <td align="right"><?=number_format($total_act,2) ?></td>
              <td align="right"><?=number_format($total_act,2) ?></td>
            </tr>
            <tr>
              <td height="31" align="center">3</td>
              <td>เงินฝาก-ภาษี</td>
              <td align="center">1</td>
              <td align="right"><?=number_format($total_tax,2) ?></td>
              <td align="right"><?=number_format($total_tax,2) ?></td>
            </tr>
            <tr>
              <td height="29" align="center">4</td>
              <td>ค่าบริการ</td>
              <td align="center">1</td>
              <td align="right"><?=number_format($rw['service_charge'],2) ?></td>
              <td align="right"><?=number_format($rw['service_charge'],2) ?></td>
            </tr>
            <tr>
              <td colspan="2" align="center">ทะเบียนรถ <?=$rw['vehicle_regis'] ?></td>
              <td height="35" colspan="2" align="right">รวมราคาสินค้า</td>
              <td align="right"><?=number_format($total_price,2) ?></td>
            </tr>
            <tr>
              <td colspan="2" rowspan="2" align="center">(<?=num2wordsThai($total_price) ?>)</td>
              <td height="36" colspan="2" align="right">ภาษีมูลค่าเพิ่ม</td>
              <td align="right">0.00</td>
            </tr>
            <tr>
              <td height="34" colspan="2" align="right">จำนวนเงินรวมทั้งหมด</td>
              <td align="right"><?=number_format($total_price,2) ?></td>
            </tr>
            </tbody>
        </table></td>
        </tr>
      <tr>
        <td height="29">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="31">&nbsp;</td>
        <td align="right">ลงชื่อ</td>
        <td align="center"><?=$rw['emp_be'].''.$rw['emp_name'].' '.$rw['empsurname'] ?></td>
        <td>(ผู้ออกใบรับฝาก/ผู้รับเงิน)</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="31">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="center">(.....................................................)</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="29">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="28">&nbsp;</td>
        <td colspan="3">ใบรับฝากฉบับนี้จะสมบูรณ์ เมื่อมีลายเซ็นผู้ออกใบรับฝาก</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="37">&nbsp;</td>
        <td colspan="2">ในกรณีจ่ายเป็นเช็ค ใบรับฝากฉบับนี้จะสมบูรณ์ เมื่อเช็คได้ขึ้นเงินเรียบร้อยแล้ว</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="34">&nbsp;</td>
        <td>ชำระโดย <?=$rw['pay_type'] ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="43">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="33">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
</table>

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


		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="assets/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="docs/assets/js/themes/sunburst.css" />





		 <!-- /for search -->
	</body>
</html>
