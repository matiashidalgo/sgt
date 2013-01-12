<?php
/* @var $this ServiceOficialController */
/* @var $model ServiceOficial */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'service_oficiales') . ' - ' . Yii::t('general', 'details');

$this->breadcrumbs=array(
	Yii::t('general', 'service_oficiales')=>array('index'),
	Yii::t('general', 'service_oficial').' ID='.$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'service_oficiales'), 'url'=>array('index')),
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'service_oficial'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'edit').' '.Yii::t('general', 'service_oficial'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('general', 'delete').' '.Yii::t('general', 'service_oficial'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro de eliminar este '.Yii::t('general', 'service_oficial').'?')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'service_oficiales'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'details').' del '.Yii::t('general', 'service_oficial') . ' #' . $model->id); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'nombre',
		'sitio_web',
		'tipodeorden',
	),
)); ?>
