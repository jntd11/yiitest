<html>
  <head>
    <style>
.a{
	border-top: 1px solid black; 
	border-bottom: 1px solid black;
	border-left: 1px solid black; 
	height: 780px;
}
.a1{
	/*border-top: 1px solid black; */
	border-bottom: 1px solid black;
	border-left: 1px solid black; 
	height: 340px;
	white-space: nowrap;
}
.a2{
	border-top: 1px solid black; 
	border-bottom: 1px solid black;
	border-left: 1px solid black; 
	height: 180px;
}
.a3{
	border-top: 1px solid black; 
	border-bottom: 1px solid black;
	border-left: 1px solid black; 
	height: 80px;
}
.a4{
	border-top: 1px solid black; 
	border-bottom: 1px solid black;
	border-left: 1px solid black; 
	height: 40px;
}
.a5{
	border-top: 1px solid red; 
	border-bottom: 1px solid red;
	border-left: 1px solid red; 
	height: 9px;
}
</style>
  </head>
  <body>
    <table width="10%" style="position: relative; top: 390px;" border="0">
	    <tr><td class="a" rowspan="2">Test</td></tr>
    </table>
 <?php
 $level[2] = '
	 <table width="10%" style="position: absolute; top: 220px; left:11%" border="0">
	    <tr><td class="a1" rowspan="2"><hr style="position: absolute; top: -10px; width: 100%">$1</td></tr>
    </table>
    <table width="10%" style="position: absolute; top: 1010px; left:11%" border="0">
	    <tr><td class="a1" rowspan="2">$2</td></tr>
    </table>';

$level[2] = str_replace("$1","JAISANKAR JAISANKAR",$level[2]);
$level[2] = str_replace("$2","Mathangi",$level[2]);
echo $level[2];
?>
<?php 
$level[3] = "";
$level3 = array("130","470","920","1260");
foreach($level3 as $key=>$levels){
 $level[3] .= '<table width="10%" style="position: absolute; top: '.$levels.'px; left:22%" border="0">
	    <tr><td class="a2" rowspan="2">$'.($key+1).'</td></tr>
    </table>';
}
$level[3] = str_replace("$1","JAISANKAR",$level[3]);
$level[3] = str_replace("$2","Mathangi",$level[3]);
echo $level[3];
?>
    
<?php 
$level[4] = "";
$level4 = array("90","270","430","610","880","1060","1220","1400");
foreach($level4 as $key=>$levels){
	$style = "";
	//if($key == 4)
		//$style = "style='height: 60px;'";
$level[4] .=  '<table width="10%" style="position: absolute; top: '.$levels.'px; left:33%" border="0">
	    <tr><td class="a3" rowspan="2" <?php echo $style; ?>$'.($key+1).'</td></tr>
   </table>';
}
$level[4] = str_replace("$1","JAISANKAR",$level[4]);
$level[4] = str_replace("$2","Mathangi",$level[4]);
echo $level[4];
?>
<?php 
$level[5] = "";
$level5 = array("70","150","250","330","410","490","590","670","860","940","1050","1120","1200","1280","1380","1460");
foreach($level5 as $key=>$levels){
 $level[5] .=  '  <table width="10%" style="position: absolute; top: '.$levels.'px; left:44%" border="0">
	    <tr><td class="a4" rowspan="2"><?php echo $key; ?>$'.($key+1).'</td></tr>
   </table>';
}
$level[5] = str_replace("$1","JAISANKAR",$level[5]);
$level[5] = str_replace("$2","Mathangi",$level[5]);
echo $level[5];

$level[6] = "";
$level6 = array("60","100","140","180","240","280","320","360","400","435","480","520","580","620","660","695","850","890","930","960","1040","1080","1110","1150","1190","1220","1270","1300","1370","1400","1450","1480");
foreach($level6 as $key=>$levels){
   $level[6] .=  '  <table width="10%" style="position: absolute; top: '.$levels.'px; left:55%" border="0">
	    <tr><td class="a5" rowspan="2"><?php echo $key; ?>$'.($key+1).'</td></tr>
   </table>';
}
$level[6] = str_replace("$1","JAISANKAR",$level[6]);
$level[6] = str_replace("$2","Mathangi",$level[6]);
echo $level[6];
?>
</body>
</html>