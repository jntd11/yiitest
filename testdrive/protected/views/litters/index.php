<?php
/* @var $this LittersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Litters',
);

$this->menu=array(
	array('label'=>'Create Litters', 'url'=>array('create')),
	array('label'=>'Manage Litters', 'url'=>array('admin')),
);
?>

<h1>Litters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
