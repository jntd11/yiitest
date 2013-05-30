<?php
/* @var $this TblCustomerEntryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Customer Entries',
);

$this->menu=array(
	array('label'=>'Create tblCustomerEntry', 'url'=>array('create')),
	array('label'=>'Manage tblCustomerEntry', 'url'=>array('admin')),
);
?>

<h1>Tbl Customer Entries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
