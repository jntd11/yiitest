<?php
/* @var $this SowBoarController */
/* @var $model SowBoar */

$this->breadcrumbs=array(
	'Pigs'=>array('index'),
	'Sows/Boars'=>array('index'),
	'New',
);

$this->menu=array(
	/* array('label'=>'List Sows/Boars', 'url'=>array('index')),
	array('label'=>'Search Sows/Boars', 'url'=>array('admin')), */
);
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/sowboar.js');

?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>