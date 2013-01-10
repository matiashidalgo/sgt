<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<?php //Yii::app()->getClientScript()->registerCoreScript( 'jquery' ); ?>
	<?php Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' ); ?>
	<?php Yii::app()->clientScript->registerCssFile(
		Yii::app()->assetManager->publish(
			Yii::app()->basePath . '/vendors/jquery.ui/ThemeSGT/'
		).
		'/jquery-ui-1.9.2.custom.min.css', 'screen'
	); 
	?>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
		<div class="enterprise"><?php echo CHtml::encode(Yii::t('general', 'enterprise'))?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>Yii::t('general', 'home'), 'url'=>array('/site/index')),
				
				// Opciones para usuario visitante
				array('label'=>Yii::t('general', 'query'), 'url'=>array('/ordenes/consulta'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>Yii::t('general', 'about'), 'url'=>array('/site/page', 'view'=>'about'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>Yii::t('general', 'contact'), 'url'=>array('/site/contact'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>Yii::t('general', 'login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				
				// Opciones para usuario logeado
				array('label'=>Yii::t('general', 'clientes'), 'url'=>array('/clientes/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>Yii::t('general', 'equipos'), 'url'=>array('/equipos/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>Yii::t('general', 'ordenes'), 'url'=>array('/ordenes/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>Yii::t('general', 'service_oficial'), 'url'=>array('/serviceOficial/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>Yii::t('general', 'repuestos'), 'url'=>array('/repuestos/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>Yii::t('general', 'consultas'), 'url'=>array('/consultas/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>Yii::t('general', 'noticias'), 'url'=>array('/noticias/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>Yii::t('general', 'logout').' '.Yii::app()->user->name, 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
	
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<div class="menu-inferior">
		</div>
		<div class="credits">
		Copyright &copy; <?php echo date('Y'); ?> by Matias Hidalgo.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
		</div>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
