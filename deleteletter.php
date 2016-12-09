<?php
require_once 'init_inc.php';
$db=new DB;
$sql ="delete  from  insurance_letter where letter_id=".$_POST['id'];
mysql_query($sql);

?>