<?php
/* @var $this SowBoarController */
/* @var $dataProvider CActiveDataProvider */

$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
	'Sow Boars',
);

$this->menu=array(
	array('label'=>'Create Sow Boar', 'url'=>array('create')),
	array('label'=>'Manage Sow Boar', 'url'=>array('admin')),
);
?>

<h1>Sow Boars</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sow-boar-grid',
	'selectableRows'=>1,
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('update').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'ear_notch',
		'sow_boar_name',
		'registeration_no',
		'born',
	),
)); ?>
