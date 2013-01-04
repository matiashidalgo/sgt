<?php
/* @var $this ImgOrdenesController */
/* @var $model ImgOrdenes */

$this->breadcrumbs=array(
	'Img Ordenes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ImgOrdenes', 'url'=>array('index')),
	array('label'=>'Create ImgOrdenes', 'url'=>array('create')),
	array('label'=>'View ImgOrdenes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ImgOrdenes', 'url'=>array('admin')),
);
?>

<h1>Update ImgOrdenes <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>