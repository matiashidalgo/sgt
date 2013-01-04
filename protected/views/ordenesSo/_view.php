<?php
/* @var $this OrdenesSoController */
/* @var $data OrdenesSo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nro_orden')); ?>:</b>
	<?php echo CHtml::encode($data->nro_orden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_serviceo')); ?>:</b>
	<?php echo CHtml::encode($data->id_serviceo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nro_orden_so')); ?>:</b>
	<?php echo CHtml::encode($data->nro_orden_so); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />


</div>