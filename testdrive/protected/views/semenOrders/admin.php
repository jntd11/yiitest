<?php
/* @var $this SemenOrdersController */
/* @var $model SemenOrders */

$this->breadcrumbs=array(
	'Semen Orders'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SemenOrders', 'url'=>array('index')),
	array('label'=>'Create SemenOrders', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#semen-orders-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Semen Orders</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'semen-orders-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'semen_orders_id',
		'customer_id',
		'sow_boar_id',
		'ordered_date',
		'ship_date',
		'doses',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
