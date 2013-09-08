<?php
/* @var $this SowBoarController */
/* @var $model SowBoar */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ear_notch'); ?>
		<?php echo $form->textField($model,'ear_notch',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sow_boar_name'); ?>
		<?php echo $form->textField($model,'sow_boar_name',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sow_boar_id'); ?>
		<?php echo $form->textField($model,'sow_boar_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registeration_no'); ?>
		<?php echo $form->textField($model,'registeration_no',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'born'); ?>
		<?php echo $form->textField($model,'born'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_pigs'); ?>
		<?php echo $form->textField($model,'no_pigs'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'weight_21'); ?>
		<?php echo $form->textField($model,'weight_21'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sire_notch'); ?>
		<?php echo $form->textField($model,'sire_notch',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dam_notch'); ?>
		<?php echo $form->textField($model,'dam_notch',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bred_date'); ?>
		<?php echo $form->textField($model,'bred_date',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_parity'); ?>
		<?php echo $form->textField($model,'last_parity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sold_mmddyy'); ?>
		<?php echo $form->textField($model,'sold_mmddyy',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reason_sold'); ?>
		<?php echo $form->textField($model,'reason_sold',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'offspring_name'); ?>
		<?php echo $form->textField($model,'offspring_name',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'back_fat'); ?>
		<?php echo $form->textField($model,'back_fat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loinneye'); ?>
		<?php echo $form->textField($model,'loinneye'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'days'); ?>
		<?php echo $form->textField($model,'days'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EBV'); ?>
		<?php echo $form->textField($model,'EBV'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sire_initials'); ?>
		<?php echo $form->textField($model,'sire_initials',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_modified'); ?>
		<?php echo $form->textField($model,'date_modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->