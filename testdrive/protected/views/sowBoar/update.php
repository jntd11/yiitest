<?php
/* @var $this SowBoarController */
/* @var $model SowBoar */
$cs=Yii::app()->clientScript;


$this->breadcrumbs=array(
	'Pigs'=>array('admin'),
	'Sow/Boars'=>array('admin'),
	$model->sow_boar_id=>array('view','id'=>$model->sow_boar_id),
	'Update',
);
/* $cs->registerCoreScript('jquery-ui-1.10.2.custom');
$cs->registerCssFile(
		$cs->getCoreScriptUrl().
		'/jui/css/base/jquery-ui-1.10.2.custom.css'
); */
$this->menu=array(
	//array('label'=>'List Sows/Boars', 'url'=>array('index')),
	//array('label'=>'Create Sows/Boars', 'url'=>array('create')),
	/*array('label'=>'View Sows/Boars', 'url'=>array('view', 'id'=>$model->sow_boar_id)),*/
	//array('label'=>'Search Sows/Boars', 'url'=>array('admin')),
);
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/sowboar.js');
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>