<?php
/* @var $this TblHerdSetupController */
/* @var $model TblHerdSetup */

$this->breadcrumbs=array(
	'Tbl Herd Setups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblHerdSetup', 'url'=>array('index')),
	array('label'=>'Manage TblHerdSetup', 'url'=>array('admin')),
);
?>

<h1>Create TblHerdSetup</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>