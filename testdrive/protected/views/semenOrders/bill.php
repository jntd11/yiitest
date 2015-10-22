<?php
/* @var $this SemenOrdersController */
/* @var $model SemenOrders */

$this->breadcrumbs=array(
	'Semen Orders'=>array('index'),
	
);

$this->menu=array(
	//array('label'=>'List SemenOrders', 'url'=>array('index')),
	//array('label'=>'Manage SemenOrders', 'url'=>array('admin')),
);
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/jquery.yiigridview.js');
$cs->registerCssFile(
		Yii::app()->baseUrl.
		'/css/styles.css'
);
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$cs->registerScriptFile(Yii::app()->baseUrl . '/assets/js/taphold.js');
$cs->registerScriptFile(Yii::app()->baseUrl . '/assets/js/jquery.ui-contextmenu.js');
$cs->registerScriptFile(Yii::app()->baseUrl . '/assets/js/semen.js');
?>
<?php echo $this->renderPartial('_bill', array(
		'model'=>$model,
		'modelCustomer'=>$modelCustomer,
		'results'=>$results,
		'modelBill'=>$modelBill,
		'modelBos'=>$modelBos,
)); 


?>


