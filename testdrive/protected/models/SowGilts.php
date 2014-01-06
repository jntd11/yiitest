<?php

/**
 * This is the model class for table "sow_gilts".
 *
 * The followings are the available columns in table 'sow_gilts':
 * @property integer $sow_gilts_id
 * @property string $date_bred
 * @property string $sire_ear_notch
 * @property string $service_type
 * @property string $comments
 * @property string $passover_date
 * @property string $due_date
 * @property string $days_between
 * @property string $settled
 * @property string $farrowed
 * @property string $date_modified
 */
class SowGilts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SowGilts the static model class
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
		return 'sow_gilts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_bred, sire_ear_notch, service_type, comments, passover_date, due_date, days_between, settled, farrowed, date_modified', 'required'),
			array('date_bred, passover_date, due_date, days_between', 'length', 'max'=>10),
			array('sire_ear_notch', 'length', 'max'=>20),
			array('service_type', 'length', 'max'=>5),
			array('settled, farrowed', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sow_gilts_id, date_bred, sire_ear_notch, service_type, comments, passover_date, due_date, days_between, settled, farrowed, date_modified', 'safe', 'on'=>'search'),
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
			'sow_gilts_id' => 'Sow Gilts',
			'date_bred' => 'Date Bred',
			'sire_ear_notch' => 'Sire Ear Notch',
			'service_type' => 'Service Type',
			'comments' => 'Comments',
			'passover_date' => 'Passover Date',
			'due_date' => 'Due Date',
			'days_between' => 'Days Between',
			'settled' => 'Settled',
			'farrowed' => 'Farrowed',
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

		$criteria->compare('sow_gilts_id',$this->sow_gilts_id);
		$criteria->compare('date_bred',$this->date_bred,true);
		$criteria->compare('sire_ear_notch',$this->sire_ear_notch,true);
		$criteria->compare('service_type',$this->service_type,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('passover_date',$this->passover_date,true);
		$criteria->compare('due_date',$this->due_date,true);
		$criteria->compare('days_between',$this->days_between,true);
		$criteria->compare('settled',$this->settled,true);
		$criteria->compare('farrowed',$this->farrowed,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}