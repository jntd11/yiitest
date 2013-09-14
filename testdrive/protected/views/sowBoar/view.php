<?php
/* @var $this SowBoarController */
/* @var $model SowBoar */

$this->breadcrumbs=array(
	'Sow Boars'=>array('index'),
	$model->sow_boar_id,
);
$this->menu=array(
	array('label'=>'List SowBoar', 'url'=>array('index')),
	array('label'=>'Create SowBoar', 'url'=>array('create')),
	array('label'=>'Update SowBoar', 'url'=>array('update', 'id'=>$model->sow_boar_id)),
	array('label'=>'Delete SowBoar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sow_boar_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SowBoar', 'url'=>array('admin')),
);
?>

<h1>View SowBoar #<?php echo $model->sow_boar_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ear_notch',
		'sow_boar_name',
		'sow_boar_id',
		'registeration_no',
		'born',
		'no_pigs',
		'weight_21',
		'sire_notch',
		'dam_notch',
		'bred_date',
		'last_parity',
		'sold_mmddyy',
		'reason_sold',
		'offspring_name',
		'back_fat',
		'loinneye',
		'days',
		'EBV',
		'sire_initials',
		'comments',
		'date_modified',
	),
)); ?>
