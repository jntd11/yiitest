<?php
/* @var $this BOSSetupControllerController */
/* @var $data Bossetup */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('header')); ?>:</b>
	<?php echo CHtml::encode($data->header); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('footer')); ?>:</b>
	<?php echo CHtml::encode($data->footer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lines_top')); ?>:</b>
	<?php echo CHtml::encode($data->lines_top); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('margin_left')); ?>:</b>
	<?php echo CHtml::encode($data->margin_left); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice_no')); ?>:</b>
	<?php echo CHtml::encode($data->invoice_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />

	*/ ?>

</div>