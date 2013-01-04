<?php
/* @var $this ImgOrdenesController */
/* @var $model ImgOrdenes */

$this->breadcrumbs=array(
	'Img Ordenes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ImgOrdenes', 'url'=>array('index')),
	array('label'=>'Create ImgOrdenes', 'url'=>array('create')),
	array('label'=>'Update ImgOrdenes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ImgOrdenes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ImgOrdenes', 'url'=>array('admin')),
);
?>

<h1>View ImgOrdenes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nro_orden',
		'direccion_web',
		'nombre',
	),
)); ?>
