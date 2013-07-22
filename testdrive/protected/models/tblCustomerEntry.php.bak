<?php

/**
 * This is the model class for table "tbl_customer_entry".
 *
 * The followings are the available columns in table 'tbl_customer_entry':
 * @property integer $customer_entry_id
 * @property string $code
 * @property string $first_name
 * @property string $last_name
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property integer $zip
 * @property string $phone_home
 * @property string $phone_business
 * @property string $phone_cell
 * @property string $phone_other1
 * @property string $phone_other2
 * @property string $state
 * @property string $country
 * @property string $contact
 * @property string $county
 * @property string $company_name
 * @property integer $total_sows
 * @property integer $total_boars
 * @property string $facility
 * @property integer $sows
 * @property integer $boars
 * @property string $frequency
 * @property string $system
 * @property string $feeder
 * @property string $finish
 * @property string $rep_glits
 * @property string $notes1
 * @property string $notes2
 * @property string $notes3
 * @property string $notes4
 * @property string $modified_date
 */
class tblCustomerEntry extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return tblCustomerEntry the static model class
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
		return 'tbl_customer_entry';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, first_name, last_name, address1, address2, city, zip, phone_home, phone_business, phone_cell, phone_other1, phone_other2, state, country, contact, county, company_name, total_sows, total_boars, facility, sows, boars, frequency, system, feeder, finish, rep_glits, notes1, notes2, notes3, notes4, modified_date', 'required'),
			array('zip, total_sows, total_boars, sows, boars', 'numerical', 'integerOnly'=>true),
			array('code, first_name, last_name, address1, address2', 'length', 'max'=>255),
			array('city, phone_home, phone_business, phone_cell, phone_other1, phone_other2, contact, county, company_name, facility, frequency, rep_glits', 'length', 'max'=>50),
			array('state', 'length', 'max'=>30),
			array('country', 'length', 'max'=>20),
			array('system, feeder, finish', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('customer_entry_id, code, first_name, last_name, address1, address2, city, zip, phone_home, phone_business, phone_cell, phone_other1, phone_other2, state, country, contact, county, company_name, total_sows, total_boars, facility, sows, boars, frequency, system, feeder, finish, rep_glits, notes1, notes2, notes3, notes4, modified_date', 'safe', 'on'=>'search'),
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
			'customer_entry_id' => 'Customer Entry',
			'code' => 'Code',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'city' => 'City',
			'zip' => 'Zip',
			'phone_home' => 'Phone Home',
			'phone_business' => 'Phone Business',
			'phone_cell' => 'Phone Cell',
			'phone_other1' => 'Phone Other1',
			'phone_other2' => 'Phone Other2',
			'state' => 'State',
			'country' => 'Country',
			'contact' => 'Contact',
			'county' => 'County',
			'company_name' => 'Company Name',
			'total_sows' => 'Total Sows',
			'total_boars' => 'Total Boars',
			'facility' => 'Facility',
			'sows' => 'Sows',
			'boars' => 'Boars',
			'frequency' => 'Frequency',
			'system' => 'System',
			'feeder' => 'Feeder',
			'finish' => 'Finish',
			'rep_glits' => 'Rep Glits',
			'notes1' => 'Notes1',
			'notes2' => 'Notes2',
			'notes3' => 'Notes3',
			'notes4' => 'Notes4',
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

		$criteria->compare('customer_entry_id',$this->customer_entry_id);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('zip',$this->zip);
		$criteria->compare('phone_home',$this->phone_home,true);
		$criteria->compare('phone_business',$this->phone_business,true);
		$criteria->compare('phone_cell',$this->phone_cell,true);
		$criteria->compare('phone_other1',$this->phone_other1,true);
		$criteria->compare('phone_other2',$this->phone_other2,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('county',$this->county,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('total_sows',$this->total_sows);
		$criteria->compare('total_boars',$this->total_boars);
		$criteria->compare('facility',$this->facility,true);
		$criteria->compare('sows',$this->sows);
		$criteria->compare('boars',$this->boars);
		$criteria->compare('frequency',$this->frequency,true);
		$criteria->compare('system',$this->system,true);
		$criteria->compare('feeder',$this->feeder,true);
		$criteria->compare('finish',$this->finish,true);
		$criteria->compare('rep_glits',$this->rep_glits,true);
		$criteria->compare('notes1',$this->notes1,true);
		$criteria->compare('notes2',$this->notes2,true);
		$criteria->compare('notes3',$this->notes3,true);
		$criteria->compare('notes4',$this->notes4,true);
		$criteria->compare('modified_date',$this->modified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}