<?php
/* @var $this AutoChoresController */
/* @var $model AutoChores */

$this->breadcrumbs=array(
	'Auto Chores'=>array('index'),
	$model->auto_chores_id=>array('view','id'=>$model->auto_chores_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AutoChores', 'url'=>array('index')),
	array('label'=>'Create AutoChores', 'url'=>array('create')),
	array('label'=>'View AutoChores', 'url'=>array('view', 'id'=>$model->auto_chores_id)),
	array('label'=>'Manage AutoChores', 'url'=>array('admin')),
);
?>

<h1>Update AutoChores <?php echo $model->auto_chores_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>