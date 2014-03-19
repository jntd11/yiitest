<?php
/* @var $this AutoChoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Auto Chores',
);

$this->menu=array(
	array('label'=>'Create AutoChores', 'url'=>array('create')),
	array('label'=>'Manage AutoChores', 'url'=>array('admin')),
);
?>

<h1>Auto Chores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
