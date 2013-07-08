<?php
/* @var $this TblMailingCodeController */
/* @var $model tblMailingCode */

$this->breadcrumbs=array(
	'Tbl Mailing Codes'=>array('index'),
	$model->mailing_code_id=>array('view','id'=>$model->mailing_code_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List tblMailingCode', 'url'=>array('index')),
	array('label'=>'Create tblMailingCode', 'url'=>array('create')),
	array('label'=>'View tblMailingCode', 'url'=>array('view', 'id'=>$model->mailing_code_id)),
	array('label'=>'Manage tblMailingCode', 'url'=>array('admin')),
);
?>

<h1>Update tblMailingCode <?php echo $model->mailing_code_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>