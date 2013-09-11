<?php

/**
 * This is the model class for table "sow_boar".
 *
 * The followings are the available columns in table 'sow_boar':
 * @property string $ear_notch
 * @property string $sow_boar_name
 * @property integer $sow_boar_id
 * @property string $registeration_no
 * @property string $born
 * @property integer $no_pigs
 * @property integer $weight_21
 * @property string $sire_notch
 * @property string $dam_notch
 * @property string $bred_date
 * @property integer $last_parity
 * @property string $sold_mmddyy
 * @property string $reason_sold
 * @property string $offspring_name
 * @property double $back_fat
 * @property double $loinneye
 * @property integer $days
 * @property double $EBV
 * @property string $sire_initials
 * @property string $comments
 * @property string $date_modified
 */
class SowBoar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SowBoar the static model class
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
		return 'sow_boar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ear_notch, sow_boar_name', 'required'),
			array('no_pigs, weight_21, last_parity, days', 'numerical', 'integerOnly'=>true),
			array('back_fat, loinneye, EBV', 'numerical'),
			array('ear_notch, registeration_no, sire_notch, dam_notch, bred_date, sold_mmddyy, reason_sold, offspring_name', 'length', 'max'=>20),
			array('sow_boar_name', 'length', 'max'=>30),
			array('sire_initials', 'length', 'max'=>2),
			array('ear_notch','validateEarNotch'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ear_notch, sow_boar_name, sow_boar_id, registeration_no, born, no_pigs, weight_21, sire_notch, dam_notch, bred_date, last_parity, sold_mmddyy, reason_sold, offspring_name, back_fat, loinneye, days, EBV, sire_initials, comments, date_modified', 'safe', 'on'=>'search'),
		);
	}
	
	public function validateEarNotch($attribute,$params)
	{
		//$farmHerd = Yii::app()->request->cookies['farm_herd']." ";
	    $pattern = '/^([0-9][A-Z]) [a-z]+ [0-9]+[ SFsf][0-9]+[-.][0-9]+$/i';
	    $herds = $this->getHerd();
	    if(!preg_match($pattern, $this->$attribute,$matches)){
	       $this->addError($attribute, 'Sow/Boar Ear Notch is not in correct format!');
	    }
	    if(!in_array($matches[1], $herds)){
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
			'ear_notch' => 'Sow/Boar Ear Notch',
			'sow_boar_name' => 'Sow/Boar Name',
			'sow_boar_id' => 'Sow Boar',
			'registeration_no' => 'Registeration #',
			'born' => 'Born MMDDYY',
			'no_pigs' => '# Pigs In Litter',
			'weight_21' => '21 Days Weight',
			'sire_notch' => 'Sire Ear Notch',
			'dam_notch' => 'Dam Ear Notch',
			'bred_date' => 'Bred MMDDYY/Boar',
			'last_parity' => 'Last Parity',
			'sold_mmddyy' => 'Sold MMDDYY',
			'reason_sold' => 'Reason Sold',
			'offspring_name' => 'Offspring Name',
			'back_fat' => 'Back Fat',
			'loinneye' => 'Loinneye',
			'days' => 'Days to 230',
			'EBV' => 'EBV',
			'sire_initials' => 'Sire Reg Initials',
			'comments' => 'Comments',
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
		$criteria->compare('ear_notch',$this->ear_notch,true);
		$criteria->compare('sow_boar_name',$this->sow_boar_name,true);
		$criteria->compare('sow_boar_id',$this->sow_boar_id);
		$criteria->compare('registeration_no',$this->registeration_no,true);
		$criteria->compare('born',$this->born,true);
		$criteria->compare('no_pigs',$this->no_pigs);
		$criteria->compare('weight_21',$this->weight_21);
		$criteria->compare('sire_notch',$this->sire_notch,true);
		$criteria->compare('dam_notch',$this->dam_notch,true);
		$criteria->compare('bred_date',$this->bred_date,true);
		$criteria->compare('last_parity',$this->last_parity);
		$criteria->compare('sold_mmddyy',$this->sold_mmddyy,true);
		$criteria->compare('reason_sold',$this->reason_sold,true);
		$criteria->compare('offspring_name',$this->offspring_name,true);
		$criteria->compare('back_fat',$this->back_fat);
		$criteria->compare('loinneye',$this->loinneye);
		$criteria->compare('days',$this->days);
		$criteria->compare('EBV',$this->EBV);
		$criteria->compare('sire_initials',$this->sire_initials,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getHerd(){
		$qu = "select farm_herd from tbl_herd_setup";
		$cmd = YII::app()->db->createCommand($qu);
		return $res = $cmd->queryColumn();
	}
	
}