<?php
/* @var $this BOSSetupControllerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bossetups',
);

$this->menu=array(
	array('label'=>'Create Bossetup', 'url'=>array('create')),
	array('label'=>'Manage Bossetup', 'url'=>array('admin')),
);
?>

<h1>Bossetups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
