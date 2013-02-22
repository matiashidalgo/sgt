<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . " - " . Yii::t('general', 'consultaDeOrden');

Yii::app()->getClientScript()->registerCssFile(Yii::app()->baseUrl . '/css/consultarOrden.css');
?>

<h1><?php echo CHtml::encode(Yii::t('general', 'consultaDeOrden'))?></h1>

<p>
	Ingrese el Número de orden y la contraseña que se le asigno para consultar el estado de su equipo en reparación
</p>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
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

