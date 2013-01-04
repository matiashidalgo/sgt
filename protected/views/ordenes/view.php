<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */

$this->breadcrumbs=array(
	'Ordenes'=>array('index'),
	$model->nro_orden,
);

$this->menu=array(
	array('label'=>'List Ordenes', 'url'=>array('index')),
	array('label'=>'Create Ordenes', 'url'=>array('create')),
	array('label'=>'Update Ordenes', 'url'=>array('update', 'id'=>$model->nro_orden)),
	array('label'=>'Delete Ordenes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->nro_orden),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ordenes', 'url'=>array('admin')),
);
?>

<h1>View Ordenes #<?php echo $model->nro_orden; ?></h1>

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
