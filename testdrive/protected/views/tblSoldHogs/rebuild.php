<?php
/* @var $this TblSoldHogsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
		'Herd Setup',
);

$this->breadcrumbs=array(
	'List of Sold Hogs',
);

$this->menu=array(
	array('label'=>'Create Sold Hogs', 'url'=>array('create')),
	array('label'=>'Search Sold Hogs', 'url'=>array('admin')),
);
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/soldhog.js');
?>
<?php
	
	$formatter = new CFormatter();
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-sold-hogs-grid',
	'selectableRows'=>1,
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('update').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'hog_ear_notch',
		'reason_sold',
		'comments',	
		array('name'=>'date_sold',
			  'footer'=>$dataProvider->totalItemCount." Hogs",
			 'footerHtmlOptions'=>array('style'=>'text-align: right'),
			),
			
		array(
				'name'=>'sold_price',
				'type'=>'Number',
				'footer'=>$dataProviderFull->itemCount===0 ? '' : ' Total $'.$formatter->number($model->sumPrice($dataProviderFull)),
				'footerHtmlOptions'=>array('style'=>'text-align: right'),
				'htmlOptions'=>array('style'=>'text-align: right'),
		),
	 ),
)); ?>