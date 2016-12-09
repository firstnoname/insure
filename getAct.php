<?php
 require_once("init_inc.php");
 $db=new DB;
 $query="SELECT
    insurance_act_type.act_type_name,
    insurance_act_detail.*,
    insurance_use_type.use_type_name
  FROM
    insurance_act_detail
  JOIN insurance_act_type
  ON insurance_act_detail.act_type_id = insurance_act_type.act_type_id
  JOIN insurance_use_type
  ON insurance_act_detail.use_type_id = insurance_use_type.use_type_id ";

$result =mysql_query($query) or die(mysql_error());
 mysql_query("set NAMES utf8");
$arr = array();

while($row=mysql_fetch_array($result)){
		$arr[] = $row;
	}

# JSON-encode the response
$json_response = json_encode($arr);

// # Return the response
echo $json_response;
?>
