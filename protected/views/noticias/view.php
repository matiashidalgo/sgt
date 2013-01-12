<?php
/* @var $this NoticiasController */
/* @var $model Noticias */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'noticias') . ' - ' . Yii::t('general', 'details');

$this->breadcrumbs=array(
	Yii::t('general', 'noticias')=>array('index'),
	Yii::t('general', 'noticia').' ID='.$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'noticias'), 'url'=>array('index')),
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'noticia'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'edit').' '.Yii::t('general', 'noticia'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('general', 'delete').' '.Yii::t('general', 'noticia'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro de eliminar esta '.Yii::t('general', 'noticia').'?')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'noticias'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'details').' del '.Yii::t('general', 'noticia') . ' #' . $model->id); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'noticia',
		'fecha',
	),
)); ?>
