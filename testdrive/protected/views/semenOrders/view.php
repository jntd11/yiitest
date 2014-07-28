<?php
/* @var $this SemenOrdersController */
/* @var $model SemenOrders */

$this->breadcrumbs=array(
	'Semen Orders'=>array('index'),
	$model->semen_orders_id,
);

$this->menu=array(
	array('label'=>'List SemenOrders', 'url'=>array('index')),
	array('label'=>'Create SemenOrders', 'url'=>array('create')),
	array('label'=>'Update SemenOrders', 'url'=>array('update', 'id'=>$model->semen_orders_id)),
	array('label'=>'Delete SemenOrders', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->semen_orders_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SemenOrders', 'url'=>array('admin')),
);
?>

<h1>View SemenOrders #<?php echo $model->semen_orders_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'semen_orders_id',
		'customer_id',
		'sow_boar_id',
		'ordered_date',
		'ship_date',
		'doses',
		'price_dose',
		'shipping_cost',
		'misc',
		'comments',
		'onstandby',
		'invoice',
		'semen_type',
		'cod_charges',
		'payment_type',
		'modified_date',
	),
)); ?>
