<html>
  <head>
    <style>
.a{
	border-top: 1px solid black; 
	border-bottom: 1px solid black;
	border-left: 1px solid black; 
	height: 730px;
}
.a1{
	border-top: 1px solid black; 
	border-bottom: 1px solid black;
	border-left: 1px solid black; 
	height: 340px;
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
    <table width="10%" style="position: absolute; top: 400px;" border="0">
	    <tr><td class="a" rowspan="2">Test</td></tr>
    </table>
 <?php
 $level[2] = '
	 <table width="10%" style="position: absolute; top: 220px; left:11%" border="0">
	    <tr><td class="a1" rowspan="2">$1</td></tr>
    </table>
    <table width="10%" style="position: absolute; top: 1010px; left:11%" border="0">
	    <tr><td class="a1" rowspan="2">$2</td></tr>
    </table>';

$level[2] = str_replace("$1","JAISANKAR",$level[2]);
$level[2] = str_replace("$2","Mathangi",$level[2]);
echo $level[2];
?>
<?php 
$level3 = array("130","470","920","1260");
foreach($level3 as $key=>$levels){
?>
    <table width="10%" style="position: absolute; top: <?php echo $levels; ?>px; left:22%" border="0">
	    <tr><td class="a2" rowspan="2">Test</td></tr>
    </table>
<?php
}
?>
    
<?php 
$level4 = array("90","270","430","610","890","1020","1150","1290");
foreach($level4 as $key=>$levels){
	$style = "";
	//if($key == 4)
		//$style = "style='height: 60px;'";
?>
   <table width="10%" style="position: absolute; top: <?php echo $levels; ?>px; left:33%" border="0">
	    <tr><td class="a3" rowspan="2" <?php echo $style; ?>><?php echo $key; ?>Test</td></tr>
   </table>
<?php
}
?>
<?php 
$level5 = array("70","150","250","330","410","490","590","670","870","950","1000","1080","1135","1210","1270","1350");
foreach($level5 as $key=>$levels){
?>
   <table width="10%" style="position: absolute; top: <?php echo $levels; ?>px; left:44%" border="0">
	    <tr><td class="a4" rowspan="2"><?php echo $key; ?>Test</td></tr>
   </table>
<?php
}
?>
<?php 
$level5 = array("60","100","140","180","240","280","320","360","400","435","480","520","580","620","660","695","715","745","770","790","790","820","870","900","930","960","1000","1040","1070","1100","1140","1180");
foreach($level5 as $key=>$levels){
?>
   <table width="10%" style="position: absolute; top: <?php echo $levels; ?>px; left:55%" border="0">
	    <tr><td class="a5" rowspan="2"><?php echo $key; ?>Test</td></tr>
   </table>
<?php
}
?>
</body>
</html>