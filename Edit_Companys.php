<?php
require_once 'init_inc.php';

$db=new DB;

//$rs=$db->select_alert('view_vehicle_customer',3);
//echo "<pre>";
//print_r($rs);

//foreach($rs as $rw){
	//echo $rw['customer_name'] . "-" . $rw['vehicle_deliver'] . "<br>";
//}
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

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../assets/css/ace-ie.css" />
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

					 <div class="row">

          <div class="col-xs-12">

                                <!-- PAGE CONTENT BEGINS -->
<?php
		if(isset($_POST['SAVE'])){
			$company_id_save = $_GET['id'];
			$company_name_save = $_POST['company_name'];
			$company_tel_save = $_POST['company_tel'];
			$company_address_save = $_POST['company_address'];
			if(isset($_POST['boxes'])){
					$co_name_save = $_POST['boxes'];
			}
			if(isset($_POST['boxes_tel'])){
					$co_tel_save = $_POST['boxes_tel'];
			}


			//Insert to database here.
			/*
				Step1. Update Table insurance_company.
			*/
			$arr_data = array(
				'company_name' => $_POST['company_name'],
				'company_tel' => $_POST['company_tel'],
				'company_address' => $_POST['company_address']
			);
			$arr_con = array(
				'id' => $_GET['id']
			);

			$db->update('insurance_company',$arr_data,$arr_con);
			/*
				Step2. Update Table insurance_company_coordination.
					->Delete all data in the table insurance_company_coordination.
					->Insert new data into the table.
			*/
			$sql_delete_co = "DELETE
							FROM insurance_company_coordination
							WHERE company_id = '$company_id_save'";
			$result = mysql_query($sql_delete_co);

			foreach ($co_name_save as $key => $value) {
				//echo $co_name_save[$key] . " " . $co_tel_save[$key] . "<br>";
				$sql_insert_co = "INSERT INTO insurance_company_coordination
														(`co_name`, `co_tel`, `company_id`)
													VALUES
														('$co_name_save[$key]','$co_tel_save[$key]','$company_id_save')";

				$insert_co_result = mysql_query($sql_insert_co);
				//echo $insert_co_result;
			}
			echo " <script> alert('ระบบทำการบันทึกข้อมูลเรียบร้อย');javascript:location='Show_Company.php';</script>";
		}

		// }
    // if (isset($_POST['SAVE'])) {
    //     $arr_data = array(
    //         'company_name' => $_POST['company_name'],
    //         'company_address' => $_POST['company_address'],
    //         'company_tel' => $_POST['company_tel']
    //     );
    //     $arr_con = array(
    //         'id' => $_GET['id']
    //     );
		//
    //      $db->update('insurance_company',$arr_data,$arr_con);
		//
    //       echo " <script> alert('ระบบทำการบันทึกข้อมูลเรียบร้อย');javascript:location='Show_Company.php';</script>";
    //}

