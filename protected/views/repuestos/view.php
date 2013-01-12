<?php
/* @var $this RepuestosController */
/* @var $model Repuestos */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'repuestos') . ' - ' . Yii::t('general', 'details');

$this->breadcrumbs=array(
	Yii::t('general', 'repuestos')=>array('index'),
	Yii::t('general', 'repuesto').' ID='.$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'repuestos'), 'url'=>array('index')),
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'repuesto'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'edit').' '.Yii::t('general', 'repuesto'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('general', 'delete').' '.Yii::t('general', 'repuesto'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro de eliminar este '.Yii::t('general', 'repuesto').'?')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'repuestos'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'details').' del '.Yii::t('general', 'repuesto') . ' #' . $model->id); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'descripcion',
		'tipo',
		'marca',
		'estado',
		'observaciones',
		'cantidad',
		'ubicacion',
	),
)); ?>
