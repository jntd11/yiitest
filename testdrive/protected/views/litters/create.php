<?php
/* @var $this LittersController */
/* @var $model Litters */

$this->breadcrumbs=array(
	'Litters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Litters', 'url'=>array('index')),
	array('label'=>'Manage Litters', 'url'=>array('admin')),
);
?>

<h1>Create Litters</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>