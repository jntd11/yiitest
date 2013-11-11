<?php

/**
 * This is the model class for table "tbl_customer_entry".
 *
 * The followings are the available columns in table 'tbl_customer_entry':
 * @property integer $customer_entry_id
 * @property string $company_name
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
 * @property string $notes
 * @property string $cc_brand
 * @property integer $cc_number
 * @property string $cc_expiration
 * @property string $cc_name
 * @property string $ship_company_name
 * @property string $ship_name
 * @property string $ship_address1
 * @property string $ship_address2
 * @property string $ship_city
 * @property string $ship_state
 * @property string $ship_country
 * @property integer $ship_zip
 * @property string $ship_contact
 * @property string $ship_area
 * @property string $ship_phone
 * @property string $att_sale
 * @property string $mailing_code
 * @property integer $last_invoice
 * @property string $last_letter_sent
 * @property string $entry_date
 * @property string $herdmark
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
class TblCustomerEntry extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblCustomerEntry the static model class
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
			//array('company_name, first_name, last_name, address1, address2, city, zip, phone_home, phone_business, phone_cell, phone_other1, phone_other2, state, country, contact, county, notes, cc_brand, cc_number, cc_expiration, cc_name, ship_company_name, ship_name, ship_address1, ship_address2, ship_city, ship_state, ship_country, ship_zip, ship_contact, ship_area, ship_phone, att_sale, last_invoice, last_letter_sent, entry_date, total_sows, total_boars, facility, sows, boars, frequency, system, feeder, finish, rep_glits, notes1, notes2, notes3, notes4', 'required'),
			array('zip, cc_number, ship_zip, last_invoice, total_sows, total_boars, sows, boars', 'numerical', 'integerOnly'=>true),
			array('entry_date, att_sale, last_letter_sent','date','format'=>'yyyy-mm-dd'),
			array('company_name, first_name, last_name, address1, address2', 'length', 'max'=>255),
			array('city, phone_home, phone_business, phone_cell, phone_other1, phone_other2, contact, county, cc_brand, cc_name, ship_company_name, ship_name, ship_city, ship_country, ship_contact, ship_area, mailing_code, herdmark, facility, frequency', 'length', 'max'=>50),
			array('rep_glits', 'length', 'max'=>60),
			array('state', 'length', 'max'=>30),
			array('country, ship_phone', 'length', 'max'=>20),
			array('cc_expiration', 'length', 'max'=>6),
			array('ship_address1, ship_address2', 'length', 'max'=>100),
			array('ship_state', 'length', 'max'=>10),
			array('system, feeder, finish', 'length', 'max'=>40),
			//array('language','in','range'=>array('en','fr','zn'),'allowEmpty'=>false),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('company_name, first_name, last_name, phone_home, phone_business, phone_cell, phone_other1, phone_other2, address1, address2, city, zip,  state, country, contact, county, notes, cc_brand, cc_number, cc_expiration, cc_name, ship_company_name, ship_name, ship_address1, ship_address2, ship_city, ship_state, ship_country, ship_zip, ship_contact, ship_area, ship_phone, att_sale, mailing_code, last_invoice, last_letter_sent, entry_date, herdmark, total_sows, total_boars, facility, sows, boars, frequency, system, feeder, finish, rep_glits, notes1, notes2, notes3, notes4, modified_date', 'safe', 'on'=>'search'),
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
			'company_name' => 'Company Name',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'address1' => 'Address 1',
			'address2' => 'Address 2',
			'city' => 'City',
			'zip' => 'Zipcode',
			'phone_home' => 'Home Phone',
			'phone_business' => 'Business Phone',
			'phone_cell' => 'Cell Phone',
			'phone_other1' => 'Phone Other1',
			'phone_other2' => 'Phone Other2',
			'state' => 'State',
			'country' => 'Country',
			'contact' => 'Contact',
			'county' => 'County/Area',
			'notes' => 'Notes',
			'cc_brand' => 'Credit Card Brand',
			'cc_number' => 'Credit Card Number',
			'cc_expiration' => 'Credit Card Expiration',
			'cc_name' => 'Name on Card',
			'ship_company_name' => 'Company Name',
			'ship_name' => 'Name',
			'ship_address1' => 'Address1',
			'ship_address2' => 'Address2',
			'ship_city' => 'City',
			'ship_state' => 'State',
			'ship_country' => 'Country',
			'ship_zip' => 'Zip',
			'ship_contact' => 'Contact',
			'ship_area' => 'County/Area',
			'ship_phone' => 'Phone',
			'att_sale' => 'Att Sale',
			'mailing_code' => 'Mailing Codes',
			'last_invoice' => 'Last Invoice #',
			'last_letter_sent' => 'Last Letter Sent',
			'entry_date' => 'Entry Date',
			'herdmark' => 'Herdmark',
			'total_sows' => 'Total Sows',
			'total_boars' => 'Total Boars',
			'facility' => 'Facility',
			'sows' => 'Sows/Brdg',
			'boars' => 'Boars/Brdg',
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
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('zip',$this->zip);
		$criteria->compare('CONCAT(phone_home, \' \', phone_business, \' \', phone_cell, \' \', phone_other1, \' \', phone_other2)',$this->phone_home,true);
		//$criteria->compare('phone_home',$this->phone_home,true);
		$criteria->compare('phone_business',$this->phone_business,true);
		$criteria->compare('phone_cell',$this->phone_cell,true);
		$criteria->compare('phone_other1',$this->phone_other1,true);
		$criteria->compare('phone_other2',$this->phone_other2,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('contact',$this->contact,true);
		$criteria->compare('county',$this->county,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('cc_brand',$this->cc_brand,true);
		$criteria->compare('cc_number',$this->cc_number);
		$criteria->compare('cc_expiration',$this->cc_expiration,true);
		$criteria->compare('cc_name',$this->cc_name,true);
		$criteria->compare('ship_company_name',$this->ship_company_name,true);
		$criteria->compare('ship_name',$this->ship_name,true);
		$criteria->compare('ship_address1',$this->ship_address1,true);
		$criteria->compare('ship_address2',$this->ship_address2,true);
		$criteria->compare('ship_city',$this->ship_city,true);
		$criteria->compare('ship_state',$this->ship_state,true);
		$criteria->compare('ship_country',$this->ship_country,true);
		$criteria->compare('ship_zip',$this->ship_zip);
		$criteria->compare('ship_contact',$this->ship_contact,true);
		$criteria->compare('ship_area',$this->ship_area,true);
		$criteria->compare('ship_phone',$this->ship_phone,true);
		$criteria->compare('att_sale',$this->att_sale,true);
		$criteria->compare('mailing_code',$this->mailing_code,true);
		$criteria->compare('last_invoice',$this->last_invoice);
		$criteria->compare('last_letter_sent',$this->last_letter_sent,true);
		$criteria->compare('entry_date',$this->entry_date,true);
		$criteria->compare('herdmark',$this->herdmark,true);
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