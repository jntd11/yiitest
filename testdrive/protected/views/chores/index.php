<?php
/* @var $this ChoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Chores',
);

$this->menu=array(
	array('label'=>'Create Chores', 'url'=>array('create')),
	array('label'=>'Manage Chores', 'url'=>array('admin')),
);
?>

<h1>Chores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
