<?php
/* @var $this ImgOrdenesController */
/* @var $model ImgOrdenes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'img-ordenes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nro_orden'); ?>
		<?php echo $form->textField($model,'nro_orden'); ?>
		<?php echo $form->error($model,'nro_orden'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direccion_web'); ?>
		<?php echo $form->textField($model,'direccion_web',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'direccion_web'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->