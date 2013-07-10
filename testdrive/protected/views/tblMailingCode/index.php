<?php
/* @var $this TblMailingCodeController */
/* @var $dataProvider CActiveDataProvider */
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
	'Tbl Mailing Codes',
);

$this->menu=array(
	array('label'=>'Create Mailing Code', 'url'=>array('create')),
	array('label'=>'Manage Mailing Code', 'url'=>array('admin')),
);
?>

<h1>Mailing Codes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
