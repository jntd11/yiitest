<?php
/* @var $this SowGiltsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sow Gilts',
);

$this->menu=array(
	array('label'=>'Create SowGilts', 'url'=>array('create')),
	array('label'=>'Manage SowGilts', 'url'=>array('admin')),
);
?>

<h1>Sow Gilts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
