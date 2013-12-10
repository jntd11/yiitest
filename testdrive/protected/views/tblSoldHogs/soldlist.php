<?php
/* @var $this TblSoldHogsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
		'Customers'=>array('admin'),
		$_GET['id']=>array('view','id'=>$_GET['id']),
		'Update'=>array('admin'),
		'Sold Hogs'=>array('soldlist'),
);


$this->menu=array(
	array('label'=>'New', 'url'=>array('create')),
	array('label'=>'List Sold Hogs', 'url'=>array('admin')),
);
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/js/soldhog.js');
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
if($custmormodel != null){
?>

<!-- h1>List of Sold Hogs</h1-->
<div class="row">
	<?php echo "<b>Company Name: </b>".$custmormodel->company_name; ?>
</div>
<div class="row">
	<?php echo "<b>First Name: </b>".$custmormodel->first_name; ?>
</div>
<div class="row">
	<?php echo "<b>Last Name: </b>".$custmormodel->last_name; ?>
</div>
<?php
}
$form=$this->beginWidget('CActiveForm', array(
		'id'=>'tbl-sold-hogs-form',
		'enableAjaxValidation'=>false,
)); 
?>
<div class="row">&nbsp;</div>
<div class="row">&nbsp;</div>

<div class="row">
    Start Date:
	<?php 
	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name' => 'start_date',
			'id' => 'start_date',
			'options' =>array(
					'dateFormat'=>'mm-dd-yy',
			),
	
			'htmlOptions' => array(
					'id'=>'start_date',
					'size' => '20',         // textField size
					'maxlength' => '20',    // textField maxlength
			),
	));
	?>

    End Date:
	<?php 
	$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'name' => 'end_date',
			'id' => 'end_date',
			'options' =>array(
					'dateFormat'=>'mm-dd-yy',
			),
	
			'htmlOptions' => array(
					'id'=>'end_date',
					'size' => '20',         // textField size
					'maxlength' => '20',    // textField maxlength
			),
	));
	
	
	echo " No of items per page: ";
	echo CHtml::dropDownList('pages','20', array('2'=>'2','10'=>'10','20'=>'20','30'=>'30','40'=>'40','50'=>'50'),array('size'=>0,'tabindex'=>23,'maxlength'=>0));
	echo CHtml::submitButton('Redisplay',array('onClick'=>'return validateSearch()'));
	
	?>
	<?php $this->endWidget(); ?>
</div>
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