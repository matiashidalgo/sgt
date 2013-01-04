<?php
/* @var $this ServiceOficialController */
/* @var $model ServiceOficial */

$this->breadcrumbs=array(
	'Service Oficials'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ServiceOficial', 'url'=>array('index')),
	array('label'=>'Create ServiceOficial', 'url'=>array('create')),
	array('label'=>'View ServiceOficial', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ServiceOficial', 'url'=>array('admin')),
);
?>

<h1>Update ServiceOficial <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>