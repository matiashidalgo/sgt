<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'ordenes') . ' - ' . Yii::t('general', 'create');

$this->breadcrumbs=array(
	Yii::t('general', 'ordenes')=>array('index'),
	Yii::t('general', 'orden'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'ordenes'), 'url'=>array('index')),
	array('label'=>'Listar todas las ordenes', 'url'=>array('Index')),
	array('label'=>Yii::t('general', 'listOrdenesEntregadas'), 'url'=>array('ordenesEntregadas')),
	array('label'=>'Listar ordenes pendientes', 'url'=>array('ordenesPendientes')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'ordenes'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'create').' '.Yii::t('general', 'orden'));?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,
			'model_cliente'=>$model_cliente,
			'model_equipo'=>$model_equipo,
			'autocompletes'=>$autocompletes,)); ?>