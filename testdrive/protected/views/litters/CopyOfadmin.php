<?php
/* @var $this LittersController */
/* @var $model Litters */

$this->breadcrumbs=array(
	'Litters'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Litters', 'url'=>array('index')),
	array('label'=>'Create Litters', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#litters-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Litters</h1>

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
	'id'=>'litters-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'litters_id',
		'sire_ear_notch',
		'sow_parity',
		'times_settle',
		'herd_litter',
		'no_pigs',
		/*
		'no_born_alive',
		'no_boars_alive',
		'gilts_alive',
		'birth_wgt',
		'comments',
		'date_modified',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
