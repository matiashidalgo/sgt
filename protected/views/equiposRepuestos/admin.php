<?php
/* @var $this EquiposRepuestosController */
/* @var $model EquiposRepuestos */

$this->breadcrumbs=array(
	'Equipos Repuestoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EquiposRepuestos', 'url'=>array('index')),
	array('label'=>'Create EquiposRepuestos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#equipos-repuestos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Equipos Repuestoses</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'equipos-repuestos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_equipo',
		'id_repuesto',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
