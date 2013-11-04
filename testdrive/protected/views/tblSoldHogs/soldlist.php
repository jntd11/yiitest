<?php
/* @var $this TblSoldHogsController */
/* @var $dataProvider CActiveDataProvider */

$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$this->breadcrumbs=array(
		'Herd Setup',
);

$this->breadcrumbs=array(
	'List of Sold Hogs',
);

$this->menu=array(
	array('label'=>'Create Sold Hogs', 'url'=>array('create')),
	array('label'=>'Manage Sold Hogs', 'url'=>array('admin')),
);
Yii::import('zii.widgets.grid.CGridColumn');
Yii::import('zii.widgets.grid.CGridView');
Yii::import('zii.widgets.grid.CBaseListView');
class TotalColumn extends CGridColumn {

	private $_total = 0;
	public $type = 'number';

	public function renderDataCellContent($row, $data) { // $row number is ignored

		$this->_total += $data->sold_price;

		echo (isset($this->type))?$this->grid->getFormatter()->format($this->_total, $this->type):$this->_total;
	}
}
class Totalrow extends CGridView{
	
	public $display;
	public function renderContent(){
		$this->display = "<tr><td>JJJ</td></tr>";
	}
}
	
?>

<h1>List of Sold Hogs</h1>
<?php 
	$dataProvider = $model->getlist(2);
	$dataProviderFull = $model->getlist();
	$formatter = new CFormatter();
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-sold-hogs-grid',
	'selectableRows'=>1,
	'selectionChanged'=>'function(id){ location.href = "'.$this->createUrl('update').'/id/"+$.fn.yiiGridView.getSelection(id);}',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'tbl_sold_hogs_id',
		'hog_ear_notch',
		'customer_name',
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
		'sale_type',
		
	 ),
)); ?>