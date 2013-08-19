<?php

/**
 * This is the model class for table "tbl_herd_setup".
 *
 * The followings are the available columns in table 'tbl_herd_setup':
 * @property integer $herd_id
 * @property string $farm_herd
 * @property string $breeder_name
 * @property string $farm_name
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property integer $zip
 * @property string $phone
 * @property integer $breeder_number
 * @property string $breeder_herd_mark
 * @property string $home_country
 * @property string $breed
 * @property string $is_weight
 * @property string $breeder_no
 * @property string $weighted
 * @property string $is_hog_tag
 * @property string $hog_numbering
 * @property integer $passover_days
 * @property integer $due_days
 * @property string $take_boars_gilts
 * @property string $take_sow_scores
 * @property integer $spring_start
 * @property integer $spring_end
 * @property string $spring_letter
 * @property integer $fall_start
 * @property integer $fall_end
 * @property string $fall_letter
 * @property string $shift_year
 * @property string $take_weaned_date
 * @property string $take_deffects
 * @property string $prev_herd_mark
 * @property string $fax
 * @property string $date_modified
 */
class TblHerdSetup extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TblHerdSetup the static model class
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
		return 'tbl_herd_setup';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('farm_herd, breeder_name, farm_name, address1, address2, city, state, zip, phone, breeder_number, breeder_herd_mark, home_country, breed, is_weight, breeder_no, weighted, is_hog_tag, hog_numbering, passover_days, due_days, take_boars_gilts, take_sow_scores, spring_start, spring_end, spring_letter, fall_start, fall_end, fall_letter, shift_year, take_weaned_date, take_deffects, prev_herd_mark, fax, date_modified', 'required'),
			array('zip, breeder_number, passover_days, due_days, spring_start, spring_end, fall_start, fall_end', 'numerical', 'integerOnly'=>true),
			array('farm_herd', 'length', 'max'=>2),
			array('breeder_name, farm_name, city, state', 'length', 'max'=>50),
			array('address1, address2', 'length', 'max'=>100),
			array('phone', 'length', 'max'=>25),
			array('breeder_herd_mark, prev_herd_mark', 'length', 'max'=>10),
			array('home_country, breed, breeder_no, spring_letter, fall_letter, shift_year', 'length', 'max'=>1),
			array('fax', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('herd_id, farm_herd, breeder_name, farm_name, address1, address2, city, state, zip, phone, breeder_number, breeder_herd_mark, home_country, breed, is_weight, breeder_no, weighted, is_hog_tag, hog_numbering, passover_days, due_days, take_boars_gilts, take_sow_scores, spring_start, spring_end, spring_letter, fall_start, fall_end, fall_letter, shift_year, take_weaned_date, take_deffects, prev_herd_mark, fax, date_modified', 'safe', 'on'=>'search'),
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
			'herd_id' => 'Herd',
			'farm_herd' => 'Farm Herd',
			'breeder_name' => 'Breeder Name',
			'farm_name' => 'Farm Name',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'city' => 'City',
			'state' => 'State',
			'zip' => 'Zip',
			'phone' => 'Phone',
			'breeder_number' => 'Breeder Number',
			'breeder_herd_mark' => 'Breeder Herd Mark',
			'home_country' => 'Home Country',
			'breed' => 'Breed',
			'is_weight' => 'Is Weight',
			'breeder_no' => 'Breeder No',
			'weighted' => 'Weighted',
			'is_hog_tag' => 'Is Hog Tag',
			'hog_numbering' => 'Hog Numbering',
			'passover_days' => 'Passover Days',
			'due_days' => 'Due Days',
			'take_boars_gilts' => 'Take Boars Gilts',
			'take_sow_scores' => 'Take Sow Scores',
			'spring_start' => 'Spring Start',
			'spring_end' => 'Spring End',
			'spring_letter' => 'Spring Letter',
			'fall_start' => 'Fall Start',
			'fall_end' => 'Fall End',
			'fall_letter' => 'Fall Letter',
			'shift_year' => 'Shift Year',
			'take_weaned_date' => 'Take Weaned Date',
			'take_deffects' => 'Take Deffects',
			'prev_herd_mark' => 'Prev Herd Mark',
			'fax' => 'Fax',
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

		$criteria->compare('herd_id',$this->herd_id);
		$criteria->compare('farm_herd',$this->farm_herd,true);
		$criteria->compare('breeder_name',$this->breeder_name,true);
		$criteria->compare('farm_name',$this->farm_name,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('zip',$this->zip);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('breeder_number',$this->breeder_number);
		$criteria->compare('breeder_herd_mark',$this->breeder_herd_mark,true);
		$criteria->compare('home_country',$this->home_country,true);
		$criteria->compare('breed',$this->breed,true);
		$criteria->compare('is_weight',$this->is_weight,true);
		$criteria->compare('breeder_no',$this->breeder_no,true);
		$criteria->compare('weighted',$this->weighted,true);
		$criteria->compare('is_hog_tag',$this->is_hog_tag,true);
		$criteria->compare('hog_numbering',$this->hog_numbering,true);
		$criteria->compare('passover_days',$this->passover_days);
		$criteria->compare('due_days',$this->due_days);
		$criteria->compare('take_boars_gilts',$this->take_boars_gilts,true);
		$criteria->compare('take_sow_scores',$this->take_sow_scores,true);
		$criteria->compare('spring_start',$this->spring_start);
		$criteria->compare('spring_end',$this->spring_end);
		$criteria->compare('spring_letter',$this->spring_letter,true);
		$criteria->compare('fall_start',$this->fall_start);
		$criteria->compare('fall_end',$this->fall_end);
		$criteria->compare('fall_letter',$this->fall_letter,true);
		$criteria->compare('shift_year',$this->shift_year,true);
		$criteria->compare('take_weaned_date',$this->take_weaned_date,true);
		$criteria->compare('take_deffects',$this->take_deffects,true);
		$criteria->compare('prev_herd_mark',$this->prev_herd_mark,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}