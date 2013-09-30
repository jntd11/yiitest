<?php
/* @var $this SowBoarController */
/* @var $dataProvider CActiveDataProvider */

$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
	'Sows/Boars',
);

$this->menu=array(
	array('label'=>'Create Sows/Boars', 'url'=>array('create')),
	array('label'=>'Search Sows/Boars', 'url'=>array('admin')),
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
$id = isset($_GET['id'])?$_GET['id']:0; 

//echo "<pre>";
//print_r($model);

?>
<div><h1>Pedigree</h1></div>
<div>
<?php echo CHtml::Button('Return',array('onClick'=>'parentSow("'.$parentId.'")')); ?>
<?php echo CHtml::Button('Update',array('onClick'=>'level1Sow(1)')); ?>
<?php echo CHtml::Button('Sire',array('onClick'=>'level1Sow(2)')); ?>
<?php echo CHtml::Button('Dam',array('onClick'=>'level1Sow(3)')); ?>
<?php echo CHtml::Button('+',array('onClick'=>'levelIncDec("'.$id.'",1)')); ?>
<?php echo CHtml::Button('-',array('onClick'=>'levelIncDec("'.$id.'",2)')); ?>
</div>
<script>
$(document).ready(function(){
	window.scrollTo(0, 0);
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
  width: 1200px;
}
</style>
<?php echo $this->renderPartial('_pedigree', array('model'=>$model)); ?>
