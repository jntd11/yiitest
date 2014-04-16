<?php
/* @var $this TblHerdSetupController */
/* @var $model TblHerdSetup */

Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/assets/js/customer.js');
Yii::app()->clientScript->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
	'Other'=>array('admin'),
	'Herd Setup'=>array('admin'),
	'List',
);

$this->menu=array(
	//array('label'=>'List Farm & Herd', 'url'=>array('index')),
	//array('label'=>'Create Farm & Herd', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-herd-setup-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
/* Yii::app()->clientScript->registerScript('row_dblclick', "
    $('table > tbody > tr').on('dblclick', function(id){
            $(this).click();
    });"
); */
Yii::app()->clientScript->registerScript('row_dblclick', "$('#tbl-herd-setup-grid tbody > tr').on('click', function(id){
		//$(this).click();
		var link = $(this).find('a.update').attr('href');
		location.href = link;
});"
);

?>
<div style="float: left;">
	<a class="buttons" href="index.php?r=tblHerdSetup/admin"><input type="button" value="List Farm & Herd"></a>
	<a class="buttons" href="index.php?r=tblHerdSetup/create"><input type="button" value="New"></a>
</div>
<div style="float: left; margin-left: 40%">

<?php
$form=$this->beginWidget('CActiveForm', array(
		'id'=>'tbl-sold-hogs-form',
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
	'id'=>'tbl-herd-setup-grid',
	'dataProvider'=>$model->search(),
		'selectionChanged'=>'function(id){
			//location.href = "'.$this->createUrl('update').'/id/"+$.fn.yiiGridView.getSelection(id);
		}',
	'afterAjaxUpdate'=>'function(id, data){autoSuggestSearch();}',
	'filter'=>$model,
	'columns'=>array(
		'farm_herd',
		'breeder_name',
		'farm_name',
		'address1',
		'address2',
		/*
		'city',
		'state',
		'zip',
		'phone',
		'breeder_number',
		'breeder_herd_mark',
		'home_country',
		'breed',
		'is_weight',
		'breeder_no',
		'weighted',
		'is_hog_tag',
		'hog_numbering',
		'passover_days',
		'due_days',
		'take_boars_gilts',
		'take_sow_scores',
		'spring_start',
		'spring_end',
		'spring_letter',
		'fall_start',
		'fall_end',
		'fall_letter',
		'shift_year',
		'take_weaned_date',
		'take_deffects',
		'prev_herd_mark',
		'fax',
		'date_modified',
		*/
		array(
			'class'=>'CButtonColumn',
			 'template' => '{update}',
		),
	),
)); ?>
<a class="buttons" href="index.php?r=tblHerdSetup/admin"><input type="button" value="List Farm & Herd"></a>
<a class="buttons" href="index.php?r=tblHerdSetup/create"><input type="button" value="New"></a>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<p><?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?></p>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->