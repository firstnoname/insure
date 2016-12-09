<?php
 
 include_once "connDB.php";

 	$cus_id=$_GET['cus_id'];
	$vehicle_id=$_GET['vehicle_id'];
  $sql="SELECT
insurance_customer_activity.vehicle_id,
insurance_customer_activity.cusno,
insurance_presale.id,
insurance_presale.attend_insurance_company,
insurance_presale.attend_insurance_type,
insurance_presale.attend_campaign,
insurance_presale.attend_campaign_discount,
insurance_presale.attend_net_act,
insurance_presale.attend_net_tax,
insurance_presale.net_fund,
insurance_presale.net_premium,
insurance_presale.service_charge,
insurance_presale.net_price,
insurance_presale.pay_approach,
insurance_presale.paying_month,
insurance_presale.sale_status,
insurance_presale.activities_track_call_id,
insurance_presale.vehicle_id,
insurance_presale.cus_id,
insurance_presale.insurance_startDate,
insurance_presale.insurance_endDate,
insurance_presale.vehicle_code_id,
insurance_presale.vehicle_model_id,
insurance_presale.discount_act,
insurance_presale.discount_insure,
insurance_presale.discount_tax,
insurance_presale.insurance_tax,
insurance_campaign_detail.campaign_description,
insurance_campaign_detail.insurance_startfund,
insurance_campaign_detail.insurance_endfund,
insurance_company.company_name,
insurance_type.insurance_type,
insurance_campaign_detail.insurance_price_repair_center,
insurance_campaign_detail.insurance_price_repair_garage
FROM
insurance_presale
INNER JOIN insurance_customer_activity ON insurance_presale.vehicle_id = insurance_customer_activity.vehicle_id AND insurance_presale.cus_id = insurance_customer_activity.cusno
INNER JOIN insurance_campaign_detail ON insurance_presale.attend_campaign = insurance_campaign_detail.campaign_id
INNER JOIN insurance_company ON insurance_company.id = insurance_campaign_detail.company_id
INNER JOIN insurance_type ON insurance_type.id = insurance_presale.attend_insurance_type
where insurance_presale.vehicle_id=$vehicle_id and insurance_customer_activity.cusno=$cus_id";

$rs=mysql_query($sql);
$rw=mysql_fetch_array($rs);
?>
 
