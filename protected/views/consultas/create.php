<?php
/* @var $this ConsultasController */
/* @var $model Consultas */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'consultas') . ' - ' . Yii::t('general', 'create');

$this->breadcrumbs=array(
	Yii::t('general', 'consultas')=>array('index'),
	Yii::t('general', 'create'),
);

/*$this->menu=array(
	array('label'=>'List Consultas', 'url'=>array('index')),
	array('label'=>'Manage Consultas', 'url'=>array('admin')),
);*/
?>

<h1><?php echo (Yii::t('general', 'create').' '.Yii::t('general', 'consulta'));?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>