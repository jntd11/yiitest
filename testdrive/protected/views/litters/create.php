<?php
/* @var $this LittersController */
/* @var $model Litters */

$this->breadcrumbs=array(
	'Litters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Litters', 'url'=>array('index')),
	array('label'=>'Manage Litters', 'url'=>array('admin')),
);
$cs=Yii::app()->clientScript;
$cs->registerCssFile(
  Yii::app()->baseUrl.
  '/css/splitmenubuttons.css'
);

$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/splitmenubuttons.js');

?>
<script>

jQuery(function(){ // on document load
	$('a[data-showmenu]').splitmenubuttonMenu() // Add split button menu to links with "data-showmenu" attr
})

</script>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>