<?php
/* @var $this TblHerdSetupController */
/* @var $model TblHerdSetup */

$this->breadcrumbs=array(
	'Herd & Farm Setup'=>array('index'),
	$model->herd_id=>array('view','id'=>$model->herd_id),
	'Update',
);
Yii::app()->clientScript->registerCoreScript('jquery-ui-1.10.2.custom');
$this->menu=array(
	array('label'=>'List Herd & Farm', 'url'=>array('index')),
	array('label'=>'Create Herd & Farm', 'url'=>array('create')),
	array('label'=>'View Herd & Farm', 'url'=>array('view', 'id'=>$model->herd_id)),
	array('label'=>'Manage Herd & Farm', 'url'=>array('admin')),
);
echo "JAI".$model->getAttribute("breeder_herd_mark");
Yii::app()->request->cookies['farm_herd'] = new CHttpCookie('farm_herd',$model->getAttribute("farm_herd"),array('expire'=>time()+(365*24*60*60)));
Yii::app()->request->cookies['breeder_herd_mark'] = new CHttpCookie('breeder_herd_mark',$model->getAttribute("breeder_herd_mark"),array('expire'=>time()+(365*24*60*60)));
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/herdsetup.js');
?>

<h1>Update Herd & Farm <?php echo $model->herd_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>