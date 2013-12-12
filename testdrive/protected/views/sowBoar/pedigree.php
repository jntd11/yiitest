<?php
/* @var $this SowBoarController */
/* @var $dataProvider CActiveDataProvider */
$id = isset($_GET['id'])?$_GET['id']:0;
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
		'Pigs'=>array('admin'),
		'Sow/Boars'=>array('admin'),
		$id=>array('view','id'=>$id),
		'Update',
);

$this->menu=array(
	//array('label'=>'New', 'url'=>array('create')),
	//array('label'=>'List Sows/Boars', 'url'=>array('admin')),
);
Yii::app()->clientScript->registerCoreScript('jquery-ui-1.10.2.custom');
$cs=Yii::app()->clientScript;
//$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/ECOTree.js');
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/sowboar.js');
//$cs->registerCssFile(Yii::app()->baseUrl.'/css/ECOTree.css');
$cs->registerCssFile(
		Yii::app()->baseUrl.
		'/css/pedigree.css'
);
$parentId = Yii::app()->request->cookies['pedigree_parent'];
 

//echo "<pre>";
//print_r($model);

?>
<div>
<?php echo CHtml::Button('New',array('onClick'=>'window.location="index.php?r=sowBoar/create"')); ?>
<?php echo CHtml::Button('List Sows/Boars',array('onClick'=>'window.location="index.php?r=sowBoar/admin"')); ?>
<?php echo CHtml::Button('Return',array('onClick'=>'parentSow("'.$parentId.'")')); ?>
<?php echo CHtml::Button('Update',array('onClick'=>'level1Sow(1)')); ?>
<?php echo CHtml::Button('Sire',array('onClick'=>'level1Sow(2)')); ?>
<?php echo CHtml::Button('Dam',array('onClick'=>'level1Sow(3)')); ?>
<?php echo CHtml::Button('+',array('onClick'=>'levelIncDec("'.$id.'",1)')); ?>
<?php echo CHtml::Button('-',array('onClick'=>'levelIncDec("'.$id.'",2)')); ?>
</div>
<script>
$(document).ready(function(){
	window.scrollTo(50, 50);
});
</script>
<style>
#page{
  height: 2024px;
  background: none repeat scroll 0 0 #FFFFFF;
  clear: both;
}

#footer{
  position: relative;
  top: 1510px; 
}
.container{
  width: 1350px;
}
</style>
<?php echo $this->renderPartial('_pedigree', array('model'=>$model)); ?>
