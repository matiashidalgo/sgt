<?php
/* @var $this EquiposController */
/* @var $model Equipos */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'equipos') . ' - ' . Yii::t('general', 'create');

$this->breadcrumbs=array(
	Yii::t('general', 'equipos')=>array('index'),
	Yii::t('general', 'create'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'equipos'), 'url'=>array('index')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'equipos'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'create').' '.Yii::t('general', 'equipos'));?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>