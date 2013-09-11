<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
Yii::app()->clientScript->registerCoreScript('jquery-ui-1.10.2.custom');

?>
<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>



