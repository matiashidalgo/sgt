<?php
/* @var $this OrdenesSoController */
/* @var $model OrdenesSo */

$this->breadcrumbs=array(
	'Ordenes Sos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OrdenesSo', 'url'=>array('index')),
	array('label'=>'Create OrdenesSo', 'url'=>array('create')),
	array('label'=>'Update OrdenesSo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OrdenesSo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrdenesSo', 'url'=>array('admin')),
);
?>

<h1>View OrdenesSo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nro_orden',
		'id_serviceo',
		'nro_orden_so',
		'fecha_ingreso',
		'estado',
	),
)); ?>
