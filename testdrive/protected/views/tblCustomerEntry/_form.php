<?php
/* @var $this TblCustomerEntryController */
/* @var $model tblCustomerEntry */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-customer-entry-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address1'); ?>
		<?php echo $form->textField($model,'address1',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address2'); ?>
		<?php echo $form->textField($model,'address2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model,'zip'); ?>
		<?php echo $form->error($model,'zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_home'); ?>
		<?php echo $form->textField($model,'phone_home',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone_home'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_business'); ?>
		<?php echo $form->textField($model,'phone_business',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone_business'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_cell'); ?>
		<?php echo $form->textField($model,'phone_cell',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone_cell'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_other1'); ?>
		<?php echo $form->textField($model,'phone_other1',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone_other1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_other2'); ?>
		<?php echo $form->textField($model,'phone_other2',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone_other2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact'); ?>
		<?php echo $form->textField($model,'contact',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'county'); ?>
		<?php echo $form->textField($model,'county',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'county'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'company_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_sows'); ?>
		<?php echo $form->textField($model,'total_sows'); ?>
		<?php echo $form->error($model,'total_sows'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_boars'); ?>
		<?php echo $form->textField($model,'total_boars'); ?>
		<?php echo $form->error($model,'total_boars'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facility'); ?>
		<?php echo $form->textField($model,'facility',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'facility'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sows'); ?>
		<?php echo $form->textField($model,'sows'); ?>
		<?php echo $form->error($model,'sows'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'boars'); ?>
		<?php echo $form->textField($model,'boars'); ?>
		<?php echo $form->error($model,'boars'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'frequency'); ?>
		<?php echo $form->textField($model,'frequency',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'frequency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'system'); ?>
		<?php echo $form->textField($model,'system',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'system'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'feeder'); ?>
		<?php echo $form->textField($model,'feeder',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'feeder'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'finish'); ?>
		<?php echo $form->textField($model,'finish',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'finish'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rep_glits'); ?>
		<?php echo $form->textField($model,'rep_glits',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'rep_glits'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes1'); ?>
		<?php echo $form->textArea($model,'notes1',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'notes1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes2'); ?>
		<?php echo $form->textArea($model,'notes2',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'notes2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes3'); ?>
		<?php echo $form->textArea($model,'notes3',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'notes3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes4'); ?>
		<?php echo $form->textArea($model,'notes4',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'notes4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified_date'); ?>
		<?php echo $form->textField($model,'modified_date'); ?>
		<?php echo $form->error($model,'modified_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->