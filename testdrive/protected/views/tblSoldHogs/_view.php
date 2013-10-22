<?php
/* @var $this TblSoldHogsController */
/* @var $data TblSoldHogs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tbl_sold_hogs_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tbl_sold_hogs_id), array('view', 'id'=>$data->tbl_sold_hogs_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hog_ear_notch')); ?>:</b>
	<?php echo CHtml::encode($data->hog_ear_notch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_name')); ?>:</b>
	<?php echo CHtml::encode($data->customer_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_sold')); ?>:</b>
	<?php echo CHtml::encode($data->date_sold); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sold_price')); ?>:</b>
	<?php echo CHtml::encode($data->sold_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sale_type')); ?>:</b>
	<?php echo CHtml::encode($data->sale_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice_number')); ?>:</b>
	<?php echo CHtml::encode($data->invoice_number); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('app_xfer')); ?>:</b>
	<?php echo CHtml::encode($data->app_xfer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reason_sold')); ?>:</b>
	<?php echo CHtml::encode($data->reason_sold); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	*/ ?>

</div>