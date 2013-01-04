<?php
/* @var $this EquiposRepuestosController */
/* @var $model EquiposRepuestos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'equipos-repuestos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_equipo'); ?>
		<?php echo $form->textField($model,'id_equipo'); ?>
		<?php echo $form->error($model,'id_equipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_repuesto'); ?>
		<?php echo $form->textField($model,'id_repuesto'); ?>
		<?php echo $form->error($model,'id_repuesto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->