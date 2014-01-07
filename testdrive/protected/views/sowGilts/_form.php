<?php
/* @var $this SowGiltsController */
/* @var $model SowGilts */
/* @var $form CActiveForm */
$farmHerd = Yii::app()->request->cookies['farm_herd'];
$farmHerdName = Yii::app()->request->cookies['farm_herd_name'];
$herdmark = Yii::app()->request->cookies['breeder_herd_mark'];
if($herdmark != "")
	$herdmark = $herdmark." ";
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sow-gilts-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date_bred'); ?>
		<?php echo $form->textField($model,'date_bred',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'date_bred'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sire_ear_notch'); ?>
		<?php 
		if(count($model->errors)){
			echo $form->textField($model,'sire_ear_notch',array('size'=>20,'maxlength'=>20,'onBlur'=>'checkData(this,1,\''.$farmHerd.'\',\''.$herdmark.'\')','id'=>'earnotch','tabindex'=>1));
		}else if($model->isNewRecord) {
			echo $form->textField($model,'sire_ear_notch',array('size'=>20,'maxlength'=>20,'value'=>$farmHerd." ".$herdmark,'onBlur'=>'checkData(this,1,\''.$farmHerd.'\',\''.$herdmark.'\')','id'=>'earnotch','tabindex'=>1));
		}else{
			echo $form->textField($model,'sire_ear_notch',array('size'=>20,'maxlength'=>20,'onBlur'=>'checkData(this,2)','id'=>'earnotch','tabindex'=>1));
		}
		?>
		<?php echo $form->error($model,'sire_ear_notch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'service_type'); ?>
		<?php echo $form->textField($model,'service_type',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'service_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'passover_date'); ?>
		<?php echo $form->textField($model,'passover_date',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'passover_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'due_date'); ?>
		<?php echo $form->textField($model,'due_date',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'due_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'days_between'); ?>
		<?php echo $form->textField($model,'days_between',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'days_between'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'settled'); ?>
		<?php echo $form->textField($model,'settled',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'settled'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'farrowed'); ?>
		<?php echo $form->textField($model,'farrowed',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'farrowed'); ?>
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