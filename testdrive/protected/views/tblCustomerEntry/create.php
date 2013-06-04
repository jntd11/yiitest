<?php
/* @var $this TblCustomerEntryController */
/* @var $model TblCustomerEntry */

$this->breadcrumbs=array(
	'Tbl Customer Entries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblCustomerEntry', 'url'=>array('index')),
	array('label'=>'Manage TblCustomerEntry', 'url'=>array('admin')),
);
?>

<h1>Create TblCustomerEntry</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>