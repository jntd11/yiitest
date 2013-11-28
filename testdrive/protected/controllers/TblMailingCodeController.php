<?php

class TblMailingCodeController extends Controller
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
				'actions'=>array('index','view','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete'),
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
		$model=new tblMailingCode;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['tblMailingCode']))
		{
			$model->attributes=$_POST['tblMailingCode'];
			$results = $this->getMailingCode($model->mailing_code_label);
			if($results == '0') {
				if($model->save())
					$this->redirect(array('view','id'=>$model->mailing_code_id));
			}else{
				Yii::app()->user->setFlash('deleteStatus','Not Created, Mailing Code Already Exists');
				echo "<div class='flash-success'>Not Created, Mailing Code Already Exists</div>";
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function getMailingCode($term=NULL) {
		$res =array();
		if (isset($term)) {
			$qtxt ="SELECT mailing_code_label FROM tbl_mailing_code WHERE  mailing_code_label LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$term.'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		if(count($res) > 0)
			return 1;
		else
			return 0;
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

		if(isset($_POST['tblMailingCode']))
		{
			$model->attributes=$_POST['tblMailingCode'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->mailing_code_id));
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
		$model = $this->loadModel($id);
		$customers =TblCustomerEntry::model()->find('mailing_code like "%'.$model->getAttribute('mailing_code_label').',%"');
		if($customers === null){
			$this->loadModel($id)->delete();
			 Yii::app()->user->setFlash('deleteStatus','Deleted Successfully');
			 echo "<div class='flash-success'>Deleted Successfully</div>";
		}
		else {
			 $firstname = $customers->getAttribute("first_name");
			 $lastname  = $customers->getAttribute("first_name");
			 Yii::app()->user->setFlash('deleteStatus','This code cannot be deleted because it is being used by: '.$firstname.' '.$lastname.'.');
			 echo "<div class='flash-success'>This code cannot be deleted because it is being used by: ".$firstname." ".$lastname.".</div>";
		}
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

		$dataProvider=new CActiveDataProvider('tblMailingCode',
					array('sort'=>array('defaultOrder'=>'mailing_code_label ASC'))
		);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new tblMailingCode('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['tblMailingCode']))
			$model->attributes=$_GET['tblMailingCode'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return tblMailingCode the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=tblMailingCode::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param tblMailingCode $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-mailing-code-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
