<?php
/* @var $this LittersController */
/* @var $model Litters */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'litters_id'); ?>
		<?php echo $form->textField($model,'litters_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sire_ear_notch'); ?>
		<?php echo $form->textField($model,'sire_ear_notch',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sow_parity'); ?>
		<?php echo $form->textField($model,'sow_parity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'times_settle'); ?>
		<?php echo $form->textField($model,'times_settle'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'herd_litter'); ?>
		<?php echo $form->textField($model,'herd_litter'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_pigs'); ?>
		<?php echo $form->textField($model,'no_pigs'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_born_alive'); ?>
		<?php echo $form->textField($model,'no_born_alive'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_boars_alive'); ?>
		<?php echo $form->textField($model,'no_boars_alive'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gilts_alive'); ?>
		<?php echo $form->textField($model,'gilts_alive'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birth_wgt'); ?>
		<?php echo $form->textField($model,'birth_wgt'); ?>
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