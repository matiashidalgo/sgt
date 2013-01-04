<?php
/* @var $this EquiposRepuestosController */
/* @var $model EquiposRepuestos */

$this->breadcrumbs=array(
	'Equipos Repuestoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EquiposRepuestos', 'url'=>array('index')),
	array('label'=>'Create EquiposRepuestos', 'url'=>array('create')),
	array('label'=>'Update EquiposRepuestos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EquiposRepuestos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EquiposRepuestos', 'url'=>array('admin')),
);
?>

<h1>View EquiposRepuestos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_equipo',
		'id_repuesto',
	),
)); ?>
