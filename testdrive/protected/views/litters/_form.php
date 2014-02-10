<?php
/* @var $this LittersController */
/* @var $model Litters */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'litters-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sire_ear_notch'); ?>
		<?php echo $form->textField($model,'sire_ear_notch',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'sire_ear_notch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sow_parity'); ?>
		<?php echo $form->textField($model,'sow_parity'); ?>
		<?php echo $form->error($model,'sow_parity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'times_settle'); ?>
		<?php echo $form->textField($model,'times_settle'); ?>
		<?php echo $form->error($model,'times_settle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'herd_litter'); ?>
		<?php echo $form->textField($model,'herd_litter'); ?>
		<?php echo $form->error($model,'herd_litter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_pigs'); ?>
		<?php echo $form->textField($model,'no_pigs'); ?>
		<?php echo $form->error($model,'no_pigs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_born_alive'); ?>
		<?php echo $form->textField($model,'no_born_alive'); ?>
		<?php echo $form->error($model,'no_born_alive'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_boars_alive'); ?>
		<?php echo $form->textField($model,'no_boars_alive'); ?>
		<?php echo $form->error($model,'no_boars_alive'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gilts_alive'); ?>
		<?php echo $form->textField($model,'gilts_alive'); ?>
		<?php echo $form->error($model,'gilts_alive'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birth_wgt'); ?>
		<?php echo $form->textField($model,'birth_wgt'); ?>
		<?php echo $form->error($model,'birth_wgt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_modified'); ?>
		<?php echo $form->textField($model,'date_modified'); ?>
		<?php echo $form->error($model,'date_modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->