<?php
/* @var $this TblMailingCodeController */
/* @var $data tblMailingCode */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('mailing_code_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->mailing_code_id), array('view', 'id'=>$data->mailing_code_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mailing_code_label')); ?>:</b>
	<?php echo CHtml::encode($data->mailing_code_label); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mailing_code_desc')); ?>:</b>
	<?php echo CHtml::encode($data->mailing_code_desc); ?>
	<br />


</div>