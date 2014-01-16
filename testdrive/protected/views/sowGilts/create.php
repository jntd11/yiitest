<?php
/* @var $this SowGiltsController */
/* @var $model SowGilts */

$this->breadcrumbs=array(
	'Pigs'=>array('admin'),
	'Bred Sows'=>array('index'),
	'New',
);

$this->menu=array(
	//array('label'=>'List Bred Sows', 'url'=>array('admin')),
	
);
$cs=Yii::app()->clientScript;
/* $cs->registerCoreScript('jquery-ui-1.10.2.custom');
$cs->registerCssFile(
		$cs->getCoreScriptUrl().
		'/jui/css/base/jquery-ui-1.10.2.custom.css'
); */
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/sowgilts.js');
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>