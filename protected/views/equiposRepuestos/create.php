<?php
/* @var $this EquiposRepuestosController */
/* @var $model EquiposRepuestos */

$this->breadcrumbs=array(
	'Equipos Repuestoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EquiposRepuestos', 'url'=>array('index')),
	array('label'=>'Manage EquiposRepuestos', 'url'=>array('admin')),
);
?>

<h1>Create EquiposRepuestos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>