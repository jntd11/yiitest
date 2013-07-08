<?php
/* @var $this TblMailingCodeController */
/* @var $model tblMailingCode */

$this->breadcrumbs=array(
	'Tbl Mailing Codes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List tblMailingCode', 'url'=>array('index')),
	array('label'=>'Manage tblMailingCode', 'url'=>array('admin')),
);
?>

<h1>Create tblMailingCode</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>