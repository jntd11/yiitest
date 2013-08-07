<?php
/* @var $this TblCustomerEntryController */
/* @var $model TblCustomerEntry */

$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->customer_entry_id=>array('view','id'=>$model->customer_entry_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Customers', 'url'=>array('index')),
	array('label'=>'Create Customers', 'url'=>array('create')),
	//array('label'=>'View Customers', 'url'=>array('view', 'id'=>$model->customer_entry_id)),
	array('label'=>'Search Customers', 'url'=>array('admin')),
);
$cs=Yii::app()->clientScript;
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
<h1>Update Customer <?php echo $model->customer_entry_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<?php $model=new tblMailingCode; 
$mc = $this->getMailingCodes();
?>
<div class="form" id="mailingcodedialog" style="display: none">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-mailing-code-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'mailing_code_label'); ?>
		<?php echo $form->textField($model,'mailing_code_label',array('size'=>10,'maxlength'=>10, 'id'=>'mailing_code_label','onkeyup'=>'caps(this)')); ?>
		<?php echo $form->error($model,'mailing_code_label'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mailing_code_desc'); ?>
		<?php echo $form->textField($model,'mailing_code_desc',array('size'=>60,'maxlength'=>60,'id'=>'mailing_code_desc')); ?>
		<?php echo $form->error($model,'mailing_code_desc'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::ajaxSubmitButton("Create",  '', array('success' => 'function(data) { 
				if(data == 1) { alert("Mailing Code Already Exists"); return;}
				$("#mailingcodedialog").dialog("close"); 
				$("#TblCustomerEntry_mailing_code").val($("#TblCustomerEntry_mailing_code").val()+$("#mailing_code_label").val()); successPopup(data);}')); ?>
		<?php echo CHtml::button('Cancel',array('onclick'=>'$("#mailingcodedialog").dialog("close")')); ?>
	</div>

<?php $this->endWidget(); 
echo '<ul id="dropmenu1" class="splitdropdown">';
foreach($mc as $key=>$val){
	echo "<li><a href='javascript: void(0)' onClick='fillCode($(this).html())'>".$val."</a></li>";
}
echo "<li><a href='javascript: void(0)' onClick='fillCode($(this).html())'>&lt;New&gt;</a></li>";
echo '</ul>';
?>
</div>
