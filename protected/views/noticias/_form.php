<?php
/* @var $this NoticiasController */
/* @var $model Noticias */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'noticias-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'noticia'); ?>
		<?php echo $form->textArea($model,'noticia',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'noticia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('general', 'create') : Yii::t('general', 'save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->