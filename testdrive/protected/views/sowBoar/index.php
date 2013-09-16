<?php
/* @var $this SowBoarController */
/* @var $dataProvider CActiveDataProvider */

$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
	'Sows/Boars',
);

$this->menu=array(
	array('label'=>'Create Sows/Boars', 'url'=>array('create')),
	array('label'=>'Search Sows/Boars', 'url'=>array('admin')),
);

?>

<h1>List Sows/Boars</h1>

<?php  $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sow-boar-grid',
	'selectableRows'=>1,
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('update').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array('name'=>'ear_notch','value'=>'$this->grid->controller->calculateYear($data->ear_notch,2)'),
		'sow_boar_name',
		'registeration_no',
		'born',
	),
)); ?>
