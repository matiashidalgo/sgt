<?php
/* @var $this ServiceOficialController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'service_oficiales') . ' - ' . Yii::t('general', 'list');

$this->breadcrumbs=array(
	Yii::t('general', 'service_oficiales'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'service_oficial'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'service_oficiales'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('general', 'service_oficiales')?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
