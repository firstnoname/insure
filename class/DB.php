<?php
class DB {
	public $con;
	//private $item_count;

	public function __construct(){

		         $host = "localhost";
                $user_admin ="root";
                $password = "";
                $database = "trackdb1";
                $link = mysql_connect($host,$user_admin,$password) or die(mysql_error());
                mysql_select_db($database) or die(mysql_error());
                mysql_query("set NAMES utf8");
		/*
@mysql_connect("localhost","root","")or die(mysql_error());
mysql_select_db("store")or die(mysql_error());
mysql_query("set NAMES utf8");
		*/
	}
	public function insertdata($sql){
		$s=$sql;
		if(mysql_query($s)){
		     mysql_query("set NAMES utf8");
			return mysql_insert_id();
		}else{
			return mysql_error();
		}
	}
	public function insert($tb_name,$data){
		$s="INSERT INTO ". $tb_name ." (";
		$s.=implode(" ,",array_keys($data)) .") VALUES(";
		$s.="'". implode("','", array_values($data)) ."')";
		if(mysql_query($s)){
		     mysql_query("set NAMES utf8");
			return mysql_insert_id();
		}else{
			return mysql_error();
		}
	}//

public function select($tb_name){
	$data=array();
	$query="SELECT * FROM " . $tb_name ."";
	$rs=mysql_query($query);
	//$this->item_count = mysql_num_rows($rs);
	while($rw=mysql_fetch_array($rs)){
		$data[]=$rw;
	}

	return $data;
}//
public function selectdata($sql){
	$data=array();
	$query=$sql;
	$rs=mysql_query($query);

	while($rw=mysql_fetch_array($rs)){
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

	$rs=mysql_query($query);
		while($rw=mysql_fetch_array($rs)){
		$data[]=$rw;
	}

	return $data;

}//
public function select_wheres($tb_name,$w_con){

	$data=array();



	$query ="SELECT * FROM " . $tb_name . " WHERE ". $w_con;

	$rs=mysql_query($query);
		while($rw=mysql_fetch_array($rs)){
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

		if(mysql_query($query)){
		    mysql_query("set NAMES utf8");
			return true;
		}
echo $query;
}//
public function delete($tb_name,$w_con){
	$c_cin='';

	foreach($w_con as $k=>$v){
		$c_cin .= $k . " = '" . $v . "' AND ";
	}
	$c_cin=substr($c_cin,0,-5);
	$query="DELETE FROM  " . $tb_name . " WHERE " . $c_cin . "";

		if(mysql_query($query)){
		    mysql_query("set NAMES utf8");
			return true;
		}

}
//
public function select_alert($tb_name,$w_con){
	$c_cin='';
	$data=array();
	switch ($w_con){
		case 1 : $c_cin="1";break;
		case 2 : $c_cin="2";break;
		case 3 : $c_cin="3";break;
		case 4 : $c_cin="4";break;
		case 5 : $c_cin="5";break;
		case 6 : $c_cin="6";break;
		case 7 : $c_cin="7";break;
		case 8 : $c_cin="8";break;
		case 9 : $c_cin="9";break;
		case 10 : $c_cin="10";break;
		case 11 : $c_cin="11";break;
		case 12 : $c_cin="12";break;
	}
	/*foreach($w_con as $k=>$v){
		$c_cin .= $k . " = '" . $v . "' AND ";
	}*/
	//$c_cin=substr($c_cin,0,-5);
	$year=date('Y');
	//$query ="SELECT * FROM " . $tb_name . " WHERE YEAR('$year') and ";
	$query ="SELECT * FROM " . $tb_name . " WHERE (YEAR(date_deliver) in ('$year') and ";
	$query .="   MONTH(date_deliver) in(". $c_cin . "))";
	$query .="   order by date_deliver asc";
	$rs=mysql_query($query) or die(mysql_error() . " ". $query);
		while($rw=mysql_fetch_array($rs)){
		$data[]=$rw;
	}

	return $data;

}//
///
public function select_where_alert($tb_name,$type,$w_con){
	$c_cin='';
	$cr_cin='';
	$data=array();
	switch ($type){
		case 1 : $c_cin="1";break;
		case 2 : $c_cin="2";break;
		case 3 : $c_cin="3";break;
		case 4 : $c_cin="4";break;
		case 5 : $c_cin="5";break;
		case 6 : $c_cin="6";break;
		case 7 : $c_cin="7";break;
		case 8 : $c_cin="8";break;
		case 9 : $c_cin="9";break;
		case 10 : $c_cin="10";break;
		case 11 : $c_cin="11";break;
		case 12 : $c_cin="12";break;
	}
	/*foreach($w_con as $k=>$v){
		$c_cin .= $k . " = '" . $v . "' AND ";
	}*/
	//$c_cin=substr($c_cin,0,-5);

	foreach($w_con as $k=>$v){
		$cr_cin .= $k . " LIKE '" . $v . "%' OR ";
	}
	$cr_cin=substr($cr_cin,0,-4);


	$year=date('Y');
	//$query ="SELECT * FROM " . $tb_name . " WHERE YEAR('$year') and ";
	$query ="SELECT * FROM " . $tb_name . " WHERE (YEAR(date_deliver) in ('$year') AND ";
	$query .="   MONTH(date_deliver) in(". $c_cin . ")";
	$query .="   AND ". $cr_cin . ")";
	$query .="   ORDER BY date_deliver ASC";
	$rs=mysql_query($query) or die(mysql_error() . " ". $query);
		while($rw=mysql_fetch_array($rs)){
		$data[]=$rw;
	}

	return $data;

}//


public function count_one(){

	/*foreach($w_con as $k=>$v){
		$c_cin .= $k . " = '" . $v . "' AND ";
	}*/
	//$c_cin=substr($c_cin,0,-5);
	$year=date('Y');
	//$query ="SELECT * FROM " . $tb_name . " WHERE YEAR('$year') and ";
	$query ="SELECT * FROM insurance_relationship_view WHERE (YEAR(date_deliver) in ('$year') and ";
	$query .="   MONTH(date_deliver) in(1))";
	//$query .="   order by date_deliver asc";
	$rs=mysql_query($query) or die(mysql_error() . " ". $query);


	return mysql_num_rows($rs);

}//

public function count_two(){

	/*foreach($w_con as $k=>$v){
		$c_cin .= $k . " = '" . $v . "' AND ";
	}*/
	//$c_cin=substr($c_cin,0,-5);
	$year=date('Y');
	//$query ="SELECT * FROM " . $tb_name . " WHERE YEAR('$year') and ";
	$query ="SELECT * FROM insurance_relationship_view WHERE (YEAR(date_deliver) in ('$year') and ";
	$query .="   MONTH(date_deliver) in(2))";
	//$query .="   order by date_deliver asc";
	$rs=mysql_query($query) or die(mysql_error() . " ". $query);


	return mysql_num_rows($rs);

}//

public function count_four(){

	/*foreach($w_con as $k=>$v){
		$c_cin .= $k . " = '" . $v . "' AND ";
	}*/
	//$c_cin=substr($c_cin,0,-5);
	$year=date('Y');
	//$query ="SELECT * FROM " . $tb_name . " WHERE YEAR('$year') and ";
	$query ="SELECT * FROM insurance_relationship_view WHERE (YEAR(date_deliver) in ('$year') and ";
	$query .="   MONTH(date_deliver) in(4))";
	//$query .="   order by date_deliver asc";
	$rs=mysqli_query($query) or die(mysqli_error() . " ". $query);


	return mysqli_num_rows($rs);

}//

public function count_user($mm){

	/*foreach($w_con as $k=>$v){
		$c_cin .= $k . " = '" . $v . "' AND ";
	}*/
	//$c_cin=substr($c_cin,0,-5);
	$c_cin='';
	//$data=array();
	switch ($mm){
		case "30" : $c_cin="1";break;
		case "60": $c_cin="2";break;
		case "120" : $c_cin="4";break;
		default:$c_cin='0';
	}
	$year=date('Y');
	//$query ="SELECT * FROM " . $tb_name . " WHERE YEAR('$year') and ";
	$query ="SELECT * FROM insurance_relationship_view WHERE (YEAR(date_deliver) in ('$year') and ";
	$query .="   MONTH(date_deliver) in('". $c_cin ."'))";
	//$query .="   order by date_deliver asc";
	$rs=mysql_query($query) or die(mysqli_error() . " ". $query);


	return mysql_num_rows($rs);

}//
public function count_all(){

	/*foreach($w_con as $k=>$v){
		$c_cin .= $k . " = '" . $v . "' AND ";
	}*/
	//$c_cin=substr($c_cin,0,-5);
	$c_cin="'1','2','4'";

	$year=date('Y');
	//$query ="SELECT * FROM " . $tb_name . " WHERE YEAR('$year') and ";
	$query ="SELECT * FROM insurance_relationship_view WHERE (YEAR(date_deliver) in ('$year') and ";
	$query .="   MONTH(date_deliver) in($c_cin))";
	//$query .="   order by date_deliver asc";
	$rs=mysql_query($query) or die(mysqli_error() . " ". $query);


	return mysql_num_rows($rs);

}//
///====================================
public function select_options($options, $selected)
    {
        $result = "";
        foreach($options as $value => $label)
        {
             $result .= '<option value="' .
                 htmlentities($value, ENT_QUOTES, "UTF-8") . '"' .
                 ($selected == $value ? ' selected="selected"' : "") . '>' .
                 htmlentities($label, ENT_QUOTES, "UTF-8") . '</option>';
        }
        return $result;
    }

		public function checkbox_edit($checkbox, $checked){
			$result = "";
			//echo $checkbox;
			$result .= '<input class="ace ace-checkbox-2" name ="chk_req_detail" onchange="getcheckbox()" id="" type="checkbox">';

			// foreach ($checkbox as $value => $label) {
			// 	# code...
			// 	$result .= '<input class="ace ace-checkbox-2" name="chk_req_detail" onchange="getcheckbox()" value="'.
			// 	 	htmlentities($value, ENT_QOUTES, "UTF-8") . '"'.
			// 		($checked == $value ? ' checked' : "") . 'type="checkbox">';
			// }
			return $checkbox;
		}
}//




?>
