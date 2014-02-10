<?php
/* @var $this LittersController */
/* @var $model Litters */

$this->breadcrumbs=array(
	'Farrowed'=>array('admin'),
	$model->litters_id=>array('view','id'=>$model->litters_id),
	'Update',
);

$this->menu=array(
/* 	array('label'=>'Create Litters', 'url'=>array('create')),
	array('label'=>'View Litters', 'url'=>array('view', 'id'=>$model->litters_id)),
	array('label'=>'Manage Litters', 'url'=>array('admin')), */
);

$cs=Yii::app()->clientScript;
/* $cs->registerCoreScript('jquery-ui-1.10.2.custom');
 $cs->registerCssFile(
 		$cs->getCoreScriptUrl().
 		'/jui/css/base/jquery-ui-1.10.2.custom.css'
 ); */
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/sowgilts.js');

?>
<?php echo $this->renderPartial('_form', array('model'=>$model,'modelsowgilts'=>$modelsowgilts)); ?>