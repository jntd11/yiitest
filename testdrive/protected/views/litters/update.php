<?php
/* @var $this LittersController */
/* @var $model Litters */

$this->breadcrumbs=array(
	'Pigs'=>array('admin'),
	'Farrowed'=>array('admin'),
	$modelsowgilts->sow_gilts_id=>array('view','id'=>$modelsowgilts->sow_gilts_id),
	'Update',
);

$this->menu=array(
/* 	array('label'=>'Create Litters', 'url'=>array('create')),
	array('label'=>'View Litters', 'url'=>array('view', 'id'=>$model->litters_id)),
	array('label'=>'Manage Litters', 'url'=>array('admin')), */
);

$cs=Yii::app()->clientScript;
/* $cs->registerCoreScript('jquery-ui-1.10.2.custom');
 $cs->registerCssFile(
 		$cs->getCoreScriptUrl().
 		'/jui/css/base/jquery-ui-1.10.2.custom.css'
 ); */
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/litters.js');
$cs->registerCssFile(
  Yii::app()->baseUrl.
  '/css/splitmenubuttons.css'
);

$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/splitmenubuttons.js');

?>
<script>

jQuery(function(){ // on document load
	$('a[data-showmenu]').splitmenubuttonMenu() // Add split button menu to links with "data-showmenu" attr
})

</script>
<?php echo $this->renderPartial('_form', array('model'=>$model,'modelsowgilts'=>$modelsowgilts,'desc'=>$desc)); ?>
<?php
$model=new DefectsCode();
$mc = $this->getDefectsCodes();
?>
<div class="form" id="mailingcodedialog" style="display: none">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-mailing-code-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>10,'maxlength'=>10, 'id'=>'code','onkeyup'=>'caps(this)')); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>60,'id'=>'description')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::ajaxSubmitButton("Create",  '', array('success' => 'function(data) {
				if(data == 1) { alert("Defect Code Already Exists"); return;}
				$("#mailingcodedialog").dialog("close");
				$("#Litters_defect_code"+$("#current_defectcode").val()).val($("#code").val());
				$("#desc"+$("#current_defectcode").val()).html($("#description").val());
				successPopup(data);}')); ?>
		<?php echo CHtml::button('Cancel',array('onclick'=>'$("#mailingcodedialog").dialog("close")')); ?>
	</div>

<?php $this->endWidget();
for($i=1;$i <= 10; $i++) {
		echo '<ul id="dropmenu'.$i.'" class="splitdropdown">';
		foreach($mc as $key=>$val){
			echo "<li><a href='javascript: void(0)' onClick='fillCode($(this).html(),$i)'>".$val."</a></li>";
		}
		echo "<li><a href='javascript: void(0)' onClick='fillCode($(this).html(),$i)'>&lt;New&gt;</a></li>";
		echo '</ul>';
}
?>
</div>
