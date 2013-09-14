<?php
/* @var $this SowBoarController */
/* @var $model SowBoar */

$this->breadcrumbs=array(
	'Sow Boars'=>array('index'),
	'Manage',
);
$cs=Yii::app()->clientScript;
//$cs->registerCoreScript('jquery.ui');
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$cs->registerCssFile(
		$cs->getCoreScriptUrl().
		'/jui/css/base/jquery-ui-1.10.2.custom.css'
);
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/index.js');

$this->menu=array(
	array('label'=>'List Sow Boar', 'url'=>array('index')),
	array('label'=>'Create Sow Boar', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sow-boar-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sow Boars</h1>

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
	'id'=>'sow-boar-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'ear_notch','value'=>'$this->grid->controller->calculateYear($data->ear_notch,2)'),
		'sow_boar_name',
		'registeration_no',
		'born',
		'no_pigs',
		/*
		'weight_21',
		'sire_notch',
		'dam_notch',
		'bred_date',
		'last_parity',
		'sold_mmddyy',
		'reason_sold',
		'offspring_name',
		'back_fat',
		'loinneye',
		'days',
		'EBV',
		'sire_initials',
		'comments',
		'date_modified',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
