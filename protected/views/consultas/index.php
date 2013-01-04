<?php
/* @var $this ConsultasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Consultases',
);

$this->menu=array(
	array('label'=>'Create Consultas', 'url'=>array('create')),
	array('label'=>'Manage Consultas', 'url'=>array('admin')),
);
?>

<h1>Consultases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
