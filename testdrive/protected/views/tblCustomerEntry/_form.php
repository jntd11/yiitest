<?php
/* @var $this TblCustomerEntryController */
/* @var $model TblCustomerEntry */
/* @var $form CActiveForm */
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/assets/js/customer.js');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-customer-entry-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'company_name'); ?>
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
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model,'zip'); ?>
		<?php echo $form->error($model,'zip'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'contact'); ?>
		<?php echo $form->textField($model,'contact',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'contact'); ?>
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
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'county'); ?>
		<?php echo $form->textField($model,'county',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'county'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div>
	<div class="row"><?php echo CHtml::button('Credit Card Information',array('id'=>"creditbutton")); ?></div>
	<div id="creditinfo" style="display: none;">
		<div class="row">
			<?php echo $form->labelEx($model,'cc_brand'); ?>
			<?php echo $form->textField($model,'cc_brand',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'cc_brand'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'cc_number'); ?>
			<?php echo $form->textField($model,'cc_number'); ?>
			<?php echo $form->error($model,'cc_number'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'cc_expiration'); ?>
			<?php echo $form->textField($model,'cc_expiration',array('size'=>6,'maxlength'=>6)); ?>
			<?php echo $form->error($model,'cc_expiration'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'cc_name'); ?>
			<?php echo $form->textField($model,'cc_name',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'cc_name'); ?>
		</div>
	</div>
	<div class="row"><?php echo CHtml::button('Shipping Information',array('id'=>"shipbutton")); ?></div>
	<div id="shipinfo" style="display: none;">	
		<div class="row">
			<?php echo $form->labelEx($model,'ship_company_name'); ?>
			<?php echo $form->textField($model,'ship_company_name',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'ship_company_name'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'ship_name'); ?>
			<?php echo $form->textField($model,'ship_name',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'ship_name'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'ship_address1'); ?>
			<?php echo $form->textField($model,'ship_address1',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'ship_address1'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'ship_address2'); ?>
			<?php echo $form->textField($model,'ship_address2',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'ship_address2'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'ship_city'); ?>
			<?php echo $form->textField($model,'ship_city',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'ship_city'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'ship_state'); ?>
			<?php echo $form->textField($model,'ship_state',array('size'=>10,'maxlength'=>10)); ?>
			<?php echo $form->error($model,'ship_state'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'ship_country'); ?>
			<?php echo $form->textField($model,'ship_country',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'ship_country'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'ship_zip'); ?>
			<?php echo $form->textField($model,'ship_zip'); ?>
			<?php echo $form->error($model,'ship_zip'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'ship_contact'); ?>
			<?php echo $form->textField($model,'ship_contact',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'ship_contact'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'ship_area'); ?>
			<?php echo $form->textField($model,'ship_area',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'ship_area'); ?>
		</div>
	
		<div class="row">
			<?php echo $form->labelEx($model,'ship_phone'); ?>
			<?php echo $form->textField($model,'ship_phone',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'ship_phone'); ?>
		</div>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'att_sale'); ?>
		<?php 
		//echo $form->textField($model,'att_sale'); 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'att_sale',
				'options' =>array(
							'dateFormat'=>'yy-mm-dd',
						),
				'htmlOptions' => array(
						'size' => '20',         // textField size
						'maxlength' => '20',    // textField maxlength
				),
		));
		?>
		<?php echo $form->error($model,'att_sale'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mailing_code'); ?>
		<?php echo $form->textField($model,'mailing_code',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'mailing_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_invoice'); ?>
		<?php echo $form->textField($model,'last_invoice'); ?>
		<?php echo $form->error($model,'last_invoice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_letter_sent'); ?>
		<?php //echo $form->textField($model,'last_letter_sent'); 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'last_letter_sent',
				'options' =>array(
						'dateFormat'=>'yy-mm-dd',
				),
				
				'htmlOptions' => array(
						'size' => '10',         // textField size
						'maxlength' => '20',    // textField maxlength
				),
		));
		?>
		<?php echo $form->error($model,'last_letter_sent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'entry_date'); ?>
		<?php //echo $form->textField($model,'entry_date'); 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'entry_date',
				'options' =>array(
							'dateFormat'=>'yy-mm-dd',
						),
				'htmlOptions' => array(
						'size' => '10',         // textField size
						'maxlength' => '20',    // textField maxlength
				),
		));
		?>
		<?php echo $form->error($model,'entry_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'herdmark'); ?>
		<?php echo $form->textField($model,'herdmark',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'herdmark'); ?>
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
		<?php //echo $form->labelEx($model,'modified_date'); ?>
		<?php //echo $form->textField($model,'modified_date');?>
		<?php //echo $form->error($model,'modified_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->