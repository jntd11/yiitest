<?php
/* @var $this SowGiltsController */
/* @var $model SowGilts */
/* @var $form CActiveForm */
$farmHerd = Yii::app()->request->cookies['farm_herd'];
$farmHerdName = Yii::app()->request->cookies['farm_herd_name'];
$herdmark = Yii::app()->request->cookies['breeder_herd_mark'];
$activitydate = isset(Yii::app()->request->cookies['date'])?Yii::app()->request->cookies['date']:date("m/d/Y");
$hogtag = Yii::app()->request->cookies['hog_tag'];
if($herdmark != "")
	$herdmark = $herdmark." ";
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sow-gilts-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row buttons">
		<?php echo CHtml::Button('List Bred Sows',array('onClick'=>'window.location="index.php?r=sowGilts/admin"')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('onClick'=>'return validateForm();')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save & New' : 'Save & New',array('onClick'=>'return validateForm();','id'=>'savenew','name'=>'savenew')); ?>
		<?php echo CHtml::Button('Cancel',array('onClick'=>'cancelSow()')); ?>
	</div>
	<?php echo $form->errorSummary($model); ?>
	<div>&nbsp;</div>
	<div class="row">
		<input type="hidden" id="sow_id" value="<?php echo $model->sow_gilts_id; ?>" />
		<input type="hidden" id="hogtag" value="<?php echo $hogtag; ?>" />

		<?php echo $form->labelEx($model,'sow_ear_notch'); ?>
		<?php
		if(count($model->errors)){
			echo $form->textField($model,'sow_ear_notch',array('size'=>20,'maxlength'=>20,'onBlur'=>'checkData(this,1,\''.$farmHerd.'\',\''.$herdmark.'\',\'sow_ear_tag\')','id'=>'earnotch','tabindex'=>1,'onkeyup'=>'dottodash(this);'));
		}else if($model->isNewRecord) {
			echo $form->textField($model,'sow_ear_notch',array('size'=>20,'maxlength'=>20,'value'=>$farmHerd." ".$herdmark,'onBlur'=>'checkData(this,1,\''.$farmHerd.'\',\''.$herdmark.'\',\'sow_ear_tag\')','id'=>'earnotch','tabindex'=>1,'onkeyup'=>'dottodash(this);'));
		}else{
			echo $form->textField($model,'sow_ear_notch',array('size'=>20,'maxlength'=>20,'onBlur'=>'checkData(this,2,\'sow_ear_tag\')','id'=>'earnotch','tabindex'=>1,'onkeyup'=>'dottodash(this);'));
		}
		?>
		<label id="earnotchwarning" style="color: red"></label>
		<?php echo $form->error($model,'sire_ear_notch'); ?>
		<?php if($hogtag == 'T') {?>
		<label>Sow Ear Tag </label>
		<input type="text" name="sow_ear_tag" id="sow_ear_tag" onBlur="getEarnotch(this,'earnotch','born');">
		<?php } ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_bred'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
				'model' => $model,
				'attribute' => 'date_bred',
				'options' =>array(
						//'dateFormat'=>'mm/dd/yy','mmddyy','mm-d-yy','m-dd-yy','m-d-yy'
						'constrainInput'=> false,
						'showOn'=>'button',
						'defaultDate'=>''.$activitydate.'',
						'buttonImage'=>'img/calendar.gif',
				),
				'htmlOptions' => array(
						'id'=>'born',
						'size' => '20',         // textField size
						'maxlength' => '20',    // textField maxlength
						'tabindex'=>4,
						'onBlur'=>($model->isNewRecord)?'checkExist("'.$activitydate.'");':'checkExist("'.$activitydate.'",1);',
						'onChange'=>($model->isNewRecord)?'checkExist("'.$activitydate.'");':'checkExist("'.$activitydate.'",1);',
						'tabindex'=>2,
				),

		));
		//echo $form->textField($model,'date_bred',array('size'=>10,'maxlength'=>10));
		?>
		<?php echo $form->error($model,'date_bred'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sire_ear_notch'); ?>
		<?php
		if(count($model->errors)){
			echo $form->textField($model,'sire_ear_notch',array('size'=>20,'maxlength'=>20,'onBlur'=>'checkDate(this.value,2,"sire_ear_tag")','id'=>'sirenotch','tabindex'=>3));
		}else if($model->isNewRecord) {
			echo $form->textField($model,'sire_ear_notch',array('size'=>20,'maxlength'=>20,'value'=>$farmHerd." ".$herdmark,'onBlur'=>'checkDate(this.value,2,"sire_ear_tag")','id'=>'sirenotch','tabindex'=>3));
		}else{
			echo $form->textField($model,'sire_ear_notch',array('size'=>20,'maxlength'=>20,'onBlur'=>'checkDate(this.value,2,"sire_ear_tag")','id'=>'sirenotch','tabindex'=>3));
		}
		?>
		<label id="sirenotchwarning" style="color: red"></label>
		<?php echo $form->error($model,'sire_ear_notch'); ?>
		<?php if($hogtag == 'T') {?>
		<label>Sire Ear Tag </label>
		<input type="text" name="sire_ear_tag" id="sire_ear_tag" onBlur="getEarnotch(this,'sirenotch','SowGilts_service_type');">
		<?php } ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'service_type'); ?>
		<?php echo $form->textField($model,'service_type',array('size'=>5,'maxlength'=>5,'tabindex'=>4)); ?>
		<?php echo $form->error($model,'service_type'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'misc'); ?>
		<?php echo $form->textField($model,'misc',array('size'=>5,'maxlength'=>5,'tabindex'=>5)); ?>
		<?php echo $form->error($model,'misc'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php  echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50,'tabindex'=>6));?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'passover_date'); ?>
		<?php echo $form->textField($model,'passover_date',array('size'=>10,'maxlength'=>10,'tabindex'=>6,'readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'passover_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'due_date'); ?>
		<?php echo $form->textField($model,'due_date',array('size'=>10,'maxlength'=>10,'tabindex'=>7,'readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'due_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'days_between'); ?>
		<?php echo $form->textField($model,'days_between',array('size'=>10,'maxlength'=>10,'tabindex'=>8,'readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'days_between'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'settled'); ?>
		<?php if($model->isNewRecord) echo $form->hiddenField($model,'settled',array('size'=>1,'maxlength'=>1,'tabindex'=>9, 'value'=>'N')); ?>
		<?php //echo $form->error($model,'settled'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'farrowed'); ?>
		<?php
			if($model->isNewRecord)  echo $form->hiddenField($model,'farrowed',array('size'=>1,'maxlength'=>1,'tabindex'=>10, 'value'=>'N'));
		?>
		<?php //echo $form->error($model,'farrowed'); ?>
	</div>
	<div>&nbsp;</div>

	<div class="row buttons">
		<?php echo CHtml::Button('List Bred Sows',array('onClick'=>'window.location="index.php?r=sowGilts/admin"')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('onClick'=>'')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save & New' : 'Save & New',array('onClick'=>'','id'=>'savenew','name'=>'savenew')); ?>
		<?php echo CHtml::Button('Cancel',array('onClick'=>'cancelSow()')); ?>
	</div>

<?php $this->endWidget(); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

</div><!-- form -->