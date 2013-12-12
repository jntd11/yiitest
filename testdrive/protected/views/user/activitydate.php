<?php
/* @var $this UserController */
/* @var $model User */
$cs=Yii::app()->clientScript;
//$cs->registerCoreScript('jquery.ui');
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$cs->registerCssFile(
		$cs->getCoreScriptUrl().
		'/jui/css/base/jquery-ui-1.10.2.custom.css'
);
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/index.js');

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Manage',
);
?>

<h1>Manage Activity Date</h1>
If you want change "Activity Date" again, Press "Change" button
<form >
 <input type="hidden" name="activitypage" id="activitypage" value="1"/>
 <input type="button" name="submit" id="submitactivitydate" value="Change"/>
</form>


