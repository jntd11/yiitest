<?php
/* @var $this TblSoldHogsController */
/* @var $model TblSoldHogs */

//Yii::app()->clientScript->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
	'Sold Hogs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sold Hogs', 'url'=>array('index')),
	array('label'=>'Search Sold Hogs', 'url'=>array('admin')),
);

$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/soldhog.js');

?>
<h1>Create Sold Hogs</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php
$formatter = new CFormatter(); 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-sold-hogs-grid',
	'selectableRows'=>1,
	
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('update').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'hog_ear_notch',
		'customer_name',
		'date_sold',
		'reason_sold',
			array(
					'name'=>'sold_price',
					'type'=>'Number',
					'footer'=>$dataProvider->itemCount===0 ? '' : ' Total $'.$formatter->number($model->sumPrice($dataProvider)),
					'footerHtmlOptions'=>array('style'=>'text-align: right'),
					'htmlOptions'=>array('style'=>'text-align: right'),
			),
	),
)); 

?> 