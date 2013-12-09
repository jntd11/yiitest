<?php
/* @var $this TblMailingCodeController */
/* @var $model tblMailingCode */
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	'Mailing Codes'=>array('index'),
	'List',
);

$this->menu=array(
// 	array('label'=>'List Mailing Code', 'url'=>array('index')),
// 	array('label'=>'Create Mailing Code', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-mailing-code-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<a class="buttons" href="index.php?r=tblMailingCode/create"><input type="button" value="New"></a>
<div style="text-align: right">
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
	'id'=>'tbl-mailing-code-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'mailing_code_id',
		'mailing_code_label',
		'mailing_code_desc',
		array(
			'class'=>'CButtonColumn',
			'afterDelete'=>'function(link,success,data){ if(success) $("#statusMsg").html(data); }',
		),
	),
)); ?>
<div id="statusMsg"></div>
<?php if(Yii::app()->user->hasFlash('error')):?>
        <div class="errorMessage">
            <?php echo Yii::app()->user->getFlash('error'); ?>
        </div>
<?php endif; ?>
<a class="buttons" href="index.php?r=tblMailingCode/create"><input type="button" value="New"></a>
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