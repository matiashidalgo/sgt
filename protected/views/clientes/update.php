<?php
/* @var $this ClientesController */
/* @var $model Clientes */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'clientes') . ' - ' . Yii::t('general', 'edit');

$this->breadcrumbs=array(
	Yii::t('general', 'clientes')=>array('index'),
	Yii::t('general', 'cliente').' ID='.$model->id=>array('view','id'=>$model->id),
	Yii::t('general', 'edit'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'clientes'), 'url'=>array('index')),
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'cliente'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'details').' '.Yii::t('general', 'cliente'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'clientes'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'edit').' '.Yii::t('general', 'cliente') . ' #' . $model->id); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>