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

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'mailing_code_label'); ?>
		<?php echo $form->textField($model,'mailing_code_label',array('size'=>10,'maxlength'=>10,'onkeyup'=>'caps(this)','readonly'=>($model->scenario == 'update')? true : false)); ?>
		<?php echo $form->error($model,'mailing_code_label'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mailing_code_desc'); ?>
		<?php echo $form->textField($model,'mailing_code_desc',array('size'=>100,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'mailing_code_desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save'); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save & New' : 'Save & New', array('name'=>'savenew')); ?>
		<?php echo CHtml::Button('Cancel',array('onClick'=>'window.location="index.php?r=tblMailingCode/admin";')); ?>
	</div>

<?php $this->endWidget(); ?>
<p class="note">Fields with <span class="required">*</span> are required.</p>
</div><!-- form -->