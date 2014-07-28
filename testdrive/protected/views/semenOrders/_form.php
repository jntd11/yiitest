<?php
/* @var $this SemenOrdersController */
/* @var $model SemenOrders */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'semen-orders-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'customer_id'); ?>
		<?php echo $form->textField($model,'customer_id'); ?>
		<?php echo $form->error($model,'customer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sow_boar_id'); ?>
		<?php echo $form->textField($model,'sow_boar_id'); ?>
		<?php echo $form->error($model,'sow_boar_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ordered_date'); ?>
		<?php echo $form->textField($model,'ordered_date'); ?>
		<?php echo $form->error($model,'ordered_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ship_date'); ?>
		<?php echo $form->textField($model,'ship_date'); ?>
		<?php echo $form->error($model,'ship_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'doses'); ?>
		<?php echo $form->textField($model,'doses'); ?>
		<?php echo $form->error($model,'doses'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price_dose'); ?>
		<?php echo $form->textField($model,'price_dose'); ?>
		<?php echo $form->error($model,'price_dose'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shipping_cost'); ?>
		<?php echo $form->textField($model,'shipping_cost'); ?>
		<?php echo $form->error($model,'shipping_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'misc'); ?>
		<?php echo $form->textField($model,'misc'); ?>
		<?php echo $form->error($model,'misc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textField($model,'comments',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'onstandby'); ?>
		<?php echo $form->textField($model,'onstandby',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'onstandby'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invoice'); ?>
		<?php echo $form->textField($model,'invoice'); ?>
		<?php echo $form->error($model,'invoice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'semen_type'); ?>
		<?php echo $form->textField($model,'semen_type',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'semen_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_charges'); ?>
		<?php echo $form->textField($model,'cod_charges'); ?>
		<?php echo $form->error($model,'cod_charges'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_type'); ?>
		<?php echo $form->textField($model,'payment_type',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'payment_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified_date'); ?>
		<?php echo $form->textField($model,'modified_date'); ?>
		<?php echo $form->error($model,'modified_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->