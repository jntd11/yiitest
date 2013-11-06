<?php
/* @var $this SowBoarController */
/* @var $model SowBoar */

$this->breadcrumbs=array(
	'Sows/Boars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sows/Boars', 'url'=>array('index')),
	array('label'=>'Search Sows/Boars', 'url'=>array('admin')),
);
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/sowboar.js');

?>

<h1>Create Sows/Boars</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>