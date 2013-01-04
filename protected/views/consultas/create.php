<?php
/* @var $this ConsultasController */
/* @var $model Consultas */

$this->breadcrumbs=array(
	'Consultases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Consultas', 'url'=>array('index')),
	array('label'=>'Manage Consultas', 'url'=>array('admin')),
);
?>

<h1>Create Consultas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>