<?php
/* @var $this TblHerdSetupController */
/* @var $model TblHerdSetup */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-herd-setup-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<table>
<tr><td width="50%"><div class="row">
		<?php echo $form->labelEx($model,'farm_herd'); ?>
		<?php echo $form->textField($model,'farm_herd',array('size'=>2,'id'=>'herd','maxlength'=>2,'onkeyup'=>'caps(this)',onBlur=>'checkData(this,1)')); ?>
		<?php echo $form->error($model,'farm_herd'); ?>
		</div>
	</td>
	<td width="50%">&nbsp;</td></tr>
<tr><td colspan="2"><div class="row">
		<?php echo $form->labelEx($model,'breeder_name'); ?>
		<?php echo $form->textField($model,'breeder_name',array('size'=>50,'maxlength'=>50,'id'=>'herd1')); ?>
		<?php echo $form->error($model,'breeder_name'); ?>
	</div></td>
	</tr>
<tr><td colspan="2"><div class="row">
		<?php echo $form->labelEx($model,'farm_name'); ?>
		<?php echo $form->textField($model,'farm_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'farm_name'); ?>
	</div></td></tr>
<tr><td colspan="2"><div class="row">
		<?php echo $form->labelEx($model,'address1'); ?>
		<?php echo $form-> textField($model,'address1',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'address1'); ?>
	</div></td>
	</tr>
<tr><td colspan="2"><div class="row">
		<?php echo $form->labelEx($model,'address2'); ?>
		<?php echo $form->textField($model,'address2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'address2'); ?>
	</div></td>
	</tr>
<tr><td colspan="2"><div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div></td>
	</tr>
<tr><td colspan="2"><div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'state'); ?>
	</div></td>
	</tr>
<tr><td><div class="row">
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model,'zip'); ?>
		<?php echo $form->error($model,'zip'); ?>
	</div></td><td>&nbsp;</td></tr>
<tr><td><div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div></td><td>&nbsp;</td></tr>
<tr><td><div class="row">
		<?php echo $form->labelEx($model,'fax'); ?>
		<?php echo $form->textField($model,'fax',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'fax'); ?>
	</div></td><td>&nbsp;</td></tr>	
<tr><td><div class="row">
		<?php echo $form->labelEx($model,'breeder_number'); ?>
		<?php echo $form->textField($model,'breeder_number'); ?>
		<?php echo $form->error($model,'breeder_number'); ?>
	</div></td><td><div class="row">
		<?php echo $form->labelEx($model,'take_sow_scores'); ?>
		<?php echo $form->dropDownList($model,'take_sow_scores',array('Y'=>'Y','N'=>'N'),array('size'=>0,'maxlength'=>0,'title'=>'Y=Take Sow disposition, Underline, Front Leg, Rear Leg Scores N=Not Take Scores')); ?>
		<?php echo $form->error($model,'take_sow_scores'); ?>
	</div></td>
</tr>
<tr><td><div class="row">
		<?php echo $form->labelEx($model,'breeder_herd_mark'); ?>
		<?php echo $form->textField($model,'breeder_herd_mark',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'breeder_herd_mark'); ?>
	</div></td>
	<td><div class="row">
		<?php echo $form->labelEx($model,'spring_start'); ?>
		<?php echo $form->textField($model,'spring_start',array('title'=>'Beginning Month for spring farrowing, F4=The Way It used to be')); ?>
		<?php echo $form->error($model,'spring_start'); ?>
	</div></td>
	</tr>
<tr><td><div class="row">
		<?php echo $form->labelEx($model,'home_country'); ?>
		<?php echo $form->dropDownList($model,'home_country',array('C'=>'C','M'=>'M','U'=>'U'),array('size'=>1,'maxlength'=>1,'title'=>'C-Canada, M-Mexico, U-USA')); ?>
		<?php echo $form->error($model,'home_country'); ?>
	</div></td>
	<td><div class="row">
		<?php echo $form->labelEx($model,'spring_end'); ?>
		<?php echo $form->textField($model,'spring_end',array('title'=>'Ending Month for spring farrowing, F4=The Way It used to be')); ?>
		<?php echo $form->error($model,'spring_end'); ?>
	</div></td>
	</tr>
<tr><td><div class="row">
		<?php echo $form->labelEx($model,'breed'); ?>
		<?php echo $form->textField($model,'breed',array('size'=>1,'maxlength'=>1,'title'=>'For Example. D-Duroc, H-Hampshire, Y-Yorkshire, etc')); ?>
		<?php echo $form->error($model,'breed'); ?>
	</div></td>
	<td><div class="row">
		<?php echo $form->labelEx($model,'spring_letter'); ?>
		<?php echo $form->textField($model,'spring_letter',array('size'=>1,'maxlength'=>1,'title'=>'S Or Blank for spring farrowing, F4=The Way It used to be')); ?>
		<?php echo $form->error($model,'spring_letter'); ?>
	</div></td>
	</tr>
