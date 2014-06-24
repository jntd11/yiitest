<?php

/**
 * This is the model class for table "sow_gilts".
 *
 * The followings are the available columns in table 'sow_gilts':
 * @property integer $sow_gilts_id
 * @property string $date_bred
 * @property string $sire_ear_notch
 * @property string $service_type
 * @property string $sow_ear_notch
 * @property string $misc
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

	public $ear_tag;
	public $sire_ear_tag;
	public $sow_ear_tag;
	public $ear_notch;

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
		return 'breeding';
	}


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sow_ear_notch, date_bred, sire_ear_notch, passover_date, due_date, days_between, settled, farrowed', 'required'),
			array('date_bred, passover_date, due_date, days_between', 'length', 'max'=>10),
			array('sire_ear_notch, sow_ear_notch', 'length', 'max'=>20),
			array('service_type, misc', 'length', 'max'=>5),
			array('settled, farrowed', 'length', 'max'=>1),
			array('comments', 'length', 'max'=>2000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('sow_gilts_id,  sow_ear_notch, date_bred, sire_ear_notch, service_type, misc, passover_date, due_date, days_between, comments, settled, farrowed, date_modified, ear_tag, ear_notch, sire_ear_tag,sow_ear_tag', 'safe', 'on'=>'search'),
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
		  /*  'SowBoar'=>array(self::BELONGS_TO,'SowBoar','','on'=>('herd.ear_notch = sow_ear_notch OR herd.ear_notch = sire_ear_notch'),'alias'=>'herd',
					'select'=>array('ear_notch','ear_tag','ear_tag as sire_ear_tag')), */
/* 			'sireeartag'=>array(self::HAS_ONE,'SowBoar','','on'=>('herd.ear_notch = sire_ear_notch'),'alias'=>'herd',
					'select'=>array('ear_notch','ear_tag','ear_tag as sire_ear_tag')),
			'soweartag'=>array(self::HAS_ONE,'SowBoar','','on'=>('herd.ear_notch = sow_ear_notch'),'alias'=>'herd',
						'select'=>array('ear_notch','ear_tag','ear_tag as sow_ear_notch')),
 */		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		$hogtag = Yii::app()->request->cookies['hog_tag'];
		return array(
			'sow_gilts_id' => 'Sow Gilts',
			'sow_ear_notch' => 'Sow Ear Notch',
			'sow_ear_tag'=>'Sow Ear Tag',
			'sire_ear_tag' => 'Sire Ear Tag',
			'date_bred' => 'Date Bred',
			'sire_ear_notch' => 'Sire Ear Notch',
			'service_type' => 'Svc Type',
			'misc' => 'Misc',
			'comments' => 'Comments',
			'passover_date' => 'Pass Date',
			'due_date' => 'Due Date',
			'days_between' => 'Days Btwn',
			'settled' => 'Settled',
			'sow_ear_tag'=>'sow ear tag',
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
		/* $criteria->with = array('SowBoar');
		if(!empty($this->sire_ear_tag)){
			$criteria->compare('ear_tag', $this->sire_ear_tag, true );
		}elseif(!empty($this->sow_ear_tag)){
			$criteria->compare('ear_tag', $this->sow_ear_tag, true );
		} */
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
		$pages = (isset($_REQUEST['pages']))?$_REQUEST['pages']:20;
		$SowGilts_sort = isset($_REQUEST['SowGilts_sort'])?$_REQUEST['SowGilts_sort']:"";
		$farmHerd = Yii::app()->request->cookies['farm_herd'];
		$criteria->compare('sow_ear_notch',$farmHerd,true);

		//$criteria->condition = " sow_ear_notch like '".$farmHerd."%'";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
				'pagination'=>array('pagesize'=>$pages,'params'=>array('pages'=>$pages,'SowGilts_sort'=>$SowGilts_sort)),
				'sort'=>array(
						'defaultOrder'=>"STR_TO_DATE( due_date, '%m/%d/%Y' ) DESC" ,
						'params'=>array('pages'=>$pages),
						'attributes'=>array(
								'sow_ear_tag'=>array(
										'asc'=>'sow_ear_tag',
										'desc'=>'sow_ear_tag DESC',
								),
								'sire_ear_tag'=>array(
										'asc'=>'sire_ear_tag',
										'desc'=>'sire_ear_tag DESC',
								),
								'*',
						),
				),
		));
	}
}