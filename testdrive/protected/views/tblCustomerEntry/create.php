<?php
/* @var $this TblCustomerEntryController */
/* @var $model tblCustomerEntry */

$this->breadcrumbs=array(
	'Tbl Customer Entries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List tblCustomerEntry', 'url'=>array('index')),
	array('label'=>'Manage tblCustomerEntry', 'url'=>array('admin')),
);
?>

<h1>Create tblCustomerEntry</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>