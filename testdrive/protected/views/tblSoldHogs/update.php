<?php
/* @var $this TblSoldHogsController */
/* @var $model TblSoldHogs */

$this->breadcrumbs=array(
	'Sold Hogs'=>array('index'),
	$model->tbl_sold_hogs_id=>array('view','id'=>$model->tbl_sold_hogs_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sold Hogs', 'url'=>array('index')),
	array('label'=>'Create Sold Hogs', 'url'=>array('create')),
	array('label'=>'View Sold Hogs', 'url'=>array('view', 'id'=>$model->tbl_sold_hogs_id)),
	array('label'=>'Search Sold Hogs', 'url'=>array('admin')),
);
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/soldhog.js');
?>

<h1>Update Sold Hogs <?php echo $model->tbl_sold_hogs_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>