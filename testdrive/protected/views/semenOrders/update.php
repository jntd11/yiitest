<?php
/* @var $this SemenOrdersController */
/* @var $model SemenOrders */

$this->breadcrumbs=array(
	'Semen Orders'=>array('report'),
	$model->semen_orders_id=>array('update','id'=>$model->semen_orders_id),
	'Update',
);

$this->menu=array(
/* 	array('label'=>'List SemenOrders', 'url'=>array('index')),
	array('label'=>'Create SemenOrders', 'url'=>array('create')),
	array('label'=>'View SemenOrders', 'url'=>array('view', 'id'=>$model->semen_orders_id)),
	array('label'=>'Manage SemenOrders', 'url'=>array('admin')), */
);
$cs=Yii::app()->clientScript;
$cs->registerCssFile(
		Yii::app()->baseUrl.
		'/css/splitmenubuttons.css'
);

//$cs->registerCoreScript('jquery-ui-1.10.2.custom');
//$cs->registerScriptFile(Yii::app()->baseUrl . '/assets/js/jquery.ui-contextmenu.js');

$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/splitmenubuttons.js');
?>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelCustomer'=>$modelCustomer)); ?>
<?php $model=new tblMailingCode;
$mc = $this->getMailingCodes();
?>
<script>

jQuery(function(){ // on document load
	$('a[data-showmenu]').splitmenubuttonMenu() // Add split button menu to links with "data-showmenu" attr
})

</script>
<div class="form" id="mailingcodedialog" style="display: none">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-mailing-code-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'mailing_code_label'); ?>
		<?php echo $form->textField($model,'mailing_code_label',array('size'=>10,'maxlength'=>10, 'id'=>'mailing_code_label','onkeyup'=>'caps(this)') ); ?>
		<?php echo $form->error($model,'mailing_code_label'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mailing_code_desc'); ?>
		<?php echo $form->textField($model,'mailing_code_desc',array('size'=>60,'maxlength'=>60,'id'=>'mailing_code_desc')); ?>
		<?php echo $form->error($model,'mailing_code_desc'); ?>
	</div>

	<div class="row buttons">
	    <?php echo CHtml::ajaxSubmitButton("Create",  '',
	    	 array('success' => 'function(data) { if(data == 1) { alert("Mailing Code Already Exists"); return;} $("#mailingcodedialog").dialog("close");
	    	 		$("#TblCustomerEntry_mailing_code").val($("#TblCustomerEntry_mailing_code").val()+$("#mailing_code_label").val()); successPopup(data);}')); ?>
		<?php echo CHtml::button('Cancel',array('onclick'=>'$("#mailingcodedialog").dialog("close")')); ?>
	</div>

<?php $this->endWidget(); ?>
<?php
echo '<ul id="dropmenu1" class="splitdropdown">';
foreach($mc as $key=>$val){
	echo "<li><a href='javascript: void(0)' onClick='fillCode($(this).html())'>".$val."</a></li>";
}
echo "<li><a href='javascript: void(0)' onClick='fillCode($(this).html())'>&lt;New&gt;</a></li>";
echo '</ul>';
?>
</div><!-- form -->