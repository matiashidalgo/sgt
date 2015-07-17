<?php

class ConsultasController extends Controller
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
				'actions'=>array('create'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','update','admin','delete'),
				'users'=>array('@'),
			),
			/* array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			), */
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
		$model=new Consultas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Consultas']))
		{
			$model->attributes=$_POST['Consultas'];
			
			$name='=?UTF-8?B?'.base64_encode($model->nombre).'-'.base64_encode($model->apellido).'?=';
			$subject='=?UTF-8?B?'.base64_encode('Nueva consulta en '. Yii::app()->params['pageTitle']).'?=';
			$headers="From: $name <{$model->email}>\r\n".
				"Reply-To: {$model->email}\r\n".
				"MIME-Version: 1.0\r\n".
				"Content-type: text/plain; charset=UTF-8";

			mail(Yii::app()->params['adminEmail'],$subject,$model->consulta,$headers);
            mail(Yii::app()->params['adminEmailAlternative'],$subject,$model->consulta,$headers);
			if($model->save())
				$this->render('exito',array(
					'model'=>$model,
				));
		} elseif (isset($_POST['Comentario'])) {
            $userName = $_POST['Comentario']['name'];
            if (!$userName) {
                $userName = "Sin Nombre";
            }
            $email = $_POST['Comentario']['email'];
            if (!$email) {
                $email = "no-mail@serviceleotv.site88.net";
            }
            $phone = $_POST['Comentario']['phone'];
            $comment = $_POST['Comentario']['comentario'];
            $orderId = $_POST['Comentario']['order_id'];

            $name='=?UTF-8?B?'.base64_encode($userName).'?=';
            $subject='=?UTF-8?B?'.base64_encode('Nueva consulta en la orden de reparacion '.$orderId.' en '. Yii::app()->params['pageTitle']).'?=';
            $headers="From: $name <{$email}>\r\n".
                "Reply-To: {$email}\r\n".
                "MIME-Version: 1.0\r\n".
                "Content-type: text/plain; charset=UTF-8";

            $content = "
                El cliente ".$userName." le envio el siguiente comentario en la orden de reparacion numero ".$orderId.":\n
                ".$comment."\n

                Los datos del cliente obtenidos del SGT son:\n
                Nombre completo: ".$userName."\n
                ".$phone."\n
                Email: ".$email." (si el correo es no-mail@serviceleotv.site88.net es porque el usuario no tenia ningun email cargado)\n
                ".$phone."\n

                Este Informe fue confeccionado por el SGT
            ";
            $result = mail(Yii::app()->params['adminEmail'],$subject,$content,$headers);
            mail(Yii::app()->params['adminEmailAlternative'],$subject,$content,$headers);
            if($result) {
                echo "SEND";
            } else {
                echo "Ocurrio un error al intentar enviar su comentario, estamos buscando una solucion al problema, de todas maneras su comentario quedará registrado en nuestra base de datos";
                $model->consulta = "
                        Problema al enviar mail! - LOGEADO ACA PARA NO PERDER EL COMENTARIO DEL CLIENTE!

                    ".$content;
                $model->save();
            }
        } else {
			$this->render('create',array(
				'model'=>$model,
			));
		}
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

		if(isset($_POST['Consultas']))
		{
			$model->attributes=$_POST['Consultas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('Consultas',array ( 
			'criteria' => array ( 
				'order' => 'id DESC' 
				)
			)
		);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Consultas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Consultas']))
			$model->attributes=$_GET['Consultas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Consultas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Consultas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Consultas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='consultas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
