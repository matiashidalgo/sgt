<?php
/* @var $this StatisticsController */
/* @var $model Statistics */

$this->breadcrumbs=array(
	Yii::t('general', 'Statistics')=>array('index'),
	Yii::t('general', 'admin'),
);

$this->menu=array(
    array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'Statistics'), 'url'=>array('index')),
    array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'Statistics'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#statistics-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Statistics</h1>

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
	'id'=>'statistics-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array('name'=>'nombrecliente',
			'header'=>'Cliente',
			'type' => 'raw',
			'value'=>'CHtml::link($data->idTecnico->apellido . " " . $data->idTecnico->nombre,Yii::app()->controller->createUrl("view",array("id"=>$data->primaryKey)))'),
		'date_from',
		'date_to',
		'statistic',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
