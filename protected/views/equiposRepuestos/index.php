<?php
/* @var $this EquiposRepuestosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Equipos Repuestoses',
);

$this->menu=array(
	array('label'=>'Create EquiposRepuestos', 'url'=>array('create')),
	array('label'=>'Manage EquiposRepuestos', 'url'=>array('admin')),
);
?>

<h1>Equipos Repuestoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
