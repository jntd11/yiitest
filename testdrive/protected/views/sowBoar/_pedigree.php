<?php
//echo "<pre>";
//print_r($model[4]);
$levelshow = 4;
if (isset($_GET['l']))
	$levelshow = $_GET['l'];
//print_r($model);
$notch = preg_replace("/([0-9]+\-[0-9])$/"," ".$model[0]['name']." $1 ".$model[0]['no'],$model[0]['notch']);
?>
<input type="hidden" name="level0" id="level0" value="<?php echo $model[0]['id']?>" />
<input type="hidden" name="sire" id="sire" value="<?php echo $model[1][1]['id']?>" />
<input type="hidden" name="dam" id="dam" value="<?php echo $model[1][2]['id']?>" />
<input type="hidden" name="currenlevel" id="currenlevel" value="<?php echo $levelshow; ?>" />
<?php if($levelshow == 2) {?>
  <table style="position: relative; top: 50px; left:2%; width: 40%;" border="0">
	    <tr><td class="a3" rowspan="2"><hr class="hr2"/><?php echo $notch; ?><hr class="hr22"/></td></tr>
    </table>
<?php } else if($levelshow == 3) { ?>
  <table style="position: relative; top: 150px; left:2%; width: 40%;" border="0">
	    <tr><td class="a2" rowspan="2"><hr class="hr2"/><?php echo $notch; ?><hr class="hr22"/></td></tr>
    </table>
<?php } else if($levelshow == 4) { ?>
  <table style="position: relative; top: 350px; left:2%; width: 40%;" border="0">
	    <tr><td class="a1" rowspan="2"><hr class="hr2"/><?php echo $notch; ?><hr class="hr22"/></td></tr>
    </table>
<?php }else {?>
  <table width="10%" style="position: relative; top: 450px; left:2%; width: 40%;" border="0">
	    <tr><td class="a" rowspan="2"><hr class="hr2"/><?php echo $notch; ?><hr class="hr22"/></td></tr>
    </table>

<?php }?>
 <?php
 
 if($levelshow == 2) {
 		$level[2] = '<table style="position: relative; top: -75px; left:19.1%; width: 40%;" border="0">';
	    $level[2] .= '<tr><td class="a4" ><hr class="hr1"/>$1 <hr class="hr11"/></td></tr>';
 }else if($levelshow == 3) {
 		$level[2] = '<table style="position: relative; top: -105px; left:19.1%; width: 40%;" border="0">';
	    $level[2] .= '<tr><td class="a3" ><hr class="hr1"/>$1 <hr class="hr11"/></td></tr>';
 }else if($levelshow == 4) {
 		$level[2] = '<table style="position: relative; top: -105px; left:19.1%; width: 40%;" border="0">';
	    $level[2] .= '<tr><td class="a2" ><hr class="hr1"/>$1 <hr class="hr11"/></td></tr>';
 } else{ 
 		$level[2] = '<table style="position: relative; top: -535px; left:19.1%; width: 40%;" border="0">';
 		$level[2] .= '<tr><td class="a1" ><hr class="hr1"/>$1 <hr class="hr11"/></td></tr>';
 }
 
    $level[2] .= '</table>';
 if($levelshow == 2) {
    $level[2] .= '<table style="position: relative; top: -50px; left:19.1%; width: 40%;" border="0">';
	$level[2] .= '<tr><td class="a4" ><hr class="hr1"/>$2<hr class="hr11"/></td></tr>';
 }elseif($levelshow == 3) {
    $level[2] .= '<table style="position: relative; top: -20px; left:19.1%; width: 40%;" border="0">';
	$level[2] .= '<tr><td class="a3" ><hr class="hr1"/>$2<hr class="hr11"/></td></tr>';
 }elseif($levelshow == 4) {
    $level[2] .= '<table style="position: relative; top: 30px; left:19.1%; width: 40%;" border="0">';
	$level[2] .= '<tr><td class="a2" ><hr class="hr1"/>$2<hr class="hr11"/></td></tr>';
 }else{
 	$level[2] .= '<table style="position: relative; top: -110px; left:19.1%; width: 40%;" border="0">';
 	$level[2] .= '<tr><td class="a1" ><hr class="hr1"/>$2<hr class="hr11"/></td></tr>';
 	
 }
    $level[2] .= '</table>';
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
if($levelshow == 2) 
	$level3 = array("-221","-215","-215","-210");
else if($levelshow == 3) 
	$level3 = array("-340","-320","-285","-270");
else if($levelshow == 4)
	$level3 = array("-560","-480","-430","-350");
