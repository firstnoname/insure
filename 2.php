<?
function multiexplode ($delimiters,$string) {
    $ary = explode($delimiters[0],$string);
    array_shift($delimiters);
    if($delimiters != NULL) {
        foreach($ary as $key => $val) {
             $ary[$key] = multiexplode($delimiters, $val);
        }
    }
    return  $ary;
}

$string = "1:1230,2:1249,3:1239";
$delimiters = Array(",");

$res = multiexplode($delimiters,$string);

foreach ($res as $key => $value) {
    // $arr[3] will be updated with each value from $arr...
     //echo $value."<br>";
	 $getvalue = explode(':', $value);
	 echo $getvalue[0];
    //print_r($arr);
}

?>