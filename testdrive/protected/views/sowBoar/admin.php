<?php
/* @var $this SowBoarController */
/* @var $model SowBoar */

$this->breadcrumbs=array(
	'Pigs'=>array('index'),
	'Sows/Boars'=>array('index'),
	'List',
);
$cs=Yii::app()->clientScript;
//$cs->registerCoreScript('jquery.ui');
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$cs->registerCssFile(
		$cs->getCoreScriptUrl().
		'/jui/css/base/jquery-ui-1.10.2.custom.css'
);
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/sowboar.js');
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/index.js');

$this->menu=array(
	//array('label'=>'List Sows/Boars', 'url'=>array('index')),
	//array('label'=>'Create Sows/Boars', 'url'=>array('create')),
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

<h1></h1>

<div style="float: left;"><a class="buttons" href="index.php?r=sowBoar/create"><input type="button" value="New"></a></div>
<div style="float: left; margin-left: 50%">
<?php 
$form=$this->beginWidget('CActiveForm', array(
		'id'=>'tbl-sold-hogs-form',
		'enableAjaxValidation'=>false,
));
$pages = (isset($_REQUEST['pages']))?$_REQUEST['pages']:20;
echo CHtml::dropDownList('pages',$pages, array('2'=>'2','5'=>'5','10'=>'10','20'=>'20','50'=>'50','100'=>'100','500'=>'500'),array('size'=>0,'tabindex'=>23,'maxlength'=>0));
echo " &nbsp;";
echo CHtml::submitButton('Redisplay',array('onClick'=>''));
$this->endWidget();
?>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'Sow-boar-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	 'afterAjaxUpdate'=>'function(id, data){autoSuggestSearch();}',
	 'selectionChanged'=>'function(id){
		 location.href = "'.$this->createUrl('update').'/id/"+$.fn.yiiGridView.getSelection(id);
	}',
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
			'template' => '{update}',
		),
	),
)); 

?>
<a class="buttons" href="index.php?r=sowBoar/create"><input type="button" value="New"></a>
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