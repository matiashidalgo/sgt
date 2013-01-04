<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */

$this->breadcrumbs=array(
	'Ordenes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ordenes', 'url'=>array('index')),
	array('label'=>'Manage Ordenes', 'url'=>array('admin')),
);
?>

<h1>Create Ordenes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>