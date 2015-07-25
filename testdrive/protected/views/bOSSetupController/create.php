<?php
/* @var $this BOSSetupControllerController */
/* @var $model Bossetup */

$this->breadcrumbs=array(
	'Bossetups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Bossetup', 'url'=>array('index')),
	array('label'=>'Manage Bossetup', 'url'=>array('admin')),
);
?>

<h1>Create Bossetup</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>