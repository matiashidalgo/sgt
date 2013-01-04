<?php
/* @var $this RepuestosController */
/* @var $model Repuestos */

$this->breadcrumbs=array(
	'Repuestoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Repuestos', 'url'=>array('index')),
	array('label'=>'Create Repuestos', 'url'=>array('create')),
	array('label'=>'Update Repuestos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Repuestos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Repuestos', 'url'=>array('admin')),
);
?>

<h1>View Repuestos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'descripcion',
		'tipo',
		'marca',
		'estado',
		'observaciones',
		'cantidad',
		'ubicacion',
	),
)); ?>
