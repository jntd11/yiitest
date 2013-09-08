<?php
/* @var $this SowBoarController */
/* @var $data SowBoar */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sow_boar_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sow_boar_id), array('view', 'id'=>$data->sow_boar_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ear_notch')); ?>:</b>
	<?php echo CHtml::encode($data->ear_notch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sow_boar_name')); ?>:</b>
	<?php echo CHtml::encode($data->sow_boar_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registeration_no')); ?>:</b>
	<?php echo CHtml::encode($data->registeration_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('born')); ?>:</b>
	<?php echo CHtml::encode($data->born); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_pigs')); ?>:</b>
	<?php echo CHtml::encode($data->no_pigs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight_21')); ?>:</b>
	<?php echo CHtml::encode($data->weight_21); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('sire_notch')); ?>:</b>
	<?php echo CHtml::encode($data->sire_notch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dam_notch')); ?>:</b>
	<?php echo CHtml::encode($data->dam_notch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bred_date')); ?>:</b>
	<?php echo CHtml::encode($data->bred_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_parity')); ?>:</b>
	<?php echo CHtml::encode($data->last_parity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sold_mmddyy')); ?>:</b>
	<?php echo CHtml::encode($data->sold_mmddyy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reason_sold')); ?>:</b>
	<?php echo CHtml::encode($data->reason_sold); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('offspring_name')); ?>:</b>
	<?php echo CHtml::encode($data->offspring_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('back_fat')); ?>:</b>
	<?php echo CHtml::encode($data->back_fat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loinneye')); ?>:</b>
	<?php echo CHtml::encode($data->loinneye); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('days')); ?>:</b>
	<?php echo CHtml::encode($data->days); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EBV')); ?>:</b>
	<?php echo CHtml::encode($data->EBV); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sire_initials')); ?>:</b>
	<?php echo CHtml::encode($data->sire_initials); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	*/ ?>

</div>