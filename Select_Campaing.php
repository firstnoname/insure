 
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

													<div class="profile-info-value">
													 <div class="col-sm-2">
													<select id="select_vehicle_model" name="select_vehicle_model">
																			 <?php
																		$result = mysql_query("
																			SELECT
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
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name">ประเภทประกัน</div>

													<div class="profile-info-value">
													 <div class="col-sm-2">
													 <select id="seltype"  data-placeholder="Choose a State..." style="width:350px">
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
																	while($row_type1=mysql_fetch_array($rs_type1)){
																		echo '<option value="', $row_type1['id'], '">', $row_type1['insurance_type'],'</option>';
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
														<select name="selcampaign" id="selcampaign" data-placeholder="Choose a State...">
                                                                   <option value="" style="width:550px"> </option>
                                                                   
                                                               </select> 
													</div>
													</div>
												</div>

												  <div class="profile-info-row">
												  <div class="profile-info-name">รหัสรถ</div>

													<div class="profile-info-value">
													 <div class="col-sm-2">
													 <select id="selcartype"  data-placeholder="Choose a State..." style="width:350px">
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

													<div class="profile-info-value" id="selfund1" >0.00 บาท
														 
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> เบี้ยสุทธิ </div>

													<div class="profile-info-value" id="selinsurance_price">0.00 บาท
														 
													</div>
												</div>
												<div class="profile-info-row" >
													<div class="profile-info-name"> เบี้ยรวมภาษี </div>

													<div class="profile-info-value" id="selinsurance_price_total">0.00 บาท
														
													</div>
												</div>
													 <div class="profile-info-row" >
										 		 
													<div class="profile-info-name">  เบี้ยรวม พรบ  </div>

													<div class="profile-info-value" id="net_price">0.00 บาท
														 
													</div>
 												</div>
			<div class="profile-info-row">
													<div class="profile-info-name"> เบี้ย พรบ</div>

													<div class="profile-info-value"  id="selact_price">0.00 บาท
													
													</div><input  id="selact" name="selact" type="text" value="0.00" class="input-medium" style="display:none">
												</div>
                                                 <div class="profile-info-row">
													<div class="profile-info-name"> เบี้ยภาษี</div>

													<div class="profile-info-value col-sm-6" id="seltax_price" >
													<input  id="seltax" name="seltax" type="text" placeholder="0.00" class="input-medium" >
													</div>
													<div class="profile-info-name1 col-sm-6" id="i_tax_price">
											               
													</div>
												</div>
												 <div class="profile-info-row">
													<div class="profile-info-name"> วันที่คุ้มครอง</div>

													<div class="profile-info-value col-sm-6">
											            
																<div class="input-daterange input-group">
																	<input type="text" class="input-sm form-control" id="startDate" name="start"  data-date-format="dd-mm-yyyy" value="<?=date('Y-m-d'); ?>" />  
																	<span class="input-group-addon">
																		<i class="fa fa-exchange"></i>
																	</span>

																	<input type="text" class="input-sm form-control" id="endDate" name="end" data-date-format="dd-mm-yyyy"  value="<?= (date('Y')+1).'-'.date('m-d'); ?>"  />
																</div>

																<!-- /section:plugins/date-time.datepicker -->
														 
													</div>
											 </div>
										
											<div class="profile-info-row">
													<div class="profile-info-name"> ส่วนลดเบี้ยประกัน</div>



													<div class="profile-info-value" >
														 <input  id="seldiscount" name="seldiscount" type="text" placeholder="0.00" class="input-medium" >
													</div>
											 </div>
							 <div class="profile-info-row">
													<div class="profile-info-name"> ส่วนลดเบี้ย พรบ</div>
													<div class="profile-info-value col-sm-6" >
														 <input  id="seldiscount_act" name="seldiscount_act" type="text"  placeholder="0.00" class="input-medium" >
													</div>
																								 </div>
											  <div class="profile-info-row">
													<div class="profile-info-name"> ส่วนลดเบี้ย ภาษี</div>



													<div class="profile-info-value col-sm-6" >
														 <input  id="seldiscount_tax" name="seldiscount_tax" type="text" placeholder="0.00" class="input-medium" >
													</div>
													
											 </div>
											<div class="profile-info-row">
													<div class="profile-info-name"> ค่าบริการ</div>

													<div class="profile-info-value">
											          <input  id="selservice" name="selservice" type="text" placeholder="0.00" class="input-medium" onchange="Calinsure()"> <input  id="seltotal" name="seltotal" type="text" value="0.00" class="input-medium" style="display:none">
													</div>
											 </div>
								        
									
							</div>
	 </div>
	 </br>