<?php

/**
 * This is the model class for table "tbl_sold_hogs".
 *
 * The followings are the available columns in table 'tbl_sold_hogs':
 * @property integer $tbl_sold_hogs_id
 * @property string $hog_ear_notch
 * @property string $customer_name
 * @property string $date_sold
 * @property integer $sold_price
 * @property string $sale_type
 * @property integer $invoice_number
 * @property string $app_xfer
 * @property string $comments
 * @property string $reason_sold
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
		return 'tbl_sold_hogs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hog_ear_notch, customer_name, date_sold, sold_price, sale_type, invoice_number, app_xfer, comments, reason_sold, date_modified', 'required'),
			array('sold_price, invoice_number', 'numerical', 'integerOnly'=>true),
			array('hog_ear_notch, date_sold', 'length', 'max'=>20),
			array('customer_name', 'length', 'max'=>50),
			array('sale_type, app_xfer', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tbl_sold_hogs_id, hog_ear_notch, customer_name, date_sold, sold_price, sale_type, invoice_number, app_xfer, comments, reason_sold, date_modified', 'safe', 'on'=>'search'),
		);
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}