<?php
/* @var $this SowBoarController */
/* @var $model SowBoar */
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/sowboar.js');
$this->breadcrumbs=array(
	'Sow Boars'=>array('index'),
	$model->sow_boar_id=>array('view','id'=>$model->sow_boar_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sow Boar', 'url'=>array('index')),
	array('label'=>'Create Sow Boar', 'url'=>array('create')),
	array('label'=>'View Sow Boar', 'url'=>array('view', 'id'=>$model->sow_boar_id)),
	array('label'=>'Manage Sow Boar', 'url'=>array('admin')),
);
?>

<h1>Update SowBoar <?php echo $model->sow_boar_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>