<?php
/* @var $this TblMailingCodeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Mailing Codes',
);

$this->menu=array(
	array('label'=>'Create tblMailingCode', 'url'=>array('create')),
	array('label'=>'Manage tblMailingCode', 'url'=>array('admin')),
);
?>

<h1>Tbl Mailing Codes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
