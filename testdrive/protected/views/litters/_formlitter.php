<?php
/* @var $this LittersController */
/* @var $model Litters */
/* @var $form CActiveForm */
$farmHerd = Yii::app()->request->cookies['farm_herd'];
$farmHerdName = Yii::app()->request->cookies['farm_herd_name'];
$herdmark = Yii::app()->request->cookies['breeder_herd_mark'];
$activitydate = isset(Yii::app()->request->cookies['date'])?Yii::app()->request->cookies['date']:date("m/d/Y");
if($model->weaned_date == "")
	if($model->weighted_date != "")
		$weaned_date = $model->weighted_date;
	else
		$weaned_date = $activitydate;
else
	$weaned_date = $model->weaned_date;

if($herdmark != "")
	$herdmark = $herdmark." ";
?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'litters-form',
	'enableAjaxValidation'=>false,
));
?>
	<div class="row buttons">
		<?php echo CHtml::Button('List Weaned',array('onClick'=>'window.location="index.php?r=litters/admin1"')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('onClick'=>'return validateLitterForm1();')); ?>
		<?php echo CHtml::Button('Cancel',array('onClick'=>'cancelWeaned()')); ?>
	</div>
	<?php echo $form->errorSummary($model); ?>
	<div >
		<?php echo $form->label($model,'sow_ear_notch');
		echo $form->hiddenField($model,'sow_ear_notch',array('value'=>$model->sow_ear_notch));
		 ?>
		<?php echo $model->sow_ear_notch; ?>
	</div>


	<div >
		<?php echo $form->label($model,'sow_parity'); ?>
		<?php echo $model->sow_parity; ?>
	</div>
	<div >
		<?php echo $form->label($model,'farrowed_date'); ?>
		<?php echo $model->farrowed_date;
			 echo $form->hiddenField($model,'farrowed_date',array('value'=>$model->farrowed_date,'id'=>'farroweddate'));
		 ?>
	</div>
	<div >
		<?php echo $form->label($model,'herd_litter'); ?>
		<?php echo $model->herd_litter; ?>
	</div>
	<div>
		<?php echo $form->labelEx($model,'pigs_transfer'); ?>
		<?php echo $form->textField($model,'pigs_transfer', array('size'=>2,'maxlength'=>2,'value'=>($model->pigs_transfer)?$model->pigs_transfer:"")); ?>
		<?php echo $form->error($model,'pigs_transfer'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'weaned_males'); ?>
		<?php echo $form->textField($model,'weaned_males', array('size'=>2,'maxlength'=>2,'value'=>($model->weaned_males)?$model->weaned_males:"")); ?>
		<?php echo $form->error($model,'weaned_males'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'weaned_females'); ?>
		<?php echo $form->textField($model,'weaned_females', array('size'=>2,'maxlength'=>2,'value'=>($model->weaned_females)?$model->weaned_females:"")); ?>
		<?php echo $form->error($model,'weaned_females'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'no_pigs_weighted'); ?>
		<?php echo $form->textField($model,'no_pigs_weighted', array('size'=>2,'maxlength'=>2,'value'=>($model->no_pigs_weighted)?$model->no_pigs_weighted:"",'onfocus'=>'fillweight();')); ?>
		<?php echo $form->error($model,'no_pigs_weighted'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'weighted_date'); ?>
	<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'weighted_date',
				'options' =>array(
						//'dateFormat'=>'mm/dd/yy','mmddyy','mm-d-yy','m-dd-yy','m-d-yy'
						'constrainInput'=> false,
						'showOn'=>'button',
						'buttonImage'=>'img/calendar.gif',
						'defaultDate'=>''.$activitydate.'',
				),
				'htmlOptions' => array(
						'id'=>'weighted_date',
						'size' => '20',         // textField size
						'maxlength' => '20',    // textField maxlength
						'value'=>($model->weighted_date == "")?''.$activitydate.'':$model->weighted_date,
						'onChange'=>'calculateAge();',
						'onBlur'=>'calculateAge();',
				),

		));

		?>
		<?php echo $form->error($model,'weighted_date'); ?>
		</div>
	<div class="row">
		<?php echo $form->labelEx($model,'weighing_age'); ?>
		<?php echo $form->textField($model,'weighing_age',array('size'=>2,'maxlength'=>2,'id'=>'weighing_age','readonly'=>TRUE)); ?>
		<?php echo $form->error($model,'weighing_age'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actual_weight'); ?>
		<?php echo $form->textField($model,'actual_weight',array('size'=>3,'maxlength'=>3,'value'=>($model->actual_weight)?$model->actual_weight:"")); ?>
		<?php echo $form->error($model,'actual_weight'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'wgt_21'); ?>
		<?php echo $form->textField($model,'wgt_21',array('size'=>3,'maxlength'=>3,'value'=>($model->wgt_21)?$model->wgt_21:"")); ?>
		<?php echo $form->error($model,'wgt_21'); ?>
	</div>
		<div class="row">
		<?php echo $form->labelEx($model,'weaned_date'); ?>
	<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'weaned_date',
				'options' =>array(
						//'dateFormat'=>'mm/dd/yy','mmddyy','mm-d-yy','m-dd-yy','m-d-yy'
						'constrainInput'=> false,
						'showOn'=>'button',
						'buttonImage'=>'img/calendar.gif',
						'defaultDate'=>''.$activitydate.'',
				),
				'htmlOptions' => array(
						'id'=>'weaned_date',
						'size' => '20',         // textField size
						'maxlength' => '20',    // textField maxlength
						//'value'=>,
						'onFocus'=>'setweanedDate();',
						'onChange'=>'$("#Litters_comments").focus();',
						'onBlur'=>'$("#Litters_comments").focus();',
				),

		));

		?>
		<?php echo $form->error($model,'weaned_date'); ?>
		</div>
	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50,'onBlur'=>'saveFocus();')); ?>
		<?php echo $form->error($model,'comments'); ?>

	</div>
<?php for($i=1;$i <= 10; $i++) { ?>
		<div class="row">
			<?php echo $form->labelEx($model,'defect_code'); ?>
			<?php echo $form->textField($model,'defect_code'.$i,array('size'=>3,'maxlength'=>3,'onkeyup'=>'caps(this)','onBlur'=>'checkValid(this.value,this.id);')); ?>
			<a href="#" tabIndex="-1" class="splitmenubutton" data-showmenu="dropmenu<?php echo $i; ?>". data-splitmenu="false">Code</a>
			<?php echo $form->error($model,'defect_code'.$i); ?>
			<?php echo $form->labelEx($model,'defect_count'); ?>
			<?php echo $form->textField($model,'defect_count'.$i,array('size'=>3,'maxlength'=>3)); ?>
			<span id="desc<?php echo $i; ?>"><?php echo (isset($desc[$i]))?$desc[$i]:""; ?></span>
			<?php echo $form->error($model,'defect_count'.$i); ?>
		</div>
		   <div>&nbsp;</div>
	<?php } ?>

    <div>&nbsp;</div>

	<div class="row buttons">
		<?php echo CHtml::Button('List Weaned',array('onClick'=>'window.location="index.php?r=litters/admin1"')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('onClick'=>'return validateLitterForm1();','id'=>'submit')); ?>
		<?php echo CHtml::Button('Cancel',array('onClick'=>'cancelWeaned()')); ?>
		<input type="hidden" name="current_defectcode" id="current_defectcode" />
	</div>

<?php $this->endWidget(); ?>
<p class="note">Fields with <span class="required">*</span> are required.</p>
</div><!-- form -->