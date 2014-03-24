<?php
/* @var $this ChoresController */
/* @var $model Chores */

$this->breadcrumbs=array(
	'Chores'=>array('index'),
	$model->chores_id,
);

$this->menu=array(
	array('label'=>'List Chores', 'url'=>array('index')),
	array('label'=>'Create Chores', 'url'=>array('create')),
	array('label'=>'Update Chores', 'url'=>array('update', 'id'=>$model->chores_id)),
	array('label'=>'Delete Chores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->chores_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Chores', 'url'=>array('admin')),
);
?>

<h1>View Chores #<?php echo $model->chores_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'chores_id',
		'date',
		'farm_herd',
		'description',
		'comments',
		'date_modified',
	),
)); ?>
