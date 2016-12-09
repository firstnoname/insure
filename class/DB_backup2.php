<?php
require_once("Db.class.php");
 
class DB {
	public $con;
	//private $item_count;
        
 public function insertdata($tb_name){
$dbh =new DBPDO();
	$query=$tb_name ;
	$data=$dbh->query($query);
	 
	return $data;
}//
 
public function insert($tb_name,$data){
 $dbh =new DBPDO();
		$s="INSERT INTO ". $tb_name ." (";
		$s.=implode(" ,",array_keys($data)) .") VALUES(";
		$s.="'". implode("','", array_values($data)) ."')";
		if($dbh->query($s)){
		     
		return $dbh->lastInsertId();
		}else{
		return $dbh->rollBack();
		}
	}//
public function excutedata($tb_name){
$dbh =new DBPDO();
	$query=$tb_name ;
	$data=$dbh->query($query);
	 
	return $data;
}//
public function selectdata($tb_name){
$dbh =new DBPDO();
	$query=$tb_name ;
	$data=$dbh->query($query);
	 
	return $data;
}//
public function select($tb_name){
$dbh =new DBPDO();
	$query="SELECT * FROM " . $tb_name ."";
	$data=$dbh->query($query);
	 
	return $data;
}//
 

public function select_where($tb_name,$w_con){
$dbh =new DBPDO();
	$c_cin='';
 

	foreach($w_con as $k=>$v){
		$c_cin .= $k . " = '" . $v . "' AND ";
	}
	$c_cin=substr($c_cin,0,-5);

	$query ="SELECT * FROM " . $tb_name . " WHERE ". $c_cin;
	
	$data=$dbh->query($query);
		 

	return $data;

}//
public function select_wheres($tb_name,$w_con){
 
 $dbh =new DBPDO();

 

	$query ="SELECT * FROM " . $tb_name . " WHERE ". $w_con;

	$data=$dbh->query($query);

	return $data;

}//
public function update($tb_name,$fields,$w_con){
$dbh =new DBPDO();
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
    $dbh->query($query);
 
}//
public function delete($tb_name,$w_con){
$dbh =new DBPDO();
	$c_cin='';

	foreach($w_con as $k=>$v){
		$c_cin .= $k . " = '" . $v . "' AND ";
	}
	$c_cin=substr($c_cin,0,-5);
	$query="DELETE FROM  " . $tb_name . " WHERE " . $c_cin . "";

	$dbh->query($query);

}
 
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
	
	public function  num2wordsThai($num){     
    $num=str_replace(",","",$num);  
    $num_decimal=explode(".",$num);  
    $num=$num_decimal[0];  
    $returnNumWord="";     
    $lenNumber=strlen($num);     
    $lenNumber2=$lenNumber-1;     
    $kaGroup=array("","สิบ","ร้อย","พัน","หมื่น","แสน","ล้าน","สิบ","ร้อย","พัน","หมื่น","แสน","ล้าน");     
    $kaDigit=array("","หนึ่ง","สอง","สาม","สี่","ห้า","หก","เจ็ต","แปด","เก้า");     
    $kaDigitDecimal=array("ศูนย์","หนึ่ง","สอง","สาม","สี่","ห้า","หก","เจ็ต","แปด","เก้า");     
    $ii=0;     
    for($i=$lenNumber2;$i>=0;$i--){     
        $kaNumWord[$i]=substr($num,$ii,1);     
        $ii++;     
    }     
    $ii=0;     
    for($i=$lenNumber2;$i>=0;$i--){     
        if(($kaNumWord[$i]==2 && $i==1) || ($kaNumWord[$i]==2 && $i==7)){     
            $kaDigit[$kaNumWord[$i]]="ยี่";     
        }else{     
            if($kaNumWord[$i]==2){     
                $kaDigit[$kaNumWord[$i]]="สอง";          
            }     
            if(($kaNumWord[$i]==1 && $i<=2 && $i==0) || ($kaNumWord[$i]==1 && $lenNumber>6 && $i==6)){     
                if($kaNumWord[$i+1]==0){     
                    $kaDigit[$kaNumWord[$i]]="หนึ่ง";        
                }else{     
                    $kaDigit[$kaNumWord[$i]]="เอ็ด";         
                }     
            }elseif(($kaNumWord[$i]==1 && $i<=2 && $i==1) || ($kaNumWord[$i]==1 && $lenNumber>6 && $i==7)){     
                $kaDigit[$kaNumWord[$i]]="";     
            }else{     
                if($kaNumWord[$i]==1){     
                    $kaDigit[$kaNumWord[$i]]="หนึ่ง";     
                }     
            }     
        }     
        if($kaNumWord[$i]==0){     
            if($i!=6){  
                $kaGroup[$i]="";     
            }  
        }     
        $kaNumWord[$i]=substr($num,$ii,1);     
        $ii++;     
        $returnNumWord.=$kaDigit[$kaNumWord[$i]].$kaGroup[$i];     
    }        
	$satang="";
    if(isset($num_decimal[1])){  
        $returnNumWord.="บาท";  
        for($i=0;$i<strlen($num_decimal[1]);$i++){  
                $satang.=$kaDigitDecimal[substr($num_decimal[1],$i,1)];    
        }  
		$returnNumWord.="จุด".$satang."สตางค์";
    }else{
		$returnNumWord.="บาท";
	}
    return $returnNumWord;     
}     

}//




?>