?>
<?php
    if(isset($_GET['id'])){
			$chk_id = $_GET['id'];
    	$arr_data=array(
    		'id'=>$_GET['id']
    	);
    $data = $db->select_where('insurance_company',$arr_data);

		//Query all coordination.
		$query = "SELECT
								insurance_company_coordination.co_id,
								insurance_company_coordination.co_name,
								insurance_company_coordination.co_tel,
								insurance_company_coordination.company_id
							FROM
								insurance_company_coordination
							WHERE
								insurance_company_coordination.company_id = $chk_id";
		$co_query = mysql_query($query) or die(mysql_error());

		while($co_fetch = mysql_fetch_array($co_query)){
			//echo $co_fetch['co_id'] . $co_fetch['co_name'] . $co_fetch['co_tel'] . "<br>";
			//$co_name = $co_fetch['co_name'];
			$co_id[] = $co_fetch['co_id'];
			$co_name[] = $co_fetch['co_name'];
			$co_tel[] = $co_fetch['co_tel'];
			$company_id[] = $co_fetch['company_id'];
		}

		//Check empty query from coordination table.
		if(empty($co_id)){
			echo "Empty";
			$co_id="";
		}else{
			$size = count($co_id);
			foreach ($co_id as $key => $value) {
				//Display query coordination.
				//echo $co_id[$key] . " " . $co_name[$key] . " " . $co_tel[$key] . " " . $company_id[$key] . "<br>";
			}
		}

		// if($co_fetch!==false){
		// 	$size = "Empty";
		// 	echo $co_fetch;
		// }else{
		// 	//Count coordination size.
		// 	$size = count($co_id);
		// 	foreach ($co_id as $key => $value) {
		// 		//Display query coordination.
		// 		echo $co_id[$key] . " " . $co_name[$key] . " " . $co_tel[$key] . " " . $company_id[$key] . "<br>";
		// 	}
		// 	//End query coordination.
		// }


    foreach ($data as $dd ) {
		//$company_id = $dd['company_id'];
?>
	    <form class="form-horizontal" role="form" method="POST">

	        <div class="form-group">
	            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ชื่อบริษัทประกัน</label>

	            <div class="col-sm-9">
	                <input type="text" id="form-field-1"  class="col-xs-10 col-sm-5"  name="company_name" value="<?=$dd['company_name'] ?>"/>
	            </div>
	        </div>
	        <div class="form-group">
	            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> เบอร์โทรสำนักงาน</label>
	            <div class="col-sm-9">
	                <input type="text" id="form-field-2" placeholder="เบอร์โทรสำนักงาน" class="col-xs-10 col-sm-5" name="company_tel" value="<?=$dd['company_tel'] ?>"/>
	            </div>
	        </div>
					<div class="form-group">
				    <label class="col-sm-3 control-label no-padding-right">จำนวนผู้ประสานงาน</label>
							<div class="col-sm-4">
								<div class="my-form">
									<p class="text-box1">
										<input type="text"  value="1" id="txtamount_pay" maxlength="2" class="input-mini" />
										 <button class="btn btn-warning btn-xs" id="btn_add">
											 <i class="ace-icon fa fa-plus  bigger-110 icon-only"></i>
										</button>
									</p>
									<p id="show-text-box" class="show-text-box"></p>
									<p> </p>
								</div>
							</div>
					</div>

					<div class="form-group" id="co-group">
						<!-- Textbox display here. -->

					</div>

	        <div class="form-group">
	          <label class="col-sm-3 control-label no-padding-right" for="form-field-5"> ที่อยู่บริษัท</label>
	          <div class="col-sm-9">
	              <input type="text" id="form-field-5" placeholder="ที่อยู่บริษัท" class="col-xs-10 col-sm-5" name="company_address" value="<?=$dd['company_address'] ?>"/>
	          </div>
	        </div>

	        <div class="col-md-offset-3 col-md-9">
		        <button type="submit" class="btn btn-success " value="บันทึก" name="SAVE">
		            <i class="ace-icon fa fa-check bigger-110"></i>บันทึก
		        </button>
		        <button class="btn" type="reset">
		            <i class="ace-icon fa fa-undo bigger-110"></i>
		            ล้างค่า
		        </button>
	    		</div>
	    </form>
<?php
	}
}
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

		<?php include("scriptfooter.php"); ?>

		<!-- Script เพิ่มจำนวนผู้ประสานงาน -->
		<script type="text/javascript" src="//code.jquery.com/jquery-latest.js"></script>

		<!-- Script Create textbox for Coordination. -->
		<script type="text/javascript">
			// var counter = 1;
			//
			// for(counter=1; counter<4; counter++){
			// 	alert(counter);
			// 	var newTextBoxDiv = $(document.createElement('div'))
			// 	     .attr("id", 'TextBoxDiv' + counter);
			// 	//Create textbox element.
			// 	newTextBoxDiv.after().html('<label class="col-sm-3 control-label no-padding-right">Textbox '+ counter + ' </label>' +
			// 				+ '<div class="col-sm-9">' +
			// 				'<input type="text" class="col-xs-10 col-sm-5" name="textbox' + counter +
			// 	      '" id="textbox' + counter + '" value="" ></div>');
			// 	//Set show textbox here.
			// 	newTextBoxDiv.appendTo("#co-group");
			// }
			jQuery(document).ready(function($){
				var box_htmls="";
				var receive_id = <?php echo json_encode($co_id); ?>;
				var receive_name = <?php echo json_encode($co_name); ?>;
				var receive_tel = <?php echo json_encode($co_tel); ?>;
				//var receive_size = '<?php //echo($size); ?> ';
				//alert("When loaded = " + receive_size);
		 		//alert("Size = " + receive_size + "\n" + receive_name + "\n" + receive_tel);
				//alert(<?php //echo json_encode($co_name); ?>);

				for (var i = 0; i < receive_name.length; i++) {
					var j = i+1;
					box_htmls = $('<p class="text-box col-md9"><label for="box' + j + '">คนที่ <span class="box-number">' + j + '</span></label> <input type="text" name="boxes[]" value="' + receive_name[i] + '" id="box' + j + '" /> เบอร์โทร<span></span></label> <input type="text" name="boxes_tel[]" value="' + receive_tel[i] + '" id="box_tel' + j + '" /> <a href="#" class="remove-box">ลบ</a></p>');
					box_htmls.appendTo("#show-text-box");
					j++;
				}
			});
		</script>
		<!-- End script Create textbox for Coordination. -->

		<script type="text/javascript">
		jQuery(document).ready(function($){
			$('.my-form .btn.btn-warning.btn-xs').click(function(){
				var textbox = $('.text-box').length;
		    $(this).removeClass( 'btn btn-warning btn-xs' );
				$(this).addClass( 'btn disabled  btn-xs' );
				var n = $('#txtamount_pay').val() ;

				 var i=1;
			 	 var box_html="";
				 //var box_tel="";

				 for(i=1;i<=n;i++){
					var j = i+textbox;
				  box_html = $('<p class="text-box col-md9"><label for="box' + j + '">คนที่ <span class="box-number">' + j + '</span></label> <input type="text" name="boxes[]" value="" id="box' + j + '" /> เบอร์โทร<span></span></label> <input type="text" name="boxes_tel[]" value="" id="box_tel' + j + '" /> <a href="#" class="remove-box">ลบ</a></p>');

					$('.my-form p.text-box:last').after(box_html);
						box_html.fadeIn('slow');
				 }

				return false;
			});

			$('.my-form').on('click', '.remove-box', function(){
				$(this).parent().css( 'background-color', '#FF6C6C' );
				$(this).parent().fadeOut("slow", function() {
					$(this).remove();
					var n = $('#txtamount_pay').val() ;
					if(n==1){
		            $('#btn_add').removeClass('btn disabled btn-xs');
				      	$('#btn_add').addClass( 'btn btn-warning btn-xs' );
					     //$('.btn.btn-warning.btn-xs.disabled').addClass('btn btn-warning btn-xs');
						}
					$('.box-number').each(function(index){
					  //  var n = $('.text-box').length-1 ;

					  //  var per_month=($('#selact').val()/n).toFixed(2);

						//	$('#box1').val(per_month);
						//$(".text-box").remove();
						$(this).text(index + 1);
				         //$('#txtamount_pay').val(n);
		              //   $("input[name$='boxes[]']").val(addCommas(per_month))
					});
				});
				return false;
			});

		});

		</script>
		<!-- End script เพิ่มผู้ประสานงาน -->
	</body>
</html>
