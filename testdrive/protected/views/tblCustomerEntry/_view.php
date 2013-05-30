<?php
/* @var $this TblCustomerEntryController */
/* @var $data tblCustomerEntry */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_entry_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->customer_entry_id), array('view', 'id'=>$data->customer_entry_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address1')); ?>:</b>
	<?php echo CHtml::encode($data->address1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address2')); ?>:</b>
	<?php echo CHtml::encode($data->address2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('zip')); ?>:</b>
	<?php echo CHtml::encode($data->zip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_home')); ?>:</b>
	<?php echo CHtml::encode($data->phone_home); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_business')); ?>:</b>
	<?php echo CHtml::encode($data->phone_business); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_cell')); ?>:</b>
	<?php echo CHtml::encode($data->phone_cell); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_other1')); ?>:</b>
	<?php echo CHtml::encode($data->phone_other1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_other2')); ?>:</b>
	<?php echo CHtml::encode($data->phone_other2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact')); ?>:</b>
	<?php echo CHtml::encode($data->contact); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('county')); ?>:</b>
	<?php echo CHtml::encode($data->county); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_name')); ?>:</b>
	<?php echo CHtml::encode($data->company_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_sows')); ?>:</b>
	<?php echo CHtml::encode($data->total_sows); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_boars')); ?>:</b>
	<?php echo CHtml::encode($data->total_boars); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('facility')); ?>:</b>
	<?php echo CHtml::encode($data->facility); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sows')); ?>:</b>
	<?php echo CHtml::encode($data->sows); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('boars')); ?>:</b>
	<?php echo CHtml::encode($data->boars); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('frequency')); ?>:</b>
	<?php echo CHtml::encode($data->frequency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('system')); ?>:</b>
	<?php echo CHtml::encode($data->system); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feeder')); ?>:</b>
	<?php echo CHtml::encode($data->feeder); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('finish')); ?>:</b>
	<?php echo CHtml::encode($data->finish); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rep_glits')); ?>:</b>
	<?php echo CHtml::encode($data->rep_glits); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes1')); ?>:</b>
	<?php echo CHtml::encode($data->notes1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes2')); ?>:</b>
	<?php echo CHtml::encode($data->notes2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes3')); ?>:</b>
	<?php echo CHtml::encode($data->notes3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes4')); ?>:</b>
	<?php echo CHtml::encode($data->notes4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />

	*/ ?>

</div>