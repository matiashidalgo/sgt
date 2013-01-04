<?php
/* @var $this ImgOrdenesController */
/* @var $model ImgOrdenes */

$this->breadcrumbs=array(
	'Img Ordenes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ImgOrdenes', 'url'=>array('index')),
	array('label'=>'Manage ImgOrdenes', 'url'=>array('admin')),
);
?>

<h1>Create ImgOrdenes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>