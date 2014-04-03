<?php
/* @var $this ChoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Chores'=>array('create'),
	'Report',
);
$this->pageTitle = "Chores Report";
$this->menu=array(
	//array('label'=>'Create Chores', 'url'=>array('create')),

);
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/jquery.yiigridview.js');
$cs->registerCssFile(
		Yii::app()->baseUrl.
		'/css/styles.css'
);
$cs->registerScriptFile(Yii::app()->baseUrl . '/assets/js/autochores.js');
?>


<h1>Chores Report</h1>

<?php
if($isPrint)
 echo $this->renderPartial('_reportprint', array('model'=>$model,'results'=>$results));
else
 echo $this->renderPartial('_report', array('model'=>$model,'results'=>$results));
$this->widget('ext.mPrint.mPrint', array(
  'title' => 'Chores Report',          //the title of the document. Defaults to the HTML title
  'tooltip' => 'Print',        //tooltip message of the print icon. Defaults to 'print'
  'text' => 'Print Results',   //text which will appear beside the print icon. Defaults to NULL
  'element' => '#print',        //the element to be printed.
  'exceptions' => array(       //the element/s which will be ignored
    '.summary',
    '.search-form'
  ),
  //'cssFile'=>'styles.css',
  'publishCss' => true,       //publish the CSS for the whole page?
  'visible' => Yii::app()->user->checkAccess('print'),  //should this be visible to the current user?
  'alt' => 'print',       //text which will appear if image can't be loaded
  'debug' => false,            //enable the debugger to see what you will get
  'id' => 'print-div'         //id of the print link
));
?>
