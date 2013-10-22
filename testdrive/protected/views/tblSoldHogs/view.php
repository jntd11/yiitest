<?php
/* @var $this TblSoldHogsController */
/* @var $model TblSoldHogs */

$this->breadcrumbs=array(
	'Tbl Sold Hogs'=>array('index'),
	$model->tbl_sold_hogs_id,
);

$this->menu=array(
	array('label'=>'List TblSoldHogs', 'url'=>array('index')),
	array('label'=>'Create TblSoldHogs', 'url'=>array('create')),
	array('label'=>'Update TblSoldHogs', 'url'=>array('update', 'id'=>$model->tbl_sold_hogs_id)),
	array('label'=>'Delete TblSoldHogs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tbl_sold_hogs_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblSoldHogs', 'url'=>array('admin')),
);
?>

<h1>View TblSoldHogs #<?php echo $model->tbl_sold_hogs_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tbl_sold_hogs_id',
		'hog_ear_notch',
		'customer_name',
		'date_sold',
		'sold_price',
		'sale_type',
		'invoice_number',
		'app_xfer',
		'comments',
		'reason_sold',
		'date_modified',
	),
)); ?>
