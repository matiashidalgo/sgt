<?php

class StatisticsController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','admin','delete'),
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
		$model=new Statistics;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Statistics']))
		{
            $model = $this->generate();
		}

		$this->render('create',array(
			'model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Statistics']))
		{
            $model = $this->generate(true);
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

    public function generate($update = false)
    {
        $stat = new Statistics();
        $saveStat = false;
        if (isset($_POST['Statistics'])) {
            $stat->findByAttributes($_POST['Statistics']);
            if (!$stat->id || $update) {
                if (!$update) {
                    $stat->attributes=$_POST['Statistics'];
                }

                $criteriaOrders = new CDbCriteria;
                $column = "fecha_entrega";
                $valueStart = $stat->date_from;
                $valueEnd = $stat->date_to;
                $criteriaOrders->addBetweenCondition($column, $valueStart, $valueEnd, 'AND');
                $orders = new CActiveDataProvider('Ordenes',array(
                    'criteria'=>$criteriaOrders,
                ));
                $orders->setPagination(false);
                if (!$update) {
                    $statistic = array('statistic' => 0);
                } else {
                    $statistic = array('statistic' => 0, 'old_statistic' => $stat->statistic);
                }
                /** @var $order Ordenes */
                foreach ($orders->getData() as $order) {
                    if (substr($order->precio,0,1) == "$"){
                        $statistic['statistic'] += (int)substr($order->precio,1);
                    } else {
                        $statistic['statistic'] += (int)$order->precio;
                    }
                    if ($order->gastos) {
                        $statistic['statistic'] -= (int)$order->gastos;
                    }
                }
                if (!$update) {
                    $stat->attributes=$statistic;
                    if (isset($_POST['save_statistic'])) {
                        $saveStat = true;
                    }
                } elseif($statistic['statistic'] != $statistic['old_statistic']) {
                    $stat->attributes=$statistic;
                    $saveStat = true;
                }
                if ($saveStat) {
                    $stat->save();
                }
            }
            return $stat;
        }
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
        $stat = new Statistics();
        $lastStat = null;
        if (isset($_POST['Statistics'])) {
            $stat = $this->generate();
        } else {
            $criteriaLastStat = new CDbCriteria;
            $criteriaLastStat->limit = 1;
            $criteriaLastStat->order = 'id DESC';

            $lastStat = new CActiveDataProvider('statistics',array(
                'criteria'=>$criteriaLastStat,
            ));
            $lastStat->setPagination(false);
        }

        $this->render('index',array(
            'model'=>$stat,
            'lastStat'=>$lastStat,
        ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Statistics('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Statistics']))
			$model->attributes=$_GET['Statistics'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Statistics the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Statistics::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Statistics $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='statistics-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
