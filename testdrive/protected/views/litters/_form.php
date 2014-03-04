<?php
/* @var $this LittersController */
/* @var $model Litters */
/* @var $form CActiveForm */
$farmHerd = Yii::app()->request->cookies['farm_herd'];
$farmHerdName = Yii::app()->request->cookies['farm_herd_name'];
$herdmark = Yii::app()->request->cookies['breeder_herd_mark'];
$activitydate = isset(Yii::app()->request->cookies['date'])?Yii::app()->request->cookies['date']:date("m/d/Y");

if($model->farrowed_date != "")
	$farrowed_date = $model->farrowed_date;
else
	$farrowed_date = $activitydate;

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
		<?php echo CHtml::Button('List Farrowed',array('onClick'=>'window.location="index.php?r=litters/admin"')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('onClick'=>'return validateLitterForm();')); ?>
		<?php echo CHtml::Button('Cancel',array('onClick'=>'cancelLitter()')); ?>
	</div>
	<?php echo $form->errorSummary($model); ?>
	<div >
		<?php echo $form->labelEx($modelsowgilts,'sow_ear_notch');
		echo $form->hiddenField($model,'sow_ear_notch',array('value'=>$modelsowgilts->sow_ear_notch));
		 ?>
		<?php echo $modelsowgilts->sow_ear_notch; ?>
	</div>
	<div >
		<?php
		echo $form->hiddenField($model,'date_bred',array('value'=>$modelsowgilts->date_bred));
		echo $form->labelEx($modelsowgilts,'date_bred'); ?>
		<?php echo $modelsowgilts->date_bred; ?>
	</div>
		<div >
		<?php echo $form->labelEx($modelsowgilts,'due_date'); ?>
		<?php echo $modelsowgilts->due_date; ?>
	</div>

	<div class="">
		<?php echo $form->hiddenField($model,'litters_id');?>
		<?php echo $form->hiddenField($modelsowgilts,'sire_ear_notch',array('name'=>'sire_ear_notch_org'));?>

		<?php echo $form->labelEx($model,'sire_ear_notch'); ?>

		<?php
		if(count($model->errors)){
			echo $form->textField($model,'sire_ear_notch',array('size'=>20,'maxlength'=>20,'onBlur'=>'checkDate(this.value,2); checkFarrow('.$modelsowgilts->sow_gilts_id.');','id'=>'sirenotch'));
		}else {
			echo $form->textField($model,'sire_ear_notch',array('size'=>20,'maxlength'=>20,'value'=>$modelsowgilts->sire_ear_notch,'onBlur'=>'checkDate(this.value,2); checkFarrow('.$modelsowgilts->sow_gilts_id.');','id'=>'sirenotch'));
		}
		?>
		<label id="sirenotchwarning" style="color: red"></label>
		<?php echo $form->error($model,'sire_ear_notch'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sow_parity'); ?>
		<?php echo $form->textField($model,'sow_parity',array('id'=>'sow_parity')); ?>
		<?php echo $form->error($model,'sow_parity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'farrowed_date'); ?>
	<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'farrowed_date',
				'options' =>array(
						//'dateFormat'=>'mm/dd/yy','mmddyy','mm-d-yy','m-dd-yy','m-d-yy'
						'constrainInput'=> false,
						'showOn'=>'button',
						'buttonImage'=>'img/calendar.gif',
						'defaultDate'=>''.$activitydate.'',
				),
				'htmlOptions' => array(
						'id'=>'farrowed_date',
						'size' => '20',         // textField size
						'maxlength' => '20',    // textField maxlength
						'value'=>''.$farrowed_date.'',
						'onChange'=>'$("#Litters_times_settle").focus();',
						'onBlur'=>'$("#Litters_times_settle").focus();',
				),

		));

		?>
		<?php echo $form->error($model,'farrowed_date'); ?>
		</div>

	<div class="row">
		<?php echo $form->labelEx($model,'times_settle'); ?>
		<?php echo $form->textField($model,'times_settle', array('value'=>1,'size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'times_settle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'herd_litter'); ?>
		<?php echo $form->textField($model,'herd_litter',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'herd_litter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_pigs'); ?>
		<?php echo $form->textField($model,'no_pigs',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'no_pigs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_born_alive'); ?>
		<?php echo $form->textField($model,'no_born_alive',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'no_born_alive'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_boars_alive'); ?>
		<?php echo $form->textField($model,'no_boars_alive',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'no_boars_alive'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gilts_alive'); ?>
		<?php echo $form->textField($model,'gilts_alive',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'gilts_alive'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birth_wgt'); ?>
		<?php echo $form->textField($model,'birth_wgt',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'birth_wgt'); ?>
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
			<span id="desc<?php echo $i; ?>"></span>
			<?php echo $form->error($model,'defect_count'.$i); ?>
		</div>
		   <div>&nbsp;</div>
	<?php } ?>

    <div>&nbsp;</div>
	<div class="row buttons">

		<?php echo CHtml::Button('List Farrowed',array('onClick'=>'window.location="index.php?r=litters/admin"')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('onClick'=>'return validateLitterForm();','id'=>'submit','tabIndex'=>10)); ?>
		<?php echo CHtml::Button('Cancel',array('onClick'=>'cancelLitter()')); ?>
		<input type="hidden" name="current_defectcode" id="current_defectcode" />
	</div>
<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php $this->endWidget(); ?>

</div><!-- form -->