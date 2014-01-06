<?php
/* @var $this SowGiltsController */
/* @var $model SowGilts */

$this->breadcrumbs=array(
	'Sow Gilts'=>array('index'),
	$model->sow_gilts_id=>array('view','id'=>$model->sow_gilts_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SowGilts', 'url'=>array('index')),
	array('label'=>'Create SowGilts', 'url'=>array('create')),
	array('label'=>'View SowGilts', 'url'=>array('view', 'id'=>$model->sow_gilts_id)),
	array('label'=>'Manage SowGilts', 'url'=>array('admin')),
);
?>

<h1>Update SowGilts <?php echo $model->sow_gilts_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>