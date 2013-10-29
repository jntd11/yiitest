<?php
/* @var $this TblHerdSetupController */
/* @var $model TblHerdSetup */

$this->breadcrumbs=array(
	'Farm & Herd'=>array('index'),
	'Create',
);
Yii::app()->clientScript->registerCoreScript('jquery-ui-1.10.2.custom');
$this->menu=array(
	array('label'=>'List Farm & Herd', 'url'=>array('index')),
	array('label'=>'Manage Farm & Herd', 'url'=>array('admin')),
);
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/herdsetup.js');
?>



