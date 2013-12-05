<?php
/* @var $this SowBoarController */
/* @var $model SowBoar */
$cs=Yii::app()->clientScript;

$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/sowboar.js');
$this->breadcrumbs=array(
	'Pigs'=>array('index'),
	'Sow/Boars'=>array('index'),
	$model->sow_boar_id=>array('view','id'=>$model->sow_boar_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Sows/Boars', 'url'=>array('index')),
	//array('label'=>'Create Sows/Boars', 'url'=>array('create')),
	/*array('label'=>'View Sows/Boars', 'url'=>array('view', 'id'=>$model->sow_boar_id)),*/
	//array('label'=>'Search Sows/Boars', 'url'=>array('admin')),
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>