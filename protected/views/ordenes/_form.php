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
		/*
		$('.popup').html($('.equipo').html())
			.dialog('option', 'title', 'Formulario para crear rapidamente un Equipo')
			.dialog('open');
		$('.equipo').html(' ');
		*/
		$('.equipo').slideToggle('slow');
		
	});
	
	$('.cancel-equipo').live('click',function(){
		/*
		$('.equipo').html($('.popup').html());
		$('.popup').dialog('close');
		*/
		$('.equipo').slideToggle('slow');
	});
	
	$('#fecha_compra').focusout(function(){
		
		if($(this).val() == ''){
			$('#alternate_fecha_compra').val('');
		}
	
	});
	
	$('#fecha_ingreso').focusout(function(){
		
		if($(this).val() == ''){
			$('#alternate_fecha_ingreso').val('');
		}
	
	});
	
	$('#fecha_prometido').focusout(function(){
		
		if($(this).val() == ''){
			$('#alternate_fecha_prometido').val('');
		}
	
	});
	
	$('#fecha_entrega').focusout(function(){
		
		if($(this).val() == ''){
			$('#alternate_fecha_entrega').val('');
		}
	
	});
	
	$('#fecha_reparado').focusout(function(){
		
		if($(this).val() == ''){
			$('#alternate_fecha_reparado').val('');
		}
	
	});
	
	$('#fecha_presupuesto').focusout(function(){
		
		if($(this).val() == ''){
			$('#alternate_fecha_presupuesto').val('');
		}
	
	});
	");
date_default_timezone_set('America/Argentina/Buenos_Aires');
$valEquipo = '';
$valCliente = '';
if(!$model->getIsNewRecord()) {
    $valCliente = $model->idCliente->getAllConcat();
    $valEquipo = $model->idEquipo->getAllConcat();
}
?>
<script type="text/javascript">
    function setClienteId($this)
    {
        $('#Ordenes_id_cliente').val(parseInt($($this).val().split("-",1)));
    }
    function setEquipoId($this)
    {
        $('#Ordenes_id_equipo').val(parseInt($($this).val().split("-",1)));
    }
</script>
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
		<?php echo $form->hiddenField($model,'id_cliente');
        $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
            'name'=>'Ordenes[cliente]',
            //'sourceUrl'=>'sugerenciasModelo',
            'source'=>$autocompletes['Clientes'],
            // additional javascript options for the autocomplete plugin
            'options'=>array(
                'minLength'=>'2'
            ),
            'value' => $valCliente,
            'htmlOptions' => array(
                'id'=>'cliente',
                'onblur' => 'setClienteId(this)'
            ),
        ));
			echo CHtml::Button(Yii::t('general', 'create'),Array('class' => 'crear-cliente'));
		?>
		<?php echo $form->error($model,'id_cliente'); ?>
		
		<div class="Datos-cliente" style="display:none;">
		
		</div>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'id_equipo'); ?>
		<?php echo $form->hiddenField($model,'id_equipo');
        $this->widget('zii.widgets.jui.CJuiAutoComplete',array(
            'name'=>'Ordenes[equipo]',
            //'sourceUrl'=>'sugerenciasModelo',
            'source'=>$autocompletes['Equipos'],
            // additional javascript options for the autocomplete plugin
            'options'=>array(
                'minLength'=>'2'
            ),
            'value' => $valEquipo,
            'htmlOptions' => array(
                'id'=>'equipo',
                'onblur' => 'setEquipoId(this)'
            ),
        ));

			echo CHtml::Button(Yii::t('general', 'create'),Array('class' => 'crear-equipo'));
		?>
		<?php echo $form->error($model,'id_equipo'); ?>
		
		
		<div class="equipo" style="display:none">
	
				<div class="row">
					<?php echo $form->labelEx($model_equipo,'tipo'); ?>
					<?php //echo $form->textField($model_equipo,'tipo',array('size'=>30,'maxlength'=>30)); ?>
					<?php
				
						$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
							'name'=>'Equipos[tipo]',
							//'sourceUrl'=>'sugerenciasModelo',
							'source'=>$autocompletes['Equipos_Tipos'],
							// additional javascript options for the autocomplete plugin
							'options'=>array(
								'minLength'=>'2',
								'maxLength'=>'30',
								'size'=>'30',
							),
							'htmlOptions' => array(
								'id'=>'Equipos_tipo',
							),
						));
					
					?>
					<?php echo $form->error($model_equipo,'tipo'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model_equipo,'modelo'); ?>
					<?php //echo $form->textField($model_equipo,'modelo',array('size'=>30,'maxlength'=>30)); ?>
					<?php
				
						$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
							'name'=>'Equipos[modelo]',
							//'sourceUrl'=>'sugerenciasModelo',
							'source'=>$autocompletes['Equipos_Modelos'],
							// additional javascript options for the autocomplete plugin
							'options'=>array(
								'minLength'=>'2',
								'maxLength'=>'30',
								'size'=>'30',
							),
							'htmlOptions' => array(
								'id'=>'Equipos_modelo',
							),
						));
					
					?>
					<?php echo $form->error($model_equipo,'modelo'); ?>
				</div>

				<div class="row">
					<?php echo $form->labelEx($model_equipo,'marca'); ?>
					<?php //echo $form->textField($model_equipo,'marca',array('size'=>30,'maxlength'=>30)); ?>
					<?php
				
						$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
							'name'=>'Equipos[marcas]',
							//'sourceUrl'=>'sugerenciasModelo',
							'source'=>$autocompletes['Equipos_Marcas'],
							// additional javascript options for the autocomplete plugin
							'options'=>array(
								'minLength'=>'2',
								'maxLength'=>'30',
								'size'=>'30',
							),
							'htmlOptions' => array(
								'id'=>'Equipos_marca',
							),
						));
					
					?>
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
									/*
									$(".equipo").html($(".popup").html());
									$(".popup").dialog("close");
									*/
								}'
							)
					);
					
					echo CHtml::Button(Yii::t('general', 'cancel'),Array('class' => 'cancel-equipo'));
				?>
		</div>
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
										$model->fecha_ingreso,'medium',null) : date('d/m/Y'),
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
		<?php echo $form->hiddenField($model, 'fecha_ingreso', array('id'=> 'alternate_fecha_ingreso','value' => isset($model->fecha_ingreso) && !empty($model->fecha_ingreso) ? $model->fecha_ingreso : date('Y-m-d')));?>
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
							/* 'maxDate'=>0, */
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
		<?php echo $form->labelEx($model,'precio'); ?>
		<?php echo $form->textField($model,'precio',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'precio'); ?>
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
			<?php echo $form->textField($model_cliente,'celular',array('size'=>20,'maxlength'=>20)); ?>
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



</div><!-- form -->