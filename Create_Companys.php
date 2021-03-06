<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<?php
	require_once 'connDB.php';
	require_once 'init_inc.php';
	$db=new DB;

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
												$rs_co="";
												if(isset($_POST['SAVE'])){
													$company_name = $_POST['company_name'];
													$company_tel = $_POST['company_tel'];
													$company_address = $_POST['company_address'];
													$co_name = $_POST['boxes'];
													$co_tel = $_POST['boxes_tel'];

													$sql = "INSERT INTO insurance_company
																				 (`company_name`, `company_address`, `company_tel`)
																	VALUES ('$company_name','$company_address','$company_tel')";

													$result = mysql_query($sql) or die ("Error in query: $sql" . mysql_error());

													//Get the last insert company_id.
													$last_id = mysql_insert_id($link);
													//echo $last_id;

													foreach ($co_name as $key => $value) {
														$insert_co = "INSERT INTO insurance_company_coordination
																								 (`co_name`, `co_tel`, `company_id`)
																					VALUES ('$co_name[$key]','$co_tel[$key]','$last_id')";
														$rs_co = mysql_query($insert_co) or die ("Error in query coordination: $insert_co" . mysql_error());
													}
													if($rs_co){
														//echo "Success.";
														echo " <script> alert('ระบบทำการบันทึกข้อมูลเรียบร้อย');javascript:location='Show_company.php';</script>";
													}else{
														echo "Fail.";
													}
												}

                    ?>

                    <form class="form-horizontal" role="form" method="POST" >
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ชื่อบริษัทประกัน</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-1" placeholder="ชื่อบริษัทประกัน" class="col-xs-10 col-sm-5" name="company_name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> เบอร์โทรสำนักงาน</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-2" placeholder="เบอร์โทรสำนักงาน" class="col-xs-10 col-sm-5" name="company_tel"/>
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
															<p class="text-box"></p>
														<p> </p>
												</div>
													</div>
											</div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-5"> ที่อยู่บริษัท</label>

                            <div class="col-sm-9">
                                <input type="text" id="form-field-5" placeholder="ที่อยู่บริษัท" class="col-xs-10 col-sm-5" name="company_address"/>
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
		<script type="text/javascript">
		jQuery(document).ready(function($){
			$('.my-form .btn.btn-warning.btn-xs').click(function(){
		        $(this).removeClass( 'btn btn-warning btn-xs' );
				$(this).addClass( 'btn disabled  btn-xs' );
				var n = $('#txtamount_pay').val() ;
				//var per_mont=0;

				 	 //per_month=($('#selact').val()/n).toFixed(2);
					 var i=1;
				 	 var box_html="";
					 var box_tel="";

					 for(i=1;i<=n;i++){
					  box_html = $('<p class="text-box col-md9"><label for="box' + i + '">คนที่ <span class="box-number">' + i + '</span></label> <input type="text" name="boxes[]" value="" id="box' + i + '" /> เบอร์โทร<span></span></label> <input type="text" name="boxes_tel[]" value="" id="box_tel' + i + '" /> <a href="#" class="remove-box">ลบ</a></p>');

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
