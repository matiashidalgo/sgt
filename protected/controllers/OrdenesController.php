<?php

class OrdenesController extends Controller
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
				'actions'=>array(),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','create','update','admin','delete','view','creaClienteRap', 'CreaEquipoRap', 'MuestraCliente', 'MuestraEquipo','ordenesEntregadas','pdf','npdf'),
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
		$model=new Ordenes;
		$model_cliente = new Clientes;
		$model_equipo = new Equipos;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ordenes']))
		{
			$model->attributes=$_POST['Ordenes'];
			if($model->save()){
				if(isset($_POST['service_oficial']))
				{
					$this->redirect(array('/ordenesso/create','nro_orden'=>$model->nro_orden));
				} else {
					$this->redirect(array('view','id'=>$model->nro_orden));
				}
			}
		}

        $autocompletes = $this->_getAutocompletes();
		
		$this->render('create',array(
			'model'=>$model,
			'model_cliente'=>$model_cliente,
			'model_equipo'=>$model_equipo,
			'autocompletes'=>$autocompletes
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

		$model_cliente = new Clientes;
		$model_equipo = new Equipos;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ordenes']))
		{
			$model->attributes=$_POST['Ordenes'];
			if($model->save())
				if(isset($_POST['service_oficial']))
				{
					$data = OrdenesSo::model()->find('nro_orden=:nro_orden',array(':nro_orden'=>$id));
					if($data===null)
					{
						$this->redirect(array('/ordenesso/create','nro_orden'=>$model->nro_orden));
					} else {
						$this->redirect(array('/ordenesso/update','id'=>$data->id));
					}
				} else {
					$this->redirect(array('view','id'=>$model->nro_orden));
				}
		}

        $autocompletes = $this->_getAutocompletes();

		$this->render('update',array(
			'model'=>$model,
			'model_cliente'=>$model_cliente,
			'model_equipo'=>$model_equipo,
            'autocompletes'=>$autocompletes
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
		$dataProvider=new CActiveDataProvider('Ordenes',array ( 
			'criteria' => array ( 
				'condition'=>'fecha_entrega IS NULL',
				'order' => 'nro_orden DESC' 
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
		$model=new Ordenes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ordenes']))
			$model->attributes=$_GET['Ordenes'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ordenes the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ordenes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ordenes $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ordenes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionCreaClienteRap()
	{
		$model = new Clientes;
		$retorna = "Fallo";
		
		if (Yii::app()->request->isAjaxRequest){
			$model->cuenta = $_POST['cuenta'];
			$model->password = $_POST['password'];
			$model->nombre = $_POST['nombre'];
			$model->apellido = $_POST['apellido'];
			$model->direccion = $_POST['direccion'];
			$model->telefono = $_POST['telefono'];
			$model->celular = $_POST['celular'];
			$model->ciudad = $_POST['ciudad'];
			$model->email = $_POST['email'];
			$model->observaciones = $_POST['observaciones'];
			$model->admin = 0;
			
			$model->save();
			
			$retorna = "<option value=" . $model->id . " selected=selected>" .$model->AllConcat . "</option>";
		}
		
		echo $retorna;
	}
	
	public function actionCreaEquipoRap()
	{
		$model = new Equipos;
		$retorna = "Fallo";
		
		if (Yii::app()->request->isAjaxRequest){
			$model->tipo = $_POST['tipo'];
			$model->modelo = $_POST['modelo'];
			$model->marca = $_POST['marca'];
						
			$model->save();
			
			$retorna = "<option value=" . $model->id . " selected=selected>" .$model->AllConcat . "</option>";
		}
		
		echo $retorna;
	}
	
	public function actionMuestraCliente()
	{		
		$data = Clientes::model()->findByPk($_POST['Ordenes']['id_cliente']);
		
		$this->renderPartial('/clientes/view', array(
			'model' => $data,
		));
	}
	
	public function actionMuestraEquipo()
	{		
		
		$data = Equipos::model()->findByPk($_POST['Ordenes']['id_equipo']);
		
		$this->renderPartial('/equipos/view', array(
			'model' => $data,
		));
		
	}
	
	public function actionOrdenesEntregadas()
	{
		
		$dataProvider=new CActiveDataProvider('Ordenes',array ( 
			'criteria' => array ( 
				'condition'=>'fecha_entrega IS NOT NULL',
				'order' => 'nro_orden DESC' 
				)
			)
		);
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		
	}

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionPdf($id)
    {
        // mPDF
        //$mPDF1 = Yii::app()->ePdf->mpdf();
        $model = $this->loadModel($id);
        // You can easily override default constructor's params
        /** @var $mPDF1 mPDF */
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'C5',0,'',10,10,10,10,0,0);
        // render
        $mPDF1->SetAutoPageBreak(false);
        $mPDF1->SetTitle('Orden de Reparacion ' . $model->nro_orden . ' ORIGINAL ');
        $mPDF1->SetSubject('Leonardo Hidalgo');
        $mPDF1->SetAuthor('LeoTV');
        $mPDF1->SetCreator('SGT');

        $mPDF1->WriteHTML(
            $this->renderPartial('_pdf',array(
                'model'=> $model,
            ),true)
        );

        // Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/pdf.css');
        $mPDF1->WriteHTML($stylesheet, 1);

        # Outputs ready PDF
        $mPDF1->Output();
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionNpdf($id)
    {
        $this->renderPartial('_pdf',array(
            'model'=>$this->loadModel($id),
        ));
    }

    private function _getAutocompletes()
    {
        $autocompletes = array();

        $Clientes = Clientes::model()->findAll();

        $Equipos = Equipos::model()->findAll();

        /** @var $cliente Clientes */
        foreach($Clientes as $cliente)
        {
            $autocompletes['Clientes'][] = $cliente->getAllConcat();
        }

        /** @var $equipo Equipos */
        foreach($Equipos as $equipo)
        {
            $autocompletes['Equipos'][] = $equipo->getAllConcat();
            $autocompletes['Equipos_Marcas'][$equipo->marca] = $equipo->marca;
            $autocompletes['Equipos_Tipos'][$equipo->tipo] = $equipo->tipo;
            $autocompletes['Equipos_Modelos'][$equipo->modelo] = $equipo->modelo;
        }

        return $autocompletes;
    }
}
