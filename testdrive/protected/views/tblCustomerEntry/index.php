<?php
/* @var $this TblCustomerEntryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Customers',
);

$this->menu=array(
	array('label'=>'Create Customers', 'url'=>array('create')),
	array('label'=>'search Customers', 'url'=>array('admin')),
);
?>

<h1>Customers</h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-customer-entry-grid',
	'selectableRows'=>1,
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('update').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'company_name',
		'first_name',
		'last_name',
		'address1',
		'address2',
		'city',
		'state',
		'phone_home',
		'phone_cell',
		/*
		'phone_other1',
		'phone_other2',
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
		*/
	),
)); ?>
