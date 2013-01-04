<?php
/* @var $this ImgOrdenesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Img Ordenes',
);

$this->menu=array(
	array('label'=>'Create ImgOrdenes', 'url'=>array('create')),
	array('label'=>'Manage ImgOrdenes', 'url'=>array('admin')),
);
?>

<h1>Img Ordenes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
