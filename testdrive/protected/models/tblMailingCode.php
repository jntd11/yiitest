<?php

/**
 * This is the model class for table "tbl_mailing_code".
 *
 * The followings are the available columns in table 'tbl_mailing_code':
 * @property integer $mailing_code_id
 * @property string $mailing_code_label
 * @property string $mailing_code_desc
 */
class tblMailingCode extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return tblMailingCode the static model class
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
		return 'tbl_mailing_code';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mailing_code_label, mailing_code_desc', 'required'),
			array('mailing_code_label', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('mailing_code_id, mailing_code_label, mailing_code_desc', 'safe', 'on'=>'search'),
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
			'mailing_code_id' => 'Mailing Code',
			'mailing_code_label' => 'Mailing Code Label',
			'mailing_code_desc' => 'Mailing Code Desc',
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

		$criteria->compare('mailing_code_id',$this->mailing_code_id);
		$criteria->compare('mailing_code_label',$this->mailing_code_label,true);
		$criteria->compare('mailing_code_desc',$this->mailing_code_desc,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}