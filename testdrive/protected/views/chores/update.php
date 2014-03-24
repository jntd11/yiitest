<?php
/* @var $this ChoresController */
/* @var $model Chores */

$this->breadcrumbs=array(
	'Chores'=>array('index'),
	$model->chores_id=>array('view','id'=>$model->chores_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Chores', 'url'=>array('index')),
	array('label'=>'Create Chores', 'url'=>array('create')),
	array('label'=>'View Chores', 'url'=>array('view', 'id'=>$model->chores_id)),
	array('label'=>'Manage Chores', 'url'=>array('admin')),
);
?>

<h1>Update Chores <?php echo $model->chores_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>