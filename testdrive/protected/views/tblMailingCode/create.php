<?php
/* @var $this TblMailingCodeController */
/* @var $model tblMailingCode */

$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
	'Customers'=>array('admin'),
	'Mailing Codes'=>array('admin'),
	'New',
);

$this->menu=array(
	//array('label'=>'List Mailing Code', 'url'=>array('admin')),
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>