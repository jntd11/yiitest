<?php
/* @var $this TblCustomerEntryController */
/* @var $model TblCustomerEntry */

$this->breadcrumbs=array(
	'Customers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Customers', 'url'=>array('index')),
	array('label'=>'Search Customers', 'url'=>array('admin')),
);
?>

<h1>Create Customers</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>