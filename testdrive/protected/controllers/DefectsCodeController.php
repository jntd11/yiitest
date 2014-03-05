<?php

class DefectsCodeController extends Controller
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
				'actions'=>array('index','view','Autocompletecode','Autocompletedesc','AutocompleteDefects'),
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
		$model=new DefectsCode;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DefectsCode']))
		{
			$model->attributes=$_POST['DefectsCode'];
			if($model->save())
			 if(!isset($_POST['savenew']))
			   $this->redirect(array('admin'));
			 else
			   $this->redirect(array('create'));
			//$this->redirect(array('view','id'=>$model->defects_code_id));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DefectsCode']))
		{
			$model->attributes=$_POST['DefectsCode'];
			if($model->save())
 			 if(!isset($_POST['savenew']))
 			  $this->redirect(array('admin'));
 			 else
 			  $this->redirect(array('create'));
				//$this->redirect(array('view','id'=>$model->defects_code_id));
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
		$dataProvider=new CActiveDataProvider('DefectsCode');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DefectsCode('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DefectsCode']))
			$model->attributes=$_GET['DefectsCode'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DefectsCode the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DefectsCode::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param DefectsCode $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='defects-code-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionAutocompletecode() {
     	 $res =array();
     	 if (isset($_GET['term'])) {
     	  // http://www.yiiframework.com/doc/guide/database.dao
     	  $qtxt ="SELECT code  FROM   defects_code WHERE code LIKE :username";
     	  $command =Yii::app()->db->createCommand($qtxt);
     	  $command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
     	  $res =$command->queryColumn();
     	 }
     	 echo CJSON::encode($res);
     	 Yii::app()->end();
	}
	public function actionAutocompletedesc() {
	 $res =array();
	 if (isset($_GET['term'])) {
	  // http://www.yiiframework.com/doc/guide/database.dao
	  $qtxt ="SELECT description  FROM   defects_code WHERE description LIKE :username";
	  $command =Yii::app()->db->createCommand($qtxt);
	  $command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
	  $res =$command->queryColumn();
	 }
	 echo CJSON::encode($res);
	 Yii::app()->end();
	}
	public function actionAutocompleteDefects() {
	 $res =array();
	 if (isset($_GET['term'])) {
	  // http://www.yiiframework.com/doc/guide/database.dao
	  $qtxt ="SELECT concat_ws('-',code,description) FROM   defects_code WHERE code LIKE :username";
	  $command =Yii::app()->db->createCommand($qtxt);
	  $command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
	  $res =$command->queryColumn();
	 }
	 if (isset($_GET['val'])) {
	 	// http://www.yiiframework.com/doc/guide/database.dao
	 	$qtxt ="SELECT description FROM   defects_code WHERE code LIKE :username";
	 	$command =Yii::app()->db->createCommand($qtxt);
	 	$command->bindValue(":username", ''.$_GET['val'].'', PDO::PARAM_STR);
	 	$res =$command->queryColumn();
	 }
	 if(count($res) > 0)
	 	if (isset($_GET['val']))
	 		echo $res[0];
	 	else
		  echo CJSON::encode($res);
	 else 
	 	echo 0;
	 Yii::app()->end();
	}

}
