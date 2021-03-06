<?php
/* @var $this DefectsCodeController */
/* @var $model DefectsCode */

$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');

$this->breadcrumbs=array(
	'Defects Codes'=>array('admin'),
	'List',
);

$this->menu=array(
	//array('label'=>'List Defects Code', 'url'=>array('index')),
	//array('label'=>'Create DefectsCode', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#defects-code-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
Yii::app()->clientScript->registerScript('row_dblclick', "
  $('table > tbody > tr').on('dblclick', function(id){
  $(this).click();
});"
);
?>
<div style="float: left;"><a class="buttons" href="index.php?r=DefectsCode/create"><input type="button" value="New"></a></div>
<div style="float: left; margin-left: 50%">
<?php
$form=$this->beginWidget('CActiveForm', array(
		'id'=>'Defects-Code-form',
		'enableAjaxValidation'=>false,
));
$pages = (isset($_REQUEST['pages']))?$_REQUEST['pages']:20;
echo CHtml::dropDownList('pages',$pages, array('2'=>'2','5'=>'5','10'=>'10','20'=>'20','50'=>'50','100'=>'100','500'=>'500'),array('size'=>0,'tabindex'=>23,'maxlength'=>0));
echo " &nbsp;";
echo CHtml::submitButton('Redisplay',array('onClick'=>''));
$this->endWidget();
?>
<script>
$(document).ready(function(){
    $("#defects-code-grid [name='DefectsCode[code]']").autocomplete({
	    source: 'index.php?r=DefectsCode/autocompletecode',
	    select: function( event, ui ) {
	    	var data = this.name+"="+ui.item.value;
	    	$('#defects-code-grid').yiiGridView('update', {data: data});
	    }
});
    $("#defects-code-grid [name='DefectsCode[description]']").autocomplete({
    	    source: 'index.php?r=DefectsCode/autocompleteDesc',
    	    select: function( event, ui ) {
    	    	var data = this.name+"="+ui.item.value;
    	    	$('#defects-code-grid').yiiGridView('update', {data: data});
    	    }
    });
});
</script>
</div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'defects-code-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
  'selectionChanged'=>'function(id){
    location.href = "'.$this->createUrl('update').'/id/"+$.fn.yiiGridView.getSelection(id);
   }',
	'columns'=>array(
		'code',
		'description',
	  array(
	    'class'=>'CButtonColumn',
	    'htmlOptions' => array("style"=>'display: none'),
	    'headerHtmlOptions'=> array("style"=>'display: none'),

	  ),

	),
)); ?>
<div ><a class="buttons" href="index.php?r=DefectsCode/create"><input type="button" value="New"></a></div>
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