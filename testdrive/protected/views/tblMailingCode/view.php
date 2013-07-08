<?php
/* @var $this TblMailingCodeController */
/* @var $model tblMailingCode */

$this->breadcrumbs=array(
	'Tbl Mailing Codes'=>array('index'),
	$model->mailing_code_id,
);

$this->menu=array(
	array('label'=>'List tblMailingCode', 'url'=>array('index')),
	array('label'=>'Create tblMailingCode', 'url'=>array('create')),
	array('label'=>'Update tblMailingCode', 'url'=>array('update', 'id'=>$model->mailing_code_id)),
	array('label'=>'Delete tblMailingCode', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->mailing_code_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage tblMailingCode', 'url'=>array('admin')),
);
?>

<h1>View tblMailingCode #<?php echo $model->mailing_code_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'mailing_code_id',
		'mailing_code_label',
		'mailing_code_desc',
	),
)); ?>
