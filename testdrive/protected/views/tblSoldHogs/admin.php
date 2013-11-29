<?php
/* @var $this TblSoldHogsController */
/* @var $model TblSoldHogs */

Yii::app()->clientScript->registerCoreScript('jquery-ui-1.10.2.custom');


$this->breadcrumbs=array(
	'Pigs'=>array('index'),
	'Tbl Sold Hogs'=>array('index'),
	'List',
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
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/assets/js/soldhog.js');
?>

<h1>Sold Hogs List</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<a class="buttons" href="index.php?r=sowBoar/create"><input type="button" value="New"></a>
<div style="text-align: right">
<?php 
$form=$this->beginWidget('CActiveForm', array(
		'id'=>'tbl-sold-hogs-form',
		'enableAjaxValidation'=>false,
));
$pages = (isset($_REQUEST['pages']))?$_REQUEST['pages']:20;
echo CHtml::dropDownList('pages',$pages, array('2'=>'2','5','5','10'=>'10','20'=>'20','50'=>'50','100'=>'100','500'=>'500'),array('size'=>0,'tabindex'=>23,'maxlength'=>0));
echo " &nbsp;";
echo CHtml::submitButton('Redisplay',array('onClick'=>''));
$this->endWidget();
?>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-sold-hogs-grid',
	'dataProvider'=>$model->search(),
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('update').'/id/"+$.fn.yiiGridView.getSelection(id);}',
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
<a class="buttons" href="index.php?r=sowBoar/create"><input type="button" value="New"></a>
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>