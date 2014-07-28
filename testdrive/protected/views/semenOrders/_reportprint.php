<?php
/* @var $this ChoresController */
/* @var $model Chores */
/* @var $form CActiveForm */
$farmHerd = Yii::app()->request->cookies['farm_herd'];
$farmHerdName = Yii::app()->request->cookies['farm_herd_name'];
$herdmark = Yii::app()->request->cookies['breeder_herd_mark'];
$activitydate = isset(Yii::app()->request->cookies['date'])?Yii::app()->request->cookies['date']:date("m/d/Y");
$from_date = (isset($_POST['from_date']))?$_POST['from_date']:$activitydate;
$to_date = (isset($_POST['to_date']))?$_POST['to_date']:$activitydate;
$farm = (isset($_POST['farm']))?$_POST['farm']:$farmHerd;
     echo CHtml::Button('Print page',array('name'=>'printer','onClick'=>'window.print();'));
	 if(count($results) > 0) {
?>

	<div class="grid-view" id="container">
	<table  class="items">
	     <tr>
	        <td><?php echo $from_date; ?></td>
	        <td><?php echo $to_date; ?></td>
	        <td><?php echo $farm; ?></td>
	     </tr>
	     <tr>
	     	<th width="30%" id="sow-gilts-grid_c0">Description</th>
	     	<th  width="30%">Farm & Herd</th>
	     	<th  width="30%">Comments</th>
	     </tr>
	     <?php
	     	foreach($results as $key=>$result){
		 ?>
		 	<tr class="even hasmenu"><td colspan="3" align="center" style="text-align: center; border-bottom: 2px solid;"><?php echo $key." ".date("l",strtotime($key)); ?></td></tr>
		 <?php
			foreach ($result as $keyrow=>$resultrow){
		 ?>
		 <tr class="odd hasmenu">
	     	<td><?php echo $resultrow['description']; ?></td>
	     	<td><?php echo $resultrow['farm_herd']; ?></td>
	     	<td><?php echo $resultrow['comments']; ?></td>
	     </tr>
		 <?php
			 }
			}
	     ?>
	</table>
	<?php }?>
	</div>
