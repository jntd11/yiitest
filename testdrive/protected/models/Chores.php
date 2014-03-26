<?php

/**
 * This is the model class for table "chores".
 *
 * The followings are the available columns in table 'chores':
 * @property integer $chores_id
 * @property string $date
 * @property string $farm_herd
 * @property string $description
 * @property string $comments
 * @property string $date_modified
 */
class Chores extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Chores the static model class
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
		return 'chores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, farm_herd, description, comments', 'required'),
			array('date', 'length', 'max'=>10),
			array('farm_herd', 'length', 'max'=>2),
			array('description', 'length', 'max'=>25),
			array('comments', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('chores_id, date, farm_herd, description, comments, date_modified', 'safe', 'on'=>'search'),
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
			'chores_id' => 'Chores',
			'date' => 'Date',
			'farm_herd' => 'Farm Herd',
			'description' => 'Description',
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

		$criteria->compare('chores_id',$this->chores_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('farm_herd',$this->farm_herd,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('date_modified',$this->date_modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}