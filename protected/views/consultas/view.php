<?php
/* @var $this ConsultasController */
/* @var $model Consultas */

$this->breadcrumbs=array(
	'Consultases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Consultas', 'url'=>array('index')),
	array('label'=>'Create Consultas', 'url'=>array('create')),
	array('label'=>'Update Consultas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Consultas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Consultas', 'url'=>array('admin')),
);
?>

<h1>View Consultas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'apellido',
		'telefono',
		'email',
		'consulta',
	),
)); ?>
