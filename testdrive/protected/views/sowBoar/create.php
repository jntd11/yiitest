<?php
/* @var $this SowBoarController */
/* @var $model SowBoar */

$this->breadcrumbs=array(
	'Sow Boars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SowBoar', 'url'=>array('index')),
	array('label'=>'Manage SowBoar', 'url'=>array('admin')),
);
Yii::app()->clientScript->registerCoreScript('jquery-ui-1.10.2.custom');
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/sowboar.js');

?>

<h1>Create SowBoar</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>