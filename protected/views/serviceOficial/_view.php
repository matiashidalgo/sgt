<?php
/* @var $this ServiceOficialController */
/* @var $data ServiceOficial */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sitio_web')); ?>:</b>
	<?php echo CHtml::encode($data->sitio_web); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipodeorden')); ?>:</b>
	<?php echo CHtml::encode($data->tipodeorden); ?>
	<br />


</div>