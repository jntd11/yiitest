<?php
/* @var $this TblSoldHogsController */
/* @var $model TblSoldHogs */

$this->breadcrumbs=array(
	'Sold Hogs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sold Hogs', 'url'=>array('index')),
	array('label'=>'Manage Sold Hogs', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerCoreScript('jquery-ui-1.10.2.custom');
$cs=Yii::app()->clientScript;
$cs->registerCssFile(
		$cs->getCoreScriptUrl().
		'/jui/css/base/jquery-ui-1.10.2.custom.css'
);
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/soldhog.js');

?>
<h1>Create Sold Hogs</h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-sold-hogs-grid',
	'selectableRows'=>1,
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('update').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'tbl_sold_hogs_id',
		'hog_ear_notch',
		'customer_name',
		'date_sold',
		'sold_price',
		'sale_type',
	),
)); 

?> 