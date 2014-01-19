<?php
/* @var $this SowGiltsController */
/* @var $model SowGilts */

$this->breadcrumbs=array(
	'Sow Gilts'=>array('index'),
	$model->sow_gilts_id,
);

$this->menu=array(
	array('label'=>'List SowGilts', 'url'=>array('index')),
	array('label'=>'Create SowGilts', 'url'=>array('create')),
	array('label'=>'Update SowGilts', 'url'=>array('update', 'id'=>$model->sow_gilts_id)),
	array('label'=>'Delete SowGilts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sow_gilts_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SowGilts', 'url'=>array('admin')),
);
?>

<h1>View SowGilts #<?php echo $model->sow_gilts_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sow_gilts_id',
		'date_bred',
		'sire_ear_notch',
		'service_type',
		'comments',
		'passover_date',
		'due_date',
		'days_between',
		'settled',
		'farrowed',
		'date_modified',
	),
)); ?>
