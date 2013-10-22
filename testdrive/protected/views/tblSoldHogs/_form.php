<?php
/* @var $this TblSoldHogsController */
/* @var $model TblSoldHogs */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-sold-hogs-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'hog_ear_notch'); ?>
		<?php echo $form->textField($model,'hog_ear_notch',array('size'=>20,'maxlength'=>20,'onBlur'=>'checkData(this,1)')); ?>
		<?php echo $form->error($model,'hog_ear_notch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customer_name'); ?>
		<?php echo $form->textField($model,'customer_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'customer_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_sold'); ?>
		<?php echo $form->textField($model,'date_sold',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'date_sold'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sold_price'); ?>
		<?php echo $form->textField($model,'sold_price'); ?>
		<?php echo $form->error($model,'sold_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sale_type'); ?>
		<?php echo $form->textField($model,'sale_type',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'sale_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invoice_number'); ?>
		<?php echo $form->textField($model,'invoice_number'); ?>
		<?php echo $form->error($model,'invoice_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'app_xfer'); ?>
		<?php echo $form->textField($model,'app_xfer',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'app_xfer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reason_sold'); ?>
		<?php echo $form->textArea($model,'reason_sold',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'reason_sold'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->