<? include_once "connDB.php"; ?>

<? if($result=='amphur'){ 
	$rstTemp=mysql_query("select * from amphur Where PROVINCE_ID ='".$select_id."' Order By AMPHUR_ID ASC");
	while($arr_2=mysql_fetch_array($rstTemp)){
?>
	<option value="<?=$arr_2['AMPHUR_ID']?>"><?=$arr_2['AMPHUR_NAME']?></option>
<? }}?>

<? if($result=='district'){ ?>
<select name='district' id='district'>
	<?
	$rstTemp=mysql_query("select * from district Where AMPHUR_ID ='".$select_id."'  Order By DISTRICT_ID ASC");
	while($arr_2=mysql_fetch_array($rstTemp)){
	?>
	<option value="<?=$arr_2['DISTRICT_ID']?>"><?=$arr_2['DISTRICT_NAME']?></option>
	<? }?>
</select>
<? }?>