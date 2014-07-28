<?php
/* @var $this SemenOrdersController */
/* @var $model SemenOrders */

$this->breadcrumbs=array(
	'Semen Orders'=>array('index'),
	$model->semen_orders_id=>array('view','id'=>$model->semen_orders_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SemenOrders', 'url'=>array('index')),
	array('label'=>'Create SemenOrders', 'url'=>array('create')),
	array('label'=>'View SemenOrders', 'url'=>array('view', 'id'=>$model->semen_orders_id)),
	array('label'=>'Manage SemenOrders', 'url'=>array('admin')),
);
?>

<h1>Update SemenOrders <?php echo $model->semen_orders_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>