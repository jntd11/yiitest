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

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		<?php echo CHtml::Button('Cancel',array('onClick'=>'window.location="index.php?r=tblCustomerEntry/index"')); ?>
	</div>	
	<table>
	<tr >
	<td colspan="2">
	<div class="row">
		<?php echo $form->labelEx($model,'company_name'); ?>
		<?php echo $form->textField($model,'company_name',array('size'=>20,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'company_name'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>
	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>20,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>
	</td>
	<td>
	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>20,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>
	<div class="row">
		<?php echo $form->labelEx($model,'address1'); ?>
		<?php echo $form->textField($model,'address1',array('size'=>20,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address1'); ?>
	</div>
	</td>
	<td>

	<div class="row">
		<?php echo $form->labelEx($model,'address2'); ?>
		<?php echo $form->textField($model,'address2',array('size'=>20,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address2'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>
	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>
	</td>
	<td>
	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>20,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>
	<div class="row">
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model,'zip'); ?>
		<?php echo $form->error($model,'zip'); ?>
	</div>
	</td>
	<td>
		<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>
		
	<div class="row">
		<?php echo $form->labelEx($model,'contact'); ?>
		<?php echo $form->textField($model,'contact',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'contact'); ?>
	</div>
		</td>
	<td>
	
	<div class="row">
		<?php echo $form->labelEx($model,'phone_home'); ?>
		<?php echo $form->textField($model,'phone_home',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone_home'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_business'); ?>
		<?php echo $form->textField($model,'phone_business',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone_business'); ?>
	</div>
	</td>
	<td>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_cell'); ?>
		<?php echo $form->textField($model,'phone_cell',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone_cell'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_other1'); ?>
		<?php echo $form->textField($model,'phone_other1',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone_other1'); ?>
	</div>
	</td>
	<td>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_other2'); ?>
		<?php echo $form->textField($model,'phone_other2',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone_other2'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>
	<div class="row">
		<?php echo $form->labelEx($model,'county'); ?>
		<?php echo $form->textField($model,'county',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'county'); ?>
	</div>
	</td>
	<td>
		<div class="row">
		<?php echo $form->labelEx($model,'mailing_code'); ?>
		<?php echo $form->textField($model,'mailing_code',array('size'=>20,'maxlength'=>50,'onkeyup'=>'caps(this)')); ?>
		<a href="#" class="splitmenubutton" data-showmenu="dropmenu1" data-splitmenu="false">Code</a>
		<?php echo $form->error($model,'mailing_code'); ?>
	</div>
	
    </td>
    </tr>
    <tr>
    <td>

		<div class="row">
		<?php echo $form->labelEx($model,'last_invoice'); ?>
		<?php echo $form->textField($model,'last_invoice'); ?>
		<?php echo $form->error($model,'last_invoice'); ?>
	</div>
	</td>
	<td>

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

    </td>
    </tr>
    <tr>
    <td>

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
	</td>
	<td>

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
    </td>
    </tr>
    <tr>
    <td colspan="2">	
	<div >
		<?php echo $form->labelEx($model,'notes', array('id'=>'label_TblCustomerEntry_notes')); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>65, )); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>
    	<div class="row">
		<?php echo $form->labelEx($model,'herdmark'); ?>
		<?php echo $form->textField($model,'herdmark',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'herdmark'); ?>
	</div>

	</td>
	<td>
	<div class="row">
		<?php echo $form->labelEx($model,'facility'); ?>
		<?php echo $form->textField($model,'facility',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'facility'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>

	<div class="row">
		<?php echo $form->labelEx($model,'total_sows'); ?>
		<?php echo $form->textField($model,'total_sows'); ?>
		<?php echo $form->error($model,'total_sows'); ?>
	</div>
	</td>
	<td>

	<div class="row">
		<?php echo $form->labelEx($model,'total_boars'); ?>
		<?php echo $form->textField($model,'total_boars'); ?>
		<?php echo $form->error($model,'total_boars'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>


	<div class="row">
		<?php echo $form->labelEx($model,'sows'); ?>
		<?php echo $form->textField($model,'sows'); ?>
		<?php echo $form->error($model,'sows'); ?>
	</div>
	</td>
	<td>

	<div class="row">
		<?php echo $form->labelEx($model,'boars'); ?>
		<?php echo $form->textField($model,'boars'); ?>
		<?php echo $form->error($model,'boars'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>

	<div class="row">
		<?php echo $form->labelEx($model,'frequency'); ?>
		<?php echo $form->textField($model,'frequency',array('size'=>20,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'frequency'); ?>
	</div>
	</td>
	<td>

	<div class="row">
		<?php echo $form->labelEx($model,'system'); ?>
		<?php echo $form->textField($model,'system',array('size'=>20,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'system'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td>

	<div class="row">
		<?php echo $form->labelEx($model,'feeder'); ?>
		<?php echo $form->textField($model,'feeder',array('size'=>20,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'feeder'); ?>
	</div>
	</td>
	<td>

	<div class="row">
		<?php echo $form->labelEx($model,'finish'); ?>
		<?php echo $form->textField($model,'finish',array('size'=>20,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'finish'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td colspan="2">

	<div class="row">
		<?php echo $form->labelEx($model,'rep_glits'); ?>
		<?php echo $form->textField($model,'rep_glits',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'rep_glits'); ?>
	</div>
    </td>
    </tr>
    <tr>
    <td colspan="2">

	<div class="row">
		<span style="vertical-align: middle;"><?php echo $form->labelEx($model,'Suggest Program', array('id'=>'label_suggest_program')); ?></span>
		<?php echo $form->textArea($model,'notes1',array('rows'=>6, 'cols'=>65)); ?>
		<?php echo $form->error($model,'notes1'); ?>
	</div>
	    </td>
    </tr>
    <tr>
    <td>
			<div class="row">
			<?php echo $form->labelEx($model,'cc_brand'); ?>
			<?php echo $form->textField($model,'cc_brand',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'cc_brand'); ?>
		</div>
		</td>
	<td>
	
		<div class="row">
			<?php echo $form->labelEx($model,'cc_number'); ?>
			<?php echo $form->textField($model,'cc_number'); ?>
			<?php echo $form->error($model,'cc_number'); ?>
		</div>
	    </td>
    </tr>
    <tr>
    <td>
		<div class="row">
			<?php echo $form->labelEx($model,'cc_expiration'); ?>
			<?php echo $form->textField($model,'cc_expiration',array('size'=>6,'maxlength'=>6)); ?>
			<?php echo $form->error($model,'cc_expiration'); ?>
		</div>
		</td>
	<td>
		<div class="row">
			<?php echo $form->labelEx($model,'cc_name'); ?>
			<?php echo $form->textField($model,'cc_name',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'cc_name'); ?>
		</div>
    </td>
    </tr>
    <tr><td colspan="2"><?php echo CHtml::button('Shipping Information - same as above',array('id'=>"shipbutton")); ?></td></tr>
    <tr>
    <td>	
		<div class="row">
			<?php echo $form->labelEx($model,'ship_company_name'); ?>
			<?php echo $form->textField($model,'ship_company_name',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'ship_company_name'); ?>
		</div>
	</td>
	<td>
	
		<div class="row">
			<?php echo $form->labelEx($model,'ship_name'); ?>
			<?php echo $form->textField($model,'ship_name',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'ship_name'); ?>
		</div>
    </td>
    </tr>
    <tr>
    <td>
		<div class="row">
			<?php echo $form->labelEx($model,'ship_address1'); ?>
			<?php echo $form->textField($model,'ship_address1',array('size'=>20,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'ship_address1'); ?>
		</div>
	</td>
	<td>
	
		<div class="row">
			<?php echo $form->labelEx($model,'ship_address2'); ?>
			<?php echo $form->textField($model,'ship_address2',array('size'=>20,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'ship_address2'); ?>
		</div>
    </td>
    </tr>
    <tr>
    <td>
	
		<div class="row">
			<?php echo $form->labelEx($model,'ship_city'); ?>
			<?php echo $form->textField($model,'ship_city',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'ship_city'); ?>
		</div>
	</td>
	<td>
	
		<div class="row">
			<?php echo $form->labelEx($model,'ship_state'); ?>
			<?php echo $form->textField($model,'ship_state',array('size'=>10,'maxlength'=>10)); ?>
			<?php echo $form->error($model,'ship_state'); ?>
		</div>
	   </td>
    </tr>
    <tr>
    <td>
		<div class="row">
			<?php echo $form->labelEx($model,'ship_zip'); ?>
			<?php echo $form->textField($model,'ship_zip'); ?>
			<?php echo $form->error($model,'ship_zip'); ?>
		</div>
	</td>
	<td>
		<div class="row">
			<?php echo $form->labelEx($model,'ship_country'); ?>
			<?php echo $form->textField($model,'ship_country',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'ship_country'); ?>
		</div>
    </td>
    </tr>
    <tr>
    <td>
		<div class="row">
			<?php echo $form->labelEx($model,'ship_contact'); ?>
			<?php echo $form->textField($model,'ship_contact',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'ship_contact'); ?>
		</div>
	</td>
	<td>
		<div class="row">
			<?php echo $form->labelEx($model,'ship_phone'); ?>
			<?php echo $form->textField($model,'ship_phone',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'ship_phone'); ?>
		</div>
    </td>
    </tr>
    <tr>
    <td colspan="2">
	
		<div class="row">
			<?php echo $form->labelEx($model,'ship_area'); ?>
			<?php echo $form->textField($model,'ship_area',array('size'=>20,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'ship_area'); ?>
		</div>

    </td>
    </tr>
	</table>
	<div>&nbsp;</div>
	<div class="row">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		<?php echo CHtml::Button('Cancel',array('onClick'=>'window.location="index.php?r=tblCustomerEntry/index"')); ?>
		<?php if(!$model->isNewRecord) echo CHtml::Button('Sold Hogs', array('onClick'=>"window.location='index.php?r=tblSoldHogs/soldlist&id=".$model->getPrimaryKey()."'")); ?>
	</div>
<?php $this->endWidget(); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
</div><!-- form -->