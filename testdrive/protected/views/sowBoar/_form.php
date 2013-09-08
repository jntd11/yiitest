<?php
/* @var $this SowBoarController */
/* @var $model SowBoar */
/* @var $form CActiveForm */
$farmHerd = Yii::app()->request->cookies['farm_herd']." ";
$herdmark = Yii::app()->request->cookies['breeder_herd_mark']." ";
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sow-boar-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ear_notch'); ?>
		<?php echo $form->textField($model,'ear_notch',array('size'=>20,'maxlength'=>20,'value'=>$farmHerd.$herdmark,'onBlur'=>'checkData(this,1,\''.$farmHerd.'\',\''.$herdmark.'\')','id'=>'earnotch','tabindex'=>1)); ?>
		<?php echo $form->error($model,'ear_notch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sow_boar_name'); ?>
		<?php echo $form->textField($model,'sow_boar_name',array('size'=>30,'maxlength'=>30,'tabindex'=>2)); ?>
		<?php echo $form->error($model,'sow_boar_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registeration_no'); ?>
		<?php echo $form->textField($model,'registeration_no',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'registeration_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'born'); ?>
		<?php echo $form->textField($model,'born'); ?>
		<?php echo $form->error($model,'born'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_pigs'); ?>
		<?php echo $form->textField($model,'no_pigs'); ?>
		<?php echo $form->error($model,'no_pigs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weight_21'); ?>
		<?php echo $form->textField($model,'weight_21'); ?>
		<?php echo $form->error($model,'weight_21'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sire_notch'); ?>
		<?php echo $form->textField($model,'sire_notch',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'sire_notch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dam_notch'); ?>
		<?php echo $form->textField($model,'dam_notch',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'dam_notch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bred_date'); ?>
		<?php echo $form->textField($model,'bred_date',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'bred_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_parity'); ?>
		<?php echo $form->textField($model,'last_parity'); ?>
		<?php echo $form->error($model,'last_parity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sold_mmddyy'); ?>
		<?php echo $form->textField($model,'sold_mmddyy',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'sold_mmddyy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reason_sold'); ?>
		<?php echo $form->textField($model,'reason_sold',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'reason_sold'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'offspring_name'); ?>
		<?php echo $form->textField($model,'offspring_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'offspring_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'back_fat'); ?>
		<?php echo $form->textField($model,'back_fat'); ?>
		<?php echo $form->error($model,'back_fat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'loinneye'); ?>
		<?php echo $form->textField($model,'loinneye'); ?>
		<?php echo $form->error($model,'loinneye'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'days'); ?>
		<?php echo $form->textField($model,'days'); ?>
		<?php echo $form->error($model,'days'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EBV'); ?>
		<?php echo $form->textField($model,'EBV'); ?>
		<?php echo $form->error($model,'EBV'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sire_initials'); ?>
		<?php echo $form->textField($model,'sire_initials',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'sire_initials'); ?>
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