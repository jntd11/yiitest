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
?>
<script>  
if(!confirm("Are you sure you want to rebuild the Sold Hogs Customer link?")) {
	window.location = 'index.php?r=tblSoldHogs/index';
}
</script>
<div id="message">Started...</div>
 <div id="data">
   <?php 
   $this->renderPartial('_ajaxContent', array('myValue'=>"testing")); 
   ?>
</div>
<?php 
echo CHtml::ajaxButton ("Update data",
                              CController::createUrl('tblSoldHogs/UpdateAjax'), 
                              array('update' => '#data'));
?>

