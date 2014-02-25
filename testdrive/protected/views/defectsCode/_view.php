<?php
/* @var $this DefectsCodeController */
/* @var $data DefectsCode */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('defects_code_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->defects_code_id), array('view', 'id'=>$data->defects_code_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>