<?php

class SowBoarController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index','view','search','Siredam','AutocompleteEarNotch','AutocompleteName','AutocompleteRegister','AutocompleteBorn','AutocompletePigs','pedigree'),
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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionPedigree($id)
	{
		$model=new SowBoar();
		//echo "<pre>";
		//$dataProvider=new CActiveDataProvider('SowBoar');
		//echo "<pre>";
		//$dataProvider = $model->findAll());
		//$sql = "select * from sow_boar Limit 1";
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
		 	$model->save();
			//if($model->save())
				//$this->redirect(array('index','id'=>$model->sow_boar_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionSearch(){
		$model=new SowBoar;
		$criteria=new CDbCriteria;
		$res =array();
		$req = new CHttpRequest();
		$search = $req->getParam("s");
		$search = str_replace(".", "-", $search);
		$search = $this->calculateYear($search);
		if (isset($search) && $search != "") {
			$qtxt ="SELECT sow_boar_name FROM sow_boar WHERE ear_notch LIKE :search";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":search", $search, PDO::PARAM_STR);
			
			$res =$command->queryColumn();
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
		
		$ear_notch_array =  preg_split("/ /", $model->ear_notch);
		$ear_notch_array[2] = preg_replace("/[0-9][0-9]([0-9][0-9])/", "$1", $ear_notch_array[2]);
		$model->ear_notch = implode(" ", $ear_notch_array);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SowBoar']))
		{
			$model->attributes=$_POST['SowBoar'];
			if($model->ear_notch != "")
		 		$model->ear_notch = $this->calculateYear($model->ear_notch);
			
		 		
		 	$model->sire_notch = str_replace(".", "-", $model->sire_notch);
		 	$model->dam_notch = str_replace(".", "-", $model->dam_notch);
		 	if($model->sire_notch != "")
		 		$model->sire_notch = $this->calculateYear($model->sire_notch);
		 	if($model->dam_notch != "")
		 		$model->dam_notch = $this->calculateYear($model->dam_notch);
		 	
			if($model->save()){
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
			$curr_year = date("y");
			if(!isset($ear_notch_array[2]))
				return $date;
			$year = $ear_notch_array[2];
			$length = strlen($year);
			if($length > 2){
				$ear_notch_array[2] = preg_replace("/[0-9][0-9]([0-9][0-9])/", "$1", $ear_notch_array[2]);
				$year = $ear_notch_array[2];
				$length = strlen($year);
				//return $date;
			}
			if($type == 2){
				if($year+10 >= $curr_year && $year < $curr_year){
					$ear_notch_array[2] = $ear_notch_array[2] % 10; 
				}else if($length < 2){
					$ear_notch_array[2] = "0".$ear_notch_array[2];
				}
				return implode($ear_notch_array, " ");
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
		return implode($ear_notch_array, " ");
	}
	
	public function actionAutocompleteEarNotch() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			 $qtxt ="SELECT ear_notch FROM  sow_boar WHERE ear_notch LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actionAutocompleteName() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			 $qtxt ="SELECT sow_boar_name FROM  sow_boar WHERE sow_boar_name LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function pedigree($pk,$condition='',$params=array()){
		$model = new SowBoar();
		//Yii::trace(get_class($model).'.findByPk()','system.db.ar.CActiveRecord');
		$data = $model->findAllBySql("select * from sow_boar where sow_boar_id = ".$pk);
		//$prefix=$model->getTableAlias(true).'.';
		//$criteria=$model->getCommandBuilder()->createPkCriteria($model->getTableSchema(),$pk,$condition,$params,$prefix);
		return $data;
	}
	
	public function actionAutocompleteRegister() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			 $qtxt ="SELECT registeration_no FROM  sow_boar WHERE registeration_no LIKE :username";
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
			 $qtxt ="SELECT born FROM  sow_boar WHERE born LIKE :username";
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
			 $qtxt ="SELECT no_pigs FROM  sow_boar WHERE no_pigs LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
}
