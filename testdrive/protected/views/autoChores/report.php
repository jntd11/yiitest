<?php
/* @var $this ChoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Chores'=>array('create'),
	'Report',
);
$this->menu=array(
	array('label'=>'Create Chores', 'url'=>array('create')),

);
?>

<h1>Chores Report</h1>

<?php echo $this->renderPartial('_report', array('model'=>$model,'results'=>$results)); ?>
