<?php
class DB {
	public $con;
	private $item_count;

	public function __construct(){
		$this->con=mysqli_connect("localhost","ketsoftt_track","P@sssw0rd","ketsoftt_track");
		mysqli_set_charset($this->con,"utf8");
	}

	public function insert($tb_name,$data){
		$s="INSERT INTO ". $tb_name ." (";
		$s.=implode(" ,",array_keys($data)) .") VALUES(";
		$s.="'". implode("','", array_values($data)) ."')";
		if(mysqli_query($this->con,$s)){
			return mysqli_insert_id($this->con);
		}else{
			return mysqli_error($this->con);
		}
	}//

public function select($tb_name){
	$data=array();
	$query="SELECT * FROM " . $tb_name ."";
	$rs=mysqli_query($this->con,$query);
	$this->item_count = mysqli_num_rows($rs);
	while($rw=mysqli_fetch_array($rs)){
		$data[]=$rw;
	}

	return $data;
}//

public function select_where($tb_name,$w_con){
	$c_cin='';
	$data=array();

	foreach($w_con as $k=>$v){
		$c_cin .= $k . " = '" . $v . "' AND ";
	}
	$c_cin=substr($c_cin,0,-5);

	$query ="SELECT * FROM " . $tb_name . " WHERE ". $c_cin;

	$rs=mysqli_query($this->con,$query);
		while($rw=mysqli_fetch_array($rs)){
		$data[]=$rw;
	}

	return $data;

}//

public function update($tb_name,$fields,$w_con){
	$query='';
	$c_cin='';
		foreach($fields as $k=>$v){
		$query .= $k . " = '" . $v . "', ";
	}
	$query=substr($query,0,-2);

	foreach($w_con as $k=>$v){
		$c_cin .= $k . " = '" . $v . "' AND ";
	}
	$c_cin=substr($c_cin,0,-5);
	$query="UPDATE " . $tb_name . " SET " . $query . " WHERE " . $c_cin . "";

		if(mysqli_query($this->con,$query)){
			return true;
		}

}//
public function delete($tb_name,$w_con){
	$c_cin='';

	foreach($w_con as $k=>$v){
		$c_cin .= $k . " = '" . $v . "' AND ";
	}
	$c_cin=substr($c_cin,0,-5);
	$query="DELETE FROM  " . $tb_name . " WHERE " . $c_cin . "";

		if(mysqli_query($this->con,$query)){
			return true;
		}

}
//
public function select_alert($tb_name,$w_con){
	$c_cin='';
	$data=array();
	switch ($w_con){
		case 1 : $c_cin="1";break;
		case 2 : $c_cin="1,2";break;
		case 3 : $c_cin="1,2,3";break;
		case 4 : $c_cin="1,2,3,4";break;
		case 5 : $c_cin="1,2,3,4,5";break;
		case 6 : $c_cin="1,2,3,4,5,6";break;
		case 7 : $c_cin="1,2,3,4,5,6,7";break;
		case 8 : $c_cin="1,2,3,4,5,6,7,8";break;
		case 9 : $c_cin="1,2,3,4,5,6,7,8,9";break;
		case 10 : $c_cin="1,2,3,4,5,6,7,8,9,10";break;
		case 11 : $c_cin="1,2,3,4,5,6,7,8,9,10,11";break;
		case 12 : $c_cin="1,2,3,4,5,6,7,8,9,10,11,11";break;
	}
	/*foreach($w_con as $k=>$v){
		$c_cin .= $k . " = '" . $v . "' AND ";
	}*/
	//$c_cin=substr($c_cin,0,-5);

	$query ="SELECT * FROM " . $tb_name . " WHERE MONTH(vehicle_deliver) in(". $c_cin . ")";

	$rs=mysqli_query($this->con,$query) or die(mysqli_error($this->con) . " ". $query);
		while($rw=mysqli_fetch_array($rs)){
		$data[]=$rw;
	}

	return $data;

}//

///====================================

}//
?>