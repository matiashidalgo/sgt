<?php
/* @var $this ServiceOficialController */
/* @var $model ServiceOficial */

$this->breadcrumbs=array(
	'Service Oficials'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ServiceOficial', 'url'=>array('index')),
	array('label'=>'Manage ServiceOficial', 'url'=>array('admin')),
);
?>

<h1>Create ServiceOficial</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>