<tr><td><div class="row">
		<?php echo $form->labelEx($model,'is_weight'); ?>
		<?php echo $form->dropDownList($model,'is_weight',array('Y'=>'Y','N'=>'N'),array('size'=>1,'maxlength'=>1,'title'=>'Y-Take Litter Birth Weight, N-Not Take Birth Weight')); ?>
		<?php echo $form->error($model,'is_weight'); ?>
	</div></td>
	<td><div class="row">
		<?php echo $form->labelEx($model,'fall_start'); ?>
		<?php echo $form->textField($model,'fall_start',array('title'=>'Beginning Month for Fall farrowing, F4=The Way It used to be')); ?>
		<?php echo $form->error($model,'fall_start'); ?>
	</div></td>
	</tr>
<tr><td><div class="row">
		<?php echo $form->labelEx($model,'breeder_no'); ?>
		<?php echo $form->dropDownList($model,'breeder_no',array('N'=>'N','#'=>'#'),array('size'=>1,'maxlength'=>1,'title'=>'N=BOAR names will be printed on reports #=BOAR number will be used')); ?>
		<?php echo $form->error($model,'breeder_no'); ?>
	</div></td>
	<td><div class="row">
		<?php echo $form->labelEx($model,'fall_end'); ?>
		<?php echo $form->textField($model,'fall_end',array('title'=>'Ending Month for fall farrowing, F4=The Way It used to be')); ?>
		<?php echo $form->error($model,'fall_end'); ?>
	</div></td>
	</tr>
<tr><td><div class="row">
		<?php echo $form->labelEx($model,'weighted'); ?>
		<?php echo $form->dropDownList($model,'weighted',array('N'=>'N','#'=>'#'),array('size'=>0,'maxlength'=>0,'title'=>'N=Litter Weighed Age entry #=Litter Weighed date entry')); ?>
		<?php echo $form->error($model,'weighted'); ?>
	</div></td>
	<td><div class="row">
		<?php echo $form->labelEx($model,'fall_letter'); ?>
		<?php echo $form->textField($model,'fall_letter',array('size'=>1,'maxlength'=>1,'title'=>'F Or Blank for fall farrowing, F4=The Way It used to be')); ?>
		<?php echo $form->error($model,'fall_letter'); ?>
	</div></td>
	</tr>
<tr><td><div class="row">
		<?php echo $form->labelEx($model,'is_hog_tag'); ?>
		<?php echo $form->dropDownList($model,'is_hog_tag',array('H'=>'H','T'=>'T'),array('size'=>0,'maxlength'=>0,'title'=>'H=Hog Ear Notch Entry T=Hog Ear Tag Entry')); ?>
		<?php echo $form->error($model,'is_hog_tag'); ?>
	</div></td>
	<td><div class="row">
		<?php echo $form->labelEx($model,'shift_year'); ?>
		<?php echo $form->textField($model,'shift_year',array('size'=>1,'maxlength'=>1,'title'=>'Shift Year if season jumps year boundary, L-Leave Year as is, F4=The old way')); ?>
		<?php echo $form->error($model,'shift_year'); ?>
	</div></td>
	</tr>
<tr><td><div class="row">
		<?php echo $form->labelEx($model,'hog_numbering'); ?>
		<?php echo $form->dropDownList($model,'hog_numbering',array('Q'=>'Q','N'=>'N'),array('size'=>0,'maxlength'=>0,'title'=>'Q=Quebec Canada Hog Numbers N=Non Specialized Hog Numbers')); ?>
		<?php echo $form->error($model,'hog_numbering'); ?>
	</div></td>
	<td><div class="row">
		<?php echo $form->labelEx($model,'take_weaned_date'); ?>
		<?php echo $form->textField($model,'take_weaned_date',array('size'=>0,'maxlength'=>0,'title'=>'T=Take Weaned Date In letters weaned & weighed, S-Set weaned date to weighed date')); ?>
		<?php echo $form->error($model,'take_weaned_date'); ?>
	</div></td>
	</tr>
<tr><td><div class="row">
		<?php echo $form->labelEx($model,'passover_days'); ?>
		<?php echo $form->textField($model,'passover_days'); ?>
		<?php echo $form->error($model,'passover_days'); ?>
	</div></td>
	<td><div class="row">
		<?php echo $form->labelEx($model,'take_deffects'); ?>
		<?php echo $form->textField($model,'take_deffects',array('size'=>0,'maxlength'=>0,'title'=>'Y-Take Defects, N-Not take Defects')); ?>
		<?php echo $form->error($model,'take_deffects'); ?>
	</div></td>
	</tr>
<tr><td><div class="row">
		<?php echo $form->labelEx($model,'due_days'); ?>
		<?php echo $form->textField($model,'due_days'); ?>
		<?php echo $form->error($model,'due_days'); ?>
	</div></td>
	<td><div class="row">
		<?php echo $form->labelEx($model,'prev_herd_mark'); ?>
		<?php echo $form->textField($model,'prev_herd_mark',array('size'=>10,'maxlength'=>10,'title'=>'Only use when you have changed this herd\'s Herd mark')); ?>
		<?php echo $form->error($model,'prev_herd_mark'); ?>
	</div></td>
</tr>
<tr><td><div class="row">
		<?php echo $form->labelEx($model,'take_boars_gilts'); ?>
		<?php echo $form->dropDownList($model,'take_boars_gilts',array('Y'=>'Y','N'=>'N'),array('size'=>0,'maxlength'=>0,'title'=>'Y=Take # Boars & Gilts Born at farrowing N=Not Take #\'s')); ?>
		<?php echo $form->error($model,'take_boars_gilts'); ?>
	</div></td><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
</table>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->