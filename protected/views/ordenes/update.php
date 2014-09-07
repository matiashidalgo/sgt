<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'ordenes') . ' - ' . Yii::t('general', 'edit');

$this->breadcrumbs=array(
	Yii::t('general', 'ordenes')=>array('index'),
	Yii::t('general', 'orden').' Número de Orden = '.$model->nro_orden=>array('view','nro_orden'=>$model->nro_orden),
	Yii::t('general', 'edit'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'ordenes'), 'url'=>array('index')),
	array('label'=>Yii::t('general', 'listOrdenesEntregadas'), 'url'=>array('ordenesEntregadas')),
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'orden'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'details').' '.Yii::t('general', 'orden'), 'url'=>array('view', 'id'=>$model->nro_orden)),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'ordenes'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'edit').' '.Yii::t('general', 'orden') . ' #' . $model->nro_orden); ?></h1>

<?php echo $this->renderPartial('_form', array(
			'model'=>$model,
			'model_cliente'=>$model_cliente,
			'model_equipo'=>$model_equipo,
			'autocompletes'=>$autocompletes,)); ?>