<?php
/* @var $this EquiposController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'equipos') . ' - ' . Yii::t('general', 'list');

$this->breadcrumbs=array(
	Yii::t('general', 'equipos'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'equipo'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'equipos'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('general', 'equipos')?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
