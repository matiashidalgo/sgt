<?php
/* @var $this OrdenesSoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ordenes Sos',
);

$this->menu=array(
	array('label'=>'Create OrdenesSo', 'url'=>array('create')),
	array('label'=>'Manage OrdenesSo', 'url'=>array('admin')),
);
?>

<h1>Ordenes Sos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
