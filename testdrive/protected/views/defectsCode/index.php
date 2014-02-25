<?php
/* @var $this DefectsCodeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Defects Codes',
);

$this->menu=array(
	array('label'=>'Create DefectsCode', 'url'=>array('create')),
	array('label'=>'Manage DefectsCode', 'url'=>array('admin')),
);
?>

<h1>Defects Codes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
