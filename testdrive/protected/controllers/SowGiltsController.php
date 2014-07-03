<?php

class SowGiltsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
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
				'actions'=>array('index','view','AutocompleteEarNotch','Checksolddate','Checkexist','AutocompleteSireNotch','getdaysbtw','autocompleteSow','autocompleteDateBred','autocompleteSire','autocompleteService',
						'autocompleteComments','autocompletePass','autocompleteDue','autocompleteDays','CheckFarrowed'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new SowGilts;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SowGilts']))
		{


			$model->attributes=$_POST['SowGilts'];
			$autoChoresModel = new AutoChores();

			$farm = preg_match("/^[0-9][a-z]/i",$model->sow_ear_notch,$match);
			$qtxt ="SELECT * FROM  auto_chores WHERE generated_by = 'B' AND (farm_herd = '".$match[0]."' OR farm_herd = 'A') AND disabled = 'N'";
			$command =Yii::app()->db->createCommand($qtxt);
			$res =$command->queryAll();

			if(isset($_POST['sire_ear_tag']) && !empty($_POST['sire_ear_tag'])) {
				$sql = "UPDATE herd SET ear_tag = '".$_POST['sire_ear_tag']."' WHERE ear_notch = '".$this->calculateYear($model->sire_ear_notch)."'";
				$cmd = Yii::app()->db->createCommand($sql);
				$cmd->query();
			}

			if(isset($_POST['sow_ear_tag']) && !empty($_POST['sow_ear_tag'])) {
				$sql = "UPDATE herd SET ear_tag = '".$_POST['sow_ear_tag']."' WHERE ear_notch=  '".$this->calculateYear($model->sow_ear_notch)."'";
				$cmd = Yii::app()->db->createCommand($sql);
				$cmd->query();
			}


			//print_r($res);
			foreach ($res as $recCount=>$record) {
			     $choresModel = new Chores();
    			 $choresModel->description = $record['description'];
    			 $choresModel->farm_herd = $match[0];
    			 $choresModel->comments = $model->sow_ear_notch;
    			 $choresModel->date = date("m/d/Y",strtotime($model->date_bred)+($record['days_after'] * 24 * 3600));
    			 $currentdate = $choresModel->date;
    			 //$choresModel->date_modified = 'CURRENT_TIMESTAMP';
    			 if(!$choresModel->save()) {
    			  print_r($choresModel->errors);
    			  echo "Error";
    			 }
 			  for($i=2;$i <= $record['times_occur'];$i++) {
 			   $choresModel->setIsNewRecord(true);
 			   $choresModel->chores_id = NULL;
 			        $choresModel->date = date("m/d/Y",strtotime($choresModel->date)+($record['days_between'] * 24 * 3600));
 			        if(!$choresModel->save()) {
 			         print_r($choresModel->errors);
 			         echo "Error".$i;
 			        }
			  }
			}
			if($model->save()){
				$query = "Update herd SET bred_date = '".date("Ymd",strtotime($model->date_bred)) ."' WHERE ear_notch = '".$model->sow_ear_notch."' AND bred_date < '".date("Ymd",strtotime($model->date_bred)) ."'";
				$command =Yii::app()->db->createCommand($query);
				$command->query();
				if(!isset($_POST['savenew']))
					$this->redirect(array('admin'));
				else
					$this->redirect(array('create'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$soweartag = SowBoar::model()->findBySql("select * from herd where ear_notch = '".$this->calculateYear($model->sow_ear_notch)."'");
		$sireeartag = SowBoar::model()->findBySql("select * from herd where ear_notch = '".$this->calculateYear($model->sire_ear_notch)."'");


		$model->sow_ear_notch = preg_replace("/[0-9][0-9]([0-9][0-9]) /", "$1 ", $model->sow_ear_notch);
		$model->sire_ear_notch = preg_replace("/[0-9][0-9]([0-9][0-9]) /", "$1 ", $model->sire_ear_notch);

		$model->sow_ear_notch = $this->calculateYear($model->sow_ear_notch);
		$model->sire_ear_notch = $this->calculateYear($model->sire_ear_notch);

		//$model->sow_ear_notch = preg_replace("/^([0-9][A-Z])([^ ])/i", "$1 $2", $model->sow_ear_notch);
		//$model->sire_ear_notch = preg_replace("/^([0-9][A-Z])([^ ])/i", "$1 $2", $model->sire_ear_notch);
		if($soweartag)
			$model->sow_ear_tag = $soweartag->ear_tag;
		if($sireeartag)
			$model->sire_ear_tag = $sireeartag->ear_tag;
		$model->sow_ear_notch = $this->ChangeNotch($model->sow_ear_notch);
		$model->sire_ear_notch = $this->ChangeNotch($model->sire_ear_notch);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SowGilts']))
		{
		    $orgDate = $model->date_bred;
			$model->attributes=$_POST['SowGilts'];
			$autoChoresModel = new AutoChores();
			if(isset($_POST['SowGilts']['sire_ear_tag']) && !empty($_POST['SowGilts']['sire_ear_tag'])) {
				$sql = "UPDATE herd SET ear_tag = '".$_POST['SowGilts']['sire_ear_tag']."' WHERE ear_notch = '".$this->calculateYear($model->sire_ear_notch)."'";
				$cmd = Yii::app()->db->createCommand($sql);
				$cmd->query();
			}

			if(isset($_POST['SowGilts']['sow_ear_tag']) && !empty($_POST['SowGilts']['sow_ear_tag'])) {
				$sql = "UPDATE herd SET ear_tag = '".$_POST['SowGilts']['sow_ear_tag']."' WHERE ear_notch =  '".$this->calculateYear($model->sow_ear_notch)."'";
				$cmd = Yii::app()->db->createCommand($sql);
				$cmd->query();
			}
			$farm = preg_match("/^[0-9][a-z]/i",$model->sow_ear_notch,$match);
			if($model->save()) {
			    //Auto chores
			    if($orgDate != $model->date_bred) {
          			   $qtxt ="DELETE chores from chores JOIN auto_chores ON (chores.description =auto_chores.description)
          			        WHERE date = '".$orgDate."' and comments ='".$model->sow_ear_notch."' and auto_chores.generated_by = 'B'";
          			   $command =Yii::app()->db->createCommand($qtxt);
          			   $res =$command->query();
          			   //New Chores Generation
          			   $qtxt ="SELECT * FROM  auto_chores WHERE generated_by = 'B' AND (farm_herd = '".$match[0]."' OR farm_herd = 'A') AND disabled = 'N'";
          			   $command =Yii::app()->db->createCommand($qtxt);
          			   $res =$command->queryAll();
          			   //print_r($res);
          			   foreach ($res as $recCount=>$record) {
          			    $choresModel = new Chores();
          			    $choresModel->description = $record['description'];
          			    $choresModel->farm_herd = $match[0];
          			    $choresModel->comments = $model->sow_ear_notch;
          			    $choresModel->date = date("m/d/Y",strtotime($model->date_bred)+($record['days_after'] * 24 * 3600));
          			    $currentdate = $choresModel->date;
          			    //$choresModel->date_modified = 'CURRENT_TIMESTAMP';
          			    if(!$choresModel->save()) {
          			     print_r($choresModel->errors);
          			     echo "Error";
          			    }
          			    for($i=2;$i <= $record['times_occur'];$i++) {
          			     $choresModel->setIsNewRecord(true);
          			     $choresModel->chores_id = NULL;
          			     $choresModel->date = date("m/d/Y",strtotime($choresModel->date)+($record['days_between'] * 24 * 3600));
          			     if(!$choresModel->save()) {
          			      print_r($choresModel->errors);
          			      echo "Error".$i;
          			     }
          			    }
          			   }

			    }
				if(isset($_POST['savenew']))
					$this->redirect(array('create'));
				else
					$this->redirect(array('update','id'=>$model->sow_gilts_id));
				//$this->redirect(array('view','id'=>$model->sow_gilts_id));
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
		$dataProvider=new CActiveDataProvider('SowGilts');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SowGilts('search');
		//$model1 = $model->with('SowBoar')->findAll();
		//print_r($model);
		//print_r($model1['sow_ear_notch']->ear_notch);
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SowGilts']))
			$model->attributes=$_GET['SowGilts'];
		$sort = new CSort();
		$sort->attributes  = array(
						'desc'=>'due_date'
		);
		$this->render('admin',array(
			'model'=>$model,
			'sort'=>$sort,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SowGilts the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SowGilts::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SowGilts $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sow-gilts-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAutocompleteEarNotch() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT ear_notch FROM  herd WHERE replace(ear_notch,' ','') LIKE :username and bred_date != 'BOAR'" ;
			$command =Yii::app()->db->createCommand($qtxt);
			$term = str_replace(" ", "", $_GET['term']);
			$command->bindValue(":username", '%'.$term.'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actionAutocompleteSireNotch() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT ear_notch FROM  herd WHERE replace(ear_notch,' ','') LIKE :username and bred_date = 'BOAR'";
			$command =Yii::app()->db->createCommand($qtxt);
			$term = str_replace(" ", "", $_GET['term']);
			$command->bindValue(":username", '%'.$term.'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actionChecksolddate() {
		$res =array();
		if (isset($_GET['s'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			if($_GET['type'] == 2)
				$qtxt ="SELECT sold_mmddyy  FROM  herd WHERE ear_notch = :username and bred_date = 'BOAR'";
			else
				$qtxt ="SELECT sold_mmddyy  FROM  herd WHERE ear_notch = :username and bred_date != 'BOAR'";
			$command =Yii::app()->db->createCommand($qtxt);
			$term = $_GET['s'];
			$command->bindValue(":username", ''.$term.'', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo isset($res[0])?$res[0]:"";

	}
	public function actionCheckFarrowed() {
		$res =array();
		if (isset($_GET['s'])) {
			// http://www.yiiframework.com/doc/guide/database.dao

			$qtxt ="SELECT farrowed, date_bred FROM breeding WHERE sow_gilts_id = :username ";
			$command =Yii::app()->db->createCommand($qtxt);
			$term = $_GET['id'];
			$command->bindValue(":username", ''.$term.'', PDO::PARAM_STR);
			$res =$command->queryRow();

			if(isset($res->farrowed) && $res->farrowed == "Y") {
				$qtxt ="SELECT last_parity FROM herd WHERE ear_notch = :username AND bred_date = ' ".$res[0]->date_bred."'";
				$command =Yii::app()->db->createCommand($qtxt);
				$term = $_GET['s'];
				$command->bindValue(":username", ''.$term.'', PDO::PARAM_STR);
				$resParity = $command->queryColumn();
			}

			if(isset($resParity[0])) {
				$currentParity = $resParity[0];
				$qtxt ="SELECT * FROM litters WHERE sow_ear_notch = :username AND sow_parity = ".$currentParity;
				$command =Yii::app()->db->createCommand($qtxt);
				$term = $_GET['s'];
				$command->bindValue(":username", ''.$term.'', PDO::PARAM_STR);
				$res = $command->queryRow();
			}else{
				$currentParity = 1;
			}
			$res['last_parity'] = $currentParity;
			echo CJSON::encode($res);
		}
	}
	public function actionCheckexist() {
		$res =array();
		if (isset($_GET['born']) && isset($_GET['earnotch'])) {
			$qtxt ="SELECT sow_gilts_id	 FROM  breeding WHERE sow_ear_notch	 = '".$_GET['earnotch']."' and date_bred = '".$_GET['born']."'";
			$command =Yii::app()->db->createCommand($qtxt);
			/* $term = $_GET['s'];
			$command->bindValue(":username", ''.$term.'', PDO::PARAM_STR); */
			$res =$command->queryColumn();
			if(isset($res[0]) && $_GET['isupd'] != 1) {
				echo "redirect-".$res[0];
				//$this->redirect(array('view','id'=>$res[0]));
			}else{
				$farm = substr($_GET['earnotch'], 0, 2);
				$qtxt ="SELECT * FROM  herd_setup WHERE farm_herd = '".$farm."' ";
				$command =Yii::app()->db->createCommand($qtxt);
				$res =$command->queryRow();
				echo CJSON::encode($res);
			}
		}

	}
	public function actiongetdaysbtw() {
		$res =array();
		if (isset($_GET['born']) && isset($_GET['earnotch'])) {
			$qtxt ="SELECT date_bred FROM  breeding WHERE sow_ear_notch = '".$_GET['earnotch']."' ORDER by date_bred DESC Limit 1";
			if(isset($_GET['id']) && $_GET['id'] > 0) {
				$qtxt ="SELECT date_bred FROM  breeding WHERE sow_ear_notch = '".$_GET['earnotch']."' and sow_gilts_id != ".$_GET['id']." ORDER by date_bred DESC Limit 1";
			}
			$command =Yii::app()->db->createCommand($qtxt);
			$res =$command->queryColumn();
			//echo $res['date_bred'];
			if(isset($res[0]) && $_GET['born'] > $res[0]) {
				$days = (strtotime($_GET['born']) - strtotime($res[0]))/(24*60*60);
				echo $days;
			}else{
				$qtxt ="SELECT born FROM  herd WHERE ear_notch = '".$_GET['earnotch']."' ";
				$command =Yii::app()->db->createCommand($qtxt);
				$res =$command->queryRow();
				if(isset($res['born'])) {
					$days = (strtotime($_GET['born']) - strtotime($res['born']))/(24*60*60);
					echo $days;
				}else {
					echo  0;
				}

			}
		}

	}

	public function actionautocompleteSow() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT sow_ear_notch FROM  breeding WHERE replace(sow_ear_notch, ' ','') LIKE :username AND sow_ear_notch like '".Yii::app()->request->cookies['farm_herd']."%'";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.str_replace(" ","",$_GET['term']).'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}

	public function actionautocompleteDateBred() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT date_bred	 FROM  breeding WHERE date_bred	 LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}

	public function actionautocompleteSire() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT sire_ear_notch	 FROM  breeding WHERE replace(sire_ear_notch,' ','')	 LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.str_replace(" ", "", $_GET['term']).'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}

	public function actionautocompleteService() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT service_type	 FROM  breeding WHERE service_type	 LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actionautocompleteComments() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT comments	 FROM  breeding WHERE comments	 LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actionautocompletePass() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT passover_date		 FROM  breeding WHERE passover_date		 LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}

	public function actionautocompleteDue() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT due_date	 FROM  breeding WHERE passover_date	 LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actionautocompleteDays() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT days_between	 FROM  breeding WHERE due_date	 LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
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
			//Added for space if not present
			$date = preg_replace("/^([0-9][A-Z])([^ ])/i", "$1 $2", $date);
			$date = preg_replace("/\-[ ]+/i", "-", $date);
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

	/*
	 * Common function to format Notch fields
	*/
	public function ChangeNotch($notch) {
		$notch = preg_replace("/[ ]+/", " ", $notch);
		$notch = preg_replace("/\- /", "-", $notch);
		return $notch;

	}

}
