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
?>

<div class="form">

<?php
	$form=$this->beginWidget('CActiveForm', array(
			'id'=>'autoChores_frm',
			'enableAjaxValidation'=>false,
	));
?>
	<div class="row">
		<?php echo "From Date"; ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'name' => 'from_date',
				//'attribute' => 'fr',
				'value'=>''.$from_date.'',
				'options' =>array(
						//'dateFormat'=>'dd/mm/yyyy',
						'constrainInput'=> false,
						'showOn'=>'button',
						'defaultDate'=>''.$activitydate.'',
						'buttonImage'=>'img/calendar.gif',

						),
				'htmlOptions' => array(
						'id'=>'from_date',
						'size' => '20',         // textField size
						'maxlength' => '20',    // textField maxlength
						'onBlur'=>'validateDatePicker("att_sale")',
						'value'=>$from_date,

				),
		));
		?>
		<?php echo "To Date"; ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'name' => 'to_date',
				//'attribute' => 'fr',
				'value'=>''.$to_date.'',
				'options' =>array(
						//'dateFormat'=>'dd/mm/yyyy',
						'constrainInput'=> false,
						'showOn'=>'button',
						'defaultDate'=>''.$activitydate.'',
						'buttonImage'=>'img/calendar.gif',

						),
				'htmlOptions' => array(
						'id'=>'to_date',
						'size' => '20',         // textField size
						'maxlength' => '20',    // textField maxlength
						'onBlur'=>'validateDatePicker("att_sale")',


				),
		));
		?>
		<?php echo "Farm & Herd"; ?>
		&nbsp;
<?php
    echo CHtml::TextField('farm',$farm);
    ?>
    &nbsp;
    <?php
	echo CHtml::submitButton('Go',array('onClick'=>'','name'=>'go'));
	$this->endWidget();
	if(count($model->errors) > 0){
		echo '<div class="errorSummary">';
		echo "<ul>";
		foreach ($model->errors as $errors){
			echo "<li>".$errors[0]."</li>";
		}
		echo "</ul>";
		echo "</div>";

	}

?>


	</div>
	<?php
	 if(count($results) > 0) {
	//print_r($results); ?>
	<div class="grid-view" id="container">
	<table  class="items">
	     <tr>
	     	<th width="30%" id="sow-gilts-grid_c0">Description</th>
	     	<th  width="30%">Farm & Herd	</th>
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

</div><!-- form -->