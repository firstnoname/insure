<?php
function __autoload($class){
	$file_name="class/". $class . ".php";
	if(file_exists($file_name)){
		include_once($file_name);
	}
}

?>