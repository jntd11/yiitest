<?php
/* @var $this SemenOrdersController */
/* @var $model SemenOrders */

$this->breadcrumbs=array(
	'Semen Orders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SemenOrders', 'url'=>array('index')),
	array('label'=>'Manage SemenOrders', 'url'=>array('admin')),
);
?>

<h1>Create SemenOrders</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>