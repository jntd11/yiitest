<?php

class SemenOrdersController extends Controller
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
				'actions'=>array('create','update','report','AutocompleteFirstName',
						'AutocompleteCompanyName','AutocompleteLastName','AutocompleteEarNotch','AutocompleteEarTag',
						'GetEarNotch','AutocompleteSemenType','insertSemenType','ChangeStatus'),
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
	public function actionReport()
	{
		$model = new AutoChores();
		$results = array();
		$errors = array();
		$isPrint = 0;

		if(isset($_GET['go'])){
			if(!isset($_GET['go']))
				$isPrint = 1;
			if(empty($_GET['from_date'])){
				$errors["from_date"] = "Invalid From Date";
			}
			if(empty($_GET['to_date'])){
				$errors["to_date"] = "Invalid To Date";
			}

			if(count($errors) == 0) {
				$results1 = $this->dateRange($_GET['from_date'], $_GET['to_date'],'+1 day','m/d/Y');
				foreach ($results1 as $result) {
					$qtxt = "SELECT * FROM semen_orders WHERE ship_date = '".$result."' ";
					if(isset($_GET['standby']) && $_GET['standby'] == 'Y')
						$qtxt .= " AND onstandby = 'Y' ";
					$command =Yii::app()->db->createCommand($qtxt);
					$res =$command->queryAll();
					//$results[$result] = $res;

					//D
					/* $qtxt = "SELECT * FROM  auto_chores WHERE generated_by = 'D' AND disabled = 'N' ";
					if($_REQUEST['farm'] != 'A')
						$qtxt .= " AND (farm_herd = '".$_REQUEST['farm']."' OR generated_by = 'A') ";

					$qtxt1 = " ADDDATE(date_asof, days_after) = '".$result."' ";
					$qtxt2 = " ADDDATE(date_asof, (days_after+(times_occur*days_between))) = '".$result."' AND times_occur >= 2";
					$qtxt .= " AND ((".$qtxt1.") OR (".$qtxt2.")) ";


					$command =Yii::app()->db->createCommand($qtxt);
					$res1 =$command->queryAll();
					$results[$result] = array_merge($res,$res1); */
					$results[$result] = $res;

				}
			}else{
				$model->addErrors($errors);
			}
		}



		$this->render('report',array(
				'model'=>$model,
				'results'=>$results,
				'isPrint'=>$isPrint,

		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id=null)
	{

		$model=new SemenOrders;
		$modelCustomer=new TblCustomerEntry;


		if(isset($id) && $id != null && !isset($_POST['SemenOrders'])){
			$model=$this->loadModel($id);
			$modelCustomer=new TblCustomerEntry;
			$modelCustomer=TblCustomerEntry::model()->findByPk($model->customer_id);

		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SemenOrders']))
		{
			$model=new SemenOrders;
			$model->attributes=$_POST['SemenOrders'];
			$model->ship_date = date("m/d/Y",strtotime($model->ship_date));
			$model->ordered_date = date("m/d/Y",strtotime($model->ordered_date));
			$modelCustomer=TblCustomerEntry::model()->findByPk($model->customer_id);
			$modelCustomer->attributes = $_POST['TblCustomerEntry'];

			if($model->save()) {
				$modelCustomer->save();
				$url = 'index.php?r=SemenOrders/report&to_date='.Yii::app()->request->cookies["to_date"].'&from_date='.Yii::app()->request->cookies["from_date"].'&go=Go';

				if(isset($_POST['savedup'])){
					$this->redirect(array('create','id'=>$model->semen_orders_id));
				}elseif(isset($_POST['savenew']))
					$this->redirect(array('create'));
				else
					$this->redirect($url);

			}

		}

		$this->render('create',array(
			'model'=>$model,
			'modelCustomer'=>$modelCustomer,
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
		$modelCustomer=new TblCustomerEntry;
		$modelCustomer=TblCustomerEntry::model()->findByPk($model->customer_id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SemenOrders']))
		{
			$model->attributes=$_POST['SemenOrders'];
			$model->ship_date = date("m/d/Y",strtotime($model->ship_date));
			$model->ordered_date = date("m/d/Y",strtotime($model->ordered_date));
			$modelCustomer->attributes = $_POST['TblCustomerEntry'];
			if($model->save()) {
				$modelCustomer->save();
				$url = 'index.php?r=SemenOrders/report&to_date='.Yii::app()->request->cookies["to_date"].'&from_date='.Yii::app()->request->cookies["from_date"].'&go=Go';

				if(isset($_POST['savedup'])){
					$this->redirect(array('create','id'=>$model->semen_orders_id));
				}elseif(isset($_POST['savenew']))
					$this->redirect(array('create'));
				else
					$this->redirect($url);

			}

		}

		$this->render('update',array(
			'model'=>$model,
			'modelCustomer'=>$modelCustomer,
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
		$dataProvider=new CActiveDataProvider('SemenOrders');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SemenOrders('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SemenOrders']))
			$model->attributes=$_GET['SemenOrders'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SemenOrders the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SemenOrders::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SemenOrders $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='semen-orders-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionAutocompleteFirstName() {
		$res =array();
		if (isset($_GET['term'])) {
			if (isset($_GET['isall']) && $_GET['isall'] == 0) {
				$qtxt ="SELECT concat_ws('-',customer_entry_id,first_name,last_name)  FROM customers WHERE first_name LIKE '%".$_GET['term']."%'";
				$command =Yii::app()->db->createCommand($qtxt);
				$res =$command->queryColumn();

			}else if (isset($_GET['isall']) && $_GET['isall'] == 1) {
				$qtxt ="SELECT * FROM customers WHERE customer_entry_id = ".$_GET['term'];
				$command =Yii::app()->db->createCommand($qtxt);
				$res =$command->queryRow();
			}

		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actionAutocompleteCompanyName() {
		$res =array();
		if (isset($_GET['term'])) {
			if (isset($_GET['isall']) && $_GET['isall'] == 0) {
				$qtxt ="SELECT concat_ws('-',customer_entry_id,company_name)  FROM customers WHERE company_name LIKE '%".$_GET['term']."%'";
				$command =Yii::app()->db->createCommand($qtxt);
				$res =$command->queryColumn();

			}else if (isset($_GET['isall']) && $_GET['isall'] == 1) {
				$qtxt ="SELECT * FROM customers WHERE customer_entry_id = ".$_GET['term'];
				$command =Yii::app()->db->createCommand($qtxt);
				$res =$command->queryRow();
			}

		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actionAutocompleteLastName() {
		$res =array();
		if (isset($_GET['term'])) {
			if (isset($_GET['isall']) && $_GET['isall'] == 0) {
				$qtxt ="SELECT concat_ws('-',customer_entry_id,first_name,last_name)  FROM customers WHERE last_name LIKE '%".$_GET['term']."%'";
				$command =Yii::app()->db->createCommand($qtxt);
				$res =$command->queryColumn();

			}else if (isset($_GET['isall']) && $_GET['isall'] == 1) {
				$qtxt ="SELECT * FROM customers WHERE customer_entry_id = ".$_GET['term'];
				$command =Yii::app()->db->createCommand($qtxt);
				$res =$command->queryRow();
			}

		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function getMailingCodes($term=NULL) {
		$res =array();
		$qtxt ="SELECT concat_ws('-',mailing_code_label,mailing_code_desc)  FROM mailing_codes order by mailing_code_label asc";
		$command =Yii::app()->db->createCommand($qtxt);
		$command->bindValue(":username", '%'.$term.'%', PDO::PARAM_STR);
		return $res = $command->queryColumn();
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
	public function actionAutocompleteEarNotch() {
		$res =array();

		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao

			if(strlen($_GET['term']) > 4)
				$_GET['term'] = $this->calculateFullYear($_GET['term']);
			$qtxt ="SELECT sow_boar_id,ear_tag,ear_notch FROM  herd WHERE replace(ear_notch,' ','') LIKE :username and bred_date = 'BOAR'" ;
			$command =Yii::app()->db->createCommand($qtxt);
			$term = str_replace(" ", "", $_GET['term']);
			$command->bindValue(":username", '%'.$term.'%', PDO::PARAM_STR);
			//$res =$command->queryColumn();
			$res = $command->queryall(false);
		}
		$out = array();
		if(count($res)) {
			foreach($res as $val) {
				$out[] = array("id"=>$val[0],"value"=>$val[1]."_".$this->calculateYear($val[2],2));
			}
		}
		echo CJSON::encode($out);
		Yii::app()->end();
	}
	public function test($val,$key){
		if($key == 2) {
			echo $val."==".$key."<br>";
			echo $this->calculateYear($val,2)."<br>";
		}
	}
	public function actionAutocompleteSemenType() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT semen_id,code FROM  semen_type WHERE code LIKE :username " ;
			$command =Yii::app()->db->createCommand($qtxt);
			$term = str_replace(" ", "", $_GET['term']);
			$command->bindValue(":username", '%'.$term.'%', PDO::PARAM_STR);
			$res = $command->queryall(false);
		}
		foreach($res as $val) {
			$out[] = array("id"=>$val[0],"value"=>$val[1]);
		}
		echo CJSON::encode($out);
		Yii::app()->end();
	}
	public function actionGetEarNotch() {
		$res =array();
		if (isset($_GET['id'])) {
			$qtxt ="SELECT * FROM  herd WHERE sow_boar_id = ".$_GET['id'];
			$command =Yii::app()->db->createCommand($qtxt);
			$res =$command->queryRow();
			$res["ear_notch"] = $this->calculateYear($res["ear_notch"],2);
		}elseif(isset($_GET['name']) && $_GET['name'] != "") {

			$qtxt ="SELECT * FROM  herd WHERE ear_tag = '".$_GET['name']."' and bred_date = 'BOAR'";
			$command =Yii::app()->db->createCommand($qtxt);
			$res =$command->queryRow();
			$res["ear_notch"] = $this->calculateYear($res["ear_notch"],2);
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actioninsertSemenType(){
		if (isset($_GET['code'])) {
			$qtxt = " INSERT INTO semen_type (code) values ('".$_GET['code']."') " ;
			$command =Yii::app()->db->createCommand($qtxt);
			$res =$command->query();
		}
	}
	public function actionAutocompleteEarTag() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT sow_boar_id,ear_tag,ear_notch FROM  herd WHERE ear_tag LIKE :username and bred_date = 'BOAR' order by cast(ear_tag as UNSIGNED ) asc" ;
			$command =Yii::app()->db->createCommand($qtxt);
			$term = str_replace(" ", "", $_GET['term']);
			$command->bindValue(":username", '%'.$term.'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
			$res = $command->queryall(false);
		}
		foreach($res as $val) {
			$out[] = array("id"=>$val[0],"value"=>$val[1]."_".$this->calculateYear($val[2],2));
		}
		echo CJSON::encode($out);
		Yii::app()->end();
	}
	public function actionChangeStatus($id)
	{
		$model=$this->loadModel($id);
		$status = isset($_GET['s'])?$_GET['s']:0;
		if($status)
			$model->onstandby = "Y";
		else
			$model->onstandby = "N";

		echo (int) $model->save();
	}
	public function calculateFullYear($date){
		$ear_notch_array =  preg_split("/ /", $date);

		$isPresent =  preg_match("/[A-Z] *(([0-9]{1,2}$)|([0-9]{1,2} ))/i", $date,$matches);
		if(!$isPresent){
			return $date;
		}

		//print_r($matches);
		if(!isset($matches[1]))
			return $date;
		$curr_year = date("y");
		$year = trim($matches[1]);
		$length = strlen($year);
		if($length > 2){
			return $date;
		}
		//echo "$year <= $curr_year";
		if($year <= $curr_year){
			$rem = $curr_year%10;
			$quo = floor($curr_year/10);
			if($length == 1){
				//echo $rem." < ". $year;
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

		$date= str_replace($matches[1], $ear_notch_array[2], $date,$count);
		return $date;
		//return implode($ear_notch_array, " ");
	}
	public function calculateYear($date,$type=1){
		//echo $date;
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
			//echo $year+10 . ">". $curr_year;
			if($year+10 > $curr_year && $year <= $curr_year){
				    if($ear_notch_array[2] != 10)
							$ear_notch_array[2] = $ear_notch_array[2] % 10;
			}else if($length < 2){
				$ear_notch_array[2] = "0".$ear_notch_array[2];
			}

			//return implode($ear_notch_array, " ");
			$date= str_replace(" ".$matches[1]." ", " ".$ear_notch_array[2]." ", $date,$count);
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
}
