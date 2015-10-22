<?php

/**
 * This is the model class for table "bill".
 *
 * The followings are the available columns in table 'bill':
 * @property integer $billid
 * @property integer $date_ship
 * @property integer $customer_id
 * @property double $quantity
 * @property string $description
 * @property double $price
 * @property double $total
 * @property string $date_modified
 */
class Bill extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bill the static model class
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
		return 'bill';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_ship, customer_id', 'required'),
			array('customer_id', 'numerical', 'integerOnly'=>true),
			array('quantity, price, total', 'numerical'),
			array('description', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('billid, date_ship, customer_id, quantity, description, price, total, date_modified', 'safe', 'on'=>'search'),
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
			'billid' => 'Billid',
			'date_ship' => 'Date Ship',
			'customer_id' => 'Customer',
			'quantity' => 'Quantity',
			'description' => 'Description',
			'price' => 'Price',
			'total' => 'Total',
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

		$criteria->compare('billid',$this->billid);
		$criteria->compare('date_ship',$this->date_ship);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('quantity',$this->quantity);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('total',$this->total);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}