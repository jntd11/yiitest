<!doctype html>
<?php /* @var $this Controller */ ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css">
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	<?php
$session = new CHttpSession();
$session->open();

//$currdate = $session['date'];
if((Yii::app()->user->id != "") && (Yii::app()->request->cookies['date'] == null || Yii::app()->request->cookies['date'] == "" || Yii::app()->request->cookies['farm_herd'] == "")){
	$qu = "select activity_date,  farm_herd_name,  farm_herd from users where id = ".Yii::app()->user->id;
	$cmd = YII::app()->db->createCommand($qu);
	$res = $cmd->queryRow();
	if(isset($res['activity_date']))
		Yii::app()->request->cookies['date'] = new CHttpCookie('date',$res['activity_date'],array('expire'=>time()+(365*24*60*60)));
	if(isset($res['farm_herd_name']))
		Yii::app()->request->cookies['farm_herd_name'] = new CHttpCookie('farm_herd_name',$res['farm_herd_name'],array('expire'=>time()+(365*24*60*60)));;
	if(isset($res['farm_herd']))
		Yii::app()->request->cookies['farm_herd'] = new CHttpCookie('farm_herd',$res['farm_herd'],array('expire'=>time()+(365*24*60*60)));;
}
$currdate = Yii::app()->request->cookies['date'];
$farmHerd = Yii::app()->request->cookies['farm_herd'];
$farmHerdName = Yii::app()->request->cookies['farm_herd_name'];
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery');
//$cs->registerCoreScript('jquery-ui-1.10.2.custom');
$cs->registerCssFile(
		$cs->getCoreScriptUrl().
		'/jui/css/base/jquery-ui-1.10.2.custom.css'
);
$cs->registerScriptFile(Yii::app()->baseUrl.'/assets/index.js');

