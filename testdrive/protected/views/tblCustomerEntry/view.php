<?php
/* @var $this TblCustomerEntryController */
/* @var $model tblCustomerEntry */

$this->breadcrumbs=array(
	'Tbl Customer Entries'=>array('index'),
	$model->customer_entry_id,
);

$this->menu=array(
	array('label'=>'List tblCustomerEntry', 'url'=>array('index')),
	array('label'=>'Create tblCustomerEntry', 'url'=>array('create')),
	array('label'=>'Update tblCustomerEntry', 'url'=>array('update', 'id'=>$model->customer_entry_id)),
	array('label'=>'Delete tblCustomerEntry', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->customer_entry_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage tblCustomerEntry', 'url'=>array('admin')),
);
?>

<h1>View tblCustomerEntry #<?php echo $model->customer_entry_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'customer_entry_id',
		'code',
		'first_name',
		'last_name',
		'address1',
		'address2',
		'city',
		'zip',
		'phone_home',
		'phone_business',
		'phone_cell',
		'phone_other1',
		'phone_other2',
		'state',
		'country',
		'contact',
		'county',
		'company_name',
		'total_sows',
		'total_boars',
		'facility',
		'sows',
		'boars',
		'frequency',
		'system',
		'feeder',
		'finish',
		'rep_glits',
		'notes1',
		'notes2',
		'notes3',
		'notes4',
		'modified_date',
	),
)); ?>
