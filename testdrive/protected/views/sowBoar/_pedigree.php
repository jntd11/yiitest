<?php
//echo "<pre>";
//print_r($model[4]);
$levelshow = 4;
if (isset($_GET['l']))
	$levelshow = $_GET['l'];
//print_r($model);
?>
<input type="hidden" name="level0" id="level0" value="<?php echo $model[0]['id']?>" />
<input type="hidden" name="sire" id="sire" value="<?php echo $model[1][1]['id']?>" />
<input type="hidden" name="dam" id="dam" value="<?php echo $model[1][2]['id']?>" />
<input type="hidden" name="currenlevel" id="currenlevel" value="<?php echo $levelshow; ?>" />
<table width="10%" style="position: absolute; top: 450px; width: 10%;" border="0">
	    <tr><td class="a" rowspan="2"><?php echo $model[0]['notch']; ?></td></tr>
    </table>
 <?php
 $level[2] = '
	 <table width="10%" style="position: relative; top: 110px; left:19%; width: 20%;" border="0">
	    <tr><td class="a1" rowspan="2"><hr class="hr1"/>$1 <hr class="hr11"/></td></tr>
    </table>
    <table width="10%" style="position: relative; top: 530px; left:19%; width: 20%;" border="0">
	    <tr><td class="a1" rowspan="2"><hr class="hr1"/>$2<hr class="hr11"/></td></tr>
    </table>';
foreach ($model[1] as $key => $val) {
	$notch = preg_replace("/([0-9]+\-[0-9])$/"," ".$val['name']." $1 ".$val['no'],$val['notch']);
	$level[2] = str_replace("$".$key,$notch,$level[2]);
}
//$level[2] = str_replace("$1",$model[1][1]['notch'],$level[2]);
//$level[2] = str_replace("$2",$model[1][2]['notch'],$level[2]);
echo $level[2];
?>
<?php 

$level[3] = "";
$level3 = array("180","530","970","1310");
foreach($level3 as $key=>$levels){
 $level[3] .= '<table width="10%" style="position: absolute; top: '.$levels.'px; left:22%; width: 20%" border="0">';
 if($levelshow == 2)
 	$level[3] .= '<tr><td  rowspan="2"><span>$'.($key+1).'</span></td></tr>';
 else
 	$level[3] .= '<tr><td class="a2" rowspan="2"><hr class="hr1"/>$'.($key+1).'<hr class="hr11"/></td></tr>';
 $level[3] .= '</table>';
}

//$level[3] = str_replace("$1","JAISANKAR",$level[3]);
//$level[3] = str_replace("$2","Mathangi",$level[3]);
//print_r($model[3]);
//echo $val['notch'];
//exit;
foreach ($model[2] as $key => $val) {
	$notch = preg_replace("/([0-9]+\-[0-9])$/"," ".$val['name']." $1 ".$val['no'],$val['notch']);
	$level[3] = str_replace("$".$key,$notch,$level[3]);
}
if($levelshow >= 2) 
	echo $level[3];


?>
<?php 
$level[4] = "";
$level4 = array("135","320","480","670","930","1110","1270","1450");
foreach($level4 as $key=>$levels){
	$style = "";
	//if($key == 4)
		//$style = "style='height: 60px;'";
	$level[4] .=  '<table width="10%" style="position: absolute; top: '.$levels.'px; left:32%; width: 20%" border="0">';
	if($levelshow == 3)
		$level[4] .=  '<tr><td rowspan="2" <?php echo $style; ?><span>$'.($key+1).'</span></td></tr>';
	else 
		$level[4] .=  '<tr><td class="a3" rowspan="2" <?php echo $style; ?><hr class="hr1"/>$'.($key+1).'<hr class="hr11"/></td></tr>';
	$level[4] .=  '</table>';
}
//$level[4] = str_replace("$1","JAISANKAR",$level[4]);
//$level[4] = str_replace("$2","Mathangi",$level[4]);

foreach ($model[3] as $key => $val) {
	$notch = preg_replace("/([0-9]+\-[0-9])$/"," ".$val['name']." $1 ".$val['no'],$val['notch']);
	$level[4] = str_replace("$".$key,$notch,$level[4]);
}
if($levelshow >= 3)
	echo $level[4];

