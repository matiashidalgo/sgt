<?php
/* @var $this RepuestosController */
/* @var $model Repuestos */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'repuestos') . ' - ' . Yii::t('general', 'edit');

$this->breadcrumbs=array(
	Yii::t('general', 'repuestos')=>array('index'),
	Yii::t('general', 'repuesto').' ID='.$model->id=>array('view','id'=>$model->id),
	Yii::t('general', 'edit'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'repuestos'), 'url'=>array('index')),
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'repuesto'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'details').' '.Yii::t('general', 'repuesto'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'repuestos'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'edit').' '.Yii::t('general', 'repuesto') . ' #' . $model->id); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>