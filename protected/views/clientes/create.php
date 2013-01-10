<?php
/* @var $this ClientesController */
/* @var $model Clientes */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'clientes') . ' - ' . Yii::t('general', 'create');

$this->breadcrumbs=array(
	Yii::t('general', 'clientes')=>array('index'),
	Yii::t('general', 'create'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'clientes'), 'url'=>array('index')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'clientes'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'create').' '.Yii::t('general', 'cliente'));?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>