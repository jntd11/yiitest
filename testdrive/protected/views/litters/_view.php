<?php
/* @var $this LittersController */
/* @var $data Litters */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('litters_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->litters_id), array('view', 'id'=>$data->litters_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sire_ear_notch')); ?>:</b>
	<?php echo CHtml::encode($data->sire_ear_notch); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sow_parity')); ?>:</b>
	<?php echo CHtml::encode($data->sow_parity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('times_settle')); ?>:</b>
	<?php echo CHtml::encode($data->times_settle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('herd_litter')); ?>:</b>
	<?php echo CHtml::encode($data->herd_litter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_pigs')); ?>:</b>
	<?php echo CHtml::encode($data->no_pigs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_born_alive')); ?>:</b>
	<?php echo CHtml::encode($data->no_born_alive); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('no_boars_alive')); ?>:</b>
	<?php echo CHtml::encode($data->no_boars_alive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gilts_alive')); ?>:</b>
	<?php echo CHtml::encode($data->gilts_alive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birth_wgt')); ?>:</b>
	<?php echo CHtml::encode($data->birth_wgt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	*/ ?>

</div>