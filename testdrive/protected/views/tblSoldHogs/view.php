<?php
/* @var $this TblSoldHogsController */
/* @var $model TblSoldHogs */

$this->breadcrumbs=array(
	'Sold Hogs'=>array('index'),
	$model->tbl_sold_hogs_id,
);

$this->menu=array(
	array('label'=>'List Sold Hogs', 'url'=>array('index')),
	array('label'=>'Create Sold Hogs', 'url'=>array('create')),
	array('label'=>'Update Sold Hogs', 'url'=>array('update', 'id'=>$model->tbl_sold_hogs_id)),
	array('label'=>'Delete Sold Hogs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tbl_sold_hogs_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Search Sold Hogs', 'url'=>array('admin')),
);
$model->date_sold = date("m-d-y",strtotime($model->date_sold));
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
