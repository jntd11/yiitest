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
				'actions'=>array('index','view','ColorChange','Next'),
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

				$qu = "UPDATE users SET farm_herd = '".mysql_real_escape_string($model->getAttribute("farm_herd"))."', farm_herd_name = '".mysql_real_escape_string($model->getAttribute("farm_name"))."' WHERE id = ".Yii::app()->user->id;
				$cmd = YII::app()->db->createCommand($qu);
				$res = $cmd->query();

				Yii::app()->request->cookies['farm_herd'] = new CHttpCookie('farm_herd',$model->getAttribute("farm_herd"),array('expire'=>time()+(365*24*60*60)));
				Yii::app()->request->cookies['farm_herd_name'] = new CHttpCookie('farm_herd_name',$model->getAttribute("farm_name"),array('expire'=>time()+(365*24*60*60)));
				Yii::app()->request->cookies['breeder_herd_mark'] = new CHttpCookie('breeder_herd_mark',$model->getAttribute("breeder_herd_mark"),array('expire'=>time()+(365*24*60*60)));
				Yii::app()->request->cookies['hog_tag'] = new CHttpCookie('hog_tag',$model->getAttribute("is_hog_tag"),array('expire'=>time()+(365*24*60*60)));

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
				Yii::app()->request->cookies['farm_herd_name'] = new CHttpCookie('farm_herd_name',$model->farm_name,array('expire'=>time()+(365*24*60*60)));
				Yii::app()->request->cookies['breeder_herd_mark'] = new CHttpCookie('breeder_herd_mark',$model->breeder_herd_mark,array('expire'=>time()+(365*24*60*60)));
				Yii::app()->request->cookies['hog_tag'] = new CHttpCookie('hog_tag',$model->is_hog_tag,array('expire'=>time()+(365*24*60*60)));
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

	/*
	 * Function to change the color of the herd
	 */
	public function actionColorChange($id){
		if($id != 0) {
		    $model=$this->loadModel($id);
		    $model->color = $_GET['val'];
		    $model->save();

		    Yii::app()->request->cookies['color'] = new CHttpCookie('color',$model->color,array('expire'=>time()+(365*24*60*60)));
		    echo Yii::app()->request->cookies['color'];
		}else{
			if($_GET['val'] != Yii::app()->request->cookies['color']){
				Yii::app()->request->cookies['color'] = new CHttpCookie('color',$_GET['val'],array('expire'=>time()+(365*24*60*60)));
				echo Yii::app()->request->cookies['color'];
			} else {
				echo 0;
			}
		}
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

	public function actionNext(){
		if(isset($_GET['isNext'])){
			$farmHerd = Yii::app()->request->cookies['farm_herd'];
			if($_GET['isNext'])
				$qtxt ="SELECT * from herd_setup where herd_id > (SELECT herd_id FROM herd_setup WHERE farm_herd LIKE :username) order by herd_id asc limit 1 ";
			else
				$qtxt ="SELECT * from herd_setup where herd_id < (SELECT herd_id FROM herd_setup WHERE farm_herd LIKE :username) order by herd_id Desc limit 1 ";
			//echo $qtxt;
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$farmHerd.'%', PDO::PARAM_STR);
			$res =$command->queryRow();
			//print_r($res);
			if(isset($res['herd_id'])) {
				unset(Yii::app()->request->cookies['farm_herd']);
				Yii::app()->request->cookies['farm_herd'] = new CHttpCookie('farm_herd',$res["farm_herd"],array('expire'=>time()+(365*24*60*60)));
				Yii::app()->request->cookies['farm_herd_name'] = new CHttpCookie('farm_herd_name',$res["farm_name"],array('expire'=>time()+(365*24 *60*60)));
				Yii::app()->request->cookies['date'] = new CHttpCookie('farm_herd_name',$res["activity_date"],array('expire'=>time()+(365*24 *60*60)));
				Yii::app()->request->cookies['color'] = new CHttpCookie('color',$res['color'],array('expire'=>time()+(365*24*60*60)));

				$qu = "UPDATE users SET farm_herd = '".$res["farm_herd"]."', farm_herd_name = '".$res["farm_name"]."', activity_date = '".$res["activity_date"]."' WHERE id = ".Yii::app()->user->id;
				$cmd = YII::app()->db->createCommand($qu);
				$res = $cmd->query();
				if(isset($_GET['url'])){
					$url = $_GET['url'];
					if(preg_match("/litters\/update/i", $url)) {
						$url = preg_replace("/updatelitter/i","admin1",$url);
						$url = preg_replace("/update/i","admin",$url);
						header("Location: index.php?".$url);
					}else{
						header("Location: index.php?".$url);
					}
				}
				echo 1;
				return;

			}else{
				if($_GET['isNext'])
					$qtxt ="SELECT * from herd_setup order by herd_id asc limit 1";
				else
					$qtxt ="SELECT * from herd_setup order by herd_id desc limit 1";
				$command =Yii::app()->db->createCommand($qtxt);
				$res =$command->queryRow();
				if(isset($res['herd_id'])) {
					Yii::app()->request->cookies['farm_herd'] = new CHttpCookie('farm_herd',$res["farm_herd"],array('expire'=>time()+(365*24*60*60)));
					Yii::app()->request->cookies['farm_herd_name'] = new CHttpCookie('farm_herd_name',$res["farm_name"],array('expire'=>time()+(365*24*60*60)));
					Yii::app()->request->cookies['date'] = new CHttpCookie('farm_herd_name',$res["activity_date"],array('expire'=>time()+(365*24 *60*60)));
					Yii::app()->request->cookies['color'] = new CHttpCookie('color',$res['color'],array('expire'=>time()+(365*24*60*60)));

					$qu = "UPDATE users SET farm_herd = '".$res["farm_herd"]."', farm_herd_name = '".$res["farm_name"]."', activity_date = '".$res["activity_date"]."' WHERE id = ".Yii::app()->user->id;
					$cmd = YII::app()->db->createCommand($qu);
					$res = $cmd->query();
					if(isset($_GET['url'])){
						$url = $_GET['url'];
						if(preg_match("/litters\/update/i", $url)) {
							$url = preg_replace("/update/i","admin",$url);
							header("Location: index.php?".$url);
						}else{
							header("Location: index.php?".$url);
						}
					}
					echo 1;
					return;
			    }
			}
		}

		echo 0;
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
