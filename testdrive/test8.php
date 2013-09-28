<html>
  <head>
    <style>
.a{
	border-top: 1px solid black; 
	border-bottom: 1px solid black;
	border-left: 1px solid black; 
	height: 500px;
}
.a1{
	border-top: 1px solid black; 
	border-bottom: 1px solid black;
	border-left: 1px solid black; 
	height: 230px;
}
.a2{
	border-top: 1px solid black; 
	border-bottom: 1px solid black;
	border-left: 1px solid black; 
	height: 140px;
}
.a3{
	border-top: 1px solid black; 
	border-bottom: 1px solid black;
	border-left: 1px solid black; 
	height: 60px;
}
.a4{
	border-top: 1px solid black; 
	border-bottom: 1px solid black;
	border-left: 1px solid black; 
	height: 40px;
}
</style>
  </head>
  <body>
    <table width="10%" style="position: absolute; top: 400px;" border="0">
	    <tr><td class="a" rowspan="2">Test</td></tr>
    </table>
    
    <table width="10%" style="position: absolute; top: 290px; left:11%" border="0">
	    <tr><td class="a1" rowspan="2">Test</td></tr>
    </table>
    <table width="10%" style="position: absolute; top: 790px; left:11%" border="0">
	    <tr><td class="a1" rowspan="2">Test</td></tr>
    </table>
    
<?php 
$level3 = array("220","450","720","950");
foreach($level3 as $key=>$levels){
?>
    <table width="10%" style="position: absolute; top: <?php echo $levels; ?>px; left:22%" border="0">
	    <tr><td class="a2" rowspan="2">Test</td></tr>
    </table>
<?php
}
?>
    
<?php 
$level4 = array("180","320","430","550","680","830","930","1050");
foreach($level4 as $key=>$levels){
	$style = "";
	//if($key == 1 or $key == 2 or $key == 7)
		//$style = "style='height: 60px;'";
?>
   <table width="10%" style="position: absolute; top: <?php echo $levels; ?>px; left:33%" border="0">
	    <tr><td class="a3" rowspan="2" <?php echo $style; ?>>Test</td></tr>
   </table>
<?php
}
?>
<?php 
$level5 = array("160","220","300","360","410","470","530","590","660","720","800","860","910","970","1030","1090");
foreach($level5 as $key=>$levels){
?>
   <table width="10%" style="position: absolute; top: <?php echo $levels; ?>px; left:44%" border="0">
	    <tr><td class="a4" rowspan="2">Test</td></tr>
   </table>
<?php
}
?>
</body>
</html>