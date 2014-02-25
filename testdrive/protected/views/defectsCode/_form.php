<?php
/* @var $this DefectsCodeController */
/* @var $model DefectsCode */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'defects-code-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php echo CHtml::Button('List Defects Code',array('onClick'=>'window.location="index.php?r=DefectsCode/admin";')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save'); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save & New' : 'Save & New', array('name'=>'savenew')); ?>
		<?php echo CHtml::Button('Cancel',array('onClick'=>'window.location="index.php?r=DefectsCode/admin";')); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>3,'maxlength'=>3,'onkeyup'=>'caps(this)','readonly'=>($model->scenario == 'update')? true : false)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::Button('List Defects Code',array('onClick'=>'window.location="index.php?r=DefectsCode/admin";')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save'); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save & New' : 'Save & New', array('name'=>'savenew')); ?>
		<?php echo CHtml::Button('Cancel',array('onClick'=>'window.location="index.php?r=DefectsCode/admin";')); ?>

	</div>

<?php $this->endWidget(); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

</div><!-- form -->