<?php
/* @var $this TblCustomerEntryController */
/* @var $model tblCustomerEntry */

$this->breadcrumbs=array(
	'Tbl Customer Entries'=>array('index'),
	$model->customer_entry_id=>array('view','id'=>$model->customer_entry_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List tblCustomerEntry', 'url'=>array('index')),
	array('label'=>'Create tblCustomerEntry', 'url'=>array('create')),
	array('label'=>'View tblCustomerEntry', 'url'=>array('view', 'id'=>$model->customer_entry_id)),
	array('label'=>'Manage tblCustomerEntry', 'url'=>array('admin')),
);
?>

<h1>Update tblCustomerEntry <?php echo $model->customer_entry_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>