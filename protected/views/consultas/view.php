<?php
/* @var $this ConsultasController */
/* @var $model Consultas */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'consultas') . ' - ' . Yii::t('general', 'details');

$this->breadcrumbs=array(
	Yii::t('general', 'consultas')=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'consultas'), 'url'=>array('index')),
	//array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'consulta'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'edit').' '.Yii::t('general', 'consulta'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('general', 'delete').' '.Yii::t('general', 'consulta'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro de eliminar esta '.Yii::t('general', 'consulta').'?')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'consultas'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'details').' de la '.Yii::t('general', 'consulta') . ' #' . $model->id); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'nombre',
		'apellido',
		'telefono',
		'email',
		'consulta',
	),
)); ?>
