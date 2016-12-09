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

$last_id = $_GET['last_id'];

$sql_insure_req="SELECT insurance_insure_request.insure_req_id,
	insurance_insure_request.insure_req_remark,
	insurance_insure_request.insure_req_doc_retrun_other,
	insurance_insure_request.insure_req_doc_retrun,
	insurance_insure_request.insure_req_exchange_rate,
	insurance_insure_request.insure_req_exchange_rate_type,
	insurance_insure_request.insure_req_detail_new,
	insurance_insure_request.insure_req_detail_org,
	insurance_insure_request.insure_req_emp_id,
	insurance_insure_request.insure_req_cus_id,
	insurance_insure_request.insure_req_code,
	insurance_insure_request.insure_req_deler,
	insurance_insure_request.insure_req_date,
  insurance_insure_request.insure_req_remark,
	-- insurance_insure_request_detail.insure_req_d_id,
	-- insurance_insure_request_detail.insure_req_id,
	-- insurance_insure_request_detail.insure_req_type_id,
	-- insurance_insure_request_detail.insure_req_start,
	-- insurance_insure_request_detail.insure_req_end,
	-- insurance_insure_request_detail.insure_req_remark,
	insurance_insure_request.insure_req_status,
	insurance_relationship_view.cus_name,
	insurance_relationship_view.cus_surename,
	insurance_relationship_view.address_full_name
FROM insurance_insure_request INNER JOIN insurance_insure_request_detail ON insurance_insure_request.insure_req_id = insurance_insure_request_detail.insure_req_id
	 INNER JOIN insurance_relationship_view ON insurance_insure_request.insure_req_cus_id = insurance_relationship_view.cusno
WHERE insurance_insure_request.insure_req_id = $last_id ";

$rs_insure_req = mysql_query($sql_insure_req);
$rw_insure_req = mysql_fetch_array($rs_insure_req);

