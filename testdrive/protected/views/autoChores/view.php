<?php
/* @var $this AutoChoresController */
/* @var $model AutoChores */

$this->breadcrumbs=array(
	'Auto Chores'=>array('index'),
	$model->auto_chores_id,
);

$this->menu=array(
	array('label'=>'List AutoChores', 'url'=>array('index')),
	array('label'=>'Create AutoChores', 'url'=>array('create')),
	array('label'=>'Update AutoChores', 'url'=>array('update', 'id'=>$model->auto_chores_id)),
	array('label'=>'Delete AutoChores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->auto_chores_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AutoChores', 'url'=>array('admin')),
);
?>

<h1>View AutoChores #<?php echo $model->auto_chores_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'auto_chores_id',
		'description',
		'times_occur',
		'days_between',
		'generated_by',
		'date_asof',
		'days_after',
		'farm_herd',
		'disabled',
		'date_modified',
	),
)); ?>
