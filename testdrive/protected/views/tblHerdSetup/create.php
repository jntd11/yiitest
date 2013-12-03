<?php
/* @var $this TblHerdSetupController */
/* @var $model TblHerdSetup */

$this->breadcrumbs=array(
	'Other'=>array('admin'),
	'Herd Setup'=>array('admin'),
	'New',
);
Yii::app()->clientScript->registerCoreScript('jquery-ui-1.10.2.custom');
$this->menu=array(
	array('label'=>'List Farm & Herd', 'url'=>array('index')),
	array('label'=>'Manage Farm & Herd', 'url'=>array('admin')),
);
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/herdsetup.js');
?>
<h1></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>