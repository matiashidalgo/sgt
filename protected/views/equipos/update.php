<?php
/* @var $this EquiposController */
/* @var $model Equipos */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'equipos') . ' - ' . Yii::t('general', 'edit');
 
$this->breadcrumbs=array(
	Yii::t('general', 'equipos')=>array('index'),
	Yii::t('general', 'equipo').' ID='.$model->id=>array('view','id'=>$model->id),
	Yii::t('general', 'edit'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'equipos'), 'url'=>array('index')),
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'equipo'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'details').' '.Yii::t('general', 'equipo'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'equipos'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'edit').' '.Yii::t('general', 'equipos') . ' #' . $model->id); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>