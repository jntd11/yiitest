<?php
/* @var $this SowBoarController */
/* @var $model SowBoar */

$this->breadcrumbs=array(
	'Sow Boars'=>array('index'),
	$model->sow_boar_id=>array('view','id'=>$model->sow_boar_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SowBoar', 'url'=>array('index')),
	array('label'=>'Create SowBoar', 'url'=>array('create')),
	array('label'=>'View SowBoar', 'url'=>array('view', 'id'=>$model->sow_boar_id)),
	array('label'=>'Manage SowBoar', 'url'=>array('admin')),
);
?>

<h1>Update SowBoar <?php echo $model->sow_boar_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>