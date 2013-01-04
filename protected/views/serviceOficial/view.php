<?php
/* @var $this ServiceOficialController */
/* @var $model ServiceOficial */

$this->breadcrumbs=array(
	'Service Oficials'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ServiceOficial', 'url'=>array('index')),
	array('label'=>'Create ServiceOficial', 'url'=>array('create')),
	array('label'=>'Update ServiceOficial', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ServiceOficial', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ServiceOficial', 'url'=>array('admin')),
);
?>

<h1>View ServiceOficial #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'sitio_web',
		'tipodeorden',
	),
)); ?>
