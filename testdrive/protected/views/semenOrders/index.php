<?php
/* @var $this SemenOrdersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Semen Orders',
);

$this->menu=array(
	array('label'=>'Create SemenOrders', 'url'=>array('create')),
	array('label'=>'Manage SemenOrders', 'url'=>array('admin')),
);
?>

<h1>Semen Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
