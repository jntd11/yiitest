<?php
/* @var $this DefectsCodeController */
/* @var $model DefectsCode */

$this->breadcrumbs=array(
	'Defects Codes'=>array('admin'),
	'Create',
);
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');

$this->menu=array(
	/* array('label'=>'List DefectsCode', 'url'=>array('index')),
	array('label'=>'Manage DefectsCode', 'url'=>array('admin')), */
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>