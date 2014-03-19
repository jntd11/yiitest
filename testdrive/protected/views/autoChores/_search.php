<?php
/* @var $this AutoChoresController */
/* @var $model AutoChores */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'auto_chores_id'); ?>
		<?php echo $form->textField($model,'auto_chores_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'times_occur'); ?>
		<?php echo $form->textField($model,'times_occur'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'days_between'); ?>
		<?php echo $form->textField($model,'days_between'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'generated_by'); ?>
		<?php echo $form->textField($model,'generated_by',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_asof'); ?>
		<?php echo $form->textField($model,'date_asof',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'days_after'); ?>
		<?php echo $form->textField($model,'days_after'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'farm_herd'); ?>
		<?php echo $form->textField($model,'farm_herd'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'disabled'); ?>
		<?php echo $form->textField($model,'disabled'); ?>
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