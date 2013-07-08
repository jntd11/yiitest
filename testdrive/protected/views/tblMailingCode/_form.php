<?php
/* @var $this TblMailingCodeController */
/* @var $model tblMailingCode */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-mailing-code-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'mailing_code_label'); ?>
		<?php echo $form->textField($model,'mailing_code_label',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'mailing_code_label'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mailing_code_desc'); ?>
		<?php echo $form->textArea($model,'mailing_code_desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'mailing_code_desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->