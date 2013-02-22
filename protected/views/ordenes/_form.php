<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */
/* @var $form CActiveForm */

Yii::app()->clientScript->registerScript('popup', "
	$('.popup').dialog({ autoOpen: false, width: 690, height: 'auto', modal: true });
	
	$('.crear-cliente').click(function(){
		$('.popup').html($('.cliente').html())
			.dialog('option', 'title', 'Formulario para crear rapidamente un Cliente')
			.dialog('open');
		$('.cliente').html(' ');
	});
	
	$('.cancel-cliente').live('click',function(){
		$('.cliente').html($('.popup').html());
		$('.popup').dialog('close');
	});
	
	$('.crear-equipo').click(function(){
		$('.popup').html($('.equipo').html())
			.dialog('option', 'title', 'Formulario para crear rapidamente un Equipo')
			.dialog('open');
		$('.equipo').html(' ');
		
	});
	
	$('.cancel-equipo').live('click',function(){
		$('.equipo').html($('.popup').html());
		$('.popup').dialog('close');
	});
	");
date_default_timezone_set('America/Argentina/Buenos_Aires');
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
			echo CHtml::dropDownList(
				'Ordenes[id_cliente]', 
				$model->idCliente, 
				CHtml::listData(Clientes::model()->findAll(), 'id', 'AllConcat'),
				array(
					//'class' => 'opcion-selector',		
					'prompt' => Yii::t('general', 'select_cliente'),
					'ajax' => array(
						'type'=>'POST', //request type
						//'dataType'=>'json',
						'url'=>CController::createUrl('Ordenes/muestraCliente'), //url to call.
						'data'=>array('Ordenes[id_cliente]'=>'js:this.value'),
						'success'=>'function(data){
							$(".Datos-cliente").html(data).show("slow");
						}',									
					)
				)
			);
			
			echo CHtml::Button(Yii::t('general', 'create'),Array('class' => 'crear-cliente'));
		?>
		<?php echo $form->error($model,'id_cliente'); ?>
		
		<div class="Datos-cliente" style="display:none;">
		
		</div>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'id_equipo'); ?>
		<?php //echo $form->textField($model,'id_equipo'); 
			echo CHtml::dropDownList(
				'Ordenes[id_equipo]', 
				$model->idEquipo, 
				CHtml::listData(Equipos::model()->findAll(), 'id', 'AllConcat'), 
				array(
					//'class' => 'opcion-selector',		
					'prompt' => Yii::t('general', 'select_equipo'),
					'ajax' => array(
						'type'=>'POST', //request type
						//'dataType'=>'json',
						'url'=>CController::createUrl('Ordenes/muestraEquipo'), //url to call.
						'data'=>array('Ordenes[id_equipo]'=>'js:this.value'),
						'success'=>'function(data){
							$(".Datos-equipo").html(data).show("slow");
						}',									
					)
				)
			);
			
			echo CHtml::Button(Yii::t('general', 'create'),Array('class' => 'crear-equipo'));
		?>
		<?php echo $form->error($model,'id_equipo'); ?>
		
		<div class="Datos-equipo" style="display:none;">
		
		</div>
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
							'altField' =>  '#alternate_fecha_compra', 
							'altFormat' => 'yy-mm-dd',	 
							/*'minDate'=>0,*/	
							'maxDate'=>0,
							'showAnim'=>'slide',
						),	
						'language'=> Yii::app()->getLanguage(),										
		),true); ?>
		<?php echo $form->hiddenField($model, 'fecha_compra', array('id'=> 'alternate_fecha_compra'));?>
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
										$model->fecha_ingreso,'medium',null) : date('d-m-Y'),
						'options' => array(
							'changeMonth' => true,
							'changeYear' => true,
							'altField' =>  '#alternate_fecha_ingreso', 
							'altFormat' => 'yy-mm-dd',	 
							/*'minDate'=>0,*/	
							'maxDate'=>0,
							'showAnim'=>'slide',
						),	
						'language'=> Yii::app()->getLanguage(),	
						
		),true); ?>
		<?php echo $form->hiddenField($model, 'fecha_ingreso', array('id'=> 'alternate_fecha_ingreso'));?>
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
							'altField' =>  '#alternate_fecha_presupuesto', 
							'altFormat' => 'yy-mm-dd',	 
							/*'minDate'=>0,*/	
							'maxDate'=>0,
							'showAnim'=>'slide',
						),	
						'language'=> Yii::app()->getLanguage(),										
		),true); ?>
		<?php echo $form->hiddenField($model, 'fecha_presupuesto', array('id'=> 'alternate_fecha_presupuesto'));?>
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
							'altField' =>  '#alternate_fecha_reparado', 
							'altFormat' => 'yy-mm-dd',	 
							/*'minDate'=>0,*/	
							'maxDate'=>0,
							'showAnim'=>'slide',
						),	
						'language'=> Yii::app()->getLanguage(),										
		),true); ?>
		<?php echo $form->hiddenField($model, 'fecha_reparado', array('id'=> 'alternate_fecha_reparado'));?>
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
							'altField' =>  '#alternate_fecha_prometido', 
							'altFormat' => 'yy-mm-dd',	 
							/*'minDate'=>0,	
							'maxDate'=>0,*/
							'showAnim'=>'slide',
						),	
						'language'=> Yii::app()->getLanguage(),										
		),true); ?>
		<?php echo $form->hiddenField($model, 'fecha_prometido', array('id'=> 'alternate_fecha_prometido'));?>
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
							'altField' =>  '#alternate_fecha_entrega', 
							'altFormat' => 'yy-mm-dd',	 
							/*'minDate'=>0,*/	
							'maxDate'=>0,
							'showAnim'=>'slide',
						),	
						'language'=> Yii::app()->getLanguage(),										
		),true); ?>
		<?php echo $form->hiddenField($model, 'fecha_entrega', array('id'=> 'alternate_fecha_entrega'));?>
		<?php echo $form->error($model,'fecha_entrega'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>
	
	<div class="row">
		<?php echo Yii::t('general', 'has_service_oficial'); ?>
		<?php echo CHtml::checkBox('service_oficial',0,array('size'=>50,'maxlength'=>50,'checked'=>'uncheched')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('general', 'create') : Yii::t('general', 'save')); ?>
	</div>

<?php $this->endWidget(); ?>

<div class="popup"></div>

<div class="cliente" style="display:none;">
	
		<div class="row">
			<?php echo $form->labelEx($model_cliente,'cuenta'); ?>
			<?php echo $form->textField($model_cliente,'cuenta',array('size'=>16,'maxlength'=>16)); ?>
			<?php echo $form->error($model_cliente,'cuenta'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_cliente,'password'); ?>
			<?php echo $form->passwordField($model_cliente,'password',array('size'=>16,'maxlength'=>16)); ?>
			<?php echo $form->error($model_cliente,'password'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_cliente,'nombre'); ?>
			<?php echo $form->textField($model_cliente,'nombre',array('size'=>30,'maxlength'=>30)); ?>
			<?php echo $form->error($model_cliente,'nombre'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_cliente,'apellido'); ?>
			<?php echo $form->textField($model_cliente,'apellido',array('size'=>30,'maxlength'=>30)); ?>
			<?php echo $form->error($model_cliente,'apellido'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_cliente,'direccion'); ?>
			<?php echo $form->textField($model_cliente,'direccion',array('size'=>40,'maxlength'=>40)); ?>
			<?php echo $form->error($model_cliente,'direccion'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_cliente,'telefono'); ?>
			<?php echo $form->textField($model_cliente,'telefono',array('size'=>13,'maxlength'=>13)); ?>
			<?php echo $form->error($model_cliente,'telefono'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_cliente,'celular'); ?>
			<?php echo $form->textField($model_cliente,'celular',array('size'=>13,'maxlength'=>13)); ?>
			<?php echo $form->error($model_cliente,'celular'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_cliente,'ciudad'); ?>
			<?php echo $form->textField($model_cliente,'ciudad',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model_cliente,'ciudad'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_cliente,'email'); ?>
			<?php echo $form->textField($model_cliente,'email',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model_cliente,'email'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_cliente,'observaciones'); ?>
			<?php echo $form->textArea($model_cliente,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model_cliente,'observaciones'); ?>
		</div>
		
		<?php 
		// Para poder Crear un cliente que no esta
			echo CHtml::ajaxButton(
                Yii::t('general', 'save'),
                array('ordenes/creaClienteRap'),
                array('data'=>array(
                                 'cuenta'=>'js:$("#Clientes_cuenta").val()',
                                 'password'=>'js:$("#Clientes_password").val()',
								 'nombre'=>'js:$("#Clientes_nombre").val()',
								 'apellido'=>'js:$("#Clientes_apellido").val()',
								 'direccion'=>'js:$("#Clientes_direccion").val()',
								 'telefono'=>'js:$("#Clientes_telefono").val()',
								 'celular'=>'js:$("#Clientes_celular").val()',
								 'ciudad'=>'js:$("#Clientes_ciudad").val()',
								 'email'=>'js:$("#Clientes_email").val()',
								 'observaciones'=>'js:$("#Clientes_observaciones").val()',
                             ),
                       'type'=>'POST',
					   'success'=>'function(data){
							$("#Ordenes_id_cliente").append(data);
							$(".cliente").html($(".popup").html());
							$(".popup").dialog("close");
						}'
                    )
            );
			
			echo CHtml::Button(Yii::t('general', 'cancel'),Array('class' => 'cancel-cliente'));
		?>
