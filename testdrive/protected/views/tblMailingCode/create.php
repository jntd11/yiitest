<?php
/* @var $this TblMailingCodeController */
/* @var $model tblMailingCode */

$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
	'Tbl Mailing Codes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Mailing Code', 'url'=>array('index')),
	array('label'=>'Manage Mailing Code', 'url'=>array('admin')),
);
?>

<h1>Create Mailing Code</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>