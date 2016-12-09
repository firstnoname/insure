<?php
require_once 'init_inc.php';
$db=new DB;
require_once 'connDB.php';
$name=$_POST['name'];
$detail =$_POST['detail'];
$action=$_POST['action'];

switch ($action){
	case 1:
	$id=$_POST['id'];
    $sql="update insurance_letter set letter_title='$name',letter_detail='$detail' where letter_id=$id";
	break;
	case 2:
	$sql="insert into insurance_letter(letter_title,letter_detail) values('$name','$detail')";	
	break;
	case 3:
	$sql="delete from insurance_letter where letter_id=$id";
	break;
	
}

//echo $sql;
mysql_query($sql);
?>