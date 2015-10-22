<?php
/* @var $this BillController */
/* @var $model Bill */

$this->breadcrumbs=array(
	'Bills'=>array('index'),
	$model->billid=>array('view','id'=>$model->billid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bill', 'url'=>array('index')),
	array('label'=>'Create Bill', 'url'=>array('create')),
	array('label'=>'View Bill', 'url'=>array('view', 'id'=>$model->billid)),
	array('label'=>'Manage Bill', 'url'=>array('admin')),
);
?>

<h1>Update Bill <?php echo $model->billid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>