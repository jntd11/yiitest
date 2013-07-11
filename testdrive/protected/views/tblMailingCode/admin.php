<?php
/* @var $this TblMailingCodeController */
/* @var $model tblMailingCode */
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
	'Tbl Mailing Codes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Mailing Code', 'url'=>array('index')),
	array('label'=>'Create Mailing Code', 'url'=>array('create')),
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

<h1>Manage Mailing Codes</h1>

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
