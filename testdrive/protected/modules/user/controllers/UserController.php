<?php

class UserController extends Controller
{
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	public $layout='//layouts/column1';
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return CMap::mergeArray(parent::filters(),array(
			'accessControl', // perform access control for CRUD operations
				'postOnly + delete', // we only allow deletion via POST request
		));
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
				'actions'=>array('index','view','test','ActivityDate'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$model = $this->loadModel();
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User', array(
			'criteria'=>array(
		        'condition'=>'status>'.User::STATUS_BANNED,
		    ),
				
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=User::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUser($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_model=User::model()->findbyPk($id!==null ? $id : $_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	
	/**
	 * Manages all models.
	 */
	public function actionTest()
	{
		$req = new CHttpRequest();
		$date = $req->getParam("d");
		if($date == "")
			$date = date("m/d/y");
		$step = $req->getParam("s");
		switch($step) {
			case 'N':
				$date = date("m/d/Y",strtotime($date) + (1*24*60*60));
				break;
			case 'P':
				$date = date("m/d/Y",strtotime($date) - (1*24*60*60));
				break;
			case 'T':
				$date = date("m/d/Y");
				break;
		}
	
		$session = new CHttpSession();
		$session->open();
		echo Yii::app()->request->cookies['date'] = new CHttpCookie('date',$date,array('expire'=>time()+(365*24*60*60)));
		if(!Yii::app()->user->isGuest){
			$qu = "UPDATE users SET activity_date = '".$date."' WHERE id = ".Yii::app()->user->id;
			$cmd = YII::app()->db->createCommand($qu);
			$res = $cmd->query();
		}
	
		//$session['date'] = $date;
	}
	
	/**
	 * Manages all models.
	 */
	public function actionActivityDate()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('activitydate',array(
				'dataProvider'=>$dataProvider,
		));
	}
}
