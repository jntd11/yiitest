<?php
/* @var $this TblMailingCodeController */
/* @var $model tblMailingCode */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'mailing_code_id'); ?>
		<?php echo $form->textField($model,'mailing_code_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mailing_code_label'); ?>
		<?php echo $form->textField($model,'mailing_code_label',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mailing_code_desc'); ?>
		<?php echo $form->textArea($model,'mailing_code_desc',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->