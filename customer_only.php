 <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<?php
 include_once "connDB.php";
  //  $activity_id=$_GET['activity_id'];
	$cus_id=$_GET['cus_id'];
	//$vehicle_id=$_GET['vehicle_id'];
	
	//$activity_id=$_GET['activity_id'];
	//$cus_id=$_GET['cus_id'];
	//$vehicle_id=$_GET['vehicle_id'];
	$sql_sub_ac="SELECT insurance_campaign_detail.campaign_description, 
	insurance_company.company_name, 
	insurance_sale.cus_id, 
	insurance_sale.vehicle_id,
insurance_relationship_view.be,
	CONCAT(insurance_relationship_view.be,
insurance_relationship_view.cus_name,' ',
insurance_relationship_view.cus_surename) AS Customer,
format(insurance_sale.net_price,2) as net_price,
insurance_sale.pay_type,
insurance_sale.insurance_tax,
insurance_sale.service_charge,
insurance_sale.discount_act,
insurance_sale.discount_tax,
insurance_sale.discount_insure,
format(sum(insurance_sale.insurance_tax+
insurance_sale.service_charge+
insurance_sale.discount_act+
insurance_sale.discount_tax+
insurance_sale.discount_insure),2) AS total_discount,
format(insurance_sale.net_price-sum(insurance_sale.insurance_tax+
insurance_sale.service_charge+
insurance_sale.discount_act+
insurance_sale.discount_tax+
insurance_sale.discount_insure),2) AS total_price,
CASE WHEN insurance_sale.payment_arrears =0 then format(insurance_sale.net_price-sum(insurance_sale.insurance_tax+
insurance_sale.service_charge+
insurance_sale.discount_act+
insurance_sale.discount_tax+
insurance_sale.discount_insure),2) else format(insurance_sale.net_price-sum(insurance_sale.insurance_tax+
insurance_sale.service_charge+
insurance_sale.discount_act+
insurance_sale.discount_tax+
insurance_sale.discount_insure+insurance_sale.payment_arrears),2) END AS total_remain,
insurance_relationship_view.cus_tel,
insurance_relationship_view.address_full_name
FROM insurance_sale INNER JOIN insurance_campaign_detail ON insurance_sale.campaign_id = insurance_campaign_detail.campaign_id
	 INNER JOIN insurance_company ON insurance_campaign_detail.company_id = insurance_company.id
JOIN insurance_relationship_view
ON insurance_sale.cus_id = insurance_relationship_view.cusno 
WHERE
insurance_sale.Close_payment=0 AND  insurance_sale.cus_id=$cus_id AND insurance_sale.pay_type='ผ่อนชำระ' group by cus_id";
	 
						$rs_sub_ac=mysql_query($sql_sub_ac);
						$rw_sub_ac=mysql_fetch_array($rs_sub_ac);
						
					
?>

									<div id="user-profile-2" class="user-profile">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-18">
												<li class="active">
													<a data-toggle="tab" href="#home">
														<i class="green ace-icon fa fa-user bigger-120"></i>
														ข้อมูลลูกค้า												</a>												</li>

											 

											 
											</ul>

											<div class="tab-content no-border padding-24">
												<div id="home" class="tab-pane in active">
													<div class="row">
														<div class="col-xs-12 col-sm-3 center">
															<span class="profile-picture">
																<img class="editable img-responsive" alt="<?=$rw_sub_ac['Customer']?>" id="avatar2" src="<?php if($rw_sub_ac['be'] =='นาย') { echo "assets/avatars/men2.png";}else{ echo "assets/avatars/woman1.png"; } ?>"  />															</span>

															<div class="space space-4"></div>

														 </div><!-- /.col -->

														<div class="col-xs-12 col-sm-6">
															<h4 class="blue">
																<span class="middle"><?=$rw_sub_ac['Customer']?></span>

																				</h4>

															<div class="profile-user-info">
																<div class="profile-info-row">
																	<div class="profile-info-name"> หมายเลขติดต่อ </div>

																	<div class="profile-info-value">
																		<span><?=$rw_sub_ac['cus_tel'] ?></span>																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> ที่อยู่ </div>

																	<div class="profile-info-value">
																		<i class="fa fa-map-marker light-orange bigger-110"></i>
																		<span><?=$rw_sub_ac['address_full_name'] ?></span>
																		 											</div>
																</div>
																<div class="profile-info-row">
																	<div class="profile-info-name"> ประกันภัย </div>

																	<div class="profile-info-value">
																	 
																		<span><?=$rw_sub_ac['campaign_description'].' '.$rw_sub_ac['company_name']  ?></span>
																		 											</div>
																</div>
																
																<div class="profile-info-row">
																	<div class="profile-info-name"> เบี้ยรวมสุทธิ </div>

																	<div class="profile-info-value">
																	 
																		<span><?=$rw_sub_ac['net_price'].' บาท'  ?></span>
																		 											</div>
																</div>
																<div class="profile-info-row">
																	<div class="profile-info-name"> ลูกค้าจ่าย </div>

																	<div class="profile-info-value">
																	 
																		<span><?=$rw_sub_ac['total_price'].' บาท'   ?></span>
																		 											</div>
																</div>
															
<div class="profile-info-row">
																	<div class="profile-info-name"> ค้างชำระ </div>

																	<div class="profile-info-value">
																	 
																		<span><?=$rw_sub_ac['total_remain'].' บาท '  ?></span>
																		 											</div>
																</div>
															
														</div><!-- /.col -->
													</div><!-- /.row -->

													

													 

														 
												</div><!-- /#home -->

												
											 </div>
											</div>
										</div>
							
					 
 