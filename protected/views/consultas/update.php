<?php
/* @var $this ConsultasController */
/* @var $model Consultas */

$this->breadcrumbs=array(
	'Consultases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Consultas', 'url'=>array('index')),
	array('label'=>'Create Consultas', 'url'=>array('create')),
	array('label'=>'View Consultas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Consultas', 'url'=>array('admin')),
);
?>

<h1>Update Consultas <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>