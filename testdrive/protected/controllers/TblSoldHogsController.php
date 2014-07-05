<?php

class TblSoldHogsController extends RController
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
			'rights', // perform access control for CRUD operations
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
				'actions'=>array('index','view','AutocompleteFirstName','AutocompleteEarNotch','AutocompleteDateSold','AutocompleteInvoice','AutocompleteName','soldlist','Rebuild','rebuildManual','AutocompleteId','UpdateAjax'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
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
		$model=new TblSoldHogs;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TblSoldHogs']))
		{
			$model->attributes=$_POST['TblSoldHogs'];
			$model->comments	= $_POST['TblSoldHogs']['comments'];
			$model->reason_sold	= $_POST['TblSoldHogs']['reason_sold'];
			$model->cust_id	= $_POST['TblSoldHogs']['cust_id'];
			$model->ear_notch_id = $_POST['TblSoldHogs']['ear_notch_id'];
			$model->hog_ear_notch = trim($model->hog_ear_notch);
			//$datearr = explode("/", $model->date_sold);
			//$model->date_sold = date("Y-m-d",mktime(0,0,0,$datearr[0],$datearr[1],$datearr[2]));

			if($model->save()) {
				$modelSowBoars = SowBoar::model()->findByPk($model->ear_notch_id);
				if($modelSowBoars != null) {
					$modelSowBoars->reason_sold = $model->reason_sold;
					$modelSowBoars->sold_mmddyy = $model->date_sold;
					$modelSowBoars->save();
				}
				if(!isset($_POST['savenew']))
					$this->redirect(array('admin','id'=>$model->tbl_sold_hogs_id));
				else
					$this->redirect(array('create'));
			}
		}
		$model=new TblSoldHogs;
 		$dataProvider=new CActiveDataProvider('TblSoldHogs',
				array(
						'criteria'=>array(
								'order'=>'date_modified DESC',
								'limit'=>5

						),
						'pagination'=>array('pagesize'=>5),
				)
		);

		$this->render('create',array(
			'model'=>$model,
			'dataProvider'=>$dataProvider,
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
		$model->hog_ear_notch = trim($model->hog_ear_notch);
		$sql = "select * from herd where ear_notch = '".$this->calculateYear($model->hog_ear_notch)."'";
		$sireeartag = SowBoar::model()->findBySql($sql);
		if($sireeartag)
			$model->hog_ear_tag = $sireeartag->ear_tag;
		$model->hog_ear_notch = preg_replace("/[0-9][0-9]([0-9][0-9]) /", "$1 ", $model->hog_ear_notch);
		$model->hog_ear_notch = $this->ChangeNotch($model->hog_ear_notch);
		$model->hog_ear_notch = $this->calculateYear($model->hog_ear_notch,2);
		//$model->hog_ear_notch = preg_replace("/^([0-9][A-Z])([^ ])/i", "$1 $2", $model->hog_ear_notch);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['TblSoldHogs']))
		{
			$model->attributes = $_POST['TblSoldHogs'];

			$model->comments	= $_POST['TblSoldHogs']['comments'];
			$model->reason_sold	= $_POST['TblSoldHogs']['reason_sold'];
			$model->cust_id	= $_POST['TblSoldHogs']['cust_id'];
			$model->ear_notch_id = $_POST['TblSoldHogs']['ear_notch_id'];
			$model->hog_ear_notch = trim($model->hog_ear_notch);

			//echo "jai".strtotime($model->date_sold);
			//$datearr = explode("/", $model->date_sold);

			//$model->date_sold = date("Y-m-d",mktime(0,0,0,$datearr[0],$datearr[1],$datearr[2]));
			//echo $model->date_sold = date("Y-m-d",strtotime($model->date_sold));
			//exit;
			if($model->save()) {
				if(isset($_POST['hog_ear_tag']) && !empty($_POST['hog_ear_tag'])) {
					$sql = "UPDATE herd SET ear_tag = '".$_POST['hog_ear_tag']."' WHERE ear_notch = '".$this->calculateYear($model->hog_ear_notch)."'";
					$cmd = Yii::app()->db->createCommand($sql);
					$cmd->query();
				}
				$modelSowBoars = SowBoar::model()->findByPk($model->ear_notch_id);
				if($modelSowBoars != null) {
					$modelSowBoars->reason_sold = $model->reason_sold;
					$modelSowBoars->sold_mmddyy = $model->date_sold;
					$modelSowBoars->save();
				}
				if(!isset($_POST['savenew']))
					$this->redirect(array('admin','id'=>$model->tbl_sold_hogs_id));
				else
					$this->redirect(array('create'));

				//$this->redirect(array('view','id'=>$model->tbl_sold_hogs_id));
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
		$dataProvider=new CActiveDataProvider('TblSoldHogs');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionSoldlist()
	{

		$crit =  new CDbCriteria();
		$model=new TblSoldHogs('getlist');
		$model->unsetAttributes();  // clear any default values
		$custmormodel = null;
		if(isset($_GET['id'])) {
			$model->cust_id =$_GET['id'];
			$custmormodel = TblCustomerEntry::model()->findByPk($model->cust_id);
		}


		$this->render('soldlist',array(
			'model'=>$model,
			'custmormodel'=>$custmormodel,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionRebuild()
	{

		$crit =  new CDbCriteria();
		$model = new TblSoldHogs('rebuild');
		$custmormodel = new TblCustomerEntry();

		$this->render('rebuild',array(
				'model'=>$model,
				'custmormodel'=>$custmormodel,
		));

		/*$qu = "UPDATE sold_hogs SET is_rebuild = 0 ";
		$cmd = YII::app()->db->createCommand($qu);
		$res = $cmd->query();
		$dataProvider = $model->rebuild();
		$countFailure = $countSuccess = 0;
		foreach ($dataProvider->data as $items) {
			$model = $this->loadModel($items['tbl_sold_hogs_id']);
			//$('#message').html('Working on ".$items['hog_ear_notch']."');
			echo '<script>$("#message").html("Working on '.$items['hog_ear_notch'].'");</script>';
			//echo '<script>alert($("#message").html());</script>';
			$sql = "select customer_entry_id FROM  customers where concat_ws(' ',first_name, last_name) = '".$items['customer_name']."'";
			// OR last_name = '".$items['customer_name']."'"
			$customers = $custmormodel->findBySql($sql);
			if(isset($customers->customer_entry_id)) {
				$model->cust_id = $customers->customer_entry_id;
				$model->is_rebuild = 1;
				$datearr = explode("-", $model->date_sold);
				$model->date_sold = date("Y-m-d",mktime(0,0,0,$datearr[0],$datearr[1],$datearr[2]));
				$model->save();
				$countSuccess++;
			}else{
				$countFailure++;
			}
		}
		echo '<script>$("#message").html("Finished");</script>';
		echo '<script>$("#message").append("<br>'.$countSuccess.' Customers found");</script>';
		echo '<script>$("#message").append("<br>'.$countFailure.' Customer Not Found. To update manually <a href=\"index.php?r=tblSoldHogs/rebuildManual\">click here</a>");</script>';
		*/
	}

	public function actionUpdateAjax($iscontinue = 0,$message="")
	{
		$crit =  new CDbCriteria();
		$model = new TblSoldHogs('rebuild');
		$custmormodel = new TblCustomerEntry();

		$data = array();
		if($message != "")
			$data["myValue"] = "<table class='detail-view'><tr class='odd'><td >".$message."</td></tr>";
		else
			$data["myValue"] = "<table class='detail-view'><tr class='odd'><td >"."Started..."."</td></tr>";
		if(!$iscontinue) {
			$qu = "UPDATE sold_hogs SET is_rebuild = 0 ";
			$cmd = YII::app()->db->createCommand($qu);
			$res = $cmd->query();
		}
		$dataProvider = $model->rebuild();
		//echo "JAI".$dataProvider->itemCount;
		$countFailure = $countSuccess = 0;
		$qtxt ="SELECT * FROM  sold_hogs where is_rebuild = 0 ";
		$command =Yii::app()->db->createCommand($qtxt);
		$res =$command->queryAll();
		$isSuccess = 0;
		if((count($res) == 0) && ($iscontinue == 1)) {
			$isSuccess = 1;
		}
		foreach ($res as $items) {
			$model = $this->loadModel($items['tbl_sold_hogs_id']);
			//$('#message').html('Working on ".$items['hog_ear_notch']."');
			$this->renderPartial('_ajaxContent', $data, false, true);
			$data["myValue"] = "<table class='detail-view'><tr class='odd'><td >"."Working on ".$items['hog_ear_notch'];
			$this->renderPartial('_ajaxContent', $data, false, true);
			$sql = "select customer_entry_id FROM  customers where concat_ws(' ',first_name, last_name) = '".$items['customer_name']."'";
			// OR last_name = '".$items['customer_name']."'"
			$customers = $custmormodel->findBySql($sql);
			//echo "<br>".$items['tbl_sold_hogs_id'];
			if(isset($customers->customer_entry_id)) {

				$model->cust_id = $customers->customer_entry_id;
				$model->is_rebuild = 1;
				//$datearr = explode("-", $model->date_sold);
				//$model->date_sold = date("Y-m-d",mktime(0,0,0,$datearr[0],$datearr[1],$datearr[2]));
				//exit;
				$model->save();
				$countSuccess++;
				$isSuccess = 1;
				$data["myValue"] =  " - Match Found "."</td></tr>";
			}else{
				$isSuccess = 0;
				$data["myValue"] = "</td></tr>";
				echo "<script>getUnMatchedSoldhog('".$items['tbl_sold_hogs_id']."');</script>";
				$countFailure++;
				break;
			}

		}
		$this->renderPartial('_ajaxContent', $data, false, true);
		if($isSuccess)
			$data["myValue"] = "<table class='detail-view'><tr class='odd'><td >"."Rebuild Completed..."."</td></tr>";
		$this->renderPartial('_ajaxContent', $data, false, true);
		$dataProvider = $model->rebuildManual();
		//$this->renderPartial('rebuildManual', $dataProvider, false, true);
	}

	public function actionrebuildManual(){
		$content = "";
		if(isset($_GET['c']) && $_GET['c'] != "" && $_GET['s'] != "")
		{
			$tbl_sold_hogs_id = $_GET['s'];
			$custModel = TblCustomerEntry::model()->findByPk($_GET['c']);
			$model = $this->loadModel($tbl_sold_hogs_id);
			$model->cust_id	= $_GET['c'];
			$model->is_rebuild = 1;
			$model->customer_name = $custModel->first_name." ".$custModel->last_name;
			//$datearr = explode("-", $model->date_sold);
			//$model->date_sold = date("Y-m-d",mktime(0,0,0,$datearr[0],$datearr[1],$datearr[2]));
			if(!$model->save()){
				foreach ($model->errors as $key=>$errors)
					foreach($errors as $error)
						if($error!='')
							$content .= $error;
			}else{
				$content .= "Customer name mapped successfuly";
			}
			$this->actionUpdateAjax(1,$content);
			return ;
		}
		$crit =  new CDbCriteria();
		//$model = new TblSoldHogs('rebuildManual');
		$model = new TblSoldHogs();
		if(isset($_GET['id']))
			$model = $this->loadModel($_GET['id']);

		$qtxt ="SELECT concat_ws(' ',first_name, last_name) as label, customer_entry_id  as value FROM customers ";
		$command =Yii::app()->db->createCommand($qtxt);
		$res =$command->queryAll();
		$this->renderPartial('rebuildManual',array(
				'model'=>$model,
				'datacustmodel'=>$res,
				'content'=>$content,
				'dataProvider'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TblSoldHogs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TblSoldHogs']))
			$model->attributes=$_GET['TblSoldHogs'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return TblSoldHogs the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=TblSoldHogs::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param TblSoldHogs $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tbl-sold-hogs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAutocompleteFirstName() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT concat_ws(' ',first_name, last_name) as label, customer_entry_id  as value FROM customers WHERE first_name LIKE :username
			OR  company_name LIKE :username
			OR last_name LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryAll();
		}

		echo CJSON::encode($res);
		Yii::app()->end();
	}

	public function actionAutocompleteEarNotch() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT hog_ear_notch FROM   sold_hogs WHERE replace(hog_ear_notch,' ','') LIKE :username AND hog_ear_notch like '".Yii::app()->request->cookies['farm_herd']."%'";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.str_replace(" ","",$_GET['term']).'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}

	public function actionAutocompleteName() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT distinct customer_name  FROM   sold_hogs WHERE customer_name LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function actionAutocompleteId() {
		$res =array();
		if (isset($_GET['s'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT * FROM   sold_hogs WHERE tbl_sold_hogs_id = :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", $_GET['s'], PDO::PARAM_STR);
			$res =$command->queryRow();

		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}

	public function actionAutocompleteDateSold() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT date_sold FROM   sold_hogs WHERE date_sold LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}

	public function actionAutocompleteInvoice() {
		$res =array();
		if (isset($_GET['term'])) {
			// http://www.yiiframework.com/doc/guide/database.dao
			$qtxt ="SELECT invoice_number FROM   sold_hogs WHERE invoice_number LIKE :username";
			$command =Yii::app()->db->createCommand($qtxt);
			$command->bindValue(":username", '%'.$_GET['term'].'%', PDO::PARAM_STR);
			$res =$command->queryColumn();
		}
		echo CJSON::encode($res);
		Yii::app()->end();
	}
	public function calculateYear($date,$type=1){

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
		if($length == 1)
			return $date;
		if($type == 2){
			if($year+10 > $curr_year && $year <= $curr_year){
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
	public function ChangeNotch($notch) {
		$notch = preg_replace("/[ ]+/", " ", $notch);
		$notch = preg_replace("/\- /", "-", $notch);
		return $notch;

	}

}
