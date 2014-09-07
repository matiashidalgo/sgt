<?php
/* @var $this NoticiasController */
/* @var $data Noticias */
?>



<div class="orden">
	<b><?php echo CHtml::encode($data->getAttributeLabel('nro_orden')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nro_orden), array('ordenes/view', 'id'=>$data->nro_orden)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->idCliente->AllConcat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_equipo')); ?>:</b>
	<?php echo CHtml::encode($data->idEquipo->AllConcat); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('falla')); ?>:</b>
	<?php echo CHtml::encode($data->falla); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ingreso')); ?>:</b>
	<?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime(
								$data->fecha_ingreso,'medium',null)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_prometido')); ?>:</b>
	<?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime(
								$data->fecha_prometido,'medium',null)); ?>
	<br />
</div>