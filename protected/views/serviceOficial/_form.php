<?php
/* @var $this ServiceOficialController */
/* @var $model ServiceOficial */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-oficial-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sitio_web'); ?>
		<?php echo $form->textField($model,'sitio_web',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'sitio_web'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipodeorden'); ?>
		<?php echo $form->textField($model,'tipodeorden',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'tipodeorden'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->