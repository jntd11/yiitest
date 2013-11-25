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
				array('label'=>'Users', 'url'=>array('/user'), 'itemOptions'=>array('id'=>'users'), 'linkOptions'=>array('id'=>'userlink', 'accesskey'=>'u'), 'items'=>array(
						array('label'=>'Create User', 'url'=>array('create')),
						array('label'=>'Manage User', 'url'=>array('admin'))
						)),
				array('label'=>'Maintenance', 'itemOptions'=>array('id'=>'Maintenance'), 'linkOptions'=>array('accesskey'=>'m'), 'url'=>array('/user'), 'items'=>array(
							array('label'=>'Herd Setup', 'itemOptions'=>array('id'=>'entry'), 'linkOptions'=>array('accesskey'=>'c'), 'url'=>array('/tblHerdSetup')),
							array('label'=>'Ear Tag Maintenance', 'url'=>array('create')),
							
							array('label'=>'Breeding Record Maintenance', 'url'=>array('admin')),
							array('label'=>'Farrowing/Litter Maintenance', 'url'=>array('admin')),
							array('label'=>'Automatic Chores Maintenance', 'url'=>array('admin')),
							array('label'=>'Automatic Chores Table', 'url'=>array('admin')),
							array('label'=>'Change Hog Number', 'url'=>array('admin')),
							array('label'=>'Mailing Code', 'url'=>array('/tblMailingCode')),
							array('label'=>'Activity date', 'url'=>array('user/activitydate')),
							array('label'=>'Sold Hogs Rebuild', 'url'=>array('/tblSoldHogs/rebuild')),
				)),
				array('label'=>'Entry', 
						'itemOptions'=>array('id'=>'customerentry'), 'linkOptions'=>array('accesskey'=>'e'), 'url'=>array(''), 'items'=>array(
								array('label'=>'Customers', 'itemOptions'=>array('id'=>'entry'), 'linkOptions'=>array('accesskey'=>'c'), 'url'=>array('/tblCustomerEntry/admin')),
								array('label'=>'Sows/Boars', 'itemOptions'=>array('id'=>'sowboar'), 'linkOptions'=>array('accesskey'=>'s'), 'url'=>array('/sowBoar/admin')),
								array('label'=>'Sold Hogs', 'itemOptions'=>array('id'=>'soldhogs'), 'linkOptions'=>array('accesskey'=>'h'), 'url'=>array('/tblSoldHogs/create'))
				)),
					
				array('label'=>'Reports', 'itemOptions'=>array('id'=>'reports'), 'url'=>array('/user'), 'linkOptions'=>array('accesskey'=>'r'), 'items'=>array(
							array('label'=>'Create User', 'url'=>array('create')),
							array('label'=>'Manage User', 'url'=>array('admin'))
				)),
				array('label'=>'Login', 'linkOptions'=>array('accesskey'=>'l'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'linkOptions'=>array('accesskey'=>'l'), 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
		</div>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	<div id="infobar"><span id="currdate"><?php echo $currdate; ?></span> <span id="farmherd"><?php echo $farmHerd; ?></span></div>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<div id="dialog"><p>Date: <input type="text" id="datepicker" />&nbsp;</p></div>
		<div><b>Activity Date:</b> <span id="currdate"><?php echo $currdate; ?></span> <b>Farm & Herd:</b> <span id="farmherd"><?php echo $farmHerd; ?> <?php echo " ".$farmHerdName; ?></span></div>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
