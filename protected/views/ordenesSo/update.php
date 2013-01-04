<?php
/* @var $this OrdenesSoController */
/* @var $model OrdenesSo */

$this->breadcrumbs=array(
	'Ordenes Sos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrdenesSo', 'url'=>array('index')),
	array('label'=>'Create OrdenesSo', 'url'=>array('create')),
	array('label'=>'View OrdenesSo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OrdenesSo', 'url'=>array('admin')),
);
?>

<h1>Update OrdenesSo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>