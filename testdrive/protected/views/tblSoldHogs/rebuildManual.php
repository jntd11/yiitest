<?php
/* @var $this TblSoldHogsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
		'Herd Setup',
);

$this->breadcrumbs=array(
	'Build ',
);

$this->menu=array(
	array('label'=>'Create Sold Hogs', 'url'=>array('create')),
	array('label'=>'Search Sold Hogs', 'url'=>array('admin')),
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/assets/js/customer.js');
Yii::app()->clientScript->registerCoreScript('jquery-ui-1.10.2.custom');
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/soldhog.js');
?>
<select name="soldhogname" id="soldhogname" onChange="getSoldHog()">
<option value="">Select</option>
<?php
foreach ($dataProvider->data as $items) {
	echo "<option value='".$items['tbl_sold_hogs_id']."' >".$items['customer_name']."</option>";
} 
?>
</select>
<select name="custname" id="custname">
<?php

foreach ($datacustmodel as $items) {
	echo "<option name='".$items['value']."'>".$items['label']."</option>";
} 
?>
</select>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'grid-view',
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
<div id="sow-boar-grid"></div>
 

