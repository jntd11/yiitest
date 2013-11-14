<?php
/* @var $this TblSoldHogsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
		'Herd Setup',
);

$this->breadcrumbs=array(
	'Build ',
);

$this->menu=array(
	array('label'=>'Create Sold Hogs', 'url'=>array('create')),
	array('label'=>'Search Sold Hogs', 'url'=>array('admin')),
);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/assets/js/customer.js');
Yii::app()->clientScript->registerCoreScript('jquery-ui-1.10.2.custom');
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/soldhog.js');
$baseScriptUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('zii.widgets.assets')).'/detailview';
$cs->registerCssFile(
		$baseScriptUrl.'/styles.css'
);
?>
<div id="message"></div>
 <div id="data"></div>
 <div id="dataUpdate"></div>
<?php 
echo CHtml::ajaxButton ("Rebuild Sold Hogs",
                              CController::createUrl('tblSoldHogs/UpdateAjax'), 
                              array('update' => '#dataUpdate'),array('onClick'=>"return confirmRebuild();",'id'=>"rebuild"));
?>

