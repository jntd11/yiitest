<?php

/**
 * This is the model class for table "semen_orders".
 *
 * The followings are the available columns in table 'semen_orders':
 * @property integer $semen_orders_id
 * @property integer $customer_id
 * @property integer $sow_boar_id
 * @property string $ordered_date
 * @property string $ship_date
 * @property integer $doses
 * @property double $price_dose
 * @property double $shipping_cost
 * @property double $misc
 * @property string $comments
 * @property string $onstandby
 * @property integer $invoice
 * @property string $semen_type
 * @property double $cod_charges
 * @property string $payment_type
 * @property string $modified_date
 */
class SemenOrders extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SemenOrders the static model class
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
		return 'semen_orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_id, sow_boar_id, ordered_date, ship_date, doses, price_dose, shipping_cost, semen_type,  payment_type', 'required'),
			array('customer_id, sow_boar_id, doses, invoice, committed, standby', 'numerical', 'integerOnly'=>true),
			array('price_dose, shipping_cost, misc, cod_charges', 'numerical'),
			array('comments', 'length', 'max'=>40),
			array('onstandby', 'length', 'max'=>1),
			array('semen_type', 'length', 'max'=>20),
			array('payment_type', 'length', 'max'=>3),
			//array('onstandby','in','range'=>array('Y'),'allowEmpty'=>true,'Should be Y or empty'),
			array('onstandby','validateStandby'),
			array('price_dose,shipping_cost,cod_charges','validateDecimals'),
			array('misc','validateDecimalsNegative'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('semen_orders_id, customer_id, sow_boar_id, ordered_date, ship_date, doses, price_dose, shipping_cost, misc, comments, onstandby, invoice, semen_type, cod_charges, payment_type, modified_date', 'safe', 'on'=>'search'),
		);
	}

	public function validateStandby($attribute,$params)
	{
		if($this->$attribute != "Y" && $this->$attribute != "y" && $this->$attribute != ""){
			$this->addError($attribute, 'Stand by should be Y or empty.');
		}
	}

	public function validateDecimals($attribute,$params)
	{

		if($this->$attribute != "" && !preg_match("/^(([0-9]+\.([0-9]){1,2})|([0-9]+))$/",$this->$attribute)){
			$this->addError($attribute, 'Should be Numberical value with max 2 decimal digits.');
		}
	}
	public function validateDecimalsNegative($attribute,$params)
	{

		if($this->$attribute != "" &&  !preg_match("/^(\-)*(([0-9]+\.([0-9]){1,2})|([0-9]+))$/",$this->$attribute)){
			$this->addError($attribute, 'Should be Numberical value with max 2 decimal digits.');
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
			'semen_orders_id' => 'Semen Orders',
			'customer_id' => 'Customer Name',
			'sow_boar_id' => 'Sow Boar Tag',
			'ordered_date' => 'Ordered Date',
			'ship_date' => 'Ship Date',
			'doses' => '# Doses',
			'price_dose' => 'Price Per Dose',
			'shipping_cost' => 'Shipping Cost',
			'misc' => 'Misc Charges',
			'comments' => 'Comments',
			'onstandby' => 'On Standby',
			'invoice' => 'Invoice',
			'semen_type' => 'Semen Type',
			'cod_charges' => 'COD $',
			'payment_type' => 'Payment Type',
			'committed'=>'Committed Doses ',
			'standby'=>'Standby Doses ',
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

		$criteria->compare('semen_orders_id',$this->semen_orders_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('sow_boar_id',$this->sow_boar_id);
		$criteria->compare('ordered_date',$this->ordered_date,true);
		$criteria->compare('ship_date',$this->ship_date,true);
		$criteria->compare('doses',$this->doses);
		$criteria->compare('price_dose',$this->price_dose);
		$criteria->compare('shipping_cost',$this->shipping_cost);
		$criteria->compare('misc',$this->misc);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('onstandby',$this->onstandby,true);
		$criteria->compare('invoice',$this->invoice);
		$criteria->compare('semen_type',$this->semen_type,true);
		$criteria->compare('cod_charges',$this->cod_charges);
		$criteria->compare('payment_type',$this->payment_type,true);
		$criteria->compare('modified_date',$this->modified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}