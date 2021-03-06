<?php
/* @var $this BOSSetupControllerController */
/* @var $model Bossetup */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bossetup-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		<?php echo CHtml::resetButton('Cancel',array('onClick'=>'cancel();')); ?>
				
	</div>
	<?php echo $form->errorSummary($model); ?>
<table>
	<tr >
	<td>
	<div >
		<?php echo $form->labelEx($model,'header', array('class'=>'sp1')); ?>
		<?php echo $form->textArea($model,'header',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'header'); ?>
	</div>
	</td>
	</tr>
	<tr >
	<td>
	<div >
		<?php echo $form->labelEx($model,'footer', array('class'=>'sp1')); ?>
		<?php echo $form->textArea($model,'footer',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'footer'); ?>
	</div>
</td>
	</tr>
	<tr >
	<td>
	<div class="row">
		<?php echo $form->labelEx($model,'address', array('class'=>'sp1')); ?>
		<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50,'id'=>'textarea')); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>
</td>
	</tr>
	<tr >
	<td>
	</td></tr>
	<tr >
	<td>
	<div class="row">
		<?php echo $form->labelEx($model,'type',array('class'=>'sp2') ); ?>
		<?php //echo $form->textField($model,'type',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->dropDownList($model,'type',array('Landscape'=>'Landscape', 'portrait'=>'portrait'),
				array()); ?>
		
		
		<?php echo $form->error($model,'type'); ?>
	</div>
</td>
	</tr>
	<tr >
	<td>
	<div class="row">
		<?php echo $form->labelEx($model,'lines_top',array('class'=>'sp2') ); ?>
		<?php echo $form->textField($model,'lines_top'); ?>
		<?php echo $form->error($model,'lines_top'); ?>
	</div>
</td>
	</tr>
	<tr >
	<td>
	<div class="row">
		<?php echo $form->labelEx($model,'margin_left',array('class'=>'sp2') ); ?>
		<?php echo $form->textField($model,'margin_left'); ?>
		<?php echo $form->error($model,'margin_left'); ?>
	</div>
</td>
	</tr>
	<tr >
	<td>
	<div class="row">
		<?php echo $form->labelEx($model,'invoice_no',array('class'=>'sp2') ); ?>
		<?php echo $form->textField($model,'invoice_no'); ?>
		<?php echo $form->error($model,'invoice_no'); ?>
	</div>
</td>
	</tr>
</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
		<?php echo CHtml::resetButton('Cancel',array('onClick'=>'cancel();')); ?>
		
	</div>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	
<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
tinymce.init({
		    selector: "textarea",
		    theme: "modern",
		    plugins: [
		        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
		        "searchreplace visualblocks visualchars code fullscreen",
		        "insertdatetime media nonbreaking save table contextmenu directionality",
		        "emoticons template paste textcolor importcss pagebreak "
		    ],
		    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		    toolbar2: "print preview media | forecolor backcolor emoticons fontselect fontsizeselect",
		    image_advtab: true,
		    theme_advanced_path : false,
		    content_css: "css/content.css",
		    theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px",
		    font_size_style_values : "10px,12px,13px,14px,16px,18px,20px",
		    fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
		    force_br_newlines : true,
		    force_p_newlines : false,
		    templates: [
		        {title: 'Test template 1', content: 'Test 1'},
		        {title: 'Test template 2', content: 'Test 2'}
		    ],
		    setup: function(editor) {
		        editor.on('change', function(e) {
		        	$("#bossetup-form").data("changed",true);
		        });
		    }
		 });
function cancel(){
	window.location="index.php?r=site/index";
}
</script>