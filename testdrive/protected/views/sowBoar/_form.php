<?php
/* @var $this SowBoarController */
/* @var $model SowBoar */
/* @var $form CActiveForm */
$farmHerd = Yii::app()->request->cookies['farm_herd'];
$farmHerdName = Yii::app()->request->cookies['farm_herd_name'];
$herdmark = Yii::app()->request->cookies['breeder_herd_mark'];
if($herdmark != "")
	$herdmark = $herdmark." ";
	
$model->ear_notch = $this->calculateYear($model->ear_notch,2);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sow-boar-form',
	'enableAjaxValidation'=>false,
)); ?>
	<div class="row buttons">
		<?php echo CHtml::Button('List Sow Boars',array('onClick'=>'window.location="index.php?r=sowBoar/admin"')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('onClick'=>'return validateForm();')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save & New' : 'Save & New',array('onClick'=>'return validateForm();','id'=>'savenew','name'=>'savenew')); ?>
		<?php echo CHtml::Button('Cancel',array('onClick'=>'cancelSow()')); ?>
		<?php echo CHtml::Button('Sire',array('onClick'=>'gerSireDam(1)')); ?>
		<?php echo CHtml::Button('Dam',array('onClick'=>'gerSireDam(2)')); ?>
		<?php if(!$model->isNewRecord) echo CHtml::Button('Pedigree',array('onClick'=>'gerTree("'.$model->getPrimaryKey().'")')); ?>
	</div>
	<p>&nbsp;</p>
	<?php echo $form->errorSummary($model); ?>
<table>
	<tr><td><div class="row">
		<?php echo $form->labelEx($model,'ear_notch'); ?>
		<?php 
			 if(count($model->errors)){
			 	echo $form->textField($model,'ear_notch',array('size'=>20,'maxlength'=>20,'onBlur'=>'checkData(this,1,\''.$farmHerd.'\',\''.$herdmark.'\')','id'=>'earnotch','tabindex'=>1));
			  }else if($model->isNewRecord) {
				echo $form->textField($model,'ear_notch',array('size'=>20,'maxlength'=>20,'value'=>$farmHerd." ".$herdmark,'onBlur'=>'checkData(this,1,\''.$farmHerd.'\',\''.$herdmark.'\')','id'=>'earnotch','tabindex'=>1));
			  }else{ 
			  	echo $form->textField($model,'ear_notch',array('size'=>20,'maxlength'=>20,'onBlur'=>'checkData(this,2)','id'=>'earnotch','tabindex'=>1));
			  }
			  ?>
		<?php echo $form->error($model,'ear_notch'); ?>
	</div></td><td>&nbsp;</td></tr>

	<tr><td><div class="row">
		<?php echo $form->labelEx($model,'sow_boar_name'); ?>
		<?php echo $form->textField($model,'sow_boar_name',array('size'=>30,'maxlength'=>30,'tabindex'=>2)); ?>
		<?php echo $form->error($model,'sow_boar_name'); ?>
	</div></td><td>&nbsp;</td></tr>

	<tr><td><div class="row">
		<?php echo $form->labelEx($model,'registeration_no'); ?>
		<?php echo $form->textField($model,'registeration_no',array('size'=>20,'maxlength'=>20,'tabindex'=>3)); ?>
		<?php echo $form->error($model,'registeration_no'); ?>
	</div></td><td>&nbsp;</td></tr>

	<tr><td><div class="row">
		<?php echo $form->labelEx($model,'born'); ?>
		<?php //echo $form->textField($model,'born',array('tabindex'=>4)); 
			  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			  		'model' => $model,
			  		'attribute' => 'born',
			  		'options' =>array(
			  				'dateFormat'=>'m-d-yy',
			  		),
			  
			  		'htmlOptions' => array(
			  				'id'=>'born',
			  				'size' => '20',         // textField size
			  				'maxlength' => '20',    // textField maxlength
			  				'tabindex'=>4
			  		),
			  ));
		?>
		<?php echo $form->error($model,'born'); ?>
	</div></td><td>&nbsp;</td></tr>

	<tr><td><div class="row">
		<?php echo $form->labelEx($model,'no_pigs'); ?>
		<?php echo $form->textField($model,'no_pigs',array('tabindex'=>5)); ?>
		<?php echo $form->error($model,'no_pigs'); ?>
	</div></td><td></td></tr>

	<tr><td><div class="row">
		<?php echo $form->labelEx($model,'weight_21'); ?>
		<?php echo $form->textField($model,'weight_21',array('tabindex'=>6)); ?>
		<?php echo $form->error($model,'weight_21'); ?>
	</div></td><td></td></tr>

	<tr><td><div class="row">
		<?php echo $form->labelEx($model,'sire_notch'); ?>
		<?php if($model->isNewRecord)
				echo $form->textField($model,'sire_notch',array('size'=>20,'onFocus'=>'setDefault("'.$farmHerd.' '.$herdmark.'",this);','maxlength'=>20,'onBlur'=>'searchSireDam(this.value,\'sirename\')','id'=>'sire_notch','tabindex'=>7));
		      else
		      	echo $form->textField($model,'sire_notch',array('size'=>20,'onFocus'=>'setDefault("'.$farmHerd.' '.$herdmark.'",this);','maxlength'=>20,'onBlur'=>'searchSireDam(this.value,\'sirename\')','id'=>'sire_notch','tabindex'=>7));
		?>
		<?php echo $form->error($model,'sire_notch'); ?>
	</div></td><td id="sirename" style="color: red; "></td></tr>

	<tr><td><div class="row">
		<?php echo $form->labelEx($model,'dam_notch'); ?>
		<?php if($model->isNewRecord)
				echo $form->textField($model,'dam_notch',array('size'=>20,'onFocus'=>'setDefault("'.$farmHerd.' '.$herdmark.'",this);','maxlength'=>20,'onBlur'=>'searchSireDam(this.value,\'damname\')','id'=>'dam_notch','tabindex'=>8));
			  else
			  	echo $form->textField($model,'dam_notch',array('size'=>20,'onFocus'=>'setDefault("'.$farmHerd.' '.$herdmark.'",this);','maxlength'=>20,'onBlur'=>'searchSireDam(this.value,\'damname\')','id'=>'dam_notch','tabindex'=>8));
		?>
		<?php echo $form->error($model,'dam_notch'); ?>
	</div></td><td id="damname" style="color: red; "></td></tr>

	<tr><td><div class="row">
		<?php echo $form->labelEx($model,'bred_date'); ?>
		<?php echo $form->textField($model,'bred_date',array('size'=>20,'maxlength'=>20,'tabindex'=>9)); ?>
		<?php echo $form->error($model,'bred_date'); ?>
	</div></td><td><div class="row">
		<?php echo $form->labelEx($model,'back_fat'); ?>
		<?php echo $form->textField($model,'back_fat',array('tabindex'=>10)); ?>
		<?php echo $form->error($model,'back_fat'); ?>
	</div></td></tr>

	<tr><td><div class="row">
		<?php echo $form->labelEx($model,'last_parity'); ?>
		<?php echo $form->textField($model,'last_parity',array('tabindex'=>11)); ?>
		<?php echo $form->error($model,'last_parity'); ?>
	</div></td><td><div class="row">
		<?php echo $form->labelEx($model,'loinneye'); ?>
		<?php echo $form->textField($model,'loinneye',array('tabindex'=>12)); ?>
		<?php echo $form->error($model,'loinneye'); ?>
	</div></td></tr>

	<tr><td><div class="row">
		<?php echo $form->labelEx($model,'sold_mmddyy'); ?>
		<?php echo $form->textField($model,'sold_mmddyy',array('size'=>20,'maxlength'=>20,'tabindex'=>13)); ?>
		<?php echo $form->error($model,'sold_mmddyy'); ?>
	</div></td><td><div class="row">
		<?php echo $form->labelEx($model,'days'); ?>
		<?php echo $form->textField($model,'days',array('tabindex'=>14)); ?>
		<?php echo $form->error($model,'days'); ?>
	</div></td></tr>

	<tr><td><div class="row">
		<?php echo $form->labelEx($model,'reason_sold'); ?>
		<?php echo $form->textField($model,'reason_sold',array('size'=>20,'maxlength'=>20,'tabindex'=>15)); ?>
		<?php echo $form->error($model,'reason_sold'); ?>
	</div></td><td><div class="row">
		<?php echo $form->labelEx($model,'EBV'); ?>
		<?php echo $form->textField($model,'EBV',array('tabindex'=>16)); ?>
		<?php echo $form->error($model,'EBV'); ?>
	</div></td></tr>

	<tr><td><div class="row">
		<?php echo $form->labelEx($model,'offspring_name'); ?>
		<?php echo $form->textField($model,'offspring_name',array('size'=>20,'maxlength'=>20,'tabindex'=>17)); ?>
		<?php echo $form->error($model,'offspring_name'); ?>
	</div></td><td></td></tr>

	<tr><td colspan="2"><div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50,'tabindex'=>18)); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div></td></tr>
</table>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row buttons">
		<?php echo CHtml::Button('List Sow Boars',array('onClick'=>'window.location="index.php?r=sowBoar/admin"')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save' : 'Save',array('onClick'=>'return validateForm();')); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Save & New' : 'Save & New',array('onClick'=>'return validateForm();','id'=>'savenew','name'=>'savenew')); ?>
		<?php echo CHtml::Button('Cancel',array('onClick'=>'cancelSow()')); ?>
		<?php echo CHtml::Button('Sire',array('onClick'=>'gerSireDam(1)')); ?>
		<?php echo CHtml::Button('Dam',array('onClick'=>'gerSireDam(2)')); ?>
		<?php if(!$model->isNewRecord) echo CHtml::Button('Pedigree',array('onClick'=>'gerTree("'.$model->getPrimaryKey().'")')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->