<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
Yii::app()->clientScript->registerCoreScript('jquery-ui-1.10.2.custom');
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/tinymce/tinymce.min.js');

?>
<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<textarea id='textarea' class='html' rows='10' cols='50'></textarea>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>