<?php
/* @var $this SowBoarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sow Boars',
);

$this->menu=array(
	array('label'=>'Create SowBoar', 'url'=>array('create')),
	array('label'=>'Manage SowBoar', 'url'=>array('admin')),
);
?>

<h1>Sow Boars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
