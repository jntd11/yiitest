<?php
/* @var $this TblHerdSetupController */
/* @var $model TblHerdSetup */

$this->breadcrumbs=array(
	'Tbl Herd Setups'=>array('index'),
	$model->herd_id=>array('view','id'=>$model->herd_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblHerdSetup', 'url'=>array('index')),
	array('label'=>'Create TblHerdSetup', 'url'=>array('create')),
	array('label'=>'View TblHerdSetup', 'url'=>array('view', 'id'=>$model->herd_id)),
	array('label'=>'Manage TblHerdSetup', 'url'=>array('admin')),
);
?>

<h1>Update TblHerdSetup <?php echo $model->herd_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>