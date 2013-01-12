<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */
$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'ordenes') . ' - ' . Yii::t('general', 'details');

$this->breadcrumbs=array(
	Yii::t('general', 'ordenes')=>array('index'),
	Yii::t('general', 'orden').' ID='.$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'ordenes'), 'url'=>array('index')),
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'orden'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'edit').' '.Yii::t('general', 'orden'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('general', 'delete').' '.Yii::t('general', 'orden'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro de eliminar esta '.Yii::t('general', 'orden').'?')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'ordenes'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'details').' del '.Yii::t('general', 'orden') . ' #' . $model->id); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nro_orden',
		'id_cliente',
		'id_equipo',
		'nro_serie',
		'adquirido_en',
		'nro_factura',
		'fecha_compra',
		'falla',
		'reparacion',
		'fecha_ingreso',
		'fecha_presupuesto',
		'fecha_reparado',
		'fecha_prometido',
		'fecha_entrega',
		'estado',
	),
)); ?>
