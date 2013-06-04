<?php
/* @var $this TblCustomerEntryController */
/* @var $model TblCustomerEntry */

$this->breadcrumbs=array(
	'Tbl Customer Entries'=>array('index'),
	$model->customer_entry_id=>array('view','id'=>$model->customer_entry_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblCustomerEntry', 'url'=>array('index')),
	array('label'=>'Create TblCustomerEntry', 'url'=>array('create')),
	array('label'=>'View TblCustomerEntry', 'url'=>array('view', 'id'=>$model->customer_entry_id)),
	array('label'=>'Manage TblCustomerEntry', 'url'=>array('admin')),
);
?>

<h1>Update TblCustomerEntry <?php echo $model->customer_entry_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>