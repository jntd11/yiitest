<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
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
$color = Yii::app()->request->cookies['color'];
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

<body <? echo ($color != "")?'style="background-color: '.$color.'"':'';?> >

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

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
							array('label'=>'Bred Sows', 'itemOptions'=>array('id'=>'breed'), 'url'=>array('/sowGilts/admin')),
							array('label'=>'Farrowed', 'itemOptions'=>array('id'=>'farrowed'), 'url'=>array('/litters/admin')),
							array('label'=>'Weaned', 'itemOptions'=>array('id'=>'weaned'), 'url'=>array('/litters/admin1')),
							array('label'=>'Sold Hogs', 'itemOptions'=>array('id'=>'soldhogs'), 'linkOptions'=>array('accesskey'=>'h'), 'url'=>array('/tblSoldHogs/admin')),
							array('label'=>'Sows/Boars', 'itemOptions'=>array('id'=>'sowboar'), 'linkOptions'=>array('accesskey'=>'s'), 'url'=>array('/sowBoar/admin')),

					)),
					array('label'=>'Chores', 'itemOptions'=>array('id'=>'reports'), 'url'=>array('/autoChores/create'), 'linkOptions'=>array(), 'items'=>array(
						array('label'=>'Chores Report', 'url'=>array('/autoChores/report')),
						array('label'=>'Chores Setup', 'url'=>array('/autoChores/create')),
					)),
					array('label'=>'Semen', 'itemOptions'=>array('id'=>'reports'), 'url'=>array(''), 'linkOptions'=>array(), 'items'=>array(					)),
					array('label'=>'Others', 'itemOptions'=>array('id'=>'Others'), 'url'=>array(''), 'linkOptions'=>array('accesskey'=>'O'), 'items'=>array(
							array('label'=>'Herd Setup', 'itemOptions'=>array('id'=>'entry'), 'linkOptions'=>array('accesskey'=>'c'), 'url'=>array('/tblHerdSetup/admin')),
							array('label'=>'Defects Codes', 'url'=>array('/DefectsCode/admin')),
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
	<div id="infobar"><span id="currdate"><?php echo $currdate; ?></span>
	<a href="javascript: void(0)" style="text-decoration: none;" onClick="nextHerd(0)"><img src="img/cal-prev.gif"/></a>
	<span id="farmherd"><?php echo $farmHerd; ?></span>
	<a href="javascript: void(0)" style="text-decoration: none;" onClick="nextHerd(1)"><img src="img/cal-next.gif"/></a>
	&nbsp;&nbsp;</div>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>


	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<div id="dialog"><p>Date: <input type="text" id="datepicker" />&nbsp;</p></div>
		<div><b>Activity Date:</b> <span id="currdate"><?php echo $currdate; ?></span>
		<a href="javascript: void(0)" style="text-decoration: none;" onClick="nextHerd(0,'<?php echo $_SERVER['QUERY_STRING'];?>')"><img src="img/cal-prev.gif"/></a>
		<b>Farm & Herd:</b> <span id="farmherd"><?php echo $farmHerd; ?> <?php echo " ".$farmHerdName; ?></span>
		<a href="javascript: void(0)" style="text-decoration: none;" onClick="nextHerd(1,'<?php echo $_SERVER['QUERY_STRING'];?>')"><img src="img/cal-next.gif"/></a></div>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
