<?php
/* @var $this DefectsCodeController */
/* @var $model DefectsCode */

$this->breadcrumbs=array(
	'Defects Codes'=>array('index'),
	$model->defects_code_id,
);

$this->menu=array(
	array('label'=>'List DefectsCode', 'url'=>array('index')),
	array('label'=>'Create DefectsCode', 'url'=>array('create')),
	array('label'=>'Update DefectsCode', 'url'=>array('update', 'id'=>$model->defects_code_id)),
	array('label'=>'Delete DefectsCode', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->defects_code_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DefectsCode', 'url'=>array('admin')),
);
?>

<h1>View DefectsCode #<?php echo $model->defects_code_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'defects_code_id',
		'code',
		'description',
	),
)); ?>
