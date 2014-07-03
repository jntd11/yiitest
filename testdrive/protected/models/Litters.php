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
	public $ear_tag;
	public $sire_ear_tag;
	public $sow_ear_tag;

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
					no_boars_alive, gilts_alive, birth_wgt, pigs_transfer, weaned_males, weaned_females, no_pigs_weighted,weighing_age,actual_weight,wgt_21', 'numerical', 'integerOnly'=>true),
			array('pigs_transfer, weaned_males, weaned_females,no_pigs_weighted,weighing_age','length','max'=>2),
		     array('defect_count1,defect_count2,defect_count3,defect_count4,defect_count5,defect_count6,defect_count7,defect_count8,defect_count9,defect_count10',
		     		'numerical', 'integerOnly'=>true),
			array('actual_weight,wgt_21, defect_code1, defect_count1, defect_code2,defect_code3,defect_code4,defect_code5,
					defect_code6,defect_code7, defect_code8,defect_code9,defect_code10,','length','max'=>3),
			array('sire_ear_notch, date_bred, weighted_date, weaned_date', 'length', 'max'=>50),
			array('farrowed_date','length','max'=>20),
			array('sow_ear_notch','length','max'=>50),
			array('comments','length','max'=>10000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('litters_id, sow_ear_notch, date_bred, sire_ear_notch, sow_parity, times_settle, herd_litter, no_pigs, no_born_alive,
					no_boars_alive, gilts_alive, birth_wgt, comments, date_modified, farrowed_date, weighted_date, weaned_date, sow_ear_tag,sire_ear_tag ', 'safe', 'on'=>'search'),
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
				/* 'SowBoar'=>array(self::HAS_ONE,'SowBoar','','on'=>('herd.ear_notch = sow_ear_notch'),'alias'=>'herd',
						'select'=>array('ear_notch','ear_tag'),'joinType'=>' INNER JOIN ') */
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
			'sow_ear_tag'=>'Sow Ear Tag',
			'date_bred' => 'Date Breds',
			'due_date' => 'Due Date',
			'sow_ear_tag'=>'Sow Ear Tag',
			'sire_ear_tag' => 'Sire Ear Tag',
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
			'wgt_21'=>'21 Day Weight',
			'date_modified' => 'Date Modified',
			'weighted_date'=>"Weighed Date",
		    'defect_code'=>'Defect:',
		    'defect_count'=>'#:',
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

		$criteria->select = "*, (select ear_tag from herd where ear_notch = sow_ear_notch) as sow_ear_tag,
		(select ear_tag from herd where ear_notch = sire_ear_notch) as sire_ear_tag ";
		if(!empty($this->sow_ear_tag)){
			$criteria->addCondition('sow_ear_notch in (select ear_notch from herd where ear_tag like "%'.$this->sow_ear_tag.'%")');
		}
		if(!empty($this->sire_ear_tag)){
			$criteria->addCondition('sire_ear_notch in (select ear_notch from herd where ear_tag like "%'.$this->sire_ear_tag.'%")');
		}
		$criteria->compare('litters_id',$this->litters_id);
		$criteria->compare('sire_ear_notch',$this->sire_ear_notch,true);
		$criteria->compare('replace(sow_ear_notch," ","")',str_replace(" ", "", $this->sow_ear_notch),true);
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
		$farmHerd = Yii::app()->request->cookies['farm_herd'];
		$criteria->compare('sow_ear_notch',$farmHerd,true);
		//$criteria->condition = " sow_ear_notch like '".$farmHerd."%'";

		$pages = (isset($_REQUEST['pages']))?$_REQUEST['pages']:20;

		$Litters_sort = isset($_REQUEST['Litters_sort'])?$_REQUEST['Litters_sort']:"";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array('pagesize'=>$pages,'params'=>array('pages'=>$pages,'Litters_sort'=>$Litters_sort)),
			'sort'=>array(
						'defaultOrder'=>"STR_TO_DATE( farrowed_date, '%m/%d/%Y' ) DESC" ,
						'params'=>array('pages'=>$pages),
						'attributes'=>array(
							'sow_ear_tag'=>array(
									'asc'=>'sow_ear_tag',
									'desc'=>'sow_ear_tag DESC',
							),
							'farrowed_date'=>array(
										'asc'=>"STR_TO_DATE( farrowed_date, '%m/%d/%Y')",
										'desc'=>"STR_TO_DATE( farrowed_date, '%m/%d/%Y') DESC",
							),
								'due_date'=>array(
										'asc'=>"STR_TO_DATE( due_date, '%m/%d/%Y')",
										'desc'=>"STR_TO_DATE( due_date, '%m/%d/%Y') DESC",
								),
							'*',
						),
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

		$criteria->select = "*, (select ear_tag from herd where ear_notch = sow_ear_notch) as sow_ear_tag,
		(select ear_tag from herd where ear_notch = sire_ear_notch) as sire_ear_tag ";

		if(!empty($this->sow_ear_tag)){
			$criteria->addCondition('sow_ear_notch in (select ear_notch from herd where ear_tag like "%'.$this->sow_ear_tag.'%")');
		}
		if(!empty($this->sire_ear_tag)){
			$criteria->addCondition('sire_ear_notch in (select ear_notch from herd where ear_tag like "%'.$this->sire_ear_tag.'%")');
		}

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
		$farmHerd = Yii::app()->request->cookies['farm_herd'];
		$criteria->condition = " sow_ear_notch like '".$farmHerd."%'";

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