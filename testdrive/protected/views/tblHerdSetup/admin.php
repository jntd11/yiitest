<?php
/* @var $this TblHerdSetupController */
/* @var $model TblHerdSetup */

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/assets/js/customer.js');
Yii::app()->clientScript->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
	'Tbl Herd Setups'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TblHerdSetup', 'url'=>array('index')),
	array('label'=>'Create TblHerdSetup', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-herd-setup-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tbl Herd Setups</h1>

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
	'id'=>'tbl-herd-setup-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'herd_id',
		'farm_herd',
		'breeder_name',
		'farm_name',
		'address1',
		'address2',
		/*
		'city',
		'state',
		'zip',
		'phone',
		'breeder_number',
		'breeder_herd_mark',
		'home_country',
		'breed',
		'is_weight',
		'breeder_no',
		'weighted',
		'is_hog_tag',
		'hog_numbering',
		'passover_days',
		'due_days',
		'take_boars_gilts',
		'take_sow_scores',
		'spring_start',
		'spring_end',
		'spring_letter',
		'fall_start',
		'fall_end',
		'fall_letter',
		'shift_year',
		'take_weaned_date',
		'take_deffects',
		'prev_herd_mark',
		'fax',
		'date_modified',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
