<?php
/* @var $this TblSoldHogsController */
/* @var $dataProvider CActiveDataProvider */

$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
		'Herd Setup',
);

$this->breadcrumbs=array(
	'Sold Hogs',
);

$this->menu=array(
	array('label'=>'Create Sold Hogs', 'url'=>array('create')),
	array('label'=>'Search Sold Hogs', 'url'=>array('admin')),
);
?>

<h1>Sold Hogs</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-sold-hogs-grid',
	'selectableRows'=>1,
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('update').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'tbl_sold_hogs_id',
		'hog_ear_notch',
		'customer_name',
		'date_sold',
		'sold_price',
		'sale_type',
	),
)); ?>