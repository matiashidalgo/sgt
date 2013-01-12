<?php
/* @var $this NoticiasController */
/* @var $model Noticias */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<?php /* 
	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>
*/ ?>
	<div class="row">
		<?php echo $form->label($model,'noticia'); ?>
		<?php echo $form->textArea($model,'noticia',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('general', 'search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->