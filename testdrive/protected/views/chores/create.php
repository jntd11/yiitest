<?php
/* @var $this ChoresController */
/* @var $model Chores */

$this->breadcrumbs=array(
	'Chores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Chores', 'url'=>array('index')),
	array('label'=>'Manage Chores', 'url'=>array('admin')),
);
?>

<h1>Create Chores</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>