$level[5] = "";
$level5 = array("110","200","290","380","460","540","640","740","910","990","1090","1170","1250","1340","1430","1510");
foreach($level5 as $key=>$levels){
 $level[5] .=  '  <table width="10%" style="position: absolute; top: '.$levels.'px; left:42%; width: 20%" border="0">
	    <tr><td class="a4" rowspan="2">';
 if($levelshow == 4)
 	$level[5] .=  '<span>$'.($key+1).'</span>';
 else
 	$level[5] .=  '  <hr class="hr1"/>$'.($key+1).'<hr class="hr11"/>';
 $level[5] .=  '  </td></tr></table>';
}
//$level[5] = str_replace("$1","JAISANKAR",$level[5]);
//$level[5] = str_replace("$2","Mathangi",$level[5]);

foreach ($model[4] as $key => $val) {
	//echo "KEY".$key."Val".$val['notch']."<br>";
	$notch = preg_replace("/([0-9]+\-[0-9])$/"," ".$val['name']." $1 ".$val['no'],$val['notch']);
	$level[5] = str_replace(">$".$key."<",">".$notch."<",$level[5]);
}
if($levelshow >= 4)
	echo $level[5];

$level[6] = "";
$level6 = array("94","150","190","235","280","330","370","420","450","495","530","580","630","680","730","780","900","950","980","1030","1080","1130","1160","1210","1240","1290","1320","1380","1420","1470","1500","1550");
foreach($level6 as $key=>$levels){
   $level[6] .=  '  <table width="10%" style="position: absolute; top: '.$levels.'px; left:52.2%; width: 20%" border="0">';
   if($levelshow == 5)
   		$level[6] .=  '  <tr><td>$'.($key+1).'</td></tr>';
   else 
   		$level[6] .=  '  <tr><td class="a5"><hr class="hr1"/>$'.($key+1).'<hr class="hr11"/></td></tr>';
   $level[6] .=  '   </table>';
}

	
//$level[6] = str_replace("$1","JAISANKAR",$level[6]);
//$level[6] = str_replace("$2","Mathangi",$level[6]);
foreach ($model[5] as $key => $val) {
	$notch = preg_replace("/([0-9]+\-[0-9])$/"," ".$val['name']." $1 ".$val['no'],$val['notch']);
	//$level[6] = str_replace("$".$key,$val['notch'],$level[6]);
	$level[6] = str_replace(">$".$key."<",">".$notch."<",$level[6]);
}
if($levelshow >= 5)
	echo $level[6];

$level[7] = "";
$level7 = array("80","105","135","160","180","200","220","240","270","290","310","340","350","370","405","425",
		"440","460","480","505","520","540","570","590","620","640","670","690","715","730","765","785","890","910","940","960","970","990","1020","1040","1070","1090"
		,"1120","1140","1150","1170","1200","1215","1230","1250","1280","1300","1310","1330","1370","1390","1410","1430","1460","1480","1490","1510","1540","1560");
foreach($level7 as $key=>$levels){
	$level[7] .=  '  <table width="10%" style="position: absolute; top: '.$levels.'px; left:63%; width: 20%" border="0">';
	if($levelshow == 5)
		$level[7] .=  '  <tr><td  rowspan="2" >$'.($key+1).'</td></tr>';
	else 
		$level[7] .=  '  <tr><td  rowspan="2" class="a6">$'.($key+1).'</td></tr>';
	$level[7] .=  '  </table>';
}
//$level[6] = str_replace("$1","JAISANKAR",$level[6]);
//$level[6] = str_replace("$2","Mathangi",$level[6]);
foreach ($model[6] as $key => $val) {
	$notch = preg_replace("/([0-9]+\-[0-9])$/"," ".$val['name']." $1 ".$val['no'],$val['notch']);
	//$level[6] = str_replace("$".$key,$val['notch'],$level[6]);
	$level[7] = str_replace(">$".$key."<",">".$notch."<",$level[7]);
}
if($levelshow >= 6)
	echo $level[7];
?>