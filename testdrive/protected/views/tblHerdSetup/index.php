<?php
/* @var $this TblHerdSetupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Herd Setups',
);

$this->menu=array(
	array('label'=>'Create TblHerdSetup', 'url'=>array('create')),
	array('label'=>'Manage TblHerdSetup', 'url'=>array('admin')),
);
?>

<h1>Tbl Herd Setups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
