<?php
/* @var $this EquiposRepuestosController */
/* @var $model EquiposRepuestos */

$this->breadcrumbs=array(
	'Equipos Repuestoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EquiposRepuestos', 'url'=>array('index')),
	array('label'=>'Create EquiposRepuestos', 'url'=>array('create')),
	array('label'=>'View EquiposRepuestos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EquiposRepuestos', 'url'=>array('admin')),
);
?>

<h1>Update EquiposRepuestos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>