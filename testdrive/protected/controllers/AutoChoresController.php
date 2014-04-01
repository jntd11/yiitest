<?php

class AutoChoresController extends Controller
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
				'actions'=>array('index','view','changeStatus','report'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','changeStatus','report'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','changeStatus'),
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
	public function actionReport()
	{
		$model = new AutoChores();
		
		if(isset($_POST['go'])){
			if(empty($_POST['from_date'])){
				$errors["from_date"] = "Invalid From Date";
			}
			if(empty($_POST['to_date'])){
				$errors["to_date"] = "Invalid To Date";
			}
			if(empty($_POST['farm'])){
				$errors["farm"] = "Invalid Farm & Herd";
			}else {
				$qtxt ="SELECT farm_herd FROM  herd_setup WHERE farm_herd = '".$_POST['farm']."' ";
				$command =Yii::app()->db->createCommand($qtxt);
				$res =$command->queryColumn();
				if($_POST['farm'] != 'A' && $res[0] != $_POST['farm'])
					$errors["farm"] = "Invalid Farm & Herd";
			}
			if(count($errors) == 0) {
				$results1 = $this->dateRange($_POST['from_date'], $_POST['to_date'],'+1 day','m/d/Y');
				foreach ($results1 as $result) {
					$qtxt = "SELECT * FROM  chores WHERE date = '".$result."' ";
					if($_POST['farm'] != 'A')
						$qtxt .= " AND farm_herd = '".$_POST['farm']."' ";
					$command =Yii::app()->db->createCommand($qtxt);
					$res =$command->queryAll();
					//$results[$result] = $res;
					
					//D
					$qtxt = "SELECT * FROM  auto_chores WHERE generated_by = 'D' AND disabled = 'N' ";
					if($_POST['farm'] != 'A')
						$qtxt .= " AND (farm_herd = '".$_POST['farm']."' OR generated_by = 'A') ";
					$command =Yii::app()->db->createCommand($qtxt);
					$res1 =$command->queryAll();
					$results[$result] = array_merge($res,$res1);
				}
			}else{
				$model->addErrors($errors);
			}
		}
		
		
		$this->render('report',array(
				'model'=>$model,
				'results'=>$results,
				
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new AutoChores;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$dataProvider = new CActiveDataProvider('AutoChores');
		$dataProvider->setPagination(false);
		if(isset($_POST['AutoChores']))
		{
			$model->attributes=$_POST['AutoChores'];
			if($model->save())
				$this->redirect(array('create'));
		}
		
		
	
		$this->render('create',array(
			'model'=>$model,
		    'dataProvider'=>$dataProvider,
		));
	}
	
	public function dateRange($first, $last, $step = '+1 day', $format = 'd/m/Y' ) { 

		    $dates = array();
		    $current = strtotime($first);
		    $last = strtotime($last);
		
		    while( $current <= $last ) { 
		
		        $dates[] = date($format, $current);
		        $current = strtotime($step, $current);
		    }
		
		    return $dates;
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

		if(isset($_POST['AutoChores']))
		{
			$model->attributes=$_POST['AutoChores'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->auto_chores_id));
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
		$dataProvider=new CActiveDataProvider('AutoChores');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new AutoChores('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AutoChores']))
			$model->attributes=$_GET['AutoChores'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionChangeStatus($id)
	{
	     $model=$this->loadModel($id);
	     $status = isset($_GET['s'])?$_GET['s']:0;
	     if($status)
	      $model->disabled = "Y";
	     else
	      $model->disabled = "N";
	 
	     echo (int) $model->save();
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AutoChores the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AutoChores::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AutoChores $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='auto-chores-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
