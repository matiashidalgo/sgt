<?php
/* @var $this OrdenesSoController */
/* @var $model OrdenesSo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nro_orden'); ?>
		<?php echo $form->textField($model,'nro_orden'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_serviceo'); ?>
		<?php echo $form->textField($model,'id_serviceo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nro_orden_so'); ?>
		<?php echo $form->textField($model,'nro_orden_so',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_ingreso'); ?>
		<?php echo $form->textField($model,'fecha_ingreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->