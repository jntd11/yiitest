<?php
/* @var $this TblCustomerEntryController */
/* @var $model TblCustomerEntry */
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/assets/js/customer.js');
Yii::app()->clientScript->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
	'Customers'=>array('admin'),
	'List',
);

$this->menu=array(
	/* array('label'=>'List Customers', 'url'=>array('index')),
	array('label'=>'Create Customers', 'url'=>array('create')), */
);
$cs=Yii::app()->clientScript;
//$cs->registerCoreScript('jquery.ui');
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$cs->registerCssFile(
		$cs->getCoreScriptUrl().
		'/jui/css/base/jquery-ui-1.10.2.custom.css'
);
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/index.js');

Yii::app()->clientScript->registerScript('search', "
		$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
});
		$('.search-form form').submit(function(){
		$('#Tbl-customer-entry-grid').yiiGridView('update', {
		data: $(this).serialize()
});
		return false;
});
		");
/* Yii::app()->clientScript->registerScript('row_dblclick', "
    $('table > tbody > tr').on('dblclick', function(id){
            alert(id);
		//$(this).click();
    });"
); */
Yii::app()->clientScript->registerScript('row_dblclick', "$('#Tbl-customer-entry-grid tbody > tr').on('click', function(id){
	//$(this).click();
	var link = $(this).find('a.update').attr('href');
	location.href = link;
});"
);

?>
<div style="float: left;"><a class="buttons" href="index.php?r=tblCustomerEntry/create"><input type="button" value="New"></a></div>
<div style="float: left; margin-left: 50%">
<?php 
$form=$this->beginWidget('CActiveForm', array(
		'id'=>'tbl-customer-entry-grid',
		'enableAjaxValidation'=>false,
));
$pages = (isset($_REQUEST['pages']))?$_REQUEST['pages']:20;
echo CHtml::dropDownList('pages',$pages, array('2'=>'2','5'=>'5','10'=>'10','20'=>'20','50'=>'50','100'=>'100','500'=>'500'),array('size'=>0,'tabindex'=>23,'maxlength'=>0));
echo " &nbsp;";
echo CHtml::submitButton('Redisplay',array('onClick'=>''));
$this->endWidget();
?>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'Tbl-customer-entry-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'afterAjaxUpdate'=>'function(id, data){autoSuggestSearch();}',
	'selectionChanged'=>'function(id){ 
		//location.href = "'.$this->createUrl('update').'/id/"+$.fn.yiiGridView.getSelection(id);
	 }',
	'columns'=>array(
		'company_name',
		'first_name',
		'last_name',
		'phone_home',
		array('name'=>'phone_business','value'=>'$data->phone_business','filter'=>false),
		array('name'=>'phone_cell','value'=>'$data->phone_cell','filter'=>false),
		array('name'=>'phone_other1','value'=>'$data->phone_other1','filter'=>false),
		array('name'=>'phone_other2','value'=>'$data->phone_other2','filter'=>false),
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
			'template' => '{update}',
		),
	),
)); 

?>
<a class="buttons" href="index.php?r=tblCustomerEntry/create"><input type="button" value="New"></a>
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