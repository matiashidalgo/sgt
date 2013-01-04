<?php
/* @var $this OrdenesSoController */
/* @var $model OrdenesSo */

$this->breadcrumbs=array(
	'Ordenes Sos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrdenesSo', 'url'=>array('index')),
	array('label'=>'Manage OrdenesSo', 'url'=>array('admin')),
);
?>

<h1>Create OrdenesSo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>