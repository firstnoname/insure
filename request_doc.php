<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
 
 
$id=$_GET['id'];
 

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
WHERE insurance_sale.id=$id ";
						$rs_sub_ac=mysql_query($sql_sub);
						$rw=mysql_fetch_array($rs_sub_ac);
 
?>
 
<style>
    .dotted {border: 1px dotted #6f6f6f;; border-style: none none dotted; color: #fff; background-color: #fff; }
</style>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td height="150" colspan="4" valign="top"><center><h4>บริษัท อีซูซุเชียงราย (2002) จำกัด</h4></center> 
<center><h4>145 หมู่ 17 ถนนซุปเปอร์ไฮเวย์  ตำบลรอบเวียง</h4></center>
<center><h4 >อำเภอเมือง จังหวัดเชียงราย  57000 (053-711605)</h4></center>

<hr class='dotted' />
</td>

  </tr>
  
  <tr >
    <td width="1%">&nbsp;</td>
    <td width="30%" valign="top"><div  >
	  <p>ไม่คุ้มครองอุปกรณ์ต่อเติมใดๆทั้งสิ้น	</p>
	  <p>ในกรณีที่ลูกค้านำรถไปต่อเติมอุปกรณ์ต่างๆ</p>
	  <p>ให้ติดต่อกลับที่ 053-711605 ต่อ 157,212 </p>
    </div></td>
    <td valign="top">  <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;คำขอเอาประกันภัยรถยนต์</h5></td>
    <td width="2%">&nbsp;</td>
  </tr>
  <tr>
    <?php
		$monthNames= ["","มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"]
	?>
    <td>&nbsp;</td>
    <td colspan="2" rowspan="16" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="1">
      <tr>
        <td width="15%">&nbsp;</td>
        <td width="20%">&nbsp;</td>
        <td width="19%">&nbsp;</td>
        <td colspan="2" align="center">วันที่
          <?= date('d',strtotime($rw['create_date'])) ?> 
          เดือน 
          <?= $monthNames[date('m',strtotime($rw['create_date']))] ?> 
          พ.ศ. 
          <?= date('Y',strtotime($rw['create_date']))+543 ?></td>
        </tr>
      <tr>
        <td height="28">ชื่อผู้เอาประกัน  </td>
        <td><strong><?php echo  $rw['be'].''.$rw['cus_name'].' '.$rw['cus_surename'] ;?></strong></td>
        <td>ที่อยู่ตามทะเบียนบ้าน</td>
        <td width="20%"><strong><?=$rw['ADDR_VILLAGE'].' '.$rw['ADDR_ROOM_NO'].' หมู่ '.$rw['ADDR_GROUP_NO']  ?></strong></td>
        <td width="26%">(<?=$rw['relates_type'] ?>)</td>
      </tr>
      <tr>
        <td height="27">เลขที่บัตร</td>
        <td><strong><?=$rw['Cus_IDNo'] ?></strong></td>
        <td>ตำบล</td>
        <td><strong><?=$rw['DISTRICT_NAME'] ?></strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="27">อำเภอ</td>
        <td><strong><?=$rw['AMPHUR_NAME'] ?></strong></td>
        <td>จังหวัด</td>
        <td><strong><?=$rw['PROVINCE_NAME'] ?></strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="56">ดีเลอร์</td>
        <td colspan="3" align="center"><strong><?=$rw['company_name'] ?></strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="31">ยี่ห้อ</td>
        <td><strong><?=$rw['vehicle_brand'] ?></strong></td>
        <td>รุ่น</td>
        <td><strong><?=$rw['vehicle_series'] ?></strong></td>
        <td>ปี <strong><?=date('Y') ?> </strong></td>
      </tr>
      <tr>
        <td height="29">แบบ</td>
        <td><strong><?=$rw['vehicle_model_type'] ?></strong></td>
        <td>หมายเลขเครื่อง</td>
        <td><strong><?=$rw['vehicle_full_chassis'] ?></strong></td>
        <td>ทะเบียน <strong><?php
		 if($rw['customer_type']==1){
		    echo 'ป้ายแดง';}else{echo $rw['vehicle_regis'];} 
		?></strong></td>
      </tr>
      <tr>
        <td height="31">เลขเครื่อง</td>
        <td><strong><?=$rw['vehicle_chassis'] ?></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="31">วันที่คุ้มครอง</td>
        <td><strong><?=$rw['insure_enddate'] ?></strong></td>
        <td>ผู้รับผลประโยชน์</td>
        <td><strong>สด</strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="29">พรบ.</td>
        <td><strong><?=$rw['act_number'] ?></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="37">&nbsp;</td>
        <td>ทุนประกัน</td>
        <td><strong><?=number_format($rw['insurance_endfund'] ,2)?></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="34">&nbsp;</td>
        <td>เบี้ยสุทธิ</td>
        <td><strong><?=number_format($rw['net_price'],2) ?></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="43">&nbsp;</td>
        <td>เบี้ยรวม</td>
        <td><strong><?= number_format($rw['net_price'],2) ?></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="30">ผู้แจ้ง</td>
        <td><strong><?=$rw['emp_be'].''.$rw['emp_name'].' '.$rw['empsurname']  ?></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="33">วันที่แจ้ง</td>
        <td><strong><?= date('d/m/Y',strtotime($rw['create_date'])) ?></strong></td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>