<?php
/* @var $this OrdenesController */
/* @var $data Ordenes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nro_orden')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nro_orden), array('view', 'id'=>$data->nro_orden)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cliente')); ?>:</b>
	<?php echo CHtml::encode($data->idCliente->AllConcat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_equipo')); ?>:</b>
	<?php echo CHtml::encode($data->idEquipo->AllConcat); ?>
	<br />
<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('nro_serie')); ?>:</b>
	<?php echo CHtml::encode($data->nro_serie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adquirido_en')); ?>:</b>
	<?php echo CHtml::encode($data->adquirido_en); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('nro_factura')); ?>:</b>
	<?php echo CHtml::encode($data->nro_factura); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_compra')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_compra); ?>
	<br />
*/?>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('falla')); ?>:</b>
	<?php echo CHtml::encode($data->falla); ?>
	<br />
<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('reparacion')); ?>:</b>
	<?php echo CHtml::encode($data->reparacion); ?>
	<br />
	*/ ?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ingreso')); ?>:</b>
	<?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime(
								$data->fecha_ingreso,'medium',null)); ?>
	<br />
<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_presupuesto')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_presupuesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_reparado')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_reparado); ?>
	<br />
	*/ ?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_prometido')); ?>:</b>
	<?php echo CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime(
								$data->fecha_prometido,'medium',null)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_entrega')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_entrega); ?>
	<br />
<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	*/ ?>

</div>