<?php

/**
 * This is the model class for table "bossetup".
 *
 * The followings are the available columns in table 'bossetup':
 * @property integer $id
 * @property string $header
 * @property string $footer
 * @property string $address
 * @property string $type
 * @property integer $lines_top
 * @property integer $margin_left
 * @property integer $invoice_no
 * @property string $modified_date
 */
class Bossetup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bossetup the static model class
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
		return 'bossetup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, lines_top, margin_left, invoice_no ', 'required'),
			array('lines_top, margin_left, invoice_no', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, header, footer, address, type, lines_top, margin_left, invoice_no, modified_date', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'header' => 'Header',
			'footer' => 'Footer',
			'address' => 'Return Address',
			'type' => 'Envelope Orientation',
			'lines_top' => 'Envelope Address Lines from Top',
			'margin_left' => 'Envelope Left Margin (10 equals 1 inch)',
			'invoice_no' => 'Next Invoice #',
			'modified_date' => 'Modified Date',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('header',$this->header,true);
		$criteria->compare('footer',$this->footer,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('lines_top',$this->lines_top);
		$criteria->compare('margin_left',$this->margin_left);
		$criteria->compare('invoice_no',$this->invoice_no);
		$criteria->compare('modified_date',$this->modified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}