<?php
/* @var $this SemenOrdersController */
/* @var $model SemenOrders */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'semen_orders_id'); ?>
		<?php echo $form->textField($model,'semen_orders_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customer_id'); ?>
		<?php echo $form->textField($model,'customer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sow_boar_id'); ?>
		<?php echo $form->textField($model,'sow_boar_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ordered_date'); ?>
		<?php echo $form->textField($model,'ordered_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ship_date'); ?>
		<?php echo $form->textField($model,'ship_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'doses'); ?>
		<?php echo $form->textField($model,'doses'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price_dose'); ?>
		<?php echo $form->textField($model,'price_dose'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shipping_cost'); ?>
		<?php echo $form->textField($model,'shipping_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'misc'); ?>
		<?php echo $form->textField($model,'misc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comments'); ?>
		<?php echo $form->textField($model,'comments',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'onstandby'); ?>
		<?php echo $form->textField($model,'onstandby',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invoice'); ?>
		<?php echo $form->textField($model,'invoice'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'semen_type'); ?>
		<?php echo $form->textField($model,'semen_type',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cod_charges'); ?>
		<?php echo $form->textField($model,'cod_charges'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_type'); ?>
		<?php echo $form->textField($model,'payment_type',array('size'=>3,'maxlength'=>3)); ?>
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