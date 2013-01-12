<?php
/* @var $this RepuestosController */
/* @var $model Repuestos */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'repuestos') . ' - ' . Yii::t('general', 'create');

$this->breadcrumbs=array(
	Yii::t('general', 'repuestos')=>array('index'),
	Yii::t('general', 'create'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'repuestos'), 'url'=>array('index')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'repuestos'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'create').' '.Yii::t('general', 'repuesto'));?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>