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
print_r($model->attributes);
?>
