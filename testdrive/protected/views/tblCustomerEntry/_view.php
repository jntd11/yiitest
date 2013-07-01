<?php
/* @var $this TblCustomerEntryController */
/* @var $data TblCustomerEntry */
?>
<tr class="odd">
	<td>
	<?php echo CHtml::link(CHtml::encode($data->customer_entry_id), array('view', 'id'=>$data->customer_entry_id)); ?>
	</td><td>

	<?php echo CHtml::encode($data->company_name); ?>
	</td><td>

	<?php echo CHtml::encode($data->first_name); ?>
	</td><td>

	<?php echo CHtml::encode($data->last_name); ?>
	</td><td>

	<?php echo CHtml::encode($data->address1); ?>
	</td><td>

	<?php echo CHtml::encode($data->address2); ?>
	</td><td>

	<?php echo CHtml::encode($data->city); ?>
	</td><td>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('zip')); ?>:</b>
	<?php echo CHtml::encode($data->zip); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_home')); ?>:</b>
	<?php echo CHtml::encode($data->phone_home); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_business')); ?>:</b>
	<?php echo CHtml::encode($data->phone_business); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_cell')); ?>:</b>
	<?php echo CHtml::encode($data->phone_cell); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_other1')); ?>:</b>
	<?php echo CHtml::encode($data->phone_other1); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_other2')); ?>:</b>
	<?php echo CHtml::encode($data->phone_other2); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact')); ?>:</b>
	<?php echo CHtml::encode($data->contact); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('county')); ?>:</b>
	<?php echo CHtml::encode($data->county); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('cc_brand')); ?>:</b>
	<?php echo CHtml::encode($data->cc_brand); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('cc_number')); ?>:</b>
	<?php echo CHtml::encode($data->cc_number); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('cc_expiration')); ?>:</b>
	<?php echo CHtml::encode($data->cc_expiration); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('cc_name')); ?>:</b>
	<?php echo CHtml::encode($data->cc_name); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_company_name')); ?>:</b>
	<?php echo CHtml::encode($data->ship_company_name); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_name')); ?>:</b>
	<?php echo CHtml::encode($data->ship_name); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_address1')); ?>:</b>
	<?php echo CHtml::encode($data->ship_address1); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_address2')); ?>:</b>
	<?php echo CHtml::encode($data->ship_address2); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_city')); ?>:</b>
	<?php echo CHtml::encode($data->ship_city); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_state')); ?>:</b>
	<?php echo CHtml::encode($data->ship_state); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_country')); ?>:</b>
	<?php echo CHtml::encode($data->ship_country); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_zip')); ?>:</b>
	<?php echo CHtml::encode($data->ship_zip); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_contact')); ?>:</b>
	<?php echo CHtml::encode($data->ship_contact); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_area')); ?>:</b>
	<?php echo CHtml::encode($data->ship_area); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_phone')); ?>:</b>
	<?php echo CHtml::encode($data->ship_phone); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('att_sale')); ?>:</b>
	<?php echo CHtml::encode($data->att_sale); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('mailing_code')); ?>:</b>
	<?php echo CHtml::encode($data->mailing_code); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_invoice')); ?>:</b>
	<?php echo CHtml::encode($data->last_invoice); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_letter_sent')); ?>:</b>
	<?php echo CHtml::encode($data->last_letter_sent); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('entry_date')); ?>:</b>
	<?php echo CHtml::encode($data->entry_date); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('herdmark')); ?>:</b>
	<?php echo CHtml::encode($data->herdmark); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_sows')); ?>:</b>
	<?php echo CHtml::encode($data->total_sows); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_boars')); ?>:</b>
	<?php echo CHtml::encode($data->total_boars); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('facility')); ?>:</b>
	<?php echo CHtml::encode($data->facility); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('sows')); ?>:</b>
	<?php echo CHtml::encode($data->sows); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('boars')); ?>:</b>
	<?php echo CHtml::encode($data->boars); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('frequency')); ?>:</b>
	<?php echo CHtml::encode($data->frequency); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('system')); ?>:</b>
	<?php echo CHtml::encode($data->system); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('feeder')); ?>:</b>
	<?php echo CHtml::encode($data->feeder); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('finish')); ?>:</b>
	<?php echo CHtml::encode($data->finish); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('rep_glits')); ?>:</b>
	<?php echo CHtml::encode($data->rep_glits); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes1')); ?>:</b>
	<?php echo CHtml::encode($data->notes1); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes2')); ?>:</b>
	<?php echo CHtml::encode($data->notes2); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes3')); ?>:</b>
	<?php echo CHtml::encode($data->notes3); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('notes4')); ?>:</b>
	<?php echo CHtml::encode($data->notes4); ?>
	</td><td>

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	</td><td>

	*/ ?>

</tr>