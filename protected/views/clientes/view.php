<?php
/* @var $this ClientesController */
/* @var $model Clientes */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'clientes') . ' - ' . Yii::t('general', 'details');

$this->breadcrumbs=array(
	Yii::t('general', 'clientes')=>array('index'),
	Yii::t('general', 'cliente').' ID='.$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'clientes'), 'url'=>array('index')),
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'cliente'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'edit').' '.Yii::t('general', 'cliente'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('general', 'delete').' '.Yii::t('general', 'cliente'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro de eliminar este '.Yii::t('general', 'cliente').'?')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'clientes'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'details').' del '.Yii::t('general', 'cliente') . ' #' . $model->id); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'cuenta',
		'admin',
		'password',
		'nombre',
		'apellido',
		'direccion',
		'telefono',
		'celular',
		'ciudad',
		'email',
		'observaciones',
	),
)); ?>
