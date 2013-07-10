<?php
/* @var $this TblMailingCodeController */
/* @var $model tblMailingCode */


$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
	'Tbl Mailing Codes'=>array('index'),
	$model->mailing_code_id,
);

$this->menu=array(
	array('label'=>'List Mailing Code', 'url'=>array('index')),
	array('label'=>'Create Mailing Code', 'url'=>array('create')),
	array('label'=>'Update Mailing Code', 'url'=>array('update', 'id'=>$model->mailing_code_id)),
	array('label'=>'Delete Mailing Code', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->mailing_code_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mailing Code', 'url'=>array('admin')),
);
?>

<h1>View Mailing Code #<?php echo $model->mailing_code_id; ?></h1>

<?php 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'mailing_code_id',
		'mailing_code_label',
		'mailing_code_desc',
	),
)); ?>
