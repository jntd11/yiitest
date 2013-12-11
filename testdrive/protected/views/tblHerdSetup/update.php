<?php
/* @var $this TblHerdSetupController */
/* @var $model TblHerdSetup */

$this->breadcrumbs=array(
		'Other'=>array('admin'),
		'Herd Setup'=>array('admin'),
		'Update',
);
Yii::app()->clientScript->registerCoreScript('jquery-ui-1.10.2.custom');
$this->menu=array(
	//array('label'=>'List Farm & Herd', 'url'=>array('index')),
	//array('label'=>'Create Farm & Herd', 'url'=>array('create')),
	//array('label'=>'View Farm & Herd', 'url'=>array('view', 'id'=>$model->herd_id)),
	//array('label'=>'Manage Farm & Herd', 'url'=>array('admin')),
);

$qu = "UPDATE users SET farm_herd = '". addslashes($model->getAttribute("farm_herd"))."', farm_herd_name = '".addslashes($model->getAttribute("farm_name"))."' WHERE id = ".Yii::app()->user->id;
$cmd = YII::app()->db->createCommand($qu);
$res = $cmd->query();

Yii::app()->request->cookies['farm_herd'] = new CHttpCookie('farm_herd',$model->getAttribute("farm_herd"),array('expire'=>time()+(365*24*60*60)));
Yii::app()->request->cookies['farm_herd_name'] = new CHttpCookie('farm_herd_name',$model->getAttribute("farm_name"),array('expire'=>time()+(365*24*60*60)));
Yii::app()->request->cookies['breeder_herd_mark'] = new CHttpCookie('breeder_herd_mark',$model->getAttribute("breeder_herd_mark"),array('expire'=>time()+(365*24*60*60)));
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/herdsetup.js');
?>

<h1></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>