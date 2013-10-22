<?php
/* @var $this TblSoldHogsController */
/* @var $model TblSoldHogs */

$this->breadcrumbs=array(
	'Tbl Sold Hogs'=>array('index'),
	$model->tbl_sold_hogs_id=>array('view','id'=>$model->tbl_sold_hogs_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblSoldHogs', 'url'=>array('index')),
	array('label'=>'Create TblSoldHogs', 'url'=>array('create')),
	array('label'=>'View TblSoldHogs', 'url'=>array('view', 'id'=>$model->tbl_sold_hogs_id)),
	array('label'=>'Manage TblSoldHogs', 'url'=>array('admin')),
);
?>

<h1>Update TblSoldHogs <?php echo $model->tbl_sold_hogs_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>