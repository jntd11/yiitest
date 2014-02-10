<?php
/* @var $this LittersController */
/* @var $model Litters */

$this->breadcrumbs=array(
	'Litters'=>array('index'),
	$model->litters_id=>array('view','id'=>$model->litters_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Litters', 'url'=>array('index')),
	array('label'=>'Create Litters', 'url'=>array('create')),
	array('label'=>'View Litters', 'url'=>array('view', 'id'=>$model->litters_id)),
	array('label'=>'Manage Litters', 'url'=>array('admin')),
);
?>

<h1>Update Litters <?php echo $model->litters_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>