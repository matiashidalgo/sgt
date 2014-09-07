<?php
/* @var $this StatisticsController */
/* @var $model Statistics */

$this->breadcrumbs=array(
    Yii::t('general', 'Statistics')=>array('index'),
	$model->id,
);
$this->menu=array(
    array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'Statistics'), 'url'=>array('index')),
    array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'Statistics'), 'url'=>array('create')),
    array('label'=>Yii::t('general', 'view').' '.Yii::t('general', 'Statistic'), 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>Yii::t('general', 'delete').' '.Yii::t('general', 'Statistic'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'Statistics'), 'url'=>array('admin')),
);
?>

<h1>View Statistics #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date_from',
		'date_to',
		'statistic',
	),
)); ?>
