<?php
/* @var $this TblHerdSetupController */
/* @var $model TblHerdSetup */

$this->breadcrumbs=array(
	'Tbl Herd Setups'=>array('index'),
	$model->herd_id,
);

$this->menu=array(
	array('label'=>'List TblHerdSetup', 'url'=>array('index')),
	array('label'=>'Create TblHerdSetup', 'url'=>array('create')),
	array('label'=>'Update TblHerdSetup', 'url'=>array('update', 'id'=>$model->herd_id)),
	array('label'=>'Delete TblHerdSetup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->herd_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblHerdSetup', 'url'=>array('admin')),
);
?>

<h1>View TblHerdSetup #<?php echo $model->herd_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'herd_id',
		'farm_herd',
		'breeder_name',
		'farm_name',
		'address1',
		'address2',
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
	),
)); ?>
