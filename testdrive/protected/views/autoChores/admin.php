<?php
/* @var $this AutoChoresController */
/* @var $model AutoChores */

$this->breadcrumbs=array(
	'Auto Chores'=>array('index'),
	'Manage',
);

$this->menu=array(
	/* array('label'=>'List AutoChores', 'url'=>array('admin')),
	array('label'=>'Create AutoChores', 'url'=>array('create')), */
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#auto-chores-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl . '/assets/js/autochores.js');
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
?>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'auto-chores-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'auto_chores_id',
		'description',
		'times_occur',
		'days_between',
		'generated_by',
		'date_asof',
		/*
		'days_after',
		'farm_herd',
		'disabled',
		'date_modified',
		*/
		array(
			'class'=>'CButtonColumn',
		  'htmlOptions' => array("style"=>'display: none'),
		  'headerHtmlOptions'=> array("style"=>'display: none'),

		),
	),
)); ?>


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
