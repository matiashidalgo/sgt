<?php
/* @var $this RepuestosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Repuestoses',
);

$this->menu=array(
	array('label'=>'Create Repuestos', 'url'=>array('create')),
	array('label'=>'Manage Repuestos', 'url'=>array('admin')),
);
?>

<h1>Repuestoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
