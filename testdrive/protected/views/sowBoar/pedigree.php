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

$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/ECOTree.js');
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/sowboar.js');
$cs->registerCssFile(
		Yii::app()->baseUrl.
		'/css/ECOTree.css'
);
<xml:namespace ns="urn:schemas-microsoft-com:vml" prefix="v"/>
<style>v\:*{
	behavior:url(#default#VML);}</style>
//echo "<pre>";
//print_r($model);
?>
<?php echo $this->renderPartial('_pedigree', array('model'=>$model)); ?>
