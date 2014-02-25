<?php
/* @var $this DefectsCodeController */
/* @var $model DefectsCode */

$this->breadcrumbs=array(
	'Defects Codes'=>array('admin'),
	'Create',
);

$this->menu=array(
	/* array('label'=>'List DefectsCode', 'url'=>array('index')),
	array('label'=>'Manage DefectsCode', 'url'=>array('admin')), */
);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>