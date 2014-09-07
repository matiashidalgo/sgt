<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - ' . Yii::t('general', 'login');
$this->breadcrumbs=array(
	Yii::t('general', 'login'),
);

Yii::app()->clientScript->registerMetaTag('service, oficial, tecnico, taller,consulta, orden de reparacion, orden, reparacion, pedido, saber, necesito, busco, 
										interesa, consultar, estado, seguimiento, consultas, ordenes, reparaciones, arreglo, arreglar, presupuesto, prometido, 
										presupuestacion, utilidad, herramienta, técnico, electronica, electro, servicio, arreglar, tv, lcd, led, tcr, viejo,
										monitores, monitor, tvs, plasma, samsung, philips, sanyo, noblex, philco, jvc, dvd, reproductor, grabador, grabadora,
										video, casetera, casette, service oficial, service tecnico, técnico', 
										'keywords');
										
?>

<h1><?php echo  CHtml::encode(Yii::t('general', 'login')) ?></h1>

<h2>Por favor complete con su usuario y contraseña para ingresar al sistema:</h2>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('general', 'username')); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,Yii::t('general', 'password')); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,Yii::t('general', 'rememberMe')); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('general', 'login')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
