<?php
/* @var $this SowGiltsController */
/* @var $model SowGilts */

$this->breadcrumbs=array(
	'Pigs'=>array('admin'),
	'Bred Sows'=>array('admin'),
	'List',
);

$this->menu=array(
	//array('label'=>'List SowGilts', 'url'=>array('index')),
	//array('label'=>'Create SowGilts', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#sow-gilts-grid').yiiGridView('update', {
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
Yii::app()->clientScript->registerScript('row_dblclick', "$('#sow-gilts-grid tbody > tr').on('click', function(id){
		//$(this).click();
		var link = $(this).find('a.update').attr('href');
		location.href = link;
});"
);
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
 $cs->registerCssFile(
 		$cs->getCoreScriptUrl().
 		'/jui/css/base/jquery-ui-1.10.2.custom.css'
 );
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/sowgilts.js');
$hogtag = Yii::app()->request->cookies['hog_tag'];
?>

<div style="float: left;"><a class="buttons" href="index.php?r=sowGilts/create"><input type="button" value="New"></a></div>
<div style="float: left; margin-left: 50%">
<?php
$form=$this->beginWidget('CActiveForm', array(
		'id'=>'sow-gilts-form',
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
	'id'=>'sow-gilts-grid',
	'dataProvider'=>$model->search(),
	'selectionChanged'=>'function(id){
		//location.href = "'.$this->createUrl('update').'/id/"+$.fn.yiiGridView.getSelection(id);
	}',
	'filter'=>$model,
		'afterAjaxUpdate'=>'function(id, data){autoSuggestSearch();}',
	'columns'=>($hogtag == 'T')?array(
		array('name'=>'sow_ear_notch','value'=>'$this->grid->controller->calculateYear($data->sow_ear_notch,2)',
				'htmlOptions'=>array('width'=>110,'id'=>'sow_ear_notch'),
				),
		array( 'name'=>'sow_ear_tag', 'value'=>'$data->sow_ear_tag ? $data->sow_ear_tag : ""',
				'htmlOptions'=>array('width'=>110,'id'=>'sow_ear_tag'), ),

		'date_bred',
		array('name'=>'sire_ear_notch','value'=>'$this->grid->controller->calculateYear($data->sire_ear_notch,2)','htmlOptions'=>array('width'=>110)),
		array( 'name'=>'sire_ear_tag', 'value'=>'$data->sire_ear_tag ? $data->sire_ear_tag : ""' ,
				'htmlOptions'=>array('width'=>110,'id'=>'sire_ear_tag'),),
		/* array('name'=>'sire_ear_tag', 'value'=>'$data->SowBoar ? $data->SowBoar->ear_tag : ""'), */
		'service_type',
		'comments',
		'passover_date',
		'due_date',
		'days_between',

		/*
		'due_date',
		'days_between',
		'settled',
		'farrowed',
		'date_modified',
		*/
		array(
				'class'=>'CButtonColumn',
				'template' => '{update}',
		 		'htmlOptions' => array("style"=>'display: none'),
		  		'headerHtmlOptions'=> array("style"=>'display: none'),
		),
	):array(
		array('name'=>'sow_ear_notch','value'=>'$this->grid->controller->calculateYear($data->sow_ear_notch,2)',
				'htmlOptions'=>array('width'=>110,'id'=>'sow_ear_notch'),
				),

		'date_bred',
		array('name'=>'sire_ear_notch','value'=>'$this->grid->controller->calculateYear($data->sire_ear_notch,2)','htmlOptions'=>array('width'=>110)),
		/* array('name'=>'sire_ear_tag', 'value'=>'$data->SowBoar ? $data->SowBoar->ear_tag : ""'), */
		'service_type',
		'comments',
		'passover_date',
		'due_date',
		'days_between',

		/*
		'due_date',
		'days_between',
		'settled',
		'farrowed',
		'date_modified',
		*/
		array(
				'class'=>'CButtonColumn',
				'template' => '{update}',
		 		'htmlOptions' => array("style"=>'display: none'),
		  		'headerHtmlOptions'=> array("style"=>'display: none'),
		),
	),
)); ?>
<a class="buttons" href="index.php?r=sowGilts/create"><input type="button" value="New"></a>

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