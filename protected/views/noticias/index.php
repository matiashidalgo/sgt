<?php
/* @var $this NoticiasController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'noticias') . ' - ' . Yii::t('general', 'list');

$this->breadcrumbs=array(
	Yii::t('general', 'noticias'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'noticia'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'noticias'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('general', 'noticias')?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
