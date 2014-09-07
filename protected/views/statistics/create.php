<?php
/* @var $this StatisticsController */
/* @var $model Statistics */

$this->breadcrumbs=array(
    Yii::t('general', 'Statistics')=>array('index'),
    Yii::t('general', 'create')
);

$this->menu=array(
    array('label'=>Yii::t('general', 'list').' '.Yii::t('general', 'Statistics'), 'url'=>array('index')),
    array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'Statistics'), 'url'=>array('admin')),
);
?>

<h1>Create Statistics</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>