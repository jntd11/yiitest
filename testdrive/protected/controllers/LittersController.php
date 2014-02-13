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
				'actions'=>array('index','view'),
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
		//$model=$this->loadModel($id);
		$modelSowgilts = SowGilts::model()->findByPk($id);
		if($modelSowgilts===null)
			throw new CHttpException(404,'The requested page does not exist.');
		
		$model = Litters::model()->findByAttributes(array('sire_ear_notch'=>$modelSowgilts->sire_ear_notch));
		
		if($model===null) {
			$model=new Litters;
		}
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Litters']))
		{
			$model->attributes = $_POST['Litters'];
			if($model->save()) {
				$sql = "UPDATE breeding SET ";
				$sql .= " farrowed = 'Y' ";
				$sql .= " WHERE 1 = 1 ";
				if($_POST['sire_ear_notch_org'] != $model->sire_ear_notch)
					$sql .= " sire_ear_notch = '".$model->sire_ear_notch."' ";
				$sql .= " AND sow_gilts_id = ".$id;
				$command = Yii::app()->db->createCommand($sql);
				$command->execute();
				
				$sql = "UPDATE herd SET ";
				$sql .= " last_parity =  ".$model->sow_parity;
				$sql .= " WHERE ear_notch = '".$model->sow_ear_notch."' AND last_parity < ". $model->sow_parity;
				$command = Yii::app()->db->createCommand($sql);
				$command->execute();
				$this->redirect(array('admin'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'modelsowgilts'=>$modelSowgilts,
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
}
