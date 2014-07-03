<?php

class SowBoarController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	static $count = 0;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
			'rights', // perform access control for CRUD operations
		);
	}

	public function allowedActions() {
		return 'index, suggestedTags';
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','search','Siredam','AutocompleteEarNotch','AutocompleteName','AutocompleteRegister','AutocompleteBorn','AutocompletePigs','pedigree','checkEarTag','Autocompleteeartag','getEarNotch'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionPedigree($id)
	{
		if(isset($_GET['p']))
			Yii::app()->request->cookies['pedigree_parent'] = new CHttpCookie('pedigree_parent',$_GET['p'],array('expire'=>time()+(1*24*60*60)));
		$model=new SowBoar();
		//echo "<pre>";
		//$dataProvider=new CActiveDataProvider('SowBoar');
		//echo "<pre>";
		//$dataProvider = $model->findAll());
		//$sql = "select * from herd Limit 1";
		//$dataProvider = $model->findAllBySql($sql);
		//echo CHtml::openTag($this->itemsTagName,array('class'=>$this->itemsCssClass))."\n";

		//foreach ($data as $data1)
			//print_r($data1);
		/*if(($n=count($data))>0)
		{
			//$viewFile=$this->getViewFile($this->itemView);
			$j=0;
			foreach($data as $i=>$item)
			{
				//$data=$this->viewData;
				$data['index']=$i;
				$data['data']=$item;
				$data['widget']=$this;
				$owner->renderFile($viewFile,$data);
				if($j++ < $n-1)
					echo $this->separator;
			}
		}
		*/
		//$model = $this->loadModel($id);
		$model = $this->pedigree($id);
		$this->render('pedigree',array(
				'model'=> $model,
		));

	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new SowBoar;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SowBoar']))
		{
			$model->attributes=$_POST['SowBoar'];
			if($model->ear_notch != "")
		 		$model->ear_notch = $this->calculateYear($model->ear_notch);
			if($model->sire_notch != "")
				$model->sire_notch = $this->calculateYear($model->sire_notch);
			if($model->dam_notch != "")
				$model->dam_notch = $this->calculateYear($model->dam_notch);
			$model->comments = $_POST['SowBoar']['comments'];
			$model->ear_notch = trim($model->ear_notch);
			$model->sire_notch = trim($model->sire_notch);
			$model->dam_notch = trim($model->dam_notch);
			if($model->ear_tag != "" ) {
				$sql = "Update herd SET ear_tag = '' WHERE ear_tag = ".$model->ear_tag;
				$cmd = YII::app()->db->createCommand($sql);
				$cmd->query();
			}
		 	$model->save();
			if($model->save())
				if(!isset($_POST['savenew']))
					$this->redirect(array('admin'));
			    else
			    	$this->redirect(array('create'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionSearch($type=""){
		$model=new SowBoar;
		$criteria=new CDbCriteria;
		$res =array();
		$req = new CHttpRequest();
		$search = $req->getParam("s");
		$search = str_replace(".", "-", $search);
		$search = $this->calculateYear($search);
		if (isset($search) && $search != "") {
			if($type == "")
				$qtxt ="SELECT sow_boar_name FROM herd WHERE ear_notch LIKE :search";
			else
				$qtxt ="SELECT sold_mmddyy, reason_sold, sow_boar_id FROM  herd WHERE ear_notch LIKE :search";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":search", $search, PDO::PARAM_STR);
			if($type == "")
				$res =$command->queryColumn();
			else
				$res =$command->queryRow();
		}else
			$res ="";

		echo CJSON::encode($res);
		Yii::app()->end();
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		$sql = "select *,ear_tag as test from herd where replace(ear_notch,' ','') = '".str_replace(" ","",$this->calculateYear($model->sire_notch))."'";
		$sireeartag = SowBoar::model()->findBySql($sql);

		$sql = "select * from herd where ear_notch = '".$this->calculateYear($model->dam_notch)."'";
		$dameartag = SowBoar::model()->findBySql($sql);

		$model->ear_notch = $this->ChangeNotch($model->ear_notch);
		$model->dam_notch = $this->ChangeNotch($model->dam_notch);
		$model->sire_notch = $this->ChangeNotch($model->sire_notch);

		//$ear_notch_array =  preg_split("/ /", $model->ear_notch);
		//$ear_notch_array[2] = preg_replace("/[0-9][0-9]([0-9][0-9]) /", "$1", $ear_notch_array[2]);
		//$model->ear_notch = implode(" ", $ear_notch_array);
		$model->ear_notch = preg_replace("/[0-9][0-9]([0-9][0-9]) /", "$1 ", $model->ear_notch);


		$model->dam_notch = trim($model->dam_notch);
		$model->ear_notch = trim($model->ear_notch);
		$model->sire_notch = trim($model->sire_notch);
		$model->dam_notch = preg_replace("/^([0-9][A-Z])([^ ])/i", "$1 $2", $model->dam_notch);
		$model->ear_notch = preg_replace("/^([0-9][A-Z])([^ ])/i", "$1 $2", $model->ear_notch);
		$model->sire_notch = preg_replace("/^([0-9][A-Z])([^ ])/i", "$1 $2", $model->sire_notch);
		if($dameartag)
			$model->dam_ear_tag = $dameartag->ear_tag;
		if($sireeartag)
			$model->sire_ear_tag = $sireeartag->ear_tag;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SowBoar']))
		{
			$model->attributes=$_POST['SowBoar'];
			echo $model->dam_notch = trim($model->dam_notch);
			$model->ear_notch = trim($model->ear_notch);
			$model->sire_notch = trim($model->sire_notch);
			
			$model->born = $_POST['SowBoar']['born'];
			$model->comments = $_POST['SowBoar']['comments'];
			if($model->ear_notch != "")
		 		$model->ear_notch = $this->calculateYear($model->ear_notch);
		 	$model->sire_notch = str_replace(".", "-", $model->sire_notch);
		 	$model->dam_notch = str_replace(".", "-", $model->dam_notch);
		 	if(isset($_POST['SowBoar']['sire_ear_tag']) && !empty($_POST['SowBoar']['sire_ear_tag'])) {
		 		$sql = "UPDATE herd SET ear_tag = '".$_POST['SowBoar']['sire_ear_tag']."' WHERE ear_notch = '".$this->calculateYear($model->sire_notch,3)."'";
		 		$cmd = Yii::app()->db->createCommand($sql);
		 		$cmd->query();
		 	}
		 	
		 	if(isset($_POST['SowBoar']['dam_ear_tag']) && !empty($_POST['SowBoar']['dam_ear_tag'])) {
		 		echo $sql = "UPDATE herd SET ear_tag = '".$_POST['SowBoar']['dam_ear_tag']."' WHERE ear_notch =  '".$this->calculateYear($model->dam_notch,3)."'";
		 		$cmd = Yii::app()->db->createCommand($sql);
		 		$cmd->query();
		 	}
		 	if($model->sire_notch != "")
		 		$model->sire_notch = $this->calculateYear($model->sire_notch);
		 	if($model->dam_notch != "")
		 		$model->dam_notch = $this->calculateYear($model->dam_notch);
		 	
		 	if($model->ear_tag != "" ) {
		 		 $sql = "Update herd SET ear_tag = '' WHERE ear_tag = '".$model->ear_tag."'";
		 		$cmd = YII::app()->db->createCommand($sql);
		 		$cmd->query();
		 	}
exit;
			if($model->save()){
				if(isset($_POST['savenew']))
					$this->redirect(array('create'));
				else
					$this->redirect(array('update','id'=>$model->sow_boar_id));
				echo "Saved";
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('SowBoar');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SowBoar('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SowBoar']))
			$model->attributes=$_GET['SowBoar'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SowBoar the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SowBoar::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SowBoar $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sow-boar-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionSiredam($val){
		$val = str_replace(".","-",$val);
		$val = $this->calculateYear($val);
		$data=SowBoar::model()->find("ear_notch='".$val."'");
		header("Location: index.php?r=sowBoar/update&id=".$data->sow_boar_id);
		/*$this->render('update',array(
			'model'=>$this->loadModel($data->sow_boar_id),
		));*/
	}

	public function calculateYear($date,$type=1){
			$ear_notch_array =  preg_split("/ /", $date);

			$isPresent =  preg_match("/ ([0-9]+) /", $date,$matches);
			$isPresent1 =  preg_match("/[0-9][0-9][0-9][0-9] /", $date);
			if(!$isPresent){
				if(!$isPresent1){
					return $date;
				}
				else {
					$date = preg_replace("/([0-9][0-9][0-9][0-9] )/", " $1", $date);
					$ear_notch_array =  preg_split("/ /", $date);
					$isPresent =  preg_match("/ ([0-9]+) /", $date,$matches);
				}
			} else {
				$ear_notch_array[2] = $matches[1];
			}
			if(!isset($ear_notch_array[2]))
				return $date;
			$curr_year = date("y");
			$year = $ear_notch_array[2];
			$length = strlen($year);
			if($length > 2){
				$ear_notch_array[2] = preg_replace("/[0-9][0-9]([0-9][0-9])/", "$1", $ear_notch_array[2]);
				$year = $ear_notch_array[2];
				$length = strlen($year);
				//return $date;
			}
			if($type == 2){
				if($year+10 > $curr_year && $year <= $curr_year){
					$ear_notch_array[2] = $ear_notch_array[2] % 10;
				}else if($length < 2){
					$ear_notch_array[2] = "0".$ear_notch_array[2];
				}

				//return implode($ear_notch_array, " ");
				$date= str_replace(" ".$matches[1]." ", " ".$ear_notch_array[2]." ", $date,$count);
				$date = preg_replace("/^([0-9][A-Z])([^ ])/i", "$1 $2", $date);
				return $date;
			}
			//echo "$year <= $curr_year";
			if($year <= $curr_year){
				$rem = $curr_year%10;
				$quo = floor($curr_year/10);
				if($length == 1){
				  if($rem < $year)
					$ear_notch_array[2] = "20".($quo-1).$year;
				  else
				  	$ear_notch_array[2] = "20".($quo).$year;
				}else{
					$ear_notch_array[2] = "20".$year;
				}
			}else{
				$ear_notch_array[2] = "19".$year;
			}

			//echo implode($ear_notch_array, " ");			exit;

		$date= str_replace(" ".$matches[1]." ", " ".$ear_notch_array[2]." ", $date,$count);
		return $date;
		//return implode($ear_notch_array, " ");
	}

	public function actionAutocompleteEarNotch() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			//$term = preg_replace("/^([0-9][A-Z])([ ])/i", "$1",$_GET['term']);
			$term = $_GET['term'];
			$qtxt ="SELECT ear_notch FROM  herd WHERE replace(ear_notch,' ','') LIKE :username AND ear_notch like '".Yii::app()->request->cookies['farm_herd']."%'";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.str_replace(" ","",$term).'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actionAutocompleteName() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			 $qtxt ="SELECT sow_boar_name FROM  herd WHERE sow_boar_name LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function findNotches($group){
		$model = new SowBoar();
		foreach ($group as $key => $member) {
			//echo "COUNT".self::$count;
			self::$count++;
			$sql="select sow_boar_id, sire_notch, dam_notch from herd where ear_notch =  '".$group[$key]['notch']."'";
			$data1 = $model->findAllBySql($sql);
			if(isset($data1[0])) {
				$sql="select sow_boar_id, sow_boar_name, registeration_no from herd where ear_notch =  '".$data1[0]->sire_notch."'";
				//echo "---"."<br>".$sql;
				$name = $model->findBySql($sql);
				//echo "COUNT".self::$count;
				$subgroup[self::$count] = array("notch"=>$data1[0]->sire_notch,
						     "name"=>isset($name->sow_boar_name)?$name->sow_boar_name:"",
						     "no"=>isset($name->registeration_no)?$name->registeration_no:"",
							 "id"=>isset($name->sow_boar_id)?$name->sow_boar_id:"",
							//"data"=>$data1
						);
				$sql="select sow_boar_id, sow_boar_name, registeration_no from herd where ear_notch =  '".$data1[0]->dam_notch."'";
				//echo "---"."<br>".$sql;
				$name = $model->findBySql($sql);
				self::$count++;
				//echo "COUNT".self::$count;
				$subgroup[self::$count] = array("notch"=>$data1[0]->dam_notch,
						"name"=>(isset($name))?$name->sow_boar_name:"",
					     "no"=>(isset($name))?$name->registeration_no:"",
						 "id"=>(isset($name))?$name->sow_boar_id:"",
						//"data"=>$data1
				);
			}else{
				$subgroup[self::$count] = array("notch"=>"",
						"name"=>"",
						"no"=>"",
						"id"=>"",
						//"data"=>$data1
				);
				self::$count++;
				$subgroup[self::$count] = array("notch"=>"",
						"name"=>"",
						"no"=>"",
						"id"=>"",
						//"data"=>$data1
				);
			}
		}
		//echo "<pre>";
		//print_r($subgroup);
		return $subgroup;
	}
	public function pedigree($pk,$condition='',$params=array()){
		$model = new SowBoar();
		//Yii::trace(get_class($model).'.findByPk()','system.db.ar.CActiveRecord');
		//$data = $model->findAllBySql("select * from herd where sow_boar_id = ".$pk);
		$data1 = $model->findAllBySql("select * from herd where sow_boar_id = ".$pk);
		$data = $data1;
		$level = 0;
		if(!isset($data1[0]))
			return array();
		$group[$level] = array("notch"=>$data1[0]->ear_notch,
							"name"=>$data1[0]->sow_boar_name,
							"no"=>$data1[0]->registeration_no,
							"id"=>$data1[0]->sow_boar_id,
						);
		//Level Count
		$level = 1;
		self::$count++;
		$sql="select sow_boar_id, sow_boar_name, registeration_no from herd where ear_notch =  '".$data1[0]->sire_notch."'";
		$name = $model->findBySql($sql);
		$group[$level][self::$count] = array("notch"=>$data1[0]->sire_notch,
						"name"=>$name->sow_boar_name,
						"no"=>$name->registeration_no,
						"id"=>$name->sow_boar_id,
				//,"data"=>$data1
					);
		$sql="select sow_boar_id, sow_boar_name, registeration_no from herd where ear_notch =  '".$data1[0]->dam_notch."'";
		$name = null;
		$name = $model->findBySql($sql);
		//echo "<pre>";
		//print_r($name);
		self::$count++;
		$group[$level][self::$count] = array("notch"=>$data1[0]->dam_notch,
						"name"=>$name->sow_boar_name,
						"no"=>$name->registeration_no,
						"id"=>$name->sow_boar_id,
				//,"data"=>$data1
						);
		//echo "<pre>";
		//print_r($group);
		//exit;
		for($i=1;$i<=5;$i++) {
			self::$count = 0;
			//print_r($group[$level]);
			$subgroup = $this->findNotches($group[$level]);
			$level++;
			//echo "LEVEL".$level."<br>";
			//print_r($subgroup);
			$group[$level] = $subgroup;
		}
		//print_r($group);
		//exit;
		/*self::$count = 0;
		$subgroup = $this->findNotches($group[$level]);
		$level++;
		$group[$level] = $subgroup;
		self::$count = 0;
		$subgroup = $this->findNotches($group[$level]);
		$level++;
		$group[$level] = $subgroup;
		self::$count = 0;
		$subgroup = $this->findNotches($group[$level]);
		$level++;
		$group[$level] = $subgroup;
		self::$count = 0;
		$subgroup = $this->findNotches($group[$level]);
		$level++;
		$group[$level] = $subgroup;
		*/
		//echo "<pre>";
		//print_r($group);

		//$data3 = $model->findAllBySql("select * from herd where sow_boar_id = 4");
		//$data = array_merge($data1,$data2);
		/*echo "<pre>";
		echo count($data);
		$count = 0;
		foreach($data as $model1) {
			//print_r($model1->attributes);
			$a[$count]['main'] = $model1->ear_notch;
			$a[$count]['sire'] = $model1->sire_notch;
			$a[$count]['dam'] = $model1->dam_notch;
			$count++;
		}
		print_r($a);
		exit;
		*/
		//$prefix=$model->getTableAlias(true).'.';
		//$criteria=$model->getCommandBuilder()->createPkCriteria($model->getTableSchema(),$pk,$condition,$params,$prefix);
		return $group;
	}

	public function actionAutocompleteRegister() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			 $qtxt ="SELECT registeration_no FROM  herd WHERE registeration_no LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actionAutocompleteBorn() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			 $qtxt ="SELECT born FROM  herd WHERE born LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actionAutocompletePigs() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			 $qtxt ="SELECT no_pigs FROM  herd WHERE no_pigs LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actionAutocompleteeartag() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT ear_tag FROM  herd WHERE ear_tag LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actioncheckEarTag($id){
		$res =array();
		if (isset($_GET['tag']) && !empty($_GET['tag'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT ear_notch FROM  herd WHERE ear_tag LIKE :username and sow_boar_id <> ".$id;
			if(isset($_GET['type']) && $_GET['type'] == 2)
				$qtxt ="SELECT ear_notch FROM  herd WHERE ear_tag LIKE :username ";
			
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", ''.$_GET['tag'].'', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		if(count($res))
			echo $search = $this->calculateYear($res[0]);
		else
			echo 0;
		Yii::app()->end();
	}

	public function actiongetEarNotch(){
		if (isset($_GET['val'])) {
			$qtxt ="SELECT ear_notch FROM  herd WHERE ear_tag LIKE :username ";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", ''.$_GET['val'].'', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		if(count($res))
			echo $res[0];
		else
			echo 0;
		Yii::app()->end();
	}

	/*
	 * Common function to format Notch fields
	 */
	static public function ChangeNotch($notch) {
		$notch = preg_replace("/[ ]+/", " ", $notch);
		$notch = preg_replace("/\- /", "-", $notch);
		return $notch;

	}

}
