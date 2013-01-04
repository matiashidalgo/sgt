<?php
/* @var $this ImgOrdenesController */
/* @var $data ImgOrdenes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nro_orden')); ?>:</b>
	<?php echo CHtml::encode($data->nro_orden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion_web')); ?>:</b>
	<?php echo CHtml::encode($data->direccion_web); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>