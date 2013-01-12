<?php
/* @var $this RepuestosController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'repuestos') . ' - ' . Yii::t('general', 'list');

$this->breadcrumbs=array(
	Yii::t('general', 'repuestos'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'repuesto'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'repuestos'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('general', 'repuestos')?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
