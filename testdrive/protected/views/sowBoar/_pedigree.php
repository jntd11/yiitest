<?php
//echo "<pre>";
//print_r($model); 
?><table width="10%" style="position: absolute; top: 390px; width: 10%;" border="0">
	    <tr><td class="a" rowspan="2">Test INDIA</td></tr>
    </table>
 <?php
 $level[2] = '
	 <table width="10%" style="position: relative; top: 110px; left:18%; width: 10%;" border="0">
	    <tr><td class="a1" rowspan="2"><hr class="hr1"/>$1 <hr class="hr11"/></td></tr>
    </table>
    <table width="10%" style="position: relative; top: 530px; left:18%; width: 10%;" border="0">
	    <tr><td class="a1" rowspan="2"><hr class="hr1"/>$2<hr class="hr11"/></td></tr>
    </table>';
foreach ($model[1] as $key => $val) {
	$level[2] = str_replace("$".$key,$val['notch'],$level[2]);
}
//$level[2] = str_replace("$1",$model[1][1]['notch'],$level[2]);
//$level[2] = str_replace("$2",$model[1][2]['notch'],$level[2]);
echo $level[2];
?>
<?php 
$level[3] = "";
$level3 = array("130","470","920","1260");
foreach($level3 as $key=>$levels){
 $level[3] .= '<table width="10%" style="position: absolute; top: '.$levels.'px; left:31%; width: 10%" border="0">
	    <tr><td class="a2" rowspan="2"><hr class="hr1"/>$'.($key+1).'<hr class="hr11"/></td></tr>
    </table>';
}

//$level[3] = str_replace("$1","JAISANKAR",$level[3]);
//$level[3] = str_replace("$2","Mathangi",$level[3]);
//print_r($model[3]);
//echo $val['notch'];
//exit;
foreach ($model[2] as $key => $val) {
	$level[3] = str_replace("$".$key,$val['notch'],$level[3]);
}
echo $level[3];
?>
<?php 
$level[4] = "";
$level4 = array("90","270","430","610","880","1060","1220","1400");
foreach($level4 as $key=>$levels){
	$style = "";
	//if($key == 4)
		//$style = "style='height: 60px;'";
$level[4] .=  '<table width="10%" style="position: absolute; top: '.$levels.'px; left:41%; width: 10%" border="0">
	    <tr><td class="a3" rowspan="2" <?php echo $style; ?><hr class="hr1"/>$'.($key+1).'<hr class="hr11"/></td></tr>
   </table>';
}
//$level[4] = str_replace("$1","JAISANKAR",$level[4]);
//$level[4] = str_replace("$2","Mathangi",$level[4]);

foreach ($model[3] as $key => $val) {
	$level[4] = str_replace("$".$key,$val['notch'],$level[4]);
}
echo $level[4];

$level[5] = "";
$level5 = array("70","150","250","330","410","490","590","670","860","940","1050","1120","1200","1280","1380","1460");
foreach($level5 as $key=>$levels){
 $level[5] .=  '  <table width="10%" style="position: absolute; top: '.$levels.'px; left:51%; width: 10%" border="0">
	    <tr><td class="a4" rowspan="2"><hr class="hr1"/><?php echo $key; ?>$'.($key+1).'<hr class="hr11"/></td></tr>
   </table>';
}
//$level[5] = str_replace("$1","JAISANKAR",$level[5]);
//$level[5] = str_replace("$2","Mathangi",$level[5]);
foreach ($model[4] as $key => $val) {
	$level[5] = str_replace("$".$key,$val['notch'],$level[5]);
}
echo $level[5];

$level[6] = "";
$level6 = array("63","100","140","180","240","280","320","360","400","435","480","520","580","620","660","695","850","890","930","960","1040","1080","1110","1150","1190","1220","1270","1300","1370","1400","1450","1480");
foreach($level6 as $key=>$levels){
   $level[6] .=  '  <table width="10%" style="position: absolute; top: '.$levels.'px; left:61%; width: 10%" border="0">
	    <tr><td class="a5" rowspan="2"><hr class="hr1"/><?php echo $key; ?>$'.($key+1).'<hr class="hr11"/></td></tr>
   </table>';
}
//$level[6] = str_replace("$1","JAISANKAR",$level[6]);
//$level[6] = str_replace("$2","Mathangi",$level[6]);
foreach ($model[6] as $key => $val) {
	$level[6] = str_replace("$".$key,$val['notch'],$level[6]);
}
echo $level[6];

?>