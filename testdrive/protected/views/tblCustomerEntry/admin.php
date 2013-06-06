<?php
/* @var $this TblCustomerEntryController */
/* @var $model TblCustomerEntry */
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/assets/js/customer.js');
$this->breadcrumbs=array(
	'Tbl Customer Entries'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TblCustomerEntry', 'url'=>array('index')),
	array('label'=>'Create TblCustomerEntry', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-customer-entry-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tbl Customer Entries</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-customer-entry-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'afterAjaxUpdate'=>'function(id, data){autoSuggestSearch();}',
	'columns'=>array(
		'company_name',
		'first_name',
		'last_name',
		'phone_home',
		'phone_business',
		'phone_cell',
		'phone_other1',
		'phone_other2',
		/*
		'address1',
		'address2',
		'city',
		'zip',
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>