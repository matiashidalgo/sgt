<?php
/* @var $this ServiceOficialController */
/* @var $model ServiceOficial */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'service_oficiales') . ' - ' . Yii::t('general', 'create');

$this->breadcrumbs=array(
	Yii::t('general', 'service_oficiales')=>array('index'),
	Yii::t('general', 'service_oficial'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'service_oficiales'), 'url'=>array('index')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'service_oficiales'), 'url'=>array('admin')),
);
?>

<h1><?php echo (Yii::t('general', 'create').' '.Yii::t('general', 'service_oficial'));?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>