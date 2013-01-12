<?php
/* @var $this NoticiasController */
/* @var $model Noticias */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'noticias') . ' - ' . Yii::t('general', 'edit');

$this->breadcrumbs=array(
	Yii::t('general', 'noticias')=>array('index'),
	Yii::t('general', 'noticia').' ID='.$model->id=>array('view','id'=>$model->id),
	Yii::t('general', 'edit'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'noticias'), 'url'=>array('index')),
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'noticia'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'details').' '.Yii::t('general', 'noticia'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'noticias'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'edit').' '.Yii::t('general', 'noticia') . ' #' . $model->id); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>