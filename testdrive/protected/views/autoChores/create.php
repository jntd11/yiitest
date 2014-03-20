<?php
/* @var $this AutoChoresController */
/* @var $model AutoChores */

$this->breadcrumbs=array(
	'Auto Chores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AutoChores', 'url'=>array('index')),
	array('label'=>'Manage AutoChores', 'url'=>array('admin')),
);
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/jquery.yiigridview.js');
$cs->registerCssFile(
  Yii::app()->baseUrl.
  '/css/styles.css'
);
$cs->registerCoreScript('jquery-ui-1.10.2.custom');

?>
<script>
  $(function() {
    $( "#menu" ).menu();
  });
</script>

<?php echo $this->renderPartial('_form', array('model'=>$model,'dataProvider'=>$dataProvider)); ?>