else
	$level3 = array("-1365","-1220","-990","-840");
foreach($level3 as $key=>$levels){
 
 if($levelshow == 2){
 	$level[3] .= '<table  style="position: relative; top: '.$levels.'px; left:39%; width: 40%" border="0">';
 	$level[3] .= '<tr><td class="a5" style="border: none;" rowspan="2"><span>$'.($key+1).'</span></td></tr>';
 }else if($levelshow == 3){
 	$level[3] .= '<table  style="position: relative; top: '.$levels.'px; left:39%; width: 40%" border="0">';
 	$level[3] .= '<tr><td class="a4" rowspan="2"><hr class="hr3"/>$'.($key+1).'<hr class="hr33"/></td></tr>';
 }else if($levelshow == 4){
 	$level[3] .= '<table  style="position: relative; top: '.$levels.'px; left:39%; width: 40%" border="0">';
 	$level[3] .= '<tr><td class="a3" rowspan="2"><hr class="hr3"/>$'.($key+1).'<hr class="hr33"/></td></tr>';
 }else{
 	$level[3] .= '<table  style="position: relative; top: '.$levels.'px; left:39%; width: 40%" border="0">';
 	$level[3] .= '<tr><td class="a2" rowspan="2"><hr class="hr3"/>$'.($key+1).'<hr class="hr33"/></td></tr>';
 }
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
if($levelshow == 3)
	$level4 = array("-630","-650","-680","-695","-710","-730","-760","-780");
else if($levelshow == 4)
	$level4 = array("-1010","-990","-960","-940","-930","-910","-880","-860");
else
	$level4 = array("-2240","-2150","-2100","-2020","-1870","-1790","-1740","-1650");
foreach($level4 as $key=>$levels){
	$style = "";
	//if($key == 4)
		//$style = "style='height: 60px;'";
	$level[4] .=  '<table style="position: relative; top: '.$levels.'px; left:58%; width: 40%" border="0">';
	if($levelshow == 3)
		$level[4] .=  '<tr><td class="a4" style="border: none;"><span>$'.($key+1).'</span></td></tr>';
	else if($levelshow == 4)
		$level[4] .=  '<tr><td class="a4" ><hr class="hr3"/>$'.($key+1).'<hr class="hr33"/></td></tr>';
	else 
		$level[4] .=  '<tr><td class="a3" ><hr class="hr3"/>$'.($key+1).'<hr class="hr33"/></td></tr>';
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
if($levelshow == 4)
	$level5 = array("-1570","-1590","-1620","-1635","-1650","-1670","-1700","-1720","-1750","-1770","-1800","-1820","-1840","-1860","-1890","-1900");
else
	$level5 = array("-3120","-3100","-3060","-3035","-3030","-3010","-2980","-2960","-2860","-2830","-2800","-2775","-2770","-2755","-2710","-2690");
foreach($level5 as $key=>$levels){
 $level[5] .=  '  <table width="10%" style="position: relative; top: '.$levels.'px; left:77%; width: 40%" border="0">
	    <tr>';
 if($levelshow == 4)
 	$level[5] .=  '<td class="a4" rowspan="2" style="border: none;"><span>$'.($key+1).'</span>';
 else
 	$level[5] .=  '<td class="a4" rowspan="2">  <hr class="hr4"/>$'.($key+1).'<hr class="hr44"/>';
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
if($levelshow == 5)
	$level6 = array("-4200","-4195","-4200","-4195","-4175","-4175","-4170","-4170","-4180","-4180","-4185",
	"-4175","-4170","-4165","-4170","-4165","-4090","-4080","-4080","-4070","-4065","-4060","-4060","-4055","-4070","-4070","-4070","-4065","-4050","-4045","-4050","-4050");
else 
	$level6 = array("-4200","-4195","-4200","-4195","-4180","-4175","-4175","-4165","-4175","-4180","-4180",
			"-4175","-4175","-4165","-4175","-4165","-4090","-4080","-4080","-4070","-4070","-4060","-4060","-4055","-4070","-4070","-4072","-4070","-4055","-4045","-4055","-4045");

foreach($level6 as $key=>$levels){
   $level[6] .=  '  <table  style="position: relative; top: '.$levels.'px; left:98%; width: 40%" border="0">';
   if($levelshow == 5)
   		$level[6] .=  '  <tr><td class="a5" style="border: none;">$'.($key+1).'</span>&nbsp;</td></tr>';
   else 
   		$level[6] .=  '  <tr><td class="a5"><hr class="hr4"/>$'.($key+1).'<hr class="hr44"/></td></tr>';
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