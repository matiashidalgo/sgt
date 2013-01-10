<?php
/* @var $this ConsultasController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'consultas') . ' - ' . Yii::t('general', 'list');

$this->breadcrumbs=array(
	Yii::t('general', 'consultas'),
);

$this->menu=array(
	//array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'consulta'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'consultas'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('general', 'consultas')?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
