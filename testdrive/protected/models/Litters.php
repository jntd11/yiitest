<?php

/**
 * This is the model class for table "litters".
 *
 * The followings are the available columns in table 'litters':
 * @property integer $litters_id
 * @property string $sire_ear_notch
 * @property integer $sow_parity
 * @property integer $times_settle
 * @property integer $herd_litter
 * @property integer $no_pigs
 * @property integer $no_born_alive
 * @property integer $no_boars_alive
 * @property integer $gilts_alive
 * @property integer $birth_wgt
 * @property string $comments
 * @property string $farrowed_date
 * @property string $date_modified
 */
class Litters extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Litters the static model class
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
		return 'litters';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sire_ear_notch, sow_parity, times_settle, herd_litter', 'required'),
			array('sow_parity, times_settle, herd_litter, no_pigs, no_born_alive, 
					no_boars_alive, gilts_alive, birth_wgt, pigs_transfer, weaned_males, weaned_females, no_pigs_weighted,weighing_age,actual_weight,21_wgt', 'numerical', 'integerOnly'=>true),
			array('pigs_transfer, weaned_males, weaned_females,no_pigs_weighted,weighing_age','length','max'=>2),
			array('actual_weight,21_wgt','length','max'=>3),
			array('sire_ear_notch, date_bred', 'length', 'max'=>50),
			array('farrowed_date','length','max'=>20),
			array('sow_ear_notch','length','max'=>50),
			array('comments','length','max'=>10000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('litters_id, sow_ear_notch, date_bred, sire_ear_notch, sow_parity, times_settle, herd_litter, no_pigs, no_born_alive, no_boars_alive, gilts_alive, birth_wgt, comments, date_modified, farrowed_date', 'safe', 'on'=>'search'),
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
			'litters_id' => 'Litters',
			'sow_ear_notch' => 'Sow Ear Notch',
			'date_bred' => 'Date Bred',
			'due_date' => 'Due Date',
			'sire_ear_notch' => 'Sire Ear Notch',
			'sow_parity' => 'Sow Parity',
			'farrowed_date'=> 'Farrowed Date',
			'times_settle' => 'Times to Settle',
			'herd_litter' => 'Herd Litter',
			'no_pigs' => '# Pigs Born',
			'no_born_alive' => '# Born Alive',
			'no_boars_alive' => '# Boars Alive',
			'gilts_alive' => '# Gilts Alive',
			'birth_wgt' => 'Birth Wgt',
			'comments' => 'Comments',
			'pigs_transfer'=>'# After Transfer',
			'weaned_males'=>'# Weaned Males',
			'weaned_females'=>'# Weaned Females',
			'no_pigs_weighted'=>'# Pigs Weighed',
			'weighing_age'=>'Age',
				'actual_weight'=>'Actual Weight',
			'21_wgt'=>'21 Day Weight',
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
		$criteria->compare('litters_id',$this->litters_id);
		$criteria->compare('sire_ear_notch',$this->sire_ear_notch,true);
		$criteria->compare('sow_ear_notch',$this->sow_ear_notch,true);
		$criteria->compare('sow_parity',$this->sow_parity);
		$criteria->compare('times_settle',$this->times_settle);
		$criteria->compare('herd_litter',$this->herd_litter);
		$criteria->compare('no_pigs',$this->no_pigs);
		$criteria->compare('no_born_alive',$this->no_born_alive);
		$criteria->compare('no_boars_alive',$this->no_boars_alive);
		$criteria->compare('gilts_alive',$this->gilts_alive);
		$criteria->compare('birth_wgt',$this->birth_wgt);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('farrowed_date',$this->farrowed_date,true);
		$criteria->compare('weaned_date',$this->weaned_date,true);
		$criteria->compare('weighted_date',$this->weighted_date,true);
		
		$pages = (isset($_REQUEST['pages']))?$_REQUEST['pages']:20;
		
		$Litters_sort = isset($_REQUEST['Litters_sort'])?$_REQUEST['Litters_sort']:"";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pagesize'=>$pages,'params'=>array('pages'=>$pages,'Litters_sort'=>$Litters_sort)),
			'sort'=>array(
						'defaultOrder'=>"STR_TO_DATE( farrowed_date, '%m/%d/%Y' ) DESC" ,
						'params'=>array('pages'=>$pages)
			),
		));
	}
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function searchOld()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
	
		$criteria=new CDbCriteria;
	
		$criteria->compare('sow_gilts_id',$this->sow_gilts_id);
		$criteria->compare('date_bred',$this->date_bred,true);
		$criteria->compare('sow_ear_notch',$this->sow_ear_notch,true);
		$criteria->compare('sire_ear_notch',$this->sire_ear_notch,true);
		$criteria->compare('service_type',$this->service_type,true);
		$criteria->compare('misc',$this->misc,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('passover_date',$this->passover_date,true);
		$criteria->compare('due_date',$this->due_date,true);
		$criteria->compare('days_between',$this->days_between,true);
		$criteria->compare('settled',$this->settled,true);
		$criteria->compare('farrowed',$this->farrowed,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$pages = (isset($_REQUEST['pages']))?$_REQUEST['pages']:20;
		$Litters_sort = isset($_REQUEST['Litters_sort'])?$_REQUEST['Litters_sort']:"";
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array('pagesize'=>$pages,'params'=>array('pages'=>$pages,'Litters_sort'=>$Litters_sort)),
				'sort'=>array(
						'defaultOrder'=>"STR_TO_DATE( due_date, '%m/%d/%Y' ) DESC" ,
						'params'=>array('pages'=>$pages)
				),
		));
	}
}