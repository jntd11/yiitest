<?php
$input1 = "sdfgh";
$input2 = "sdfgh";
$leng1 = strlen($input1);
$leng2 = strlen($input2);


if($leng1 < $leng2) {
	$input3 = str_split($input1);
	$str = $input2;
}
else {
	$input3 = str_split($input2);
	$str = $input1;
}
foreach ($input3 as $val){
	$str = preg_replace("/".$val."/i","",$str,1);
}

if($str == "")
	$output = 1;
else
	$output = strlen($str);
return $output;
 
?>