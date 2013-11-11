<?php
/* @var $this TblSoldHogsController */
/* @var $model TblSoldHogs */
/* @var $form CActiveForm */
$farmHerd = Yii::app()->request->cookies['farm_herd'];
$herdmark = Yii::app()->request->cookies['breeder_herd_mark'];
if($herdmark != "")
	$herdmark = $herdmark." ";
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
		<?php
			if($model->isNewRecord) 
				echo $form->textField($model,'hog_ear_notch',array('size'=>20,'maxlength'=>20,'onBlur'=>'checkData(this,1)','value'=>$farmHerd." ".$herdmark,'id'=>'earnotch'));
			else 
				echo $form->textField($model,'hog_ear_notch',array('size'=>20,'maxlength'=>20,'onBlur'=>'checkData(this,2)','id'=>'earnotch')); 
			?>
		<?php echo $form->error($model,'hog_ear_notch'); ?>
		<?php echo $form->hiddenField($model, 'ear_notch_id',array('id'=>'ear_notch_id')); ?>
	</div>
	<div class="row">
	<?php echo $form->labelEx($model,'customer_name'); ?>
		<?php echo $form->textField($model,'customer_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->hiddenField($model, 'cust_id',array('id'=>'cust_id')); ?>
		<?php echo $form->error($model,'customer_name'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'date_sold'); ?>
		<?php //echo $form->textField($model,'date_sold',array('size'=>20,'maxlength'=>20));
				$this->widget('zii.widgets.jui.CJuiDatePicker', array(
						'model' => $model,
						'attribute' => 'date_sold',
						'options' =>array(
								'dateFormat'=>'mm-dd-yy',
								'constrainInput'=>false
						),
						
						'htmlOptions' => array(
								'id'=>'date_sold',
								'size' => '20',         // textField size
								'maxlength' => '20',    // textField maxlength
						),
				));
		?>
		<?php echo $form->error($model,'date_sold'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sold_price'); ?>
		<?php echo $form->textField($model,'sold_price', array('onkeypress'=>'return isInteger(event);')); ?>
		<?php echo $form->error($model,'sold_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sale_type'); ?>
		<?php echo $form->textField($model,'sale_type',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'sale_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invoice_number'); ?>
		<?php echo $form->textField($model,'invoice_number',array('onkeypress'=>'return isInteger(event);')); ?>
		<?php echo $form->error($model,'invoice_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'app_xfer'); ?>
		<?php 
		//echo $form->textField($model,'app_xfer',array('size'=>1,'maxlength'=>1));
		echo $form->dropDownList($model,'app_xfer',array('Y'=>'Y','N'=>'N'),
				array('size'=>0,'tabindex'=>23,'maxlength'=>0)); 
		?>
		<?php echo $form->error($model,'app_xfer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reason_sold',array('id'=>'label_reason_sold')); ?>
		<?php echo $form->textArea($model,'reason_sold',array('rows'=>3, 'cols'=>50, 'id'=>'reason_sold')); ?>
		<?php echo $form->error($model,'reason_sold'); ?>
	</div>
	<div>&nbsp;</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('onClick'=>'return validateForm();')); ?>
		<?php echo CHtml::Button('Cancel',array('onClick'=>'cancelsoldhogs()')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->