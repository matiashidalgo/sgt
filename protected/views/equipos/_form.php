<?php
/* @var $this EquiposController */
/* @var $model Equipos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'equipos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php
		
			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'name'=>'Equipos[tipo]',
				'sourceUrl'=>'sugerenciasTipo',
				//'source'=>array('ac1','ac2','ac3'),
				// additional javascript options for the autocomplete plugin
				'options'=>array(
					'minLength'=>'2',
					'maxLength'=>'30',
					'size'=>'30',
				),
				
			));
		
		?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modelo'); ?>
		<?php
		
			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'name'=>'Equipos[modelo]',
				'sourceUrl'=>'sugerenciasModelo',
				//'source'=>array('ac1','ac2','ac3'),
				// additional javascript options for the autocomplete plugin
				'options'=>array(
					'minLength'=>'2',
					'maxLength'=>'30',
					'size'=>'30',
				),
				
			));
		
		?>
		<?php echo $form->error($model,'modelo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'marca'); ?>
		<?php
		
			$this->widget('zii.widgets.jui.CJuiAutoComplete',array(
				'name'=>'Equipos[marca]',
				'sourceUrl'=>'sugerenciasMarca',
				//'source'=>array('ac1','ac2','ac3'),
				// additional javascript options for the autocomplete plugin
				'options'=>array(
					'minLength'=>'2',
					'maxLength'=>'30',
					'size'=>'30',
				),
				
			));
		
		?>
		<?php echo $form->error($model,'marca'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('general', 'create') : Yii::t('general', 'save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->