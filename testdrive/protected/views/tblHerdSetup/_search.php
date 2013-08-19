<?php
/* @var $this TblHerdSetupController */
/* @var $model TblHerdSetup */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'herd_id'); ?>
		<?php echo $form->textField($model,'herd_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'farm_herd'); ?>
		<?php echo $form->textField($model,'farm_herd',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'breeder_name'); ?>
		<?php echo $form->textField($model,'breeder_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'farm_name'); ?>
		<?php echo $form->textField($model,'farm_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address1'); ?>
		<?php echo $form->textField($model,'address1',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'address2'); ?>
		<?php echo $form->textField($model,'address2',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zip'); ?>
		<?php echo $form->textField($model,'zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'breeder_number'); ?>
		<?php echo $form->textField($model,'breeder_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'breeder_herd_mark'); ?>
		<?php echo $form->textField($model,'breeder_herd_mark',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'home_country'); ?>
		<?php echo $form->textField($model,'home_country',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'breed'); ?>
		<?php echo $form->textField($model,'breed',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_weight'); ?>
		<?php echo $form->textField($model,'is_weight',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'breeder_no'); ?>
		<?php echo $form->textField($model,'breeder_no',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'weighted'); ?>
		<?php echo $form->textField($model,'weighted',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_hog_tag'); ?>
		<?php echo $form->textField($model,'is_hog_tag',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hog_numbering'); ?>
		<?php echo $form->textField($model,'hog_numbering',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'passover_days'); ?>
		<?php echo $form->textField($model,'passover_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'due_days'); ?>
		<?php echo $form->textField($model,'due_days'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'take_boars_gilts'); ?>
		<?php echo $form->textField($model,'take_boars_gilts',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'take_sow_scores'); ?>
		<?php echo $form->textField($model,'take_sow_scores',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spring_start'); ?>
		<?php echo $form->textField($model,'spring_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spring_end'); ?>
		<?php echo $form->textField($model,'spring_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spring_letter'); ?>
		<?php echo $form->textField($model,'spring_letter',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fall_start'); ?>
		<?php echo $form->textField($model,'fall_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fall_end'); ?>
		<?php echo $form->textField($model,'fall_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fall_letter'); ?>
		<?php echo $form->textField($model,'fall_letter',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shift_year'); ?>
		<?php echo $form->textField($model,'shift_year',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'take_weaned_date'); ?>
		<?php echo $form->textField($model,'take_weaned_date',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'take_deffects'); ?>
		<?php echo $form->textField($model,'take_deffects',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prev_herd_mark'); ?>
		<?php echo $form->textField($model,'prev_herd_mark',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fax'); ?>
		<?php echo $form->textField($model,'fax',array('size'=>20,'maxlength'=>20)); ?>
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