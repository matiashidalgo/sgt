<?php
/* @var $this RepuestosController */
/* @var $model Repuestos */

$this->breadcrumbs=array(
	'Repuestoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Repuestos', 'url'=>array('index')),
	array('label'=>'Create Repuestos', 'url'=>array('create')),
	array('label'=>'View Repuestos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Repuestos', 'url'=>array('admin')),
);
?>

<h1>Update Repuestos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>