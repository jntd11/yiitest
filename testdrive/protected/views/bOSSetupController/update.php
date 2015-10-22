<?php
/* @var $this BOSSetupControllerController */
/* @var $model Bossetup */

$this->breadcrumbs=array(
	'Semen'=>array('index'),
	'Setup',
);

$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/tinymce/tinymce.min.js');
?>

<h1>Bill of Sale Setup </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
<script>
$(document).ready(function(){
window.onbeforeunload = iamexiting;
function iamexiting(e) {
	if($("#bossetup-form").data("changed")) {
		   return 'You have unsaved changes. Do you want to continue';
		   // submit the form
	}
	return;
}
$("#bossetup-form :input[type!='submit']").change(function() {
	   $("#bossetup-form").data("changed",true);
});
$("#bossetup-form :input[type!='reset']").change(function() {
	   $("#bossetup-form").data("changed",true);
});
$("#bossetup-form :input[type=submit]").click(function() {
	   $("#bossetup-form").data("changed",false);
});
/*$("#bossetup-form :input[type=reset]").click(function() {
	   $("#bossetup-form").data("changed",false);
});*/
});
</script>