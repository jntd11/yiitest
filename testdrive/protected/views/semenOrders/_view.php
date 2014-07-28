<?php
/* @var $this SemenOrdersController */
/* @var $data SemenOrders */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('semen_orders_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->semen_orders_id), array('view', 'id'=>$data->semen_orders_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_id')); ?>:</b>
	<?php echo CHtml::encode($data->customer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sow_boar_id')); ?>:</b>
	<?php echo CHtml::encode($data->sow_boar_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ordered_date')); ?>:</b>
	<?php echo CHtml::encode($data->ordered_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_date')); ?>:</b>
	<?php echo CHtml::encode($data->ship_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doses')); ?>:</b>
	<?php echo CHtml::encode($data->doses); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price_dose')); ?>:</b>
	<?php echo CHtml::encode($data->price_dose); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('shipping_cost')); ?>:</b>
	<?php echo CHtml::encode($data->shipping_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('misc')); ?>:</b>
	<?php echo CHtml::encode($data->misc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('onstandby')); ?>:</b>
	<?php echo CHtml::encode($data->onstandby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice')); ?>:</b>
	<?php echo CHtml::encode($data->invoice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('semen_type')); ?>:</b>
	<?php echo CHtml::encode($data->semen_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_charges')); ?>:</b>
	<?php echo CHtml::encode($data->cod_charges); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_type')); ?>:</b>
	<?php echo CHtml::encode($data->payment_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />

	*/ ?>

</div>