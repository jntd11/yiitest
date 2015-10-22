<?php
/* @var $this BillController */
/* @var $model Bill */

$this->breadcrumbs=array(
	'Bills'=>array('index'),
	$model->billid,
);

$this->menu=array(
	array('label'=>'List Bill', 'url'=>array('index')),
	array('label'=>'Create Bill', 'url'=>array('create')),
	array('label'=>'Update Bill', 'url'=>array('update', 'id'=>$model->billid)),
	array('label'=>'Delete Bill', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->billid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bill', 'url'=>array('admin')),
);
?>

<h1>View Bill #<?php echo $model->billid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'billid',
		'date_ship',
		'customer_id',
		'quantity',
		'description',
		'price',
		'total',
		'date_modified',
	),
)); ?>
