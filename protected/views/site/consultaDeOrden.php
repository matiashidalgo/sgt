<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . " - " . Yii::t('general', 'consultaDeOrden');

Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl . '/css/consultarOrden.css');

Yii::app()->clientScript->registerMetaTag('service, oficial, tecnico, taller,consulta, orden de reparacion, orden, reparacion, pedido, saber, necesito, busco, 
										interesa, consultar, estado, seguimiento, consultas, ordenes, reparaciones, arreglo, arreglar, presupuesto, prometido, 
										presupuestacion, utilidad, herramienta, técnico, electronica, electro, servicio, arreglar, tv, lcd, led, tcr, viejo,
										monitores, monitor, tvs, plasma, samsung, philips, sanyo, noblex, philco, jvc, dvd, reproductor, grabador, grabadora,
										video, casetera, casette, service oficial, service tecnico, técnico', 
										'keywords');

?>

<h1><?php echo CHtml::encode(Yii::t('general', 'consultaDeOrden'))?></h1>

<h2>
	Ingrese el Número de orden y la contraseña que se le asigno para consultar el estado de su equipo en reparación
</h2>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'POST',
)); ?>
<div class="campos">
	<div class="row">
		<?php echo $form->label($model_orden,Yii::t('general', 'nro_orden')); ?> 
		<?php echo $form->textField($model_orden,'nro_orden'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model_cliente,Yii::t('general', 'password')); ?> 
		<?php echo $form->passwordField($model_cliente,'password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('general', 'consultar')); ?>
	</div>
</div>
<?php $this->endWidget(); ?>

