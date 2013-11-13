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
if(count($dataProvider->data) <= 0) {
	echo "<h2>All Names were Mapped successfully</h2>";
}else{
?>
<div class="form">
<?php 
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'tbl-sold-hogs-form',
		'enableAjaxValidation'=>false,
	)); 
?>

<div class="row">
Sold Hogs Name: 
<select name="soldhogname" id="soldhogname" onChange="getSoldHog()">
<?php
foreach ($dataProvider->data as $items) {
	echo "<option value='".$items['tbl_sold_hogs_id']."' >".$items['customer_name']."</option>";
} 
?>
</select>
</div>
<div>&nbsp;</div>
<br />
<div class="row">
Customer Name:
<select name="custname" id="custname">
<?php

foreach ($datacustmodel as $items) {
	echo "<option value='".$items['value']."'>".$items['label']."</option>";
} 
?>
</select>
</div>
<br>
<div class="row buttons">
		<?php echo CHtml::submitButton('Update', array('onClick'=>'')); ?>
</div>
<br>
<?php if($content !="") {?>
<div class="errorSummary">
<ul>
<?php 
echo $content;
?>
</ul>
</div>
<?php } ?>
<?php $this->endWidget(); ?>
<div class="view">
	<b><?php echo CHtml::encode($model->getAttributeLabel('tbl_sold_hogs_id')); ?>:</b>
	<span id="tbl_sold_hogs_id"></span>
	<br />
	<b><?php echo CHtml::encode($model->getAttributeLabel('hog_ear_notch')); ?>:</b>
	<span id="hog_ear_notch"></span>
	<br />
	<b><?php echo CHtml::encode($model->getAttributeLabel('customer_name')); ?>:</b>
	<span id="customer_name"></span>
	<br />
	<b><?php echo CHtml::encode($model->getAttributeLabel('date_sold')); ?>:</b>
	<span id="date_sold"></span>
	<br />
		<b><?php echo CHtml::encode($model->getAttributeLabel('sold_price')); ?>:</b>
	<span id="sold_price"></span>
	<br />
		<b><?php echo CHtml::encode($model->getAttributeLabel('invoice_number')); ?>:</b>
	<span id="invoice_number"></span>
	<br />
	<b><?php echo CHtml::encode($model->getAttributeLabel('comments')); ?>:</b>
	<span id="comments"></span>
	<br />
	<b><?php echo CHtml::encode($model->getAttributeLabel('reason_sold')); ?>:</b>
	<span id="reason_sold"></span>
	<br />
</div>
</div>
<script type="text/javascript">
<!--
getSoldHog();
//-->
</script>
<?php 
}
?> 
