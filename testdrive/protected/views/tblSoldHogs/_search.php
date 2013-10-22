<?php
/* @var $this TblSoldHogsController */
/* @var $model TblSoldHogs */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'tbl_sold_hogs_id'); ?>
		<?php echo $form->textField($model,'tbl_sold_hogs_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hog_ear_notch'); ?>
		<?php echo $form->textField($model,'hog_ear_notch',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customer_name'); ?>
		<?php echo $form->textField($model,'customer_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_sold'); ?>
		<?php echo $form->textField($model,'date_sold',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sold_price'); ?>
		<?php echo $form->textField($model,'sold_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sale_type'); ?>
		<?php echo $form->textField($model,'sale_type',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invoice_number'); ?>
		<?php echo $form->textField($model,'invoice_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'app_xfer'); ?>
		<?php echo $form->textField($model,'app_xfer',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reason_sold'); ?>
		<?php echo $form->textArea($model,'reason_sold',array('rows'=>6, 'cols'=>50)); ?>
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