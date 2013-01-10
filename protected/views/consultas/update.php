<?php
/* @var $this ConsultasController */
/* @var $model Consultas */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'consultas') . ' - ' . Yii::t('general', 'edit');

$this->breadcrumbs=array(
	Yii::t('general', 'consultas')=>array('index'),
	Yii::t('general', 'consulta').' ID='.$model->id=>array('view','id'=>$model->id),
	Yii::t('general', 'edit'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'consultas'), 'url'=>array('index')),
	//array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'consulta'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'details').' '.Yii::t('general', 'consulta'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'consultas'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'edit').' '.Yii::t('general', 'consultas') . ' #' . $model->id); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>