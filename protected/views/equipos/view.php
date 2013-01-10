<?php
/* @var $this EquiposController */
/* @var $model Equipos */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'equipos') . ' - ' . Yii::t('general', 'details');

$this->breadcrumbs=array(
	Yii::t('general', 'equipos')=>array('index'),
	Yii::t('general', 'equipo').' ID='.$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'equipos'), 'url'=>array('index')),
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'equipo'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'edit').' '.Yii::t('general', 'equipo'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('general', 'delete').' '.Yii::t('general', 'equipo'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro de eliminar este '.Yii::t('general', 'equipo').'?')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'equipos'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'details').' del '.Yii::t('general', 'equipo') . ' #' . $model->id); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'tipo',
		'modelo',
		'marca',
	),
)); ?>