<div class="profile-user-info profile-user-info-striped col-sm-12">
										   	<div class="profile-info-row">
													<div class="profile-info-value" style="background-color:#94c1e1"> </div>

													<div class="profile-info-value" style="background-color:#94c1e1">
														<span class="editable editable-click" id="login">รายละเอียดประกัน</span>
													</div>
												</div>
											
												 <div class="profile-info-row">
													<div class="profile-info-name">แบบรถ</div>

													<div class="profile-info-value">
													 <div class="col-sm-2">
													 	<select id="select_vehicle_model" name="select_vehicle_model" style="width:327px">
																			 <?php
																		$result = mysql_query("
																			SELECT DISTINCT
																				vehicle_model_id,
																				vehicle_model_type
																			FROM 
																				insurance_vehicle_model 
																		");
																		
																		while($row = mysql_fetch_assoc($result)){
																			//echo '<option value="', $row['vehicle_model_id'], '">', $row['vehicle_model_type'],'</option>';
																			echo $db->select_options(array($row['vehicle_model_id']=>$row['vehicle_model_type']),$rw['vehicle_model_id']); 
																		}
																	?>
																		</select>
														 
													</div>
													</div>
													 
												</div>
												
												<div class="profile-info-row">
													<div class="profile-info-name">ประเภทประกัน</div>

													<div class="profile-info-value">
													 <div class="col-sm-2">
													 <select id="seltype"    data-placeholder="Choose a State..." style="width:327px">
																<option value=""> ------- เลือก ------ </option>
																<?php
																	$sql_tyle = "
																		SELECT
																			id,
																			insurance_type
																		FROM 
																			insurance_type	 
																	";
																	$rs_type1=mysql_query($sql_tyle);
																	while($row_type=mysql_fetch_array($rs_type1)){
																		//echo '<option value="', $row_type['id'], '">', $row_type['insurance_type'],'</option>';
																		echo $db->select_options(array($row_type['id']=>$row_type['insurance_type']),$rw['attend_insurance_type']); 
																	}
																?>
															</select>
												
													</div>
													</div>
													 
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> แคมเปญ <span id="waitcampaign"></span></div>

													<div class="profile-info-value">
														<div class="col-sm-5">
														<select name="selcampaign" id="selcampaign" style="width:327px"data-placeholder="Choose a State...">
                                                                   <option value="" > </option>
                                                                   <?php
																	$sql_tyle = "SELECT insurance_campaign_detail.campaign_id, 
	insurance_campaign_detail.campaign_description, 
	insurance_campaign_detail.insurance_startfund, 
	insurance_campaign_detail.insurance_endfund, 
	insurance_company.company_name
FROM insurance_campaign_detail INNER JOIN insurance_company ON insurance_campaign_detail.company_id = insurance_company.id where insurance_type=".$rw['attend_insurance_type'];
																	
																	$rs_type1=mysql_query($sql_tyle);
																	while($row_cam=mysql_fetch_array($rs_type1)){
																		$name_cam= $row_cam['campaign_description'] .' [' . number_format($row_cam['insurance_startfund'],2) .'-'. number_format($row_cam['insurance_endfund'],2) .']'.$row_cam['company_name'] ;
																		echo $db->select_options(array($row_cam['campaign_id']=>$name_cam),$rw['attend_campaign']); 
																	}
																?>
                                                               </select> 
													</div>
													</div>
													 
												</div>

												 <div class="profile-info-row">
													<div class="profile-info-name">รหัสรถ</div>

													<div class="profile-info-value col-sm-6">
													 <div class="col-sm-2">
													 <select id="selcartype"  data-placeholder="Choose a State..." style="width:327px">
																<option value=""> ------- เลือกรหัส ------ </option>
																<?php
																	$sql_tyle2 = "
																		SELECT DISTINCT
																			vehicle_code_id,
																				vehicle_type
																		FROM 
																			insurance_vehicle_code	 
																	";
																	$rs_type2=mysql_query($sql_tyle2);
																	while($row_type2=mysql_fetch_array($rs_type2)){
																		//echo '<option value="', $row_type2['vehicle_code_id'], '">', $row_type2['vehicle_code_id'],'</option>';
																		echo $db->select_options(array($row_type2['vehicle_code_id']=>$row_type2['vehicle_code_id']),$rw['vehicle_code_id']); 
																	}
																?>
															</select>
														 
													</div>
													</div>
													 
												</div> 
												<div class="profile-info-row">
													<div class="profile-info-name"> ทุนประกัน <span id="waitcompany"></span></div>

													<div class="profile-info-value" id="selfund1" ><span class="bigger-175 blue" id="free_1">
														     <?=$rw['insurance_startfund'].'-'.$rw['insurance_endfund'] ?>
                                                             </span>
													</div>
													 
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> เบี้ยสุทธิ </div>

													<div class="profile-info-value" id="selinsurance_price"><span class="bigger-175 blue" id="free_1"> <?php
														 $insurance_price=0;
														if(	$rw['insurance_price_repair_center']==0){
														    $insurance_price= $rw['insurance_price_repair_garage'];
														}else{
														    $insurance_price= $rw['insurance_price_repair_center'];
														}
														echo number_format($insurance_price,2);
														 ?>บาท </span> 
														 
													</div>
													 
												</div>
												<div class="profile-info-row" >
													<div class="profile-info-name"> เบี้ยรวมภาษี </div>

													<div class="profile-info-value" id="selinsurance_price_total"><span class="bigger-175 blue" id="free_1"><?=number_format($rw['net_price'],2) ?> บาท </span> 
														 
													</div>
													 
												</div>
											 <div class="profile-info-row" >
										 		 
													<div class="profile-info-name">  เบี้ยรวม พรบ  </div>

													<div class="profile-info-value"  id="net_price"><span class="bigger-175 blue" id="free_1"><?=number_format($rw['net_price']+$rw['attend_net_act'] ,2) ?> บาท </span> 
														 
													</div>
												 
 												</div>
							
											<div class="profile-info-row">
													<div class="profile-info-name"> เบี้ย พรบ</div>

													<div class="profile-info-value" id="selact_price" > <span class="bigger-175 blue" id="selact_price"><?=$rw['attend_net_act'] ?> บาท </span> 
													<input  id="selact" name="selact" type="text" placeholder="0.00"  value="<?=$rw['attend_net_act'] ?>" class="input-medium" style="display:none">
													</div>
													 
												</div>
                                                <div class="profile-info-row">
													<div class="profile-info-name"> เบี้ยภาษี</div>

													<div class="profile-info-value" id="seltax_price" >
													<input  id="seltax" name="seltax" type="text" placeholder="0.00" onChange="CalPayment()" value="<?=$rw['insurance_tax'] ?>" class="input-medium" >
													</div>
												 
												</div>
											<div class="profile-info-row">
													<div class="profile-info-name"> ส่วนลดเบี้ยประกัน</div>



													<div class="profile-info-value" >
														 <input  id="seldiscount" name="seldiscount" type="text" placeholder="0.00" onChange="CalPayment()"  value="<?=$rw['discount_insure'] ?>" class="input-medium" >
													</div>
													 
											 </div>
							 <div class="profile-info-row">
													<div class="profile-info-name"> ส่วนลดเบี้ย พรบ</div>
													<div class="profile-info-value" >
														 <input  id="seldiscount_act" name="seldiscount_act" onChange="CalPayment()" type="text" placeholder="0.00" value="<?=$rw['discount_act'] ?>" class="input-medium" >
													</div>
													 
											 </div>
											  <div class="profile-info-row">
													<div class="profile-info-name"> ส่วนลดเบี้ย ภาษี</div>



													<div class="profile-info-value" >
														 <input  id="seldiscount_tax" name="seldiscount_tax" onChange="CalPayment()" type="text" value="<?=$rw['discount_tax'] ?>" placeholder="0.00" class="input-medium" >
													</div>
													 
											 </div>
											<div class="profile-info-row">
													<div class="profile-info-name"> ค่าบริการ</div>

													<div class="profile-info-value">
											          <input  id="selservice" name="selservice" type="text" placeholder="0.00" class="input-medium"  value="<?=$rw['service_charge'] ?>" onKeyPress="CalPayment()"> <input  id="seltotal" name="seltotal" type="text" value="0.00" class="input-medium" style="display:none">
													</div>
														 
											 </div>
								
										
		                                   
							</div>
 