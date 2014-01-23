<?php
/* @var $this SowGiltsController */
/* @var $model SowGilts */

$this->breadcrumbs=array(
	'Pigs'=>array('admin'),
	'Bred Sows'=>array('admin'),
	'List',
);

$this->menu=array(
	//array('label'=>'List SowGilts', 'url'=>array('index')),
	//array('label'=>'Create SowGilts', 'url'=>array('create')),
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
Yii::app()->clientScript->registerScript('row_dblclick', "
    $('table > tbody > tr').on('dblclick', function(id){
            $(this).click();
    });"
);
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
 $cs->registerCssFile(
 		$cs->getCoreScriptUrl().
 		'/jui/css/base/jquery-ui-1.10.2.custom.css'
 );
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/sowgilts.js');
?>

<div style="float: left;"><a class="buttons" href="index.php?r=sowGilts/create"><input type="button" value="New"></a></div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sow-gilts-grid',
	'dataProvider'=>$model->search(),
	'selectionChanged'=>'function(id){
		location.href = "'.$this->createUrl('update').'/id/"+$.fn.yiiGridView.getSelection(id);
	}',
	'filter'=>$model,
		'afterAjaxUpdate'=>'function(id, data){autoSuggestSearch();}',
	'columns'=>array(
		array('name'=>'sow_ear_notch','value'=>'$data->sow_ear_notch','htmlOptions'=>array('width'=>110)),
		'date_bred',
		array('name'=>'sire_ear_notch','value'=>'$data->sire_ear_notch','htmlOptions'=>array('width'=>110)),
		'service_type',
		'comments',
		'passover_date',
		'due_date',
		'days_between',
		/*
		'due_date',
		'days_between',
		'settled',
		'farrowed',
		'date_modified',
		*/
			array(
					'class'=>'CButtonColumn',
					'template' => '{update}',
			),
	),
)); ?>
<a class="buttons" href="index.php?r=sowGilts/create"><input type="button" value="New"></a>

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