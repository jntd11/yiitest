<?php
/* @var $this SowGiltsController */
/* @var $model SowGilts */

$this->breadcrumbs=array(
		'Pigs'=>array('admin'),
	'Sow Gilts'=>array('admin'),
	$model->sow_gilts_id=>array('view','id'=>$model->sow_gilts_id),
	'Update',
);

$this->menu=array(
	/* array('label'=>'List SowGilts', 'url'=>array('index')),
	array('label'=>'Create SowGilts', 'url'=>array('create')),
	array('label'=>'View SowGilts', 'url'=>array('view', 'id'=>$model->sow_gilts_id)),
	array('label'=>'Manage SowGilts', 'url'=>array('admin')), */
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