?>
</head>
<body>
<div data-role="page">
<div data-role="header">
<h1>My Title</h1>
<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
</div><!-- /header -->
<div data-role="content">
	<div id="mainmenu">
		<div id="menu-top">
		
		<?php
		
			//zii.widgets.CMenu 0 application.extensions.mbmenu.MbMenu
			$this->widget('zii.widgets.CMenu',array(
			'activeCssClass'=>'active',
			'activateParents'=>true,
			'id'=>'menu',
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				
				array('label'=>'Customers', 'itemOptions'=>array('id'=>'reports'), 'url'=>array(''), 'linkOptions'=>array(), 'items'=>array(
							array('label'=>'List ', 'itemOptions'=>array('id'=>'entry'), 'linkOptions'=>array('accesskey'=>'c'), 'url'=>array('/tblCustomerEntry/admin')),
							array('label'=>'Mailing Code', 'url'=>array('/tblMailingCode/admin')),
				)),
					array('label'=>'Pigs', 'itemOptions'=>array('id'=>'reports'), 'url'=>array(''), 'linkOptions'=>array(), 'items'=>array(
							array('label'=>'Bred', 'itemOptions'=>array('id'=>'breed'), 'url'=>array('')),
							array('label'=>'Farrowed', 'itemOptions'=>array('id'=>'farrowed'), 'url'=>array('')),
							array('label'=>'Weaned', 'itemOptions'=>array('id'=>'weaned'), 'url'=>array('')),
							array('label'=>'Sold Hogs', 'itemOptions'=>array('id'=>'soldhogs'), 'linkOptions'=>array('accesskey'=>'h'), 'url'=>array('/tblSoldHogs/admin')),
							array('label'=>'Sows/Boars', 'itemOptions'=>array('id'=>'sowboar'), 'linkOptions'=>array('accesskey'=>'s'), 'url'=>array('/sowBoar/admin')),
							
					)),
					array('label'=>'Chores', 'itemOptions'=>array('id'=>'reports'), 'url'=>array(''), 'linkOptions'=>array(), 'items'=>array(					)),
					array('label'=>'Semen', 'itemOptions'=>array('id'=>'reports'), 'url'=>array(''), 'linkOptions'=>array(), 'items'=>array(					)),
					array('label'=>'Others', 'itemOptions'=>array('id'=>'Others'), 'url'=>array(''), 'linkOptions'=>array('accesskey'=>'O'), 'items'=>array(
							array('label'=>'Herd Setup', 'itemOptions'=>array('id'=>'entry'), 'linkOptions'=>array('accesskey'=>'c'), 'url'=>array('/tblHerdSetup/admin')),
							array('label'=>'Sold Hogs Rebuild', 'url'=>array('/tblSoldHogs/rebuild')),
							array('label'=>'Activity date', 'url'=>array('/user/user/activitydate')),
							array('label'=>Yii::t('app','Rights'), 'url'=>array('/rights')),
							array('label'=>Yii::t('app','Profile'), 'url'=>array('/user/profile')),
							(Yii::app()->user->isSuperUser)?array('label'=>'Users', 'url'=>array('/user'), 'itemOptions'=>array('id'=>'users'), 'linkOptions'=>array('id'=>'userlink', 'accesskey'=>'u'), 'items'=>array()
							):array(),
					)),
						//
									//array('label'=>'Create User', 'url'=>array('/user/admin/create')),
									//array('label'=>'Manage User', 'url'=>array('admin'))
				/* array('label'=>'Maintenance', 'itemOptions'=>array('id'=>'Maintenance'), 'linkOptions'=>array('accesskey'=>'m'), 'url'=>array('/user'), 'items'=>array(
							array('label'=>'Ear Tag Maintenance', 'url'=>array('create')),
							array('label'=>'Breeding Record Maintenance', 'url'=>array('admin')),
							array('label'=>'Farrowing/Litter Maintenance', 'url'=>array('admin')),
							array('label'=>'Automatic Chores Maintenance', 'url'=>array('admin')),
							array('label'=>'Automatic Chores Table', 'url'=>array('admin')),
							array('label'=>'Change Hog Number', 'url'=>array('admin')),
							array('label'=>'Mailing Code', 'url'=>array('/tblMailingCode')),
							
				)), */
				//array('label'=>'Entry', 
						//'itemOptions'=>array('id'=>'customerentry'), 'linkOptions'=>array('accesskey'=>'e'), 'url'=>array(''), 'items'=>array(
								//array('label'=>'Sows/Boars', 'itemOptions'=>array('id'=>'sowboar'), 'linkOptions'=>array('accesskey'=>'s'), 'url'=>array('/sowBoar/admin')),
								//array('label'=>'Sold Hogs', 'itemOptions'=>array('id'=>'soldhogs'), 'linkOptions'=>array('accesskey'=>'h'), 'url'=>array('/tblSoldHogs/admin'))
				//)),
				/* array('label'=>'Reports', 'itemOptions'=>array('id'=>'reports'), 'url'=>array('/user'), 'linkOptions'=>array('accesskey'=>'r'), 'items'=>array(
							array('label'=>'Create User', 'url'=>array('create')),
							array('label'=>'Manage User', 'url'=>array('admin'))
				)), */
				array('label'=>'Login', 'linkOptions'=>array('accesskey'=>'l'), 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'lastmenu')),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'linkOptions'=>array('accesskey'=>'l'), 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'lastmenu1')),
			),
		)); ?>
		
		</div>
		
	</div><!-- mainmenu -->
	<div id="infobar"><span id="currdate"><?php echo $currdate; ?></span> <span id="farmherd"><?php echo $farmHerd; ?></span>&nbsp;&nbsp;</div>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	

	<?php echo $content; ?>

	<div class="clear"></div>

</div><!-- /content -->
<div data-role="footer">
	<div id="footer">
		<div id="dialog"><p>Date: <input type="text" id="datepicker" />&nbsp;</p></div>
		<div><b>Activity Date:</b> <span id="currdate"><?php echo $currdate; ?></span> <b>Farm & Herd:</b> <span id="farmherd"><?php echo $farmHerd; ?> <?php echo " ".$farmHerdName; ?></span></div>
	</div><!-- footer -->
</div><!-- /footer -->
</div><!-- /page -->
</body>
</html>