<?php
/* @var $this NoticiasController */
/* @var $model Noticias */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'noticias') . ' - ' . Yii::t('general', 'admin');

$this->breadcrumbs=array(
	Yii::t('general', 'noticias')=>array('index'),
	Yii::t('general', 'admin'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'noticias'), 'url'=>array('index')),
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'noticia'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle('slow');
	return false;
});
$('.search-form form').submit(function(){
	$('#noticias-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo (Yii::t('general', 'admin').' '.Yii::t('general', 'noticia')); ?></h1>

<p>
Para lograr un resultado de mas concreto puede utilizar operadores de comparacion (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al comienzo de cada campo
</p>

<?php echo CHtml::link(Yii::t('general','advanced_search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'noticias-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'noticia',
		'fecha',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
