<?php
/* @var $this TblSoldHogsController */
/* @var $model TblSoldHogs */

$this->breadcrumbs=array(
	'Tbl Sold Hogs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblSoldHogs', 'url'=>array('index')),
	array('label'=>'Manage TblSoldHogs', 'url'=>array('admin')),
);
?>

<h1>Create TblSoldHogs</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>