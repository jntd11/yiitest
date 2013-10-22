<?php
/* @var $this TblSoldHogsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Sold Hogs',
);

$this->menu=array(
	array('label'=>'Create TblSoldHogs', 'url'=>array('create')),
	array('label'=>'Manage TblSoldHogs', 'url'=>array('admin')),
);
?>

<h1>Tbl Sold Hogs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
