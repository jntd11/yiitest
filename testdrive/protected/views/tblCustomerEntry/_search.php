<?php
/* @var $this TblCustomerEntryController */
/* @var $model TblCustomerEntry */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'customer_entry_id'); ?>
		<?php echo $form->textField($model,'customer_entry_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address1'); ?>
		<?php echo $form->textField($model,'address1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address2'); ?>
		<?php echo $form->textField($model,'address2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zip'); ?>
		<?php echo $form->textField($model,'zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_home'); ?>
		<?php echo $form->textField($model,'phone_home',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_business'); ?>
		<?php echo $form->textField($model,'phone_business',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_cell'); ?>
		<?php echo $form->textField($model,'phone_cell',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_other1'); ?>
		<?php echo $form->textField($model,'phone_other1',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_other2'); ?>
		<?php echo $form->textField($model,'phone_other2',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contact'); ?>
		<?php echo $form->textField($model,'contact',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'county'); ?>
		<?php echo $form->textField($model,'county',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_brand'); ?>
		<?php echo $form->textField($model,'cc_brand',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_number'); ?>
		<?php echo $form->textField($model,'cc_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_expiration'); ?>
		<?php echo $form->textField($model,'cc_expiration',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cc_name'); ?>
		<?php echo $form->textField($model,'cc_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ship_company_name'); ?>
		<?php echo $form->textField($model,'ship_company_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ship_name'); ?>
		<?php echo $form->textField($model,'ship_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ship_address1'); ?>
		<?php echo $form->textField($model,'ship_address1',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ship_address2'); ?>
		<?php echo $form->textField($model,'ship_address2',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ship_city'); ?>
		<?php echo $form->textField($model,'ship_city',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ship_state'); ?>
		<?php echo $form->textField($model,'ship_state',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ship_country'); ?>
		<?php echo $form->textField($model,'ship_country',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ship_zip'); ?>
		<?php echo $form->textField($model,'ship_zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ship_contact'); ?>
		<?php echo $form->textField($model,'ship_contact',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ship_area'); ?>
		<?php echo $form->textField($model,'ship_area',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ship_phone'); ?>
		<?php echo $form->textField($model,'ship_phone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'att_sale'); ?>
		<?php echo $form->textField($model,'att_sale'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mailing_code'); ?>
		<?php echo $form->textField($model,'mailing_code',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_invoice'); ?>
		<?php echo $form->textField($model,'last_invoice'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_letter_sent'); ?>
		<?php echo $form->textField($model,'last_letter_sent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entry_date'); ?>
		<?php echo $form->textField($model,'entry_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'herdmark'); ?>
		<?php echo $form->textField($model,'herdmark',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_sows'); ?>
		<?php echo $form->textField($model,'total_sows'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_boars'); ?>
		<?php echo $form->textField($model,'total_boars'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'facility'); ?>
		<?php echo $form->textField($model,'facility',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sows'); ?>
		<?php echo $form->textField($model,'sows'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'boars'); ?>
		<?php echo $form->textField($model,'boars'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'frequency'); ?>
		<?php echo $form->textField($model,'frequency',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'system'); ?>
		<?php echo $form->textField($model,'system',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'feeder'); ?>
		<?php echo $form->textField($model,'feeder',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'finish'); ?>
		<?php echo $form->textField($model,'finish',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rep_glits'); ?>
		<?php echo $form->textField($model,'rep_glits',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notes1'); ?>
		<?php echo $form->textArea($model,'notes1',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notes2'); ?>
		<?php echo $form->textArea($model,'notes2',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notes3'); ?>
		<?php echo $form->textArea($model,'notes3',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notes4'); ?>
		<?php echo $form->textArea($model,'notes4',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modified_date'); ?>
		<?php echo $form->textField($model,'modified_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->