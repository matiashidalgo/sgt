<?php
/* @var $this NoticiasController */
/* @var $model Noticias */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'noticias') . ' - ' . Yii::t('general', 'create');

$this->breadcrumbs=array(
	Yii::t('general', 'noticias')=>array('index'),
	Yii::t('general', 'noticia'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'noticias'), 'url'=>array('index')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'noticias'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'create').' '.Yii::t('general', 'noticia'));?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>