</div>

<div class="equipo" style="display:none;">
	
		<div class="row">
			<?php echo $form->labelEx($model_equipo,'tipo'); ?>
			<?php echo $form->textField($model_equipo,'tipo',array('size'=>30,'maxlength'=>30)); ?>
			<?php echo $form->error($model_equipo,'tipo'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_equipo,'modelo'); ?>
			<?php echo $form->textField($model_equipo,'modelo',array('size'=>30,'maxlength'=>30)); ?>
			<?php echo $form->error($model_equipo,'modelo'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model_equipo,'marca'); ?>
			<?php echo $form->textField($model_equipo,'marca',array('size'=>30,'maxlength'=>30)); ?>
			<?php echo $form->error($model_equipo,'marca'); ?>
		</div>
		
		<?php 
		// Para poder Crear un equipo que no esta
			echo CHtml::ajaxButton(
                Yii::t('general', 'save'),
                array('ordenes/creaEquipoRap'),
                array('data'=>array(
                                 'tipo'=>'js:$("#Equipos_tipo").val()',
                                 'modelo'=>'js:$("#Equipos_modelo").val()',
								 'marca'=>'js:$("#Equipos_marca").val()',
                             ),
                       'type'=>'POST',
					   'success'=>'function(data){
							$("#Ordenes_id_equipo").append(data);
							$(".equipo").html($(".popup").html());
							$(".popup").dialog("close");
						}'
                    )
            );
			
			echo CHtml::Button(Yii::t('general', 'cancel'),Array('class' => 'cancel-equipo'));
		?>
</div>

</div><!-- form -->