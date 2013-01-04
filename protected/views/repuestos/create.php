<?php
/* @var $this RepuestosController */
/* @var $model Repuestos */

$this->breadcrumbs=array(
	'Repuestoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Repuestos', 'url'=>array('index')),
	array('label'=>'Manage Repuestos', 'url'=>array('admin')),
);
?>

<h1>Create Repuestos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>