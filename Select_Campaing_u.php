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
 <div class="col-sm-12" >
<div class="profile-user-info profile-user-info-striped col-sm-12">
										   	<div class="profile-info-row">
													<div class="profile-info-value" style="background-color:#94c1e1"> </div>

													<div class="profile-info-value" style="background-color:#94c1e1">
														<span class="editable editable-click" id="login">รายละเอียดประกัน</span>
													</div>
												</div>
											
												 <div class="profile-info-row">
													<div class="profile-info-name">แบบรถ</div>

													<div class="profile-info-value col-sm-6">
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
																			echo '<option value="', $row['vehicle_model_id'], '">', $row['vehicle_model_type'],'</option>';
																		}
																	?>
																		</select>
														 
													</div>
													</div>
													<div class="profile-info-name1 col-sm-6">
											          <strong>    แสดงรายละเอียดลูกค้าสนใจล่าสุด </strong>
													</div>
												</div>
												
												<div class="profile-info-row">
													<div class="profile-info-name">ประเภทประกัน</div>

													<div class="profile-info-value col-sm-6">
													 <div class="col-sm-2">
													 <select id="seltype"  data-placeholder="Choose a State..." style="width:327px">
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
																		echo '<option value="', $row_type['id'], '">', $row_type['insurance_type'],'</option>';
																	}
																?>
															</select>
														 
													</div>
													</div>
													<div class="profile-info-name1 col-sm-6" id="i_type">
											               <?=$rw['insurance_type'] ?>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> แคมเปญ <span id="waitcampaign"></span></div>

													<div class="profile-info-value col-sm-6">
														<div class="col-sm-5">
														<select name="selcampaign" id="selcampaign" style="width:327px"data-placeholder="Choose a State...">
                                                                   <option value="" > </option>
                                                                   
                                                               </select> 
													</div>
													</div>
													<div class="profile-info-name1 col-sm-6" id="i_campaign">
											              <?=$rw['campaign_description'].'/'.$rw['company_name']  ?>
													</div>
												</div>

												 	 <div class="profile-info-row">
													<div class="profile-info-name">รหัสรถ</div>

													<div class="profile-info-value col-sm-12">
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
																		echo '<option value="', $row_type2['vehicle_code_id'], '">', $row_type2['vehicle_code_id'],'</option>';
																	}
																?>
															</select>
														 
													</div>
													</div>
													 
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> ทุนประกัน <span id="waitcompany"></span></div>

													<div class="profile-info-value col-sm-6" id="selfund1" >0.00 บาท
														 
													</div>
													<div class="profile-info-name1 col-sm-6" id="i_fund1">
											              <?=$rw['insurance_startfund'].'-'.$rw['insurance_endfund'] ?>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> เบี้ยสุทธิ </div>

													<div class="profile-info-value col-sm-6" id="selinsurance_price">0.00 บาท
														 
													</div>
													<div class="profile-info-name1 col-sm-6" id="i_insurance_price">
											           <?php
														 $insurance_price=0;
														if(	$rw['insurance_price_repair_center']==0){
														    $insurance_price= $rw['insurance_price_repair_garage'];
														}else{
														    $insurance_price= $rw['insurance_price_repair_center'];
														}
														echo $insurance_price;
														 ?>
													</div>
												</div>
												<div class="profile-info-row" >
													<div class="profile-info-name"> เบี้ยรวมภาษี </div>

													<div class="profile-info-value col-sm-6" id="selinsurance_price_total">0.00 บาท
														 
													</div>
													<div class="profile-info-name1 col-sm-6" id="i_insurance_price_total">
											            <?=$rw['net_price'] ?>
													</div>
												</div>
											 <div class="profile-info-row" >
										 		 
													<div class="profile-info-name">  เบี้ยรวม พรบ  </div>

													<div class="profile-info-value col-sm-6"  id="net_price">0.00 บาท
														 
													</div>
													<div class="profile-info-name1 col-sm-6" id="i_net_price">
											                <?=$rw['net_price']+$rw['attend_net_act'] ?>
													</div>
 												</div>
								<!--	
								 <div class="profile-info-row">
													<div class="profile-info-name"> วันที่คุ้มครอง</div>

													<div class="profile-info-value col-sm-6">
											            
																<div class="input-daterange input-group">
																	<input type="text" class="input-sm form-control" id="start" name="start" value="<?=date('Y-m-d') ?>" />
																	<span class="input-group-addon">
																		<i class="fa fa-exchange"></i>
																	</span>

																	<input type="text" class="input-sm form-control"  id="end" name="end"  value="<?=(date('Y')+1).date('-m-d') ?>" />
																</div>

															 
														 
													</div>
											 </div>
											 -->
											<div class="profile-info-row">
													<div class="profile-info-name"> เบี้ย พรบ</div>

													<div class="profile-info-value col-sm-6" id="selact_price" > 0.00 บาท
													<input  id="selact" name="selact" type="text" placeholder="0.00" class="input-medium" style="display:none">
													</div>
													<div class="profile-info-name1 col-sm-6" id="i_act_price">
											                <?=$rw['attend_net_act'] ?>
													</div>
												</div>
                                                <div class="profile-info-row">
													<div class="profile-info-name"> เบี้ยภาษี</div>

													<div class="profile-info-value col-sm-6" id="seltax_price" >
													<input  id="seltax" name="seltax" type="text" placeholder="0.00" class="input-medium" >
													</div>
													<div class="profile-info-name1 col-sm-6" id="i_tax_price">
											                <?=$rw['insurance_tax'] ?>
													</div>
												</div>
											<div class="profile-info-row">
													<div class="profile-info-name"> ส่วนลดเบี้ยประกัน</div>



													<div class="profile-info-value col-sm-6" >
														 <input  id="seldiscount" name="seldiscount" type="text" placeholder="0.00" class="input-medium" >
													</div>
													<div class="profile-info-name1 col-sm-6" id="i_discount">
											                 <?=$rw['discount_insure'] ?>
													</div>
											 </div>
							 <div class="profile-info-row">
													<div class="profile-info-name"> ส่วนลดเบี้ย พรบ</div>
													<div class="profile-info-value col-sm-6" >
														 <input  id="seldiscount_act" name="seldiscount_act" type="text" placeholder="0.00" class="input-medium" >
													</div>
													<div class="profile-info-name1 col-sm-6" id="i_discount_act">
											                 <?=$rw['discount_act'] ?>
													</div>
											 </div>
											  <div class="profile-info-row">
													<div class="profile-info-name"> ส่วนลดเบี้ย ภาษี</div>



													<div class="profile-info-value col-sm-6" >
														 <input  id="seldiscount_tax" name="seldiscount_tax" type="text" placeholder="0.00" class="input-medium" >
													</div>
													<div class="profile-info-name1 col-sm-6" id="i_discount_tax">
											                 <?=$rw['discount_tax'] ?>
													</div>
											 </div>
											<div class="profile-info-row">
													<div class="profile-info-name"> ค่าบริการ</div>

													<div class="profile-info-value col-sm-6">
											          <input  id="selservice" name="selservice" type="text" placeholder="0.00" class="input-medium" > <input  id="seltotal" name="seltotal" type="text" value="0.00" class="input-medium" style="display:none">
													</div>
														<div class="profile-info-name1 col-sm-6" id="i_service">
											                 <?=$rw['service_charge'] ?>
													</div>
											 </div>
								
										
		                                   
							</div>
	 </div>