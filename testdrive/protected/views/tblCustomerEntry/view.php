<?php
/* @var $this TblCustomerEntryController */
/* @var $model TblCustomerEntry */


$this->breadcrumbs=array(
	'Customers'=>array('admin'),
	$model->customer_entry_id,
);

$this->menu=array(
	array('label'=>'List Customers', 'url'=>array('admin')),
	array('label'=>'Create Customers', 'url'=>array('create')),
	array('label'=>'Update Customers', 'url'=>array('update', 'id'=>$model->customer_entry_id)),
	array('label'=>'Delete Customers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->customer_entry_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Search Customers', 'url'=>array('admin')),
);
?>

<h1>View Customer #<?php echo $model->customer_entry_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'customer_entry_id',
		'company_name',
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
		'notes',
		'cc_brand',
		'cc_number',
		'cc_expiration',
		'cc_name',
		'ship_company_name',
		'ship_name',
		'ship_address1',
		'ship_address2',
		'ship_city',
		'ship_state',
		'ship_country',
		'ship_zip',
		'ship_contact',
		'ship_area',
		'ship_phone',
		'att_sale',
		'mailing_code',
		'last_invoice',
		'last_letter_sent',
		'entry_date',
		'herdmark',
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
