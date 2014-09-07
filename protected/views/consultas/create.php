<?php
/* @var $this ConsultasController */
/* @var $model Consultas */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'contact');

$this->breadcrumbs=array(
	Yii::t('general', 'contact'),
); 

Yii::app()->clientScript->registerMetaTag('service, oficial, tecnico, taller,consulta, orden de reparacion, orden, reparacion, pedido, saber, necesito, busco, 
										interesa, consultar, estado, seguimiento, consultas, ordenes, reparaciones, arreglo, arreglar, presupuesto, prometido, 
										presupuestacion, utilidad, herramienta, técnico, electronica, electro, servicio, arreglar, tv, lcd, led, tcr, viejo,
										monitores, monitor, tvs, plasma, samsung, philips, sanyo, noblex, philco, jvc, dvd, reproductor, grabador, grabadora,
										video, casetera, casette, service oficial, service tecnico, técnico', 
										'keywords');

/*$this->menu=array(
	array('label'=>'List Consultas', 'url'=>array('index')),
	array('label'=>'Manage Consultas', 'url'=>array('admin')),
);*/
?>

<h1><?php echo ('Dejanos tu '.Yii::t('general', 'consulta'));?></h1>
<h2>Nosotros nos comunicaremos con usted a la brevedad para disipar sus inquietudes.</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>