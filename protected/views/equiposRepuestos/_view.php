<?php
/* @var $this EquiposRepuestosController */
/* @var $data EquiposRepuestos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_equipo')); ?>:</b>
	<?php echo CHtml::encode($data->id_equipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_repuesto')); ?>:</b>
	<?php echo CHtml::encode($data->id_repuesto); ?>
	<br />


</div>