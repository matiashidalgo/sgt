<?php
/* @var $this StatisticsController */
/* @var $model Statistics */

$this->breadcrumbs=array(
    Yii::t('general', 'Statistics') => array('index'),
	$model->id=>array('view','id'=>$model->id),
    Yii::t('general', 'edit'),
);

$this->menu=array(
    array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'Statistics'), 'url'=>array('index')),
    array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'Statistics'), 'url'=>array('create')),
    array('label'=>Yii::t('general', 'view').' '.Yii::t('general', 'Statistic'), 'url'=>array('view', 'id'=>$model->id)),
    array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'Statistics'), 'url'=>array('admin')),
);
?>

<h1>Update Statistics <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>