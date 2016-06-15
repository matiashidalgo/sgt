<?php
/* @var $this OrdenesController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'ordenes') . ' - ' . Yii::t('general', 'list');

$this->breadcrumbs=array(
	Yii::t('general', 'ordenes'),
);

$this->menu=array(
	array('label'=>Yii::t('general', 'create').' '.Yii::t('general', 'orden'), 'url'=>array('create')),
	array('label'=>Yii::t('general', 'admin').' '.Yii::t('general', 'ordenes'), 'url'=>array('admin')),
	array('label'=>'Listar todas las ordenes', 'url'=>array('Index')),
	array('label'=>Yii::t('general', 'listOrdenesEntregadas'), 'url'=>array('ordenesEntregadas')),
	array('label'=>'Listar ordenes pendientes', 'url'=>array('OrdenesPendientes')),
);
?>

<h1><?php echo Yii::t('general', 'ordenes')?></h1>


<?php
$cualqueira = 'TODAS';
	
echo '<div style="margin-left:10px">Listando a ' . $tecnico . '</div>';
echo '<br>';

echo '<div>';
echo CHtml::dropDownList(
    'tecnicos',
    $cualqueira,
    CHtml::listData(Clientes::model()->findAll(array('condition'=>'admin <> 0')), 'id', 'nombre'),
    array(
        'empty'    => 'Elija un tecnico',
        'onchange' => 'document.location.href = "/index.php/ordenes/' . $urlaccion .'?id=" + this.value',
    )
);
echo '</div>';
?>





<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
