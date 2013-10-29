<?php
/* @var $this TblSoldHogsController */
/* @var $model TblSoldHogs */
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/assets/js/customer.js');
Yii::app()->clientScript->registerCoreScript('jquery-ui-1.10.2.custom');

$this->breadcrumbs=array(
	'Tbl Sold Hogs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Sold Hogs', 'url'=>array('index')),
	array('label'=>'Create Sold Hogs', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-sold-hogs-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sold Hogs</h1>

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
	'id'=>'tbl-sold-hogs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'hog_ear_notch',
		'customer_name',
		'date_sold',
		'invoice_number',
		/*
		'invoice_number',
		'app_xfer',
		'comments',
		'reason_sold',
		'date_modified',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
