<?php
/* @var $this TblMailingCodeController */
/* @var $dataProvider CActiveDataProvider */
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
	'Tbl Mailing Codes',
);

$this->menu=array(
	array('label'=>'Create Mailing Code', 'url'=>array('create')),
	array('label'=>'Manage Mailing Code', 'url'=>array('admin')),
);
?>

<h1>Mailing Codes</h1>

<?php
/*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
*/ 
 $this->widget('zii.widgets.grid.CGridView', array(
 		'id'=>'tbl-customer-entry-grid',
 		'selectableRows'=>1,
 		'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('update').'/id/"+$.fn.yiiGridView.getSelection(id);}',
 		'dataProvider'=>$dataProvider,
 		'columns'=>array(
 				'mailing_code_label',
 				'mailing_code_desc',
 		),
 ));
 ?>
