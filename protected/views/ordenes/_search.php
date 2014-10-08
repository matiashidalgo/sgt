<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'nro_orden'); ?>
		<?php echo $form->textField($model,'nro_orden'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_cliente'); ?>
		<?php echo $form->textField($model,'id_cliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_equipo'); ?>
		<?php echo $form->textField($model,'id_equipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nro_serie'); ?>
		<?php echo $form->textField($model,'nro_serie',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adquirido_en'); ?>
		<?php echo $form->textField($model,'adquirido_en',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nro_factura'); ?>
		<?php echo $form->textField($model,'nro_factura',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_compra'); ?>
		<?php echo $form->textField($model,'fecha_compra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'falla'); ?>
		<?php echo $form->textField($model,'falla',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reparacion'); ?>
		<?php echo $form->textArea($model,'reparacion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_ingreso'); ?>
		<?php echo $form->textField($model,'fecha_ingreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_presupuesto'); ?>
		<?php echo $form->textField($model,'fecha_presupuesto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_reparado'); ?>
		<?php echo $form->textField($model,'fecha_reparado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_prometido'); ?>
		<?php echo $form->textField($model,'fecha_prometido'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_entrega'); ?>
		<?php echo $form->textField($model,'fecha_entrega'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>50,'maxlength'=>50)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'precio'); ?>
		<?php echo $form->textField($model,'precio',array('size'=>20,'maxlength'=>20)); ?>
	</div>

    <div class="row">
        <?php echo $form->label($model,'gastos'); ?>
        <?php echo $form->textField($model,'gastos',array('size'=>20,'maxlength'=>20)); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('general', 'search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->