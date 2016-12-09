<?php
require_once 'init_inc.php';
require_once 'connDB.php';

$letterTemplateID = isset($_GET['letterTemplateID']) ? $_GET['letterTemplateID'] : '';
$query = "SELECT letter_detail FROM insurance_letter WHERE letter_id = $letterTemplateID";

$result = mysql_query($query);
mysql_query("set NAMES urf8");

$data = array();
while ($row = mysql_fetch_array($result)) {
  $data[] = $row;
}
//echo $letterTemplateID;
echo json_encode($data);
?>
