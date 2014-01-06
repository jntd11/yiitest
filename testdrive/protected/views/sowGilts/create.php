<?php
/* @var $this SowGiltsController */
/* @var $model SowGilts */

$this->breadcrumbs=array(
	'Sow Gilts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SowGilts', 'url'=>array('index')),
	array('label'=>'Manage SowGilts', 'url'=>array('admin')),
);
?>

<h1>Create SowGilts</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>