$monthNames= array("","มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
$date = date("Y/m/d");
$cd = date('d',strtotime($rw_insure_req['insure_req_date']));
$cm = $monthNames[date('m',strtotime($rw_insure_req['insure_req_date']))];
$cy = date('Y',strtotime($rw_insure_req['insure_req_date']))+543;
$date = $cd.' '.$cm.' '.$cy;

//Checkbox detail.
$sql_detail = "SELECT
  insurance_insure_reguest_type.insure_reguest_name,
  insurance_insure_request_detail.insure_req_type_id,
	insurance_insure_request_detail.insure_req_remark,
	insurance_insure_request_detail.insure_req_end,
	insurance_insure_request_detail.insure_req_start
FROM insurance_insure_request_detail INNER JOIN insurance_insure_reguest_type ON insurance_insure_request_detail.insure_req_type_id = insurance_insure_reguest_type.insure_reguest_type
WHERE insurance_insure_request_detail.insure_req_id = $last_id ";

$rs_req_detail = mysql_query($sql_detail);

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
         <tr height="35">
           <td>&nbsp;สาขา</td>
           <td>&nbsp;สาขา</td>
           <td>&nbsp;วันที่</td>
         </tr>
         <tr height="35">
           <td colspan="1">&nbsp;เลขที่กรมธรรม์ <strong><?echo $rw_insure_req['insure_req_id'];?></strong></td>
           <td colspan="2">&nbsp;รหัสตัวแทน/ผู้แจ้ง <strong><?echo $rw_insure_req['insure_req_deler'];?></strong></td>
           <td colspan="1">&nbsp;เลขที่รับแจ้ง <?echo "";?></td>
         </tr>
         <tr height="35">
           <td colspan="4">&nbsp;เลขที่สลักหลัง <strong><?echo $rw_insure_req['insure_req_code'];?><strong></td>
         </tr>
         <tr height="35">
           <td colspan="1">&nbsp;ชื่อ <strong><?echo $rw_insure_req['cus_name'] ." ". $rw_insure_req['cus_surename'];?></strong></td>
           <td colspan="2">&nbsp;ผู้รับแจ้ง</td>
           <td colspan="1">&nbsp;วันที่แจ้ง   <strong><?echo $date;?></strong>   เวลา   <strong>xxx</strong>   น.</td>
         </tr>

         <tr>
           <td colspan="4" bgcolor="#b3d9ff">
             <center><h4>รายการที่ขอแก้ไข</h4></center>
           </td>
         </tr>
         <tr>
           <?
             //Check checkbox detail.
             $chkb_1 = "";
             $chkb_2 = "";
             $chkb_3 = "";
             $chkb_4 = "";
             $chkb_5 = "";
             $chkb_6 = "";
             $chkb_7 = "";
             $chkb_8 = "";
             $chkb_9 = "";
             $chkb_10 = "";
             $chkb_11 = "";
             $chkb_12 = "";
             while($rw_req_detail=mysql_fetch_array($rs_req_detail)){
               if($rw_req_detail['insure_req_type_id'] == "1"){
                 $chkb_1 = "checked";
               }
               if($rw_req_detail['insure_req_type_id'] == "2"){
                 $chkb_2 = "checked";
               }
               if($rw_req_detail['insure_req_type_id'] == "3"){
                 $chkb_3 = "checked";
               }
               if($rw_req_detail['insure_req_type_id'] == "4"){
                 $chkb_4 = "checked";
               }
               if($rw_req_detail['insure_req_type_id'] == "5"){
                 $chkb_5 = "checked";
               }
               if($rw_req_detail['insure_req_type_id'] == "6"){
                 $chkb_6 = "checked";
               }
               if($rw_req_detail['insure_req_type_id'] == "7"){
                 $chkb_7 = "checked";
               }
               if($rw_req_detail['insure_req_type_id'] == "8"){
                 $chkb_8 = "checked";
               }
               if($rw_req_detail['insure_req_type_id'] == "9"){
                 $chkb_9 = "checked";
               }
               if($rw_req_detail['insure_req_type_id'] == "10"){
                 $chkb_10 = "checked";
               }
               if($rw_req_detail['insure_req_type_id'] == "11"){
                 $chkb_11 = "checked";
               }
               if($rw_req_detail['insure_req_type_id'] == "12"){
                 $chkb_12 = "checked";
               }
               if(isset($rw_req_detail['insure_req_remark'])){
                 $edit_req_remark = $rw_req_detail['insure_req_remark'];
               }
             }
           ?>
           <td>
             <tr height="35">
              <td colspan="2">&nbsp;<input type="checkbox" disabled="disabled" <?echo $chkb_1;?>> 1. ชื่อ-นามสกุลผู้เอาประกันภัย</td>
              <td colspan="2">&nbsp;<input type="checkbox" disabled="disabled" <?echo $chkb_8;?>> 7. ยกเลิกกรมธรรม์</td>
             </tr>
             <tr height="35">
              <td colspan="2">&nbsp;<input type="checkbox" disabled="disabled" <?echo $chkb_2;?>> 2. ที่อยู่ผู้เอาประกัน</td>
              <td colspan="2">&nbsp;<input type="checkbox" disabled="disabled" <?echo $chkb_9;?>> 8. จ่ายเช็คในนาม</td>
             </tr>
             <tr height="35">
              <td colspan="2">&nbsp;<input type="checkbox" disabled="disabled" <?echo $chkb_3;?>> 3. รายการรถยนต์ที่เอาประกัน</td>
              <td colspan="2">&nbsp;<input type="checkbox" disabled="disabled" <?echo $chkb_10;?>> 9. รหัสรถ</td>
             </tr>
             <tr height="35">
              <td colspan="2">&nbsp;<input type="checkbox" disabled="disabled" <?echo $chkb_4;?>> 4. วันที่คุ้มครอง &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" disabled="disabled" <?echo $chkb_5;?>> &nbsp;วันสิ้นสุด</td>
              <td colspan="2">&nbsp;<input type="checkbox" disabled="disabled" <?echo $chkb_11;?>> 10. ประเภทการใช้รถ</td>
             </tr>
             <tr height="35">
              <td colspan="2">&nbsp;<input type="checkbox" disabled="disabled" <?echo $chkb_6;?>> 5. จำนวนเงินคุ้มครอง</td>
              <td colspan="2">&nbsp;<input type="checkbox" disabled="disabled" <?echo $chkb_12;?>> 11. อื่นๆ &nbsp;&nbsp; <?php echo $edit_req_remark; ?></td>
             </tr>
             <tr height="35">
              <td colspan="4">&nbsp;<input type="checkbox" disabled="disabled" <?echo $chkb_7;?>> 6. เบี้ยประกันภัย</td>
             </tr>
           </td>
         </tr>
         <tr>
           <td colspan="2" bgcolor="#b3d9ff"><center><h6><strong>รายละเอียดเดิม</strong></h6></center></td>
           <td colspan="2" bgcolor="#b3d9ff"><center><h6><strong>รายละเอียดใหม่</strong></h6></center></td>
         </tr>
         <tr>
           <td colspan="2">&nbsp;&nbsp;<strong><?echo $rw_insure_req['insure_req_detail_org'];?></strong></td>
           <td colspan="2" height="120">&nbsp;&nbsp;<strong><?echo $rw_insure_req['insure_req_detail_new'];?></strong></td>
         </tr>
         <tr height="35">
           <?
            //Check เพิ่ม หรือ คืน
            $exchange_type_increas = "";
            $exchange_type_return = "";
            $insure_req_exchange_rate_increase = "";
            $insure_req_exchange_rate_return = "";
            if($rw_insure_req['insure_req_exchange_rate_type'] == "1"){
              $exchange_type_increas = "checked";
              $insure_req_exchange_rate_increase = $rw_insure_req['insure_req_exchange_rate'];
            }else{
              $exchange_type_return = "checked";
              $insure_req_exchange_rate_return = $rw_insure_req['insure_req_exchange_rate'];
            }
           ?>
           <td colspan="4">&nbsp;&nbsp;การปรับอัตราเบี้ยประกันภัย&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" <?echo $exchange_type_return;?> disabled="disabled"> คืน  <?echo $insure_req_exchange_rate_return;?>  บาท &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" <?echo $exchange_type_increas;?> disabled="disabled"> เพิ่ม  <?echo $insure_req_exchange_rate_increase;?>  บาท</td>
         </tr>
         <tr height="35">
           <td colspan="">&nbsp;&nbsp;หลักฐานที่แนบ </td> 
           <td colspan="">&nbsp;&nbsp;สำเนาทะเบียนรถ </td> 
           <td colspan="">&nbsp;&nbsp;กรมธรรม์ต้นฉบับ </td> 
           <td>อื่นๆ </td> 
         </tr>
         <tr height="35">
           <td colspan="4">&nbsp;&nbsp;หมายเหตุ&nbsp;&nbsp; <?php echo $rw_insure_req['insure_req_remark'];?></td>
         </tr>
         <tr height="35">
           <td colspan="4" bgcolor="#b3d9ff">&nbsp;&nbsp;โปรดจัดส่งลุดสลักหลัง/เบี้ยประกันภัยคืนให้ข้าพเจ้า</td>
         </tr>
         <tr height="35">
           <?
             //Check จัดส่งสลักหลังประกัน
             $doc_rt1="";
             $doc_rt2="";
             $doc_rt3="";
              if($rw_insure_req['insure_req_doc_retrun'] == "1"){
                $doc_rt1 = "checked";
              }
              if($rw_insure_req['insure_req_doc_retrun'] == "2"){
                $doc_rt2 = "checked";
              }
              if($rw_insure_req['insure_req_doc_retrun'] == "3"){
                $doc_rt3 = "checked";
              }
            ?>
           <td colspan="1">&nbsp;<input type="checkbox" <?echo $doc_rt1;?> disabled="disabled"> ตามที่อยู่</td>
           <td colspan="1">&nbsp;<input type="checkbox" <?echo $doc_rt2;?> disabled="disabled"> ผ่านตัวแทน</td>
           <td colspan="2">&nbsp;&nbsp;ลงนาม  xxxx  ผู้ตรวจสอบ</td>
         </tr>
         <tr height="35">
           <td colspan="2">&nbsp;<input type="checkbox" <?echo $doc_rt3;?> disabled="disabled"> อื่นๆ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?echo $rw_insure_req['insure_req_doc_retrun_other'];?></td>
           <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)....../..../....</td>
         </tr>
         <tr height="35">
           <td colspan="2">&nbsp;&nbsp;ลงนาม&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้เอาประกัน/ตัวแทน</td>
           <td colspan="2">&nbsp;&nbsp;ลงนาม&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้อนุมัติ</td>
         </tr>
         <tr height="35">
           <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)....../..../....</td>
           <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)....../..../....</td>
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
