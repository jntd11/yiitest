<?php
/* @var $this SowGiltsController */
/* @var $model SowGilts */

$this->breadcrumbs=array(
	'Sow Gilts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SowGilts', 'url'=>array('index')),
	array('label'=>'Create SowGilts', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sow-gilts-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sow Gilts</h1>

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
	'id'=>'sow-gilts-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'sow_gilts_id',
		'date_bred',
		'sire_ear_notch',
		'service_type',
		'comments',
		'passover_date',
		/*
		'due_date',
		'days_between',
		'settled',
		'farrowed',
		'date_modified',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
