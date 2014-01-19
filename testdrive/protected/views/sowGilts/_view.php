<?php
/* @var $this SowGiltsController */
/* @var $data SowGilts */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sow_gilts_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sow_gilts_id), array('view', 'id'=>$data->sow_gilts_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_bred')); ?>:</b>
	<?php echo CHtml::encode($data->date_bred); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sire_ear_notch')); ?>:</b>
	<?php echo CHtml::encode($data->sire_ear_notch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_type')); ?>:</b>
	<?php echo CHtml::encode($data->service_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passover_date')); ?>:</b>
	<?php echo CHtml::encode($data->passover_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('due_date')); ?>:</b>
	<?php echo CHtml::encode($data->due_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('days_between')); ?>:</b>
	<?php echo CHtml::encode($data->days_between); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('settled')); ?>:</b>
	<?php echo CHtml::encode($data->settled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('farrowed')); ?>:</b>
	<?php echo CHtml::encode($data->farrowed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	*/ ?>

</div>