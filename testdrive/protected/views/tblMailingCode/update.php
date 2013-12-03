<?php
/* @var $this TblMailingCodeController */
/* @var $model tblMailingCode */

$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
		'Customers'=>array('index'),
		'Mailing Codes'=>array('index'),
		'Update',
);

$this->menu=array(
	array('label'=>'List Mailing Code', 'url'=>array('index')),
	array('label'=>'Create Mailing Code', 'url'=>array('create')),
	array('label'=>'View Mailing Code', 'url'=>array('view', 'id'=>$model->mailing_code_id)),
	array('label'=>'Manage Mailing Code', 'url'=>array('admin')),
);
?>

<h1></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>