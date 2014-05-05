<?php

/**
 * This is the model class for table "sold_hogs".
 *
 * The followings are the available columns in table 'sold_hogs':
 * @property integer $tbl_sold_hogs_id
 * @property integer $cust_id
 * @property string $hog_ear_notch
 * @property string $customer_name
 * @property string $date_sold
 * @property integer $sold_price
 * @property string $sale_type
 * @property integer $invoice_number
 * @property string $app_xfer
 * @property string $comments
 * @property string $reason_sold
 * @property integer $ear_notch_id
 * @property string $date_modified
 */
class TblSoldHogs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblSoldHogs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sold_hogs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hog_ear_notch, customer_name, date_sold, sold_price, app_xfer', 'required'),
			array('sold_price, invoice_number', 'numerical', 'integerOnly'=>true),
			array('hog_ear_notch, date_sold', 'length', 'max'=>20),
			array('customer_name', 'length', 'max'=>50),
			array('sale_type, app_xfer', 'length', 'max'=>1),
			array('invoice_number', 'length', 'max'=>6),
			array('hog_ear_notch','validateEarNotch'),
			array('date_sold', 'date', 'format'=>array('m/d/y','mm/dd/yy','mm/dd/yyyy','m/dd/yy','mm/d/yy','m/d/yyyy','yyyy/dd/mm')),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tbl_sold_hogs_id, hog_ear_notch, customer_name, date_sold, sold_price, sale_type, invoice_number, app_xfer, comments, reason_sold, date_modified', 'safe', 'on'=>'search'),
		);
	}

	public function validateEarNotch($attribute,$params)
	{
		$patt1 = '/[-.]/';
		$patt2 = '/^([0-9][A-Z])/';
		$pattern = '/^([0-9][A-Z]) *[a-z]+ *[0-9]+[ SFsf][0-9]+[-.][0-9]+$/i';
		$herds = $this->getHerd();
		if(preg_match($patt1, $this->$attribute) && !preg_match($pattern, $this->$attribute,$matches)){
			$this->addError($attribute, 'Sow/Boar Ear Notch is not in correct format!'.$this->$attribute);
		}
		$isTrue = preg_match($patt2, $this->$attribute,$matches2);
		if($isTrue && !in_array($matches2[1], $herds)){
			$this->addError($attribute, 'This is not a valid Farm & Herd');
		}
	}


	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tbl_sold_hogs_id' => 'Tbl Sold Hogs',
			'cust_id' => 'Customer id',
			'hog_ear_notch' => 'Hog Ear Notch',
			'customer_name' => 'Customer Name',
			'date_sold' => 'Date Sold',
			'sold_price' => 'Sold Price',
			'sale_type' => 'Sale Type',
			'invoice_number' => 'Invoice Number',
			'app_xfer' => 'App Xfer',
			'comments' => 'Comments',
			'reason_sold' => 'Reason Sold',
			'date_modified' => 'Date Modified',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('tbl_sold_hogs_id',$this->tbl_sold_hogs_id);
		$criteria->compare('hog_ear_notch',$this->hog_ear_notch,true);
		$criteria->compare('customer_name',$this->customer_name,true);
		$criteria->compare('date_sold',$this->date_sold,true);
		$criteria->compare('sold_price',$this->sold_price);
		$criteria->compare('sale_type',$this->sale_type,true);
		$criteria->compare('invoice_number',$this->invoice_number);
		$criteria->compare('app_xfer',$this->app_xfer,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('reason_sold',$this->reason_sold,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$farmHerd = Yii::app()->request->cookies['farm_herd'];
		$criteria->compare('hog_ear_notch',$farmHerd,true);
		
		//$criteria->condition = " hog_ear_notch like '".$farmHerd."%'";

		$pages = (isset($_REQUEST['pages']))?$_REQUEST['pages']:20;
		$TblSoldHogs_sort = isset($_REQUEST['TblSoldHogs_sort'])?$_REQUEST['TblSoldHogs_sort']:"";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pagesize'=>$pages,'params'=>array('pages'=>$pages,'TblSoldHogs_sort'=>$TblSoldHogs_sort)),
			'sort'=>array('params'=>array('pages'=>$pages)),
		));
	}
	public function getlist($pagecount=0)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$start_date = '01-01-1900';
		$end_date = date("Y-m-d", time() + (365 * 24 * 60 * 60));
		if(isset($_POST['start_date']) && !empty($_POST['start_date'])) {
			$start_date =  $_POST['start_date'];
			$datearr = explode("-", $start_date);
			$start_date = date("Y-m-d",mktime(0,0,0,$datearr[0],$datearr[1],$datearr[2]));
		}
		if(isset($_POST['end_date']) && !empty($_POST['end_date'])){
			$end_date = $_POST['end_date'];
			$datearr = explode("-", $end_date);
			$end_date  = date("Y-m-d",mktime(0,0,0,$datearr[0],$datearr[1],$datearr[2]));
		}

		$pages = 20;
		if(isset($_GET['pages']))
			$pages = $_GET['pages'];
		if(isset($_POST['pages']))
			$pages = $_POST['pages'];
		$criteria->compare('date_sold >',$start_date);
		$criteria->compare('date_sold <',$end_date);
		$criteria->compare('cust_id',$this->cust_id);
		//$criteria->compare('date_sold',$this->date_sold,true);
		//$count = $this->count($criteria);
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>($pagecount > 0)?array('pagesize'=>$pages,'params'=>array('pages'=>$pages,'id'=>$this->cust_id)):array('pagesize'=>20),
		));
	}
	public function rebuild()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('is_rebuild',0);
		return $datap = new CActiveDataProvider($this, array(
					'criteria'=>$criteria,
					'pagination'=> array('pagesize'=>1000),
		));

	}
	public function rebuildManual()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('is_rebuild',0);
		$criteria->distinct = true;
		$criteria->select = 'customer_name, tbl_sold_hogs_id';
		return $datap = new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));

	}

	public function getHerd(){
		$qu = "select farm_herd from herd_setup";
		$cmd = YII::app()->db->createCommand($qu);
		return $res = $cmd->queryColumn();
	}

	public static function sumPrice($provider){
		$total=0;
		foreach($provider->data as $item) {
			$total+=$item->sold_price;
		}
		return $total;
	}
}