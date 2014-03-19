<?php
/* @var $this AutoChoresController */
/* @var $data AutoChores */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('auto_chores_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->auto_chores_id), array('view', 'id'=>$data->auto_chores_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('times_occur')); ?>:</b>
	<?php echo CHtml::encode($data->times_occur); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('days_between')); ?>:</b>
	<?php echo CHtml::encode($data->days_between); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('generated_by')); ?>:</b>
	<?php echo CHtml::encode($data->generated_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_asof')); ?>:</b>
	<?php echo CHtml::encode($data->date_asof); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('days_after')); ?>:</b>
	<?php echo CHtml::encode($data->days_after); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('farm_herd')); ?>:</b>
	<?php echo CHtml::encode($data->farm_herd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disabled')); ?>:</b>
	<?php echo CHtml::encode($data->disabled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	*/ ?>

</div>