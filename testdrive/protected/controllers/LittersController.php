<?php

class LittersController extends Controller
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
				'actions'=>array('index','view','autocompleteSow','autocompleteParity','autocompleteHerdlitter',
						'autocompleteFarroweddate','autocompleteWeighteddate','autocompleteWeaneddate'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','UpdateLitter'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','admin1','UpdateLitter'),
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
		$model=new Litters;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Litters']))
		{
			$model->attributes=$_POST['Litters'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->litters_id));
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
        $oldid = $id;

		//$model=$this->loadModel($id);
		$modelSowgilts = SowGilts::model()->findByPk($id);
		if($modelSowgilts===null)
			throw new CHttpException(404,'The requested page does not exist.');


		$qtxt ="SELECT * FROM herd WHERE ear_notch = '".$modelSowgilts->sow_ear_notch."' AND bred_date = '".$modelSowgilts->date_bred."'";
		$command =Yii::app()->db->createCommand($qtxt);
		$res = $command->queryRow();
		$desc = array();
		if(isset($res['last_parity']) &&  $modelSowgilts->farrowed == 'Y') {
			$model = Litters::model()->findByAttributes(array('sow_ear_notch'=>$modelSowgilts->sow_ear_notch,'sow_parity'=>$res['last_parity']));
            for($i=1;$i<=10;$i++){
                 $code = $model->{'defect_code'.$i};
                 if($code != "") {
                     $qtxt ="SELECT description FROM defects_code WHERE code = '".$code."'";
                     $command = Yii::app()->db->createCommand($qtxt);
                     $res = $command->queryColumn();
                     $desc[$i] = $res[0];
                 }
            }
		}

		if(!isset($model) || $model === null) {
			$model = new Litters;
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Litters']))
		{
		    $orgDate = $model->farrowed_date;
			$model->attributes = $_POST['Litters'];

			if($model->save()) {

			 // New CHores Insertion

			 $farm = preg_match("/^[0-9][a-z]/i",$model->sow_ear_notch,$match);
			 $qtxt ="DELETE chores from chores JOIN auto_chores ON (chores.description =auto_chores.description)
			 WHERE date = '".$orgDate."' and comments ='".$model->sow_ear_notch."' and auto_chores.generated_by = 'F'";
			 $command =Yii::app()->db->createCommand($qtxt);
			 $res =$command->query();

			 //New Chores Generation
			 $qtxt ="SELECT * FROM  auto_chores WHERE generated_by = 'F' AND (farm_herd = '".$match[0]."' OR farm_herd = 'A') AND disabled = 'N'";
			 $command =Yii::app()->db->createCommand($qtxt);
			 $res = $command->queryAll();
			 foreach ($res as $recCount=>$record) {
			  $choresModel = new Chores();
			  $choresModel->description = $record['description'];
			  $choresModel->farm_herd = $match[0];
			  $choresModel->comments = $model->sow_ear_notch;
			  $choresModel->date = date("m/d/Y",strtotime($model->farrowed_date)+($record['days_after'] * 24 * 3600));
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
			 //End
				$sql = "UPDATE breeding SET ";
				$sql .= " farrowed = 'Y' ";
				$sql .= " WHERE 1 = 1 ";
				if($_POST['sire_ear_notch_org'] != $model->sire_ear_notch)
					$sql .= " sire_ear_notch = '".$model->sire_ear_notch."' ";
				$sql .= " AND sow_gilts_id = ".$id;
				$command = Yii::app()->db->createCommand($sql);
				$command->execute();

				$sql = "UPDATE herd SET ";
				$sql .= " bred_date = '".$model->date_bred."' ";
				$sql .= " WHERE ear_notch = '".$model->sow_ear_notch."'";
				$command = Yii::app()->db->createCommand($sql);
				$command->execute();

				$sql = "UPDATE herd SET ";
				$sql .= " last_parity =  ".$model->sow_parity;
				$sql .= " WHERE ear_notch = '".$model->sow_ear_notch."' AND last_parity <= ". $model->sow_parity;
				$command = Yii::app()->db->createCommand($sql);
				$command->execute();
				$this->redirect(array('admin'));
			}
		}
		if(isset($_POST['DefectsCode'])){
    		 $modelDefects =new DefectsCode();
    		 $modelDefects->attributes=$_POST['DefectsCode'];
    		 $results = $this->isDefectCodeExist($modelDefects->code);
     		 if($results == 0) {
      		  $modelDefects->save();
      		  $code = $modelDefects->code;
      		  $model->defect_code1 = $code;
     		 }
    	}else {
    		$this->render('update',array(
    			'model'=>$model,
    			'modelsowgilts'=>$modelSowgilts,
    		    'desc'=>$desc,
    		));
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdateLitter($id)
	{
		$model=$this->loadModel($id);
        $desc = array();
		if($model===null) {
			$model=new Litters;
		}else {
     		for($i=1;$i<=10;$i++){
     		 $code = $model->{'defect_code'.$i};
     		 if($code != "") {
     		  $qtxt ="SELECT description FROM defects_code WHERE code = '".$code."'";
     		  $command = Yii::app()->db->createCommand($qtxt);
     		  $res = $command->queryColumn();
     		  $desc[$i] = $res[0];
     		 }
     		}
		}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Litters']))
		{
		    $orgDate = $model->weaned_date;
// 		    $choresModel = new Chores();
			$model->attributes = $_POST['Litters'];
			if($model->save()) {
			 // New CHores Insertion

			 $farm = preg_match("/^[0-9][a-z]/i",$model->sow_ear_notch,$match);
			 $qtxt ="DELETE chores from chores JOIN auto_chores ON (chores.description =auto_chores.description)
			 WHERE date = '".$orgDate."' and comments ='".$model->sow_ear_notch."' and auto_chores.generated_by = 'W'";
			 $command =Yii::app()->db->createCommand($qtxt);
			 $res =$command->query();
			 //New Chores Generation
			 $qtxt ="SELECT * FROM  auto_chores WHERE generated_by = 'W' AND (farm_herd = '".$match[0]."' OR farm_herd = 'A') AND disabled = 'N'";
			 $command =Yii::app()->db->createCommand($qtxt);
			 $res =$command->queryAll();
			 //print_r($res);
			 foreach ($res as $recCount=>$record) {
			  $choresModel = new Chores();
			  $choresModel->description = $record['description'];
			  $choresModel->farm_herd = $match[0];
			  $choresModel->comments = $model->sow_ear_notch;
			  $choresModel->date = date("m/d/Y",strtotime($model->weaned_date)+($record['days_after'] * 24 * 3600));
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
			 //End
				$this->redirect(array('admin1'));
			}
		}

		$this->render('updatelitter',array(
				'model'=>$model,
		        'desc'=>$desc,
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
		$dataProvider=new CActiveDataProvider('Litters');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		/* $model=new Litters('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Litters']))
			$model->attributes=$_GET['Litters'];

		$this->render('admin',array(
			'model'=>$model,
		)); */
		$model=new SowGilts('search');
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
	 * Manages all models.
	 */
	public function actionAdmin1()
	{

		$model=new Litters('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Litters']))
			$model->attributes=$_GET['Litters'];
		$sort = new CSort();
		$sort->attributes  = array(
				'desc'=>'due_date'
		);
		$this->render('admin-wean',array(
				'model'=>$model,
				'sort'=>$sort,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Litters the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Litters::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Litters $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='litters-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionautocompleteSow() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT distinct sow_ear_notch FROM  litters WHERE sow_ear_notch LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actionautocompleteParity() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT distinct sow_parity FROM  litters WHERE sow_parity LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actionautocompleteHerdlitter() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT distinct herd_litter FROM  litters WHERE herd_litter LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actionautocompleteFarroweddate() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT distinct farrowed_date FROM  litters WHERE farrowed_date LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actionautocompleteWeighteddate() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT distinct weighted_date FROM  litters WHERE weighted_date LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actionautocompleteWeaneddate() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT distinct weaned_date FROM  litters WHERE weaned_date LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}

	public function getDefectsCodes($term=NULL) {
	 $res =array();
	 $qtxt ="SELECT concat_ws('-',code,description)  FROM defects_code order by code asc";
	 $command =Yii::app()->db->createCommand($qtxt);
	 $command->bindValue(":username", '%'.$term.'%', PDO::PARAM_STR);
	 return $res = $command->queryColumn();
	}
	public function isDefectCodeExist($term=NULL) {
 	 $res =array();
 	 if (isset($term)) {
 	  $qtxt ="SELECT code FROM defects_code WHERE  code LIKE :username";
 	  $command =Yii::app()->db->createCommand($qtxt);
 	  $command->bindValue(":username", '%'.$term.'%', PDO::PARAM_STR);
 	  $res =$command->queryColumn();
 	 }
 	 if(count($res) > 0)
 	  echo 1;
 	 else
 	  echo 0;
	}


}
