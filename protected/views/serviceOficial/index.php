<?php
/* @var $this ServiceOficialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Service Oficials',
);

$this->menu=array(
	array('label'=>'Create ServiceOficial', 'url'=>array('create')),
	array('label'=>'Manage ServiceOficial', 'url'=>array('admin')),
);
?>

<h1>Service Oficials</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
