<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ordenes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nro_orden'); ?>
		<?php echo $form->textField($model,'nro_orden'); ?>
		<?php echo $form->error($model,'nro_orden'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_cliente'); ?>
		<?php //echo $form->textField($model,'id_cliente'); 
			echo CHtml::dropDownList('Ordenes[id_cliente]', $model->idCliente, CHtml::listData(Clientes::model()->findAll(), 'id', 'nombre'));
		?>
		<?php echo $form->error($model,'id_cliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_equipo'); ?>
		<?php //echo $form->textField($model,'id_equipo'); 
			echo CHtml::dropDownList('Ordenes[id_equipo]', $model->idEquipo, CHtml::listData(Equipos::model()->findAll(), 'id', 'tipo'));
		?>
		<?php echo $form->error($model,'id_equipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nro_serie'); ?>
		<?php echo $form->textField($model,'nro_serie',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nro_serie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adquirido_en'); ?>
		<?php echo $form->textField($model,'adquirido_en',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'adquirido_en'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nro_factura'); ?>
		<?php echo $form->textField($model,'nro_factura',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nro_factura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_compra'); ?>
		<?php echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
						'model'=> $model,
						'name' => 'fecha_compra',
						'value' => isset($model->fecha_compra) && !empty($model->fecha_compra) ? 
									Yii::app()->locale->dateFormatter->formatDateTime(
										$model->fecha_compra,'medium',null) : '',
						'options' => array(
							'changeMonth' => true,
							'changeYear' => true,
							/* 'altField' =>  '#alternate_start_date', 
							'altFormat' => 'yy-mm-dd',	 */	
							'minDate'=>0,
							'showAnim'=>'slide',
						),	
						'language'=> Yii::app()->getLanguage(),										
		),true); ?>
		
		<?php echo $form->error($model,'fecha_compra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'falla'); ?>
		<?php echo $form->textField($model,'falla',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'falla'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reparacion'); ?>
		<?php echo $form->textArea($model,'reparacion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'reparacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_ingreso'); ?>
		<?php echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
						'model'=> $model,
						'name' => 'fecha_ingreso',
						'value' => isset($model->fecha_ingreso) && !empty($model->fecha_ingreso) ? 
									Yii::app()->locale->dateFormatter->formatDateTime(
										$model->fecha_ingreso,'medium',null) : '',
						'options' => array(
							'changeMonth' => true,
							'changeYear' => true,
							/* 'altField' =>  '#alternate_start_date', 
							'altFormat' => 'yy-mm-dd',		 */
							'minDate'=>0,
							'showAnim'=>'slide',
						),	
						'language'=> Yii::app()->getLanguage(),										
		),true); ?>
		<?php echo $form->error($model,'fecha_ingreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_presupuesto'); ?>
		<?php echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
						'model'=> $model,
						'name' => 'fecha_presupuesto',
						'value' => isset($model->fecha_presupuesto) && !empty($model->fecha_presupuesto) ? 
									Yii::app()->locale->dateFormatter->formatDateTime(
										$model->fecha_presupuesto,'medium',null) : '',
						'options' => array(
							'changeMonth' => true,
							'changeYear' => true,
							/* 'altField' =>  '#alternate_start_date', 
							'altFormat' => 'yy-mm-dd',	 */	
							'minDate'=>0,
							'showAnim'=>'slide',
						),	
						'language'=> Yii::app()->getLanguage(),										
		),true); ?>
		<?php echo $form->error($model,'fecha_presupuesto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_reparado'); ?>
		<?php echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
						'model'=> $model,
						'name' => 'fecha_reparado',
						'value' => isset($model->fecha_reparado) && !empty($model->fecha_reparado) ? 
									Yii::app()->locale->dateFormatter->formatDateTime(
										$model->fecha_reparado,'medium',null) : '',
						'options' => array(
							'changeMonth' => true,
							'changeYear' => true,
							/* 'altField' =>  '#alternate_start_date', 
							'altFormat' => 'yy-mm-dd',		 */
							'minDate'=>0,
							'showAnim'=>'slide',
						),	
						'language'=> Yii::app()->getLanguage(),										
		),true); ?>
		<?php echo $form->error($model,'fecha_reparado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_prometido'); ?>
		<?php echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
						'model'=> $model,
						'name' => 'fecha_prometido',
						'value' => isset($model->fecha_prometido) && !empty($model->fecha_prometido) ? 
									Yii::app()->locale->dateFormatter->formatDateTime(
										$model->fecha_prometido,'medium',null) : '',
						'options' => array(
							'changeMonth' => true,
							'changeYear' => true,
							/* 'altField' =>  '#alternate_start_date', 
							'altFormat' => 'yy-mm-dd',		 */
							'minDate'=>0,
							'showAnim'=>'slide',
						),	
						'language'=> Yii::app()->getLanguage(),										
		),true); ?>
		<?php echo $form->error($model,'fecha_prometido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_entrega'); ?>
		<?php echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
						'model'=> $model,
						'name' => 'fecha_entrega',
						'value' => isset($model->fecha_entrega) && !empty($model->fecha_entrega) ? 
									Yii::app()->locale->dateFormatter->formatDateTime(
										$model->fecha_entrega,'medium',null) : '',
						'options' => array(
							'changeMonth' => true,
							'changeYear' => true,
							/* 'altField' =>  '#alternate_start_date', 
							'altFormat' => 'yy-mm-dd',	 */	
							'minDate'=>0,
							'showAnim'=>'slide',
						),	
						'language'=> Yii::app()->getLanguage(),										
		),true); ?>
		<?php echo $form->error($model,'fecha_entrega'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('general', 'create') : Yii::t('general', 'save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->