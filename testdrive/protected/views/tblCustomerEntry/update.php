<?php
/* @var $this TblCustomerEntryController */
/* @var $model TblCustomerEntry */

$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->customer_entry_id=>array('view','id'=>$model->customer_entry_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Customers', 'url'=>array('index')),
	array('label'=>'Create Customers', 'url'=>array('create')),
	//array('label'=>'View Customers', 'url'=>array('view', 'id'=>$model->customer_entry_id)),
	array('label'=>'search Customers', 'url'=>array('admin')),
);
?>

<h1>Update Customer <?php echo $model->customer_entry_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>