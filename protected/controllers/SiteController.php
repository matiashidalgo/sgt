<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				//mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers); ENVIARIA UN MAIL AL ADMINISTRADOR
				Yii::app()->user->setFlash('respuesta','Gracias por consultarnos. Nosotros le responderemos cuanto antes nos sea posible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionConsultarOrden()
	{
		$model_orden = new Ordenes;
		$model_cliente = new Clientes;
		
		$model_orden->unsetAttributes();
		//$model_cliente->unsetAttributes();
		
		if(isset($_GET['Ordenes']))
		{
			$model_orden = Ordenes::model()->findByPk($_GET['Ordenes']['nro_orden']);
			if($model_orden===null) 
			{
				$this->render('/site/error', array(	'code'=>'', 'message' => Yii::t('general', 'error_nro_orden_invalid')));
			} else {
				//$model_cliente = Clientes::model()->findByPk($model_orden->id_cliente);
				if($model_orden->idCliente->password === $_GET['Clientes']['password'])
				{

					$this->render('/site/consultarOrden', array('model_orden'=>$model_orden));
				} else {
					$this->render('/site/error', array(	'code'=>'', 'message' => Yii::t('general', 'error_password_invalid')));
				}
			}
		} else {
			$this->render('/site/consultaDeOrden', array('model_orden'=>$model_orden,'model_cliente'=>$model_cliente));
		}
	}
}