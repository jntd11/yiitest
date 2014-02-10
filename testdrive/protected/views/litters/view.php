<?php
/* @var $this LittersController */
/* @var $model Litters */

$this->breadcrumbs=array(
	'Litters'=>array('index'),
	$model->litters_id,
);

$this->menu=array(
	array('label'=>'List Litters', 'url'=>array('index')),
	array('label'=>'Create Litters', 'url'=>array('create')),
	array('label'=>'Update Litters', 'url'=>array('update', 'id'=>$model->litters_id)),
	array('label'=>'Delete Litters', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->litters_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Litters', 'url'=>array('admin')),
);
?>

<h1>View Litters #<?php echo $model->litters_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'litters_id',
		'sire_ear_notch',
		'sow_parity',
		'times_settle',
		'herd_litter',
		'no_pigs',
		'no_born_alive',
		'no_boars_alive',
		'gilts_alive',
		'birth_wgt',
		'comments',
		'date_modified',
	),
)); ?>
