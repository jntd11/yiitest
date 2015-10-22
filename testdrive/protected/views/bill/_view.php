<?php
/* @var $this BillController */
/* @var $data Bill */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('billid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->billid), array('view', 'id'=>$data->billid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_ship')); ?>:</b>
	<?php echo CHtml::encode($data->date_ship); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_id')); ?>:</b>
	<?php echo CHtml::encode($data->customer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	*/ ?>

</div>