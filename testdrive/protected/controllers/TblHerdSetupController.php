<?php

class TblHerdSetupController extends Controller
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
				'users'=>array('@'),
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
		$model=new TblHerdSetup;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblHerdSetup']))
		{
			$model->attributes=$_POST['TblHerdSetup'];
			if($model->save()) {
				if(!isset($_POST['savenew']))
					$this->redirect(array('admin'));
				else
					$this->redirect(array('create'));
				Yii::app()->request->cookies['farm_herd'] = new CHttpCookie('farm_herd',$model->getAttribute("farm_herd"),array('expire'=>time()+(365*24*60*60)));
				Yii::app()->request->cookies['farm_herd_name'] = new CHttpCookie('farm_herd_name',$model->getAttribute("farm_name"),array('expire'=>time()+(365*24*60*60)));
				Yii::app()->request->cookies['breeder_herd_mark'] = new CHttpCookie('breeder_herd_mark',$model->getAttribute("breeder_herd_mark"),array('expire'=>time()+(365*24*60*60)));
				$this->redirect(array('view','id'=>$model->herd_id));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblHerdSetup']))
		{
			$model->attributes=$_POST['TblHerdSetup'];
			if($model->save()) {
				if(!isset($_POST['savenew']))
					$this->redirect(array('admin'));
				else
					$this->redirect(array('create'));
			}
				//$this->redirect(array('index','id'=>$model->herd_id));
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
		$dataProvider=new CActiveDataProvider('TblHerdSetup');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblHerdSetup('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblHerdSetup']))
			$model->attributes=$_GET['TblHerdSetup'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TblHerdSetup the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TblHerdSetup::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TblHerdSetup $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-herd-setup-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
