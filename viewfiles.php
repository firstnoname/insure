<?php
require_once 'init_inc.php';
$db=new DB;
$id    =$_GET['id'];
$query = "SELECT filename, type, size, content " .
         "FROM insurance_upload WHERE campaign_id 	 = $id";
$result = mysql_query($query) or die('Error, query failed');
list($name, $type, $size, $content) =                                  mysql_fetch_array($result);
header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: attachment; filename=$name");
echo $content;
exit;
?>