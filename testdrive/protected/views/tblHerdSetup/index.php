<?php
/* @var $this TblHerdSetupController */
/* @var $dataProvider CActiveDataProvider */

$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
	'Herd Setup',
);

$this->menu=array(
	array('label'=>'Create Farm & Herd', 'url'=>array('create')),
	array('label'=>'Manage Farm & Herd', 'url'=>array('admin')),
);
?>

<h1>Herd Setup</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-herd-setup-grid',
	'selectableRows'=>1,
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('update').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'herd_id',
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
	),
)); ?>
