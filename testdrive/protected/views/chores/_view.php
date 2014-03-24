<?php
/* @var $this ChoresController */
/* @var $data Chores */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('chores_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->chores_id), array('view', 'id'=>$data->chores_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('farm_herd')); ?>:</b>
	<?php echo CHtml::encode($data->farm_herd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />


</div>