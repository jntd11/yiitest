<?php
/* @var $this AutoChoresController */
/* @var $model AutoChores */
/* @var $form CActiveForm */
?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'auto-chores-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="grid-view" id="sow-gilts-grid">
<table class="items">
<thead>
<tr>
<th id="sow-gilts-grid_c0"><a href="/yii/yii/testdrive/index.php?r=litters/admin&amp;pages=20&amp;SowGilts_sort=sow_ear_notch" class="sort-link">Sow Ear Notch</a></th><th id="sow-gilts-grid_c1"><a href="/yii/yii/testdrive/index.php?r=litters/admin&amp;pages=20&amp;SowGilts_sort=date_bred" class="sort-link">Date Bred</a></th><th id="sow-gilts-grid_c2"><a href="/yii/yii/testdrive/index.php?r=litters/admin&amp;pages=20&amp;SowGilts_sort=sire_ear_notch" class="sort-link">Sire Ear Notch</a></th><th id="sow-gilts-grid_c3"><a href="/yii/yii/testdrive/index.php?r=litters/admin&amp;pages=20&amp;SowGilts_sort=service_type" class="sort-link">Service Type</a></th><th id="sow-gilts-grid_c4"><a href="/yii/yii/testdrive/index.php?r=litters/admin&amp;pages=20&amp;SowGilts_sort=misc" class="sort-link">Misc</a></th><th id="sow-gilts-grid_c5"><a href="/yii/yii/testdrive/index.php?r=litters/admin&amp;pages=20&amp;SowGilts_sort=passover_date" class="sort-link">Passover Date</a></th><th id="sow-gilts-grid_c6"><a href="/yii/yii/testdrive/index.php?r=litters/admin&amp;pages=20&amp;SowGilts_sort=due_date" class="sort-link">Due Date</a></th><th id="sow-gilts-grid_c7"><a href="/yii/yii/testdrive/index.php?r=litters/admin&amp;pages=20&amp;SowGilts_sort=farrowed" class="sort-link">Farrowed</a></th><th id="sow-gilts-grid_c8" class="button-column">&nbsp;</th></tr>
</thead>
<tbody>
<tr class="odd"><td>aaa</td>
</tr>
</tbody>
</table>
</div>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'times_occur'); ?>
		<?php echo $form->textField($model,'times_occur'); ?>
		<?php echo $form->error($model,'times_occur'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'days_between'); ?>
		<?php echo $form->textField($model,'days_between'); ?>
		<?php echo $form->error($model,'days_between'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'generated_by'); ?>
		<?php echo $form->textField($model,'generated_by',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'generated_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_asof'); ?>
		<?php echo $form->textField($model,'date_asof',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'date_asof'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'days_after'); ?>
		<?php echo $form->textField($model,'days_after'); ?>
		<?php echo $form->error($model,'days_after'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'farm_herd'); ?>
		<?php echo $form->textField($model,'farm_herd'); ?>
		<?php echo $form->error($model,'farm_herd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disabled'); ?>
		<?php echo $form->textField($model,'disabled'); ?>
		<?php echo $form->error($model,'disabled